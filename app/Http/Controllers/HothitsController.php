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
class HothitsController extends Controller {

    public function hot_hits() {
        return view('tour.hothits');
    }

}