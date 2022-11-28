import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { CommonService } from '../shared/services/common.service';

@Injectable({
  providedIn: 'root'
})

export class LoginService {

  constructor(
    private http: HttpClient,
    private common: CommonService
  ) { }

  login(data: any): Observable<any> {
    return this.http.post(`${this.common.getApi()}/login`, data, { headers: this.common.loginHeader() });
  }

  logout(): Observable<any> {
    return this.http.post(`${this.common.getApi()}/logout`, {}, { headers: this.common.addHeader() });
  }

  isLoggedIn() {
    return !!localStorage.getItem('token');
  }
  
}
