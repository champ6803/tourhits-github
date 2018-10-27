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

class Conditions extends Model {

    protected $table = 'conditions';

    public function getConditionsList() {
        try {
            $result = Conditions::all();
            return $result;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getConditionsById($conditions_id) {
        try {
            $result = Conditions::where('conditions_id', $conditions_id)
                    ->first();
            return $result;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function insertConditions($conditions_name, $rate_include, $rate_not_include, $payment_condition, $cancel_change, $other_condition, $beyond_respon, $suggest_warning, $visa_detail, $agreement) {
        try {
            $date = \Carbon\Carbon::now();
            Conditions::insert(
                    ['conditions_name' => $conditions_name
                        , 'rate_include' => $rate_include
                        , 'rate_not_include' => $rate_not_include
                        , 'payment_condition' => $payment_condition
                        , 'cancel_change' => $cancel_change
                        , 'other_condition' => $other_condition
                        , 'beyond_respon' => $beyond_respon
                        , 'suggest_warning' => $suggest_warning
                        , 'visa_detail' => $visa_detail
                        , 'agreement' => $agreement
                        , 'created_by' => 'admin'
                        , 'created_at' => $date
                        , 'updated_by' => 'admin'
                        , 'updated_at' => $date]
            );
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function updateConditions($conditions_id, $conditions_name, $rate_include, $rate_not_include, $payment_condition, $cancel_change, $other_condition, $beyond_respon, $suggest_warning, $visa_detail, $agreement) {
        try {
            $date = \Carbon\Carbon::now();
            Conditions::where('conditions_id', $conditions_id)
                    ->update(
                            ['conditions_name' => $conditions_name
                                , 'rate_include' => $rate_include
                                , 'rate_not_include' => $rate_not_include
                                , 'payment_condition' => $payment_condition
                                , 'cancel_change' => $cancel_change
                                , 'other_condition' => $other_condition
                                , 'beyond_respon' => $beyond_respon
                                , 'suggest_warning' => $suggest_warning
                                , 'visa_detail' => $visa_detail
                                , 'agreement' => $agreement
                                , 'updated_by' => 'admin'
                                , 'updated_at' => $date]
            );
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function removeConditions($conditions_id) {
        try {
            Conditions::where('conditions_id', $conditions_id)->delete();
        } catch (Exception $ex) {
            return $ex;
        }
    }

}
