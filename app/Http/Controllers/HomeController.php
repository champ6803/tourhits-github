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
        $tourHitsPackageList = $tourList->getTourPackageByCategory(9999); //แพ็คเกจยอดนิยม
        $array = array();
        foreach ($tourHitsPackageList as $tour) {
            array_push($array, $tour->tour_package_id);
        }
        $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                ->get();

        return view('home.index', compact('categoryList', 'tourHitsPackageList', 'tourPeriod'));
    }

}
