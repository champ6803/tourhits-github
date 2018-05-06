<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

/**
 * Description of HomeController
 *
 * @author green
 */
class TourHotController extends Controller {

    public function tour_hot() {
        return view('tour.tourhot');
    }

}