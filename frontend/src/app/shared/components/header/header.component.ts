import { Component, EventEmitter, HostListener, Input, OnInit, Output } from '@angular/core';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})

export class HeaderComponent implements OnInit {

  email: any;

  @Output() collapsedEvent = new EventEmitter<boolean>();
  collapsedSideBar: boolean = false;
  
  @HostListener("window:resize", ["$event"])
  onResize(event: any) {
    let innerWidth = event.target.innerWidth;
    this.openSidebar(innerWidth);
  }

  constructor() { }

  ngOnInit(): void {
    this.openSidebar(innerWidth);
    this.email = localStorage.getItem('email');
  }

  openSidebar(innerWidth: any) {
    if (innerWidth <= 992) {
      this.collapsedSideBar = true;
      this.collapsedEvent.emit(this.collapsedSideBar);
    } else {
      this.collapsedSideBar = false;
      this.collapsedEvent.emit(this.collapsedSideBar);
    }
  }

  toggleSidebar() {
    this.collapsedSideBar = !this.collapsedSideBar;
    this.collapsedEvent.emit(this.collapsedSideBar);
  }

}
