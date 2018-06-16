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

class Orders extends Model {

    protected $table = 'orders';

    public function saveOrder($customer_id, $order_total_price, $tour_package_id, $tour_period_id, $quantity_adult, $quantity_child) {
        try {
            $order_id = Orders::insertGetId([
                        'customer_id' => $customer_id
                        , 'order_status_code' => 'WA'
                        , 'order_date' => null
                        , 'order_name' => null
                        , 'order_email' => null
                        , 'order_phone' => null
                        , 'order_line' => null
                        , 'order_remark' => null
                        , 'order_total_price' => $order_total_price
                        , 'created_by' => $customer_id
                        , 'created_at' => null
                        , 'updated_by' => $customer_id
                        , 'updated_at' => null
            ]);
            return [
                'order_id' => $order_id,
                'tour_package_id' => $tour_package_id,
                'tour_period_id' => $tour_period_id,
                'quantity_adult' => $quantity_adult,
                'quantity_child' => $quantity_child,
                'price_each' => null,
                'created_by' => $customer_id,
                'created_at' => null,
                'updated_by' => $customer_id,
                'updated_at' => null
            ];
            
            Order_Tour_Package::insert([
                'order_id' => $order_id,
                'tour_package_id' => $tour_package_id,
                'tour_period_id' => $tour_period_id,
                'quantity_adult' => $quantity_adult,
                'quantity_child' => $quantity_child,
                'price_each' => null,
                'created_by' => $customer_id,
                'created_at' => null,
                'updated_by' => $customer_id,
                'updated_at' => null
            ]);
            return true;
        } catch (\Exception $ex) {
            return $ex;
        }
    }

}
