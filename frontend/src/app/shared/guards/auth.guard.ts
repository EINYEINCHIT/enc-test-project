import { Injectable } from '@angular/core';
import { CanActivate, Router } from '@angular/router';
import { LoginService } from '../../login/login.service';

@Injectable({
  providedIn: 'root'
})

export class AuthGuard implements CanActivate {

  constructor(
    private router: Router,
    private loginService: LoginService
  ) {
    
  }

  canActivate() {
    if (this.loginService.isLoggedIn()) {
      return true;
    }
    alert('You have not logged in');
    this.router.navigate(['/login']);
    return false;
  }
  
}
