<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\Tour_Package;
use App\Models\Tour_Package_Day;

/**x
 * Description of TourController
 *
 * @author chonl
 */
class TourController {

    public function tour_detail($tour_countr_name,$tour_package_id, $tour_package_name) {
        $tourModel = new Tour_Package();
        $tourDayModel = new Tour_Package_Day();
        $tourPackage = $tourModel->getTourDetail($tour_package_id);
        $tourPackageList = $tourModel->getTourDetailList($tour_package_id);
        $tourPackageDayList = $tourDayModel->getTourPackageDay($tour_package_id);
        foreach ($tourPackageList as $tourPackageObj){
            $newStartDate = date("d-m-Y", strtotime($tourPackageObj->tour_period_start));
            $newEndDate = date("d-m-Y", strtotime($tourPackageObj->tour_period_end));
            $tourPackageObj->tour_period_start = $newStartDate;
            $tourPackageObj->tour_period_end = $newEndDate;
        }
        $page_title = $tourPackage->tour_package_name;
        return view('tour.tour-detail', compact('tourPackage', 'tourPackageList','tourPackageDayList', 'page_title'));
    }
}

