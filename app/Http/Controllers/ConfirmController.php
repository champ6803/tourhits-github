<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\Country;

/**
 * Description of ConfirmController
 *
 * @author chonl
 */
class ConfirmController {

    public function tour_confirm() {
        $countryModel = new Country();
        $countryList = $countryModel->getCountryAll();
        return view('tour.tour-confirm', compact('countryList'));
    }

}
