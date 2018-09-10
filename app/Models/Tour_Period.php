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
use App\Models\Tour_Package;

class Tour_Period extends Model {

    protected $table = 'tour_period';

    public function insertTourPeriod($id, $tour_period_start, $tour_period_end
    , $tour_period_adult_price, $tour_period_child_price, $tour_period_child_nb_price
    , $tour_period_alone_price, $tour_period_adult_special_price
    , $tour_period_child_special_price, $tour_period_status) {
        try {
//            $id = DB::table('tour_package')->max('tour_package_id');
            $date = \Carbon\Carbon::now();
            Tour_Period::insert(
                    ['tour_package_id' => $id
                        , 'tour_period_start' => $tour_period_start
                        , 'tour_period_end' => $tour_period_end
                        , 'tour_period_adult_price' => $tour_period_adult_price
                        , 'tour_period_child_price' => $tour_period_child_price
                        , 'tour_period_child_nb_price' => $tour_period_child_nb_price
                        , 'tour_period_alone_price' => $tour_period_alone_price
                        , 'tour_period_adult_special_price' => $tour_period_adult_special_price
                        , 'tour_period_child_special_price' => $tour_period_child_special_price
                        , 'tour_period_status' => $tour_period_status
                        , 'created_by' => 'admin'
                        , 'created_at' => $date
                        , 'updated_by' => 'admin'
                        , 'updated_at' => $date]
            );
            return true;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function updateTourPeriod($tour_period_id, $tour_package_id, $tour_period_start, $tour_period_end
    , $tour_period_adult_price, $tour_period_child_price, $tour_period_child_nb_price
    , $tour_period_alone_price, $tour_period_adult_special_price
    , $tour_period_child_special_price, $tour_period_status) {
        try {
            $date = \Carbon\Carbon::now();
            Tour_Period::where('tour_period.tour_period_id', '=', $tour_period_id)
                    ->update(
                            ['tour_package_id' => $tour_package_id
                                , 'tour_period_start' => $tour_period_start
                                , 'tour_period_end' => $tour_period_end
                                , 'tour_period_adult_price' => $tour_period_adult_price
                                , 'tour_period_child_price' => $tour_period_child_price
                                , 'tour_period_child_nb_price' => $tour_period_child_nb_price
                                , 'tour_period_alone_price' => $tour_period_alone_price
                                , 'tour_period_adult_special_price' => $tour_period_adult_special_price
                                , 'tour_period_child_special_price' => $tour_period_child_special_price
                                , 'tour_period_status' => $tour_period_status
                                , 'created_by' => 'admin'
                                , 'created_at' => $date
                                , 'updated_by' => 'admin'
                                , 'updated_at' => $date]
            );
            return true;
        } catch (Exception $ex) {
            return $ex;
        }
    }

}
