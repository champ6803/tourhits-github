<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use App\Models\Tour_Category;
/**
 * Description of HomeController
 *
 * @author champ
 */
class HomeController extends Controller {

    public function index() {
        $tourCate = new Tour_Category();
        $tourCategoryList = $tourCate->getTourCategoryAll();
        return view('home.index', compact('tourCategoryList'));
    }

}