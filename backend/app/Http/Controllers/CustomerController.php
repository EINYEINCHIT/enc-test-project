<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;

class CustomerController extends Controller
{
    
    public function index(Request $request)
    {
        $return = array();

        $page = $request->input('page');
        $limit = $request->input('limit');
        $keyword = $request->input('keyword');
        $start_date = date($request->input('start_date'));
        $end_date = date($request->input('end_date'));
        $order_by = $request->input('order_by');
        $order_as = $request->input('order_as');
        
        $data = Customer::with('nrc_code');

        // search by keyword, start date and end date
        if (isset($start_date) && $start_date != '' && isset($end_date) && $end_date != '') {
            $data->whereBetween(DB::raw('DATE(created_at)'), [$start_date, $end_date]);
        }

        // filter by start date and end date
        if (isset($keyword) && $keyword != '') {
            $data->where('email','like','%'.$keyword.'%')
            ->orWhere('name','like','%'.$keyword.'%')
            ->orWhere('phone_no','like','%'.$keyword.'%');
        }

        // order
        if (isset($order_by) && $order_by != '') {
            $data->orderBy($order_by, $order_as == '' ? 'desc' : $order_as);
        }

        $totalCount = $data->count('id');

        // page, limit
        $data->skip(($page-1)*$limit)->take($limit);
        
        $data = $data->get();
        
        $return['total'] = $totalCount;
        $return['data'] = $data;
        return $return;
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'required',
            'email' => 'required',
            'password' => 'required',
            'name' => 'required',
            'phone_no' => 'required',
            'date_of_birth' => 'required',
            'nrc_code_id' => 'required',
            'citizen_type' => 'required',
            'nrc_no' => 'required',
            'gender' => 'required'
        ]);

        $return = array();
      
        $data = new Customer();
        $data->photo = $request->photo;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->name = $request->name;
        $data->phone_no = $request->phone_no;
        $data->date_of_birth = $request->date_of_birth;
        $data->nrc_code_id = $request->nrc_code_id;
        $data->citizen_type = $request->citizen_type;
        $data->nrc_no = $request->nrc_no;
        $data->gender = $request->gender;

        DB::beginTransaction();
        try {
            $data->save();
            DB::commit();
            $return['error'] = false;
            $return['message'] = 'Customer data has been saved';
            $return['data'] = $data;
        } catch (\Exception $e) {
            return $e;
            DB::rollback();
            $return['error'] = true;
            $return['message'] = 'Failed';
        }
        return $return;
    }
   
    public function show($id)
    {
        $return = array();
        $return['data'] = Customer::with("nrc_code")->find($id);
        return $return;
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'photo' => 'required',
            'email' => 'required',
            'password' => 'required',
            'name' => 'required',
            'phone_no' => 'required',
            'date_of_birth' => 'required',
            'nrc_code_id' => 'required',
            'citizen_type' => 'required',
            'nrc_no' => 'required',
            'gender' => 'required'
        ]);
        
        $return = array();
      
        $data = Customer::findOrFail($id);
        $data->photo = $request->photo;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->name = $request->name;
        $data->phone_no = $request->phone_no;
        $data->date_of_birth = $request->date_of_birth;
        $data->nrc_code_id = $request->nrc_code_id;
        $data->citizen_type = $request->citizen_type;
        $data->nrc_no = $request->nrc_no;
        $data->gender = $request->gender;

        DB::beginTransaction();
        try {
            $data->save();
            DB::commit();
            $return['error'] = false;
            $return['message'] = 'Customer data has been updated';
            $return['data'] = $data;
        } catch (\Exception $e) {
            return $e;
            DB::rollback();
            $return['error'] = true;
            $return['message'] = 'Failed';
        }
        return $return;
    }
    
    public function destroy($id)
    {
        Customer::find($id)->delete();
        
        $data = Customer::all();
        $totalCount = $data->count("id");

        $return['total'] = $totalCount;
        $return['data'] = $data;

        $return['error'] = false;
        $return['message'] = 'Customer data has been deleted';
        $return['data'] = $data;
        return $return;
    }

}
