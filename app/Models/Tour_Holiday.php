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

class Tour_Holiday extends Model {

    protected $table = 'tour_holiday';
    
        public function insertTourHoliday($id,$holiday_id){
          try {
            $date = \Carbon\Carbon::now();
            Tour_Holiday::insert(
            [ 'holiday_id' => $holiday_id
             ,'tour_package_id' => $id
             , 'created_by' => 'admin'
             , 'created_at' => $date
             , 'updated_by' => 'admin'        
             , 'updated_at' => $date]
            );
          } catch (Exception $ex) {
               return $ex;
          }
    }

}
