<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

/**
 * Description of Employee
 *
 * @author Champ
 */
use Illuminate\Database\Eloquent\Model;
use App\Models\Order_Tour_Package;
use Illuminate\Support\Facades\DB;

class Orders extends Model {

    protected $table = 'orders';

    public function saveOrder($customer_id, $order_name, $order_email, $order_phone, $order_line, $order_remark, $order_total_price, $tour_package_id, $tour_period_id, $quantity_adult, $quantity_child) {
        try {
            $order_id = Orders::insertGetId([
                        'customer_id' => $customer_id
                        , 'order_status_code' => 'WA'
                        , 'order_date' => null
                        , 'order_name' => $order_name
                        , 'order_email' => $order_email
                        , 'order_phone' => $order_phone
                        , 'order_line' => $order_line
                        , 'order_remark' => $order_remark
                        , 'order_total_price' => $order_total_price
                        , 'created_by' => 'admin'
                        , 'created_at' => null
                        , 'updated_by' => 'admin'
                        , 'updated_at' => null
            ]);
            Order_Tour_Package::insert([
                'order_id' => $order_id,
                'tour_package_id' => $tour_package_id,
                'tour_period_id' => $tour_period_id,
                'quantity_adult' => $quantity_adult,
                'quantity_child' => $quantity_child,
                'price_each' => null,
                'created_by' => 'admin',
                'created_at' => null,
                'updated_by' => 'admin',
                'updated_at' => null
            ]);
            return true;
        } catch (\Exception $ex) {
            return $ex;
        }
    }

    public function getOrder() {
        try {
            $date = \Carbon\Carbon::now();
            $order = Orders::join('order_status', 'order_status.order_status_code', '=', 'orders.order_status_code')
                    ->leftJoin('customer', 'customer.customer_id', '=', 'orders.customer_id')
                    ->select(DB::raw('COALESCE(orders.order_name, customer.customer_fname) as name'), DB::raw('COALESCE(orders.order_phone, customer.customer_phone) as phone'), 'orders.*', 'order_status.*')
                    ->get();

            return $order;
        } catch (\Exception $ex) {
            return $ex;
        }
    }
    
    public function getOrderDetail($order_id){
        try {
            $orderDetail = Order_Tour_Package::join('tour_package', 'tour_package.tour_package_id', '=', 'order_tour_package.tour_package_id')
                    ->join('tour_period', 'tour_period.tour_period_id', '=', 'order_tour_package.tour_period_id')
                    ->where('order_tour_package.order_id', '=', $order_id)
                    ->get();

            return $orderDetail;
        } catch (\Exception $ex) {
            return $ex;
        }
    }

    public function saveOrderAction($order_id, $status) {
        try {
            Orders::where('order_id', $order_id)
                    ->update(['order_status_code' => $status]);

            return true;
        } catch (\Exception $ex) {
            return $ex;
        }
    }

}
