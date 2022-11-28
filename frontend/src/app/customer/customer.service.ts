import { HttpClient, HttpParams } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Customer } from '../shared/models/customer.model';
import { CommonService } from '../shared/services/common.service';

@Injectable({
  providedIn: 'root'
})

export class CustomerService {

  constructor(
    private http: HttpClient,
    private common: CommonService
  ) {
    
  }
  
  getAllCustomers(_params?: any): Observable<any> {
    return this.http.get(`${this.common.getApi()}/customer`, { params: _params, headers: this.common.addHeader() });
  }

  createCustomer(data: Customer): Observable<any> {
    return this.http.post(`${this.common.getApi()}/customer`, data, { headers: this.common.addHeader() });
  }

  updateCustomer(data: Customer, id: any): Observable<any> {
    return this.http.put(`${this.common.getApi()}/customer/${id}`, data, { headers: this.common.addHeader() });
  }

  getCustomerById(id: any): Observable<any> {
    return this.http.get(`${this.common.getApi()}/customer/${id}`, { headers: this.common.addHeader() });
  }

  deleteCustomer(id: any): Observable<any> {
    return this.http.delete(`${this.common.getApi()}/customer/${id}`, { headers: this.common.addHeader() });
  }

  getNrcCodes(): Observable<any> {
    return this.http.get(`${this.common.getApi()}/nrc_code`, { headers: this.common.addHeader() });
  }

}
