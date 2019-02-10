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
        if (!$this->checkAdminLogin()) {
            return view('admin.login-admin');
        }
        return view('admin.order-list');
    }

    public function checkAdminLogin() {
        session_start();
       $user = $_SESSION['a_user'];
        if ($user != null) {
            return true;
        }
        return false;
    }

    public function order_list() {
        $orderList = $this->getOrderList();
        return view('admin.order-list', compact('orderList'));
    }

    public function getOrderList() {
        try {
            $orderModel = new Orders();
            $orderList = $orderModel->getOrder();
            foreach ($orderList as $order) {
//                $newOrderDate = date("d-m-Y h:i:s", strtotime($order->order_date));
//                $order->order_date = $newOrderDate;
            }
            
            return $orderList;
        } catch (\Exception $ex) {
            return $ex;
        }
    }

    public function getOrderDetailList() {
        try {
            $order_id = request()->get('order_id');
            $orderModel = new Orders();
            $orderDetailList = $orderModel->getOrderDetail($order_id);
            foreach ($orderDetailList as $orderDetail) {
                $newStartDate = date("d-m-Y", strtotime($orderDetail->tour_period_start));
                $newEndDate = date("d-m-Y", strtotime($orderDetail->tour_period_end));
                $orderDetail->tour_period_start = $newStartDate;
                $orderDetail->tour_period_end = $newEndDate;
            }
            return response($orderDetailList);
        } catch (\Exception $ex) {
            return $ex;
        }
    }

    public function order_action() {
        try {
            $order_id = request()->get('order_id');
            $status = request()->get('status');
            $orderModel = new Orders();
            $suc = $orderModel->saveOrderAction($order_id, $status);
            if ($suc) {
                $orderList = $orderModel->getOrder();
                return response($orderList);
            }
            return response(null);
        } catch (\Exception $ex) {
            return response($ex);
        }
    }

}
