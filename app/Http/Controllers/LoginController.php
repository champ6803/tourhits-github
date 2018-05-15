<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Customer;
use App\Models\Admin;

/**
 * Description of LoginController
 *
 * @author chatc_000
 */
class LoginController {
    #region View

    public function index() {
        return view('auth.login');
    }
    
    public function adminLogin() {
        return view('auth.admin-login');
    }

    #endregion

    public function login(Request $request) {
        $data = $request->all();
        $validator = Validator::make($request->all(), [
                    'email' => 'required|email|max:255',
                    'password' => 'required|min:6'
        ]);
        if ($validator->fails()) {
            return redirect('login')
                            ->withErrors($validator)
                            ->withInput();
        }
        try {
            $email = $data['email'];
            $password = $data['password'];
            $checkLogin = User::where(['email' => $email, 'password' => $password])->first();
            if ($checkLogin != null && $checkLogin->count() > 0) {
                session_start();
                if ($checkLogin->role == 'C') {
                    $customer = Customer::where(['user_id' => $checkLogin->user_id])->first();
                    $_SESSION['m_user'] = $checkLogin->username;
                    $_SESSION['role'] = $checkLogin->role;
                    $_SESSION['customer_id'] = $customer->customer_id;
                    $_SESSION['customer_name'] = $customer->customer_fname . ' ' . $customer->customer_lname;
                    $_SESSION['loggedin_time'] = time();
                    return redirect('loading')->with(['text' => 'รอสักครู่เรากำลังพาท่าน เข้าสู่ระบบ','role' => 'Customer', 'name' => $customer->customer_fname]);
                } else if ($checkLogin->role == 'A') {
                    $admin = Admin::where(['user_id' => $checkLogin->user_id])->first();
                    $_SESSION['m_user'] = $checkLogin->username;
                    $_SESSION['role'] = $checkLogin->role;
                    $_SESSION['admin_id'] = $admin->admin_id;
                    $_SESSION['admin_name'] = $admin->admin_fname . ' ' . $admin->admin_fname;
                    $_SESSION['loggedin_time'] = time();
                    return redirect('loading')->with(['role' => 'Admin', 'name' => $admin->admin_fname]);
                }
            } else {
                return redirect('login')->with('error', 'ไม่สามารถ Login ได้');
            }
        } catch (\Exception $e) {
            return dd($e->getMessage());
        }
    }
    
    function logout() {
        session_start();
        session_destroy();
        $result = (new HomeController)->index();
        return redirect('/')->with('logout', 'bye bye');
    }

}
