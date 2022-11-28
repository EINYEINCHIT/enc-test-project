import { Component, Input, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { LoginService } from '../../../login/login.service';

@Component({
  selector: 'app-sidebar',
  templateUrl: './sidebar.component.html',
  styleUrls: ['./sidebar.component.scss']
})

export class SidebarComponent implements OnInit {

  @Input() collapsedSideBar: boolean = false;

  constructor(
    private router: Router,
    private loginService: LoginService
  ) {
    
  }

  ngOnInit(): void { }

  logout() {
    this.loginService.logout().subscribe(res => {
      localStorage.removeItem('token');
      localStorage.removeItem('email');
      this.router.navigate(['/login']);
    }, err => {
      console.log("err", err);
    })
  }

}
