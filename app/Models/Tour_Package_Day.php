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

}
