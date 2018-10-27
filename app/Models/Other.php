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

class Other extends Model {

    protected $table = 'other';
    
    public function getOtherAll(){
        try {
         $otherList = Other::all();
         return $otherList;
        } catch (Exception $ex) {
               return $ex;
        }
    }
    
    public function getOtherByName($input_other_name){
        try {
         $otherList = Other::where('other_name', $input_other_name)->get();
         return $otherList;
        } catch (Exception $ex) {
               return $ex;
        }
    }
    
    public function insertOther($other_name){
            try {
            $date = \Carbon\Carbon::now();
            Other::insert(
            ['other_name' => $other_name
             , 'created_by' => 'admin'
             , 'created_at' => $date
             , 'updated_by' => 'admin'        
             , 'updated_at' => $date]
            );
                 } catch (Exception $ex) {
                    return $ex;
            }
    }
    public function removeOther($id){
          try {
          Other::where('other_id',$id)->delete();
          } catch (Exception $ex) {
               return $ex;
        }
    }
    
    public function editOther($id,$update_other_name){
           try {
            $date = \Carbon\Carbon::now();
            Other::where('other_id',$id)  
            ->update(['other_name'=>$update_other_name
                    , 'updated_at' => $date
                    , 'updated_by' => 'admin'   ]);    
           }
             catch (Exception $ex) {
               return $ex;
          }
    }
}