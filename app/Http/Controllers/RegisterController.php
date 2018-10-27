<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\Province;
use App\Models\Address;
use App\Models\Customer;
use App\Models\Customer_Address;
use Socialize;
use Illuminate\Support\Facades\Input;

/**
 * Description of RegisterController
 *
 * @author champ
 */
class RegisterController extends Controller {

    public function index() {
        $countryList = Country::all();
        $provinceList = Province::all();
        $regisUser = "";
        $provider = Socialize::with('facebook');
        if (Input::has('code')) {
            $user = $provider->stateless()->user();
            $email = $user->email;
            $name = $user->name;
            $password = substr($user->token, 0, 10);
            $facebook_id = $user->id;

            if ($email == null) { // case permission is not email public.
                $user = $this->checkExistUserByFacebookId($facebook_id);
                $email = $facebook_id;
            } else {
                $user = $this->checkExistUserByEmail($email);
            }

            if ($user != null) { // Auth exist account.
                session_start();
                if ($user->role == 'C') {
                    $customer = Customer::where(['user_id' => $user->user_id])->first();
                    $_SESSION['m_user'] = $user->email;
                    $_SESSION['role'] = $user->role;
                    $_SESSION['customer_id'] = $customer->customer_id;
                    $_SESSION['customer_name'] = $customer->customer_fname . ' ' . $customer->customer_lname;
                    $_SESSION['loggedin_time'] = time();
                    $_SESSION['expire'] = $_SESSION['loggedin_time'] + (30 * 60);
                    return redirect('loading')->with(['text' => 'รอสักครู่เรากำลังพาท่าน เข้าสู่ระบบ', 'role' => 'Customer', 'name' => $customer->customer_fname]);
                }
            }
            $regisUser = ['email' => $email, 'name' => $name, 'password' => $password];
        }

        return view('auth.register', compact('countryList', 'provinceList', 'regisUser'));
    }

    public function register(Request $request) {
        $data = $request->all();
        $validator = Validator::make($request->all(), [
                    'first_name' => '',
                    'last_name' => '',
                    'email' => 'required|email|max:255|unique:user',
                    'password' => 'required|min:6|max:20|confirmed',
                    'password_confirmation' => 'required|same:password',
                    'phone' => 'required|numeric|min:10',
                    'line_id' => 'required|min:6',
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
                        'customer_line' => $data['line_id'],
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
        return redirect('loading?page=register')->with(['text' => 'สมัครสมาชิกเรียบร้อย รอสักครู่เรากำลังพาท่าน เข้าสู่ระบบ', 'name' => $data['first_name']]);
    }

    private function checkExistUserByEmail($email) {
        $user = User::where('email', '=', $email)->first();
        return $user;
    }

    private function checkExistUserByFacebookId($facebook_id) {
        $user = User::where('facebook_id', '=', $facebook_id)->first();
        return $user;
    }

}
