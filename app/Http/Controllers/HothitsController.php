<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour_Package;
use App\Models\Tour_Period;
use App\Models\Category;
use App\Models\Country;

/**
 * Description of HomeController
 *
 * @author green
 */
class HothitsController extends Controller {

    public function hot_hits() {
        return view('tour.hothits');
    }
    
    public function tour_hit(Request $request) {
        $category_id = $request->query('category_id');
        $tourModel = new Tour_Package();
        $categoryModel = new Category();
        $countryModel = new Country();
        $countryList = $countryModel->getCountryAll();
        $category = $categoryModel->getCategoryById($category_id);
        $tourHitsPackageActiveList = $tourModel->getTourPackageByCategory($category_id);
        $arrayHitActive = array();
        foreach ($tourHitsPackageActiveList as $tour) {
            array_push($arrayHitActive, $tour->tour_package_id);
        }
        $tourHitPeriodActive = Tour_Period::whereIn('tour_package_id', $arrayHitActive)
                ->get();
        
        return view('tour.tourhot', compact('tourHitsPackageActiveList', 'tourHitPeriodActive', 'category', 'countryList'));
    }

}