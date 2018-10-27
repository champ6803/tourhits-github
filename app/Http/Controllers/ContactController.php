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
class ContactController extends Controller {

    public function contact_us() {
        return view('contact.contactus');
    }

}