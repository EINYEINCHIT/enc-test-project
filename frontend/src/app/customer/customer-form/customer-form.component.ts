import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { FormGroup, FormControl, Validators } from "@angular/forms";
import { CustomerService } from '../customer.service';
import { CommonService } from '../../shared/services/common.service';
import { NrcCode } from '../../shared/models/nrcCode.model';

@Component({
  selector: 'app-customer-form',
  templateUrl: './customer-form.component.html',
  styleUrls: ['./customer-form.component.scss']
})

export class CustomerFormComponent implements OnInit {

  customerForm: FormGroup;
  id: any;

  base64Photo: any;
  
  citizenTypes: any = ['N', 'C', 'AC', 'NC', 'V', 'M'];
  nrcCodeNumbers: any = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14'];
  nrcCodes: NrcCode[] = [];

  constructor(
    private route: ActivatedRoute,
    private router: Router,
    private customerService: CustomerService,
    private commonService: CommonService
  ) {}

  ngOnInit(): void {
    
    this.id = this.route.snapshot.paramMap.get('id') ? this.route.snapshot.paramMap.get('id') : 0;

    this.getNrcCodes();

    this.customerForm = new FormGroup({
      id: new FormControl(''),
      photo: new FormControl(''),
      email: new FormControl('', [Validators.required, Validators.email]),
      password: new FormControl('', [Validators.required, Validators.pattern('(?:(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*)')]),
      confirm_password: new FormControl('', [Validators.required, Validators.pattern('(?:(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*)')]),
      name: new FormControl('', [Validators.required, Validators.minLength(3), Validators.maxLength(9), Validators.pattern('^[a-zA-Z ]*$')]),
      phone_no: new FormControl('', [Validators.required, Validators.pattern('^[0-9]*$')]),
      date_of_birth: new FormControl('', [Validators.required]),
      nrc_code: new FormControl('', [Validators.required]),
      nrc_code_id: new FormControl('', [Validators.required]),
      citizen_type: new FormControl('', [Validators.required]),
      nrc_no: new FormControl('', [Validators.required, Validators.pattern('^[0-9]*$')]),
      gender: new FormControl('', [Validators.required]),
    });

    if (this.id != 0) this.bindData();

  }
  

  bindData() {
    this.getCustomerById().then((res: any) => {
      if (res) {
        this.base64Photo = res.photo;
        this.customerForm.patchValue({
          id: res.id,
          email: res.email,
          password: res.password,
          confirm_password: res.password,
          name: res.name,
          phone_no: res.phone_no,
          date_of_birth: res.date_of_birth,
          nrc_code: res.nrc_code.code_no,
          nrc_code_id: res.nrc_code_id,
          citizen_type: res.citizen_type,
          nrc_no: res.nrc_no,
          gender: res.gender
        })
      }
    })
  }

  getCustomerById() {
    return new Promise((resolve)=>{
      this.customerService.getCustomerById(this.id).subscribe(res => {
        resolve(res.data);
      })
    })
  }

  getNrcCodes() {
    this.customerService.getNrcCodes().subscribe(res => {
      this.nrcCodes = res.data;
    })
  }

  onFileSelected(event: any) {
    if (event.target.files && event.target.files[0]) {
      let file = event.target.files[0];
      var reader = new FileReader();
      reader.onload = (event: any) => {
        this.base64Photo = 'data:image/jpg;base64,' + btoa(event.target.result);
      }
      reader.readAsBinaryString(file);
    }
  }

  onSubmit(customerForm: FormGroup) {
    if (customerForm.valid) {
      if (this.id == 0) {
        this.createCustomer(this.customerForm.getRawValue());
      } else {
        this.updateCustomer(this.customerForm.getRawValue());
      }
    }
  }

  createCustomer(data: any) {
    this.customerService.createCustomer({
      "id": this.id,
      "photo": this.base64Photo,
      "email": data.email,
      "password": data.password,
      "name": data.name,
      "phone_no": data.phone_no,
      "date_of_birth": data.date_of_birth,
      "nrc_code_id": data.nrc_code_id,
      "citizen_type": data.citizen_type,
      "nrc_no": data.nrc_no,
      "gender": data.gender
    }).subscribe(res => {
      if (!res.error) {
        this.commonService.successAlert('Successful', res.message);
        this.router.navigate(['/customer/list']);
      }
    })
    // this.uploadImage().then((image: any) => {
    //   if (image) {
    //     this.customerService.createCustomer({
    //       "id": this.id,
    //       "photo": image,
    //       "email": data.email,
    //       "password": data.password,
    //       "name": data.name,
    //       "phone_no": data.phone_no,
    //       "date_of_birth": data.date_of_birth,
    //       "nrc_code_id": data.nrc_code_id,
    //       "citizen_type": data.citizen_type,
    //       "nrc_no": data.nrc_no,
    //       "gender": data.gender
    //     }).subscribe(res => {
    //       if (!res.error) {
    //         this.commonService.successAlert('Successful', res.message);
    //         this.router.navigate(['/customer/list']);
    //       }
    //     })
    //   }
    // })
  }

  updateCustomer(data: any) {
    this.customerService.updateCustomer({
      "id": this.id,
      "photo": this.base64Photo,
      "email": data.email,
      "password": data.password,
      "name": data.name,
      "phone_no": data.phone_no,
      "date_of_birth": data.date_of_birth,
      "nrc_code_id": data.nrc_code_id,
      "citizen_type": data.citizen_type,
      "nrc_no": data.nrc_no,
      "gender": data.gender
    }, this.id).subscribe(res => {
      if (!res.error) {
        this.commonService.successAlert('Successful', res.message);
        this.router.navigate(['/customer/list']);
      }
    })
  }

}
