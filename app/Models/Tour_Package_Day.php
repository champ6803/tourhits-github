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
use Illuminate\Support\Facades\DB;
use App\Models\Tour_Attraction_Day;

class Tour_Package_Day extends Model {

    protected $table = 'tour_package_day';

    public function getTourPackageDay($tour_package_id) {
        try {
            $tourPackageDayList = Tour_Package_Day::where('tour_package_day.tour_package_id', '=', $tour_package_id)
                    ->get();
            return $tourPackageDayList;
        } catch (\Exception $ex) {
            return $ex;
        }
    }
    
    public function getTourAttractionDay($tour_package_day_id){
        try {
            $tourAttractionDayList = Tour_Attraction_Day::where('tour_attraction_day.tour_package_day_id', '=', $tour_package_day_id)
                    ->join('attraction', 'attraction.attraction_id', '=', 'tour_attraction_day.attraction_id')
                    ->get();

            return $tourAttractionDayList;
        } catch (\Exception $ex) {
            return $ex;
        }
    }
    

    public function insertTourPackageDay($id, $day, $tourname, $tourdetail) {
        try {
            $date = \Carbon\Carbon::now();
            $tour_day_id = Tour_Package_Day::insertGetId(
                            ['tour_package_id' => $id
                                , 'tour_package_day' => $day
                                , 'tour_package_day_name' => $tourname
                                , 'tour_package_day_description' => $tourdetail
                                , 'created_by' => 'admin'
                                , 'created_at' => $date
                                , 'updated_by' => 'admin'
                                , 'updated_at' => $date]
            );
            return $tour_day_id;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function insertTourAttractionDay($day_id, $attraction_id) {
        try {
            $date = \Carbon\Carbon::now();
            Tour_Attraction_Day::insert([
                'tour_package_day_id' => $day_id
                , 'attraction_id' => $attraction_id
                , 'created_by' => 'admin'
                , 'created_at' => $date
                , 'updated_by' => 'admin'
                , 'updated_at' => $date
            ]);
        } catch (\Exception $ex) {
            return $ex;
        }
    }

}
