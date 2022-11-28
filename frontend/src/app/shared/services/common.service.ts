import { Injectable } from "@angular/core";
import { HttpHeaders } from "@angular/common/http";
import swal from "sweetalert2";
import { throwError } from "rxjs";

@Injectable({
    providedIn: 'root'
})

export class CommonService {

    private apiURL: string;

    constructor() {
        this.apiURL = 'http://127.0.0.1:8000/api';
    }

    public getApi() {
        return this.apiURL;
    }

    public addHeader() {
        const headers = new HttpHeaders()
            .set("content-type", "application/json")
            .set("authorization", `Bearer ${this.getToken()}`);
        return headers;
    }

    public loginHeader() {
        const headers = new HttpHeaders().set(
            "content-type",
            "application/json"
        );
        return headers;
    }

    getToken() {
        let _token = localStorage.getItem("token");
        if (_token) return _token;
        return "";
    }

    successAlert(title: string, msg: string) {
        const Toast = swal.mixin({
            toast: true,
            position: "bottom-end",
            showConfirmButton: false,
            timer: 3000,
            background: "#00c6bc",
            allowOutsideClick: false
        });
        Toast.fire({
            html: `
            <div class="my-alert success text-left">
                <span class="material-icons my-alert-icn">check_circle</span>
                <p class="my-alert-tit">${title}</p>
                <p class="my-alert-msg">${msg}</p>
            </div>
            `
        });
    }

    confirmAlert(msg: string): Promise<any> {
        return new Promise(resolve => {
            swal.fire({
                html: `
                <div class="my-alert confirm text-center">
                    <p class="my-alert-tit mt-3 mb-3" style="color: #6b2bff; font-size: 2rem;">Confirm</p>
                    <p class="my-alert-msg">${msg}</p>
                </div>
                `,
                showCancelButton: true,
                confirmButtonColor: "#6b2bff",
                cancelButtonColor: "#ff0000",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                background: "#ffffff"
            }).then(result => {
                if (result.value) resolve(true);
                else resolve(false);
            });
        });
    }

}
