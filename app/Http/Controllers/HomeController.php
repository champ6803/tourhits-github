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
use App\Models\Country;

/**
 * Description of HomeController
 *
 * @author champ
 */
class HomeController extends Controller {

    public function index() {
        $cate = new Category();
        $tourList = new Tour_Package();
        $countryModel = new Country();
        $categoryList = $cate->getCategoryGenaral();
        $tourHitsPackageActiveList = $tourList->getTourPackageByCategory(100000, 0); //แพ็คเกจยอดนิยม
        $tourHitsPackageList = $tourList->getTourPackageByCategory(100000, 4);
        $tourSalesPackageActiveList = $tourList->getTourPackageByCategory(100001, 0); //แพ็คเกจยอดนิยม
        $countryList = $countryModel->getCountryAll();
        $arrayHitActive = array();
        foreach ($tourHitsPackageActiveList as $tour) {
            array_push($arrayHitActive, $tour->tour_package_id);
        }
        $tourHitPeriodActive = Tour_Period::whereIn('tour_package_id', $arrayHitActive)
                ->get();

        $arraySalesActive = array();
        foreach ($tourSalesPackageActiveList as $tour) {
            array_push($arraySalesActive, $tour->tour_package_id);
        }
        $tourSalesPeriodActive = Tour_Period::whereIn('tour_package_id', $arraySalesActive)
                ->get();

        return view('home.index', compact('categoryList', 'tourHitsPackageActiveList', 'tourSalesPackageActiveList', 'tourHitPeriodActive', 'tourSalesPeriodActive', 'countryList'));
    }

}