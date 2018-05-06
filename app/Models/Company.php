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

class Company extends Model {

    protected $table = 'company';
    
    public function getCompanyByCompanyCode($company_code){
        try {
         $companhyList = Company::where('company_code', $company_code)->get();
         return $companhyList;
        } catch (Exception $ex) {
               return $ex;
        }
    }

}