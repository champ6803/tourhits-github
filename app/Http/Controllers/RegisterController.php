<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\Province;
use App\Models\Address;
use App\Models\Customer;
use App\Models\Customer_Address;

/**
 * Description of RegisterController
 *
 * @author champ
 */
class RegisterController extends Controller {

    public function index() {
        $countryList = Country::all();
        $provinceList = Province::all();
        return view('auth.register', [
            'countryList' => $countryList,
            'provinceList' => $provinceList
        ]);
    }

    public function register(Request $request) {
        $data = $request->all();
        $validator = Validator::make($request->all(), [
                    'username' => 'required|max:255|unique:user',
                    'first_name' => '',
                    'last_name' => '',
                    'email' => 'required|email|max:255|unique:user',
                    'password' => 'required|min:6|max:20|confirmed',
                    'password_confirmation' => 'required|same:password',
                    'phone' => 'required|numeric|min:10',
                    'address' => 'required',
                    'country' => 'required',
                    'province' => 'required',
                    'district' => 'required',
                    'subdistrict' => 'required',
                    'post_code' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('register')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        try {
            $user_id = User::insertGetId([
                        'username' => $data['username'],
                        'email' => $data['email'],
                        'password' => $data['password'],
                        'role' => 'C',
                        'level' => 1,
                        'activated' => 0,
                        'created_by' => 'user',
                        'updated_by' => 'user'
            ]);


            $customer_id = Customer::insertGetId([
                        'user_id' => $user_id,
                        'company_id' => $data['company'],
                        'customer_fname' => $data['first_name'],
                        'customer_lname' => $data['last_name'],
                        'customer_email' => $data['email'],
                        'customer_phone' => $data['phone'],
                        'created_by' => 'user',
                        'updated_by' => 'user'
            ]);

            $address_id = Address::insertGetId([
                        'country_id' => $data['country'],
                        'province_id' => $data['province'],
                        'district_id' => $data['district'],
                        'subdistrict_code' => $data['subdistrict'],
                        'post_code' => $data['post_code'],
                        'address_detail' => $data['address'],
                        'created_by' => 'user',
                        'updated_by' => 'user'
            ]);

            Customer_Address::insert([
                'customer_id' => $customer_id,
                'address_id' => $address_id,
                'address_type' => 'h',
                'created_by' => 'user',
                'updated_by' => 'user'
            ]);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }

        return redirect('/')->with('alert', 'สมัครสมาชิกเรียบร้อย!');;
    }

}
