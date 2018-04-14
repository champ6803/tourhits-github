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
 * @author champ
 */
class AboutController extends Controller {

    public function about_us() {
        return view('about.aboutus');
    }

}