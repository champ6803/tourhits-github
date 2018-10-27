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
use Socialize;
use App\Models\User;
use App\Models\Customer;
use App\Models\Admin;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

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
        $email = $data['email'];
        $password = $data['password'];
        $role = $data['role'];
        $validator = Validator::make($request->all(), [
                    'email' => 'required|email|max:255',
                    'password' => 'required|min:6'
        ]);
        if ($validator->fails()) {
            if ($role == "A") {
                return redirect('admin')
                                ->withErrors($validator)
                                ->withInput();
            } else {
                return redirect('login')
                                ->withErrors($validator)
                                ->withInput();
            }
        }
        try {
            $checkLogin = User::where(['email' => $email, 'password' => $password])->first();
            if ($checkLogin != null && $checkLogin->count() > 0) {
                session_start();
                if ($checkLogin->role == 'C') {
                    $customer = Customer::where(['user_id' => $checkLogin->user_id])->first();
                    $_SESSION['m_user'] = $checkLogin->email;
                    $_SESSION['role'] = $checkLogin->role;
                    $_SESSION['customer_id'] = $customer->customer_id;
                    $_SESSION['customer_name'] = $customer->customer_fname . ' ' . $customer->customer_lname;
                    $_SESSION['loggedin_time'] = time();
                    $_SESSION['expire'] = $_SESSION['loggedin_time'] + (30 * 60);
                    return redirect('loading')->with(['text' => 'รอสักครู่เรากำลังพาท่าน เข้าสู่ระบบ', 'role' => 'Customer', 'name' => $customer->customer_fname]);
                } else if ($checkLogin->role == 'A') {
                    $admin = Admin::where(['user_id' => $checkLogin->user_id])->first();
                    $_SESSION['a_user'] = $checkLogin->email;
//                    dd($_SESSION['a_user']);
                    $_SESSION['role'] = $checkLogin->role;
                    $_SESSION['admin_id'] = $admin->admin_id;
                    //$_SESSION['admin_name'] = $admin->admin_fname . ' ' . $admin->admin_fname;
                    $_SESSION['loggedin_time'] = time();
                    $_SESSION['expire'] = $_SESSION['loggedin_time'] + (30 * 60);
                    return redirect('order-list');
                }
            } else if ($role == "A") {
                return redirect('admin')->with('error', 'ไม่สามารถ Login ได้');
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
        //$result = (new HomeController)->index();
        return redirect('/')->with('logout', 'bye bye');
    }

    public function facebookAuthRedirect() {
        return Socialize::with('facebook')->redirect();
    }

    public function facebookSuccess() {
        $provider = Socialize::with('facebook');
        if (Input::has('code')) {
            $user = $provider->stateless()->user();
            dd($user); // print value debug.
        }
    }

}
