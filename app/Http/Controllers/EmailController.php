<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Console\Command;
use \Carbon\Carbon;

/**
 * Description of HomeController
 *
 * @author green
 */
class EmailController extends Controller {

    function confirmOrderEmail() {
        try {
            $cus_name = request()->get('cus_name');
            $cus_email = request()->get('cus_email');
            $line_id = request()->get('line_id');
            $phone = request()->get('phone');
            $remark = request()->get('remark');
            $all_total_amount = request()->get('all_total_amount');
            $adult_qty = request()->get('adult_qty');
            $child_qty = request()->get('child_qty');
            $tour_period_id = request()->get('tour_period_id');
            $tour_package_id = request()->get('tour_package_id');

            Mail::send('template/email/mailOrder', ['name' => $cus_name, 'email' => $cus_email, 'line' => $line_id, 'phone' => $phone, 'all_total_amount' => $all_total_amount, 'tour_package_id' => $tour_package_id, 'remark' => $remark], function ($m) {
                $m->to('tourhits@gmail.com', 'Tourhits Client')->subject('แจ้งเตือนการจอง');
                $m->from('admin@tourhits.com', 'Tourhits Systems');
            });
            
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response()->json(array('msg' => 'successfully'));
    }

}
