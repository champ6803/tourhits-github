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

class Tour_Route extends Model {

    protected $table = 'tour_route';

    public function insertTourRoute($id, $route_id) {
        try {
            $date = \Carbon\Carbon::now();
            Tour_Route::insert(
                    ['route_id' => $route_id
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

    public function updateTourRoute($id, $route_id) {
        try {
            $date = \Carbon\Carbon::now();
            $tourRouteList = Tour_Route::where('tour_package_id', $id)
                    ->where('route_id', $route_id)
                    ->get();
            if ($tourRouteList != null && count($tourRouteList) > 0) {
                Tour_Route::where('route_id', $route_id)
                        ->where('tour_package_id', $id)
                        ->update(
                                ['route_id' => $route_id
                                    , 'tour_package_id' => $id
                                    , 'updated_by' => 'admin'
                                    , 'updated_at' => $date]
                );
            } else {
                Tour_Route::insert(
                        ['route_id' => $route_id
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

    public function removeTourRoute($id) {
        try {
            $date = \Carbon\Carbon::now();
            $tourRouteList = Tour_Route::where('tour_package_id', $id)
                    ->delete();
        } catch (Exception $ex) {
            return $ex;
        }
    }

}
