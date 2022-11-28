import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { FormGroup, FormControl, Validators } from "@angular/forms";
import { LoginService } from './login.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  loginForm: FormGroup;

  constructor(
    private router: Router,
    private loginService: LoginService
  ) { }

  ngOnInit(): void {
    this.loginForm = new FormGroup({
      email: new FormControl('admin@example.com', [Validators.required, Validators.email]),
      password: new FormControl('123456', [Validators.required])
    })
  }

  onSubmit(loginForm: FormGroup) {
    if (loginForm.valid) {
      this.loginService.login(this.loginForm.getRawValue()).subscribe(res => {
        localStorage.setItem('token', res.data.token);
        localStorage.setItem('email', res.data.email);
        this.router.navigate(['/customer/list']);
      }, err => {
        console.log("err", err);
      })
    }
  }

}
