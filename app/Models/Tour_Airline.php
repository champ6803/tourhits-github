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

class Tour_Airline extends Model {

    protected $table = 'tour_airline';

    public function insertTourAirline($id, $airline_id) {
        try {
            $date = \Carbon\Carbon::now();
            Tour_Airline::insert(
                    ['airline_id' => $airline_id
                        , 'tour_package_id' => $id
                        , 'created_by' => 'admin'
                        , 'created_at' => $date
                        , 'updated_by' => 'admin'
                        , 'updated_at' => $date]
            );
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function updateTourAirline($id, $airline_id) {
        try {
            $date = \Carbon\Carbon::now();
            $tourAirlineList = Tour_Airline::where('tour_package_id', $id)
                    ->where('airline_id', $airline_id)
                    ->get();
            if ($tourAirlineList != null && count($tourAirlineList) > 0) {
                Tour_Airline::where('tour_package_id', $id)
                        ->where('airline_id', $airline_id)
                        ->update(
                                ['airline_id' => $airline_id
                                    , 'tour_package_id' => $id
                                    , 'updated_by' => 'admin'
                                    , 'updated_at' => $date]
                );
            } else {
                Tour_Airline::insert(
                        ['airline_id' => $airline_id
                            , 'tour_package_id' => $id
                            , 'created_by' => 'admin'
                            , 'created_at' => $date
                            , 'updated_by' => 'admin'
                            , 'updated_at' => $date]
                );
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function removeTourAirline($id) {
        try {
            $date = \Carbon\Carbon::now();
            Tour_Airline::where('tour_package_id', $id)
                    ->delete();
        } catch (Exception $ex) {
            return $ex;
        }
    }

}
