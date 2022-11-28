import { Injectable } from '@angular/core';
import {
  HttpRequest,
  HttpHandler,
  HttpEvent,
  HttpInterceptor
} from '@angular/common/http';
import { catchError, Observable, throwError } from 'rxjs';
import { Router } from '@angular/router';

@Injectable()
export class AuthInterceptor implements HttpInterceptor {

  constructor(
    private router: Router,
  ) {}

  intercept(request: HttpRequest<unknown>, next: HttpHandler): Observable<HttpEvent<unknown>> {
    return next.handle(request).pipe(
      catchError( (err) => {
        if (err.status == 401) {
         this.handle401Error();
        }
        return throwError('Error EXTRA');
      })
    )
  }

  private handle401Error(): Observable<any> {
      localStorage.removeItem('token');
      localStorage.removeItem('email');
      this.router.navigate(['/login']);
      return throwError('Error 401');
  }

}
