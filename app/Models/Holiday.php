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

class Holiday extends Model {

    protected $table = 'holiday';
       public function getHolidayAll(){
        try {
         $holidayList = Holiday::all();
         return $holidayList;
        } catch (Exception $ex) {
               return $ex;
        }
    }
    
    public function getHolidayByName($input_holiday_name){
        try {
         $holidayList = Holiday::where('holiday_name', $input_holiday_name)->get();
         return $holidayList;
        } catch (Exception $ex) {
               return $ex;
        }
    }
    
    public function insertHoliday($holiday_name,$dateStart,$dateEnd){
            try {
            $date = \Carbon\Carbon::now();
            Holiday::insert(
            ['holiday_name' => $holiday_name
             , 'created_by' => 'admin'
             , 'created_at' => $date
             , 'updated_by' => 'admin'        
             , 'updated_at' => $date 
             , 'start_date' => date('Y-m-d', strtotime($dateStart))
             , 'end_date' => date('Y-m-d', strtotime($dateEnd))]
            );
                 } catch (Exception $ex) {
                    return $ex;
            }
    }
    public function removeHoliday($id){
          try {
          Holiday::where('holiday_id',$id)->delete();
          } catch (Exception $ex) {
               return $ex;
        }
    }
    
    public function editHoliday($id,$update_holiday_name,$dateStart,$dateEnd){
           try {
            $date = \Carbon\Carbon::now();
            Holiday::where('holiday_id',$id)  
            ->update(['holiday_name'=>$update_holiday_name           
             , 'start_date' => date('Y-m-d', strtotime($dateStart))
             , 'end_date' => date('Y-m-d', strtotime($dateEnd))
             , 'updated_at' => $date
             , 'updated_by' => 'admin'   ]);     
           }
             catch (Exception $ex) {
               return $ex;
          }
    }

}