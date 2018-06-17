<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\Orders;

/**
 * Description of DashboardController
 *
 * @author Admin
 */
class DashboardController extends Controller {

    public function dashboard() {
        return view('admin.dashboard');
    }

    public function order_list() {
        $orderLis = getOrder
        
        return view('admin.order-list');
    }

    public function getOrderList() {
        try {
            $orderModel = new Orders();
            $orderList = $orderModel->getOrder();
            return $orderList;
            
        } catch (\Exception $ex) {
            return $ex;
        }
    }

}
