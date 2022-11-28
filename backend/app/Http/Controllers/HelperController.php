<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NrcCode;
use App\Models\Customer;

class HelperController extends Controller
{
    public function get_nrc_codes(Request $request)
    {
        $return = array();

        $data = NrcCode::all();
        $totalCount = $data->count("id");

        $return['total'] = $totalCount;
        $return['data'] = $data;
        return $return;
    }

    public function upload_files(Request $request) {
        if ($request->hasFile('image')) {
            $return = array();

            $completed_file_name = $request->file('image')->getClientOriginalName();
            $file_name = pathinfo($completed_file_name, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $save_file_name = str_replace(' ', '_', $file_name).'_'.time(). '.'.$extension;
            $path = $request->file('image')->storeAs('public/customers', $save_file_name);

            $return['error'] = false;
            $return['message'] = 'Customer photo has been saved';
            $return['data'] = $path;

            return $return;
        }
    }

}
