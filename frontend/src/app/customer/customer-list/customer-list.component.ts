import { AnimateTimings } from '@angular/animations';
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { CommonService } from 'src/app/shared/services/common.service';
import { CustomerService } from '../customer.service';

@Component({
  selector: 'app-customer-list',
  templateUrl: './customer-list.component.html',
  styleUrls: ['./customer-list.component.scss']
})

export class CustomerListComponent implements OnInit {

  page: any = 1;
  limit: any = 5;
  orderBy: string = 'created_at';
  orderAs: string = 'desc';
  keyword: string = '';
  startDate: any = '';
  endDate: any = '';

  customerList: any = [];
  total: number = 0;

  imagePath: string;

  constructor(
    private router: Router,
    private customerService: CustomerService,
    private commonService: CommonService
  ) { }

  ngOnInit(): void {
    this.getAllCustomers();
  }

  getAllCustomers() {
    let params: any = {};
    params['page'] = this.page;
    params['limit'] = this.limit;
    params['order_by'] = this.orderBy;
    params['order_as'] = this.orderAs;
    params['keyword'] = this.keyword;
    params['start_date'] = this.startDate;
    params['end_date'] = this.endDate;
    
    this.customerService.getAllCustomers(params).subscribe(res => {
      this.customerList = res.data;
      this.total = res.total;
      console.log("customerList", this.customerList);
    })
  }

  doSearch() {
    this.getAllCustomers();
  }

  doReset() {
    this.page = 1;
    this.limit = 5;
    this.orderBy = 'created_at';
    this.orderAs = 'desc';
    this.keyword = '';
    this.startDate = '';
    this.endDate = '';
    this.getAllCustomers();
  }

  doSort(orderBy: any) {
    this.orderBy = orderBy;
    this.orderAs = this.orderAs == 'desc' ? 'asc' : 'desc';
    this.getAllCustomers();
  }

  doEdit(id: any) {
    this.router.navigate(['/customer/edit', id]);
  }

  doDelete(id: any) {
    this.commonService.confirmAlert("Are you sure to delete?").then((res) => {
      if (res) {
        this.customerService.deleteCustomer(id).subscribe(res => {
          this.commonService.successAlert('Successful', res.message);
          this.getAllCustomers();
        })
      }
    })
  }

  pagination(event: any) {
    this.page = event;
    this.getAllCustomers();
  } 

}
