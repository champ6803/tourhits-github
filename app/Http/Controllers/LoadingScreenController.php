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
class LoadingScreenController extends Controller {

    public function loading_screen() {
        return view('loading.loading-screen');
    }

}