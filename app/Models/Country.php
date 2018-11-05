<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

/**
 * Description of Employee
 *
 * @author Champ
 */
use Illuminate\Database\Eloquent\Model;
use App\Models\Tour_Country;

class Country extends Model {

    protected $table = 'country';
    
    public function getCountryAll(){
        try {
         $countryList = Country::join('tour_country', 'tour_country.country_id', '=','country.country_id')
                 ->get();
         return $countryList;
        } catch (Exception $ex) {
               throw $ex;
        }
    }
   
}