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

class Tour_Attraction extends Model {

    protected $table = 'tour_attraction';
    
      public function insertTourAttraction($id,$tag_id){
          try {
            $date = \Carbon\Carbon::now();
            Tour_Attraction::insert(
            [ 'attraction_id' => $tag_id
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