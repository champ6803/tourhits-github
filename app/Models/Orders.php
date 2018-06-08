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

class Orders extends Model {

    protected $table = 'order';

    public function saveOrder($arrOrders){
        $order_id =  Orders::insertGetId($arrOrders)
        
    }
    
}
