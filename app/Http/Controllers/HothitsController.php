<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\Tour_Package;
use App\Models\Tour_Period;

/**
 * Description of HomeController
 *
 * @author green
 */
class HothitsController extends Controller {

    public function hot_hits() {
        return view('tour.hothits');
    }
    
    public function tour_hit() {
        $tourList = new Tour_Package();
        $tourHitsPackageActiveList = $tourList->getTourPackageByCategory(100002, 0); //แพ็คเกจยอดนิยม
        $arrayHitActive = array();
        foreach ($tourHitsPackageActiveList as $tour) {
            array_push($arrayHitActive, $tour->tour_package_id);
        }
        $tourHitPeriodActive = Tour_Period::whereIn('tour_package_id', $arrayHitActive)
                ->get();

        return view('tour.tourhot', compact('tourHitsPackageActiveList', 'tourHitPeriodActive'));
    }

}