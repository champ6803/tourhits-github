<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\Tour_Category;
use App\Models\Tour_Package;
use App\Models\Category;
use App\Models\Tour_Period;

/**
 * Description of HomeController
 *
 * @author champ
 */
class HomeController extends Controller {

    public function index() {
        $cate = new Category();
        $tourList = new Tour_Package();
        $categoryList = $cate->getCategoryIndex();
        $tourHitsPackageActiveList = $tourList->getTourPackageByCategory(9999, 0); //แพ็คเกจยอดนิยม
        $tourHitsPackageList = $tourList->getTourPackageByCategory(9999, 4);

        $arrayHitActive = array();
        foreach ($tourHitsPackageActiveList as $tour) {
            array_push($arrayHitActive, $tour->tour_package_id);
        }
        $tourHitPeriodActive = Tour_Period::whereIn('tour_package_id', $arrayHitActive)
                ->get();
        
        $arrayHit = array();
        foreach ($tourHitsPackageList as $tour) {
            array_push($arrayHit, $tour->tour_package_id);
        }
        $tourHitPeriod = Tour_Period::whereIn('tour_package_id', $arrayHit)
                ->get();
        

<<<<<<< HEAD
        $arraySalesActive = array();
        foreach ($tourSalesPackageActiveList as $tour) {
            array_push($arraySalesActive, $tour->tour_package_id);
        }
        $tourSalesPeriodActive = Tour_Period::whereIn('tour_package_id', $arraySalesActive)
                ->get();

        return view('home.index', compact('categoryList', 'tourHitsPackageActiveList', 'tourHitsPackageList', 'tourSalesPackageActiveList', 'tourHitPeriodActive', 'tourHitPeriod', 'tourSalesPeriodActive'));
=======
        return view('home.index', compact('categoryList', 'tourHitsPackageActiveList', 'tourHitsPackageList', 'tourHitPeriodActive', 'tourHitPeriod'));
>>>>>>> 3543e9d5d007de9caaf32674bbd586f7cb9b5316
    }

}
