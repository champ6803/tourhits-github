<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\Tour_Package;

/**x
 * Description of TourController
 *
 * @author chonl
 */
class TourController {

    public function tour_detail($tour_package_id, $tour_package_name) {
        $tourModel = new Tour_Package();
        $tourPackage = $tourModel->getTourDetail($tour_package_id);
        $page_title = $tourPackage->tour_package_name;
        return view('tour.tour-detail', compact('tourPackage', 'page_title'));
    }
}

