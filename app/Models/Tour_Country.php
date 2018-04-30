<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;
use Illuminate\Support\Facades\Input as Input;
/**
 * Description of Employee
 *
 * @author Champ
 */
use Illuminate\Database\Eloquent\Model;

class Tour_Country extends Model {

    protected $table = 'tour_country';
    
    public function removeTourCountry($id){
          try {
            Tour_Country::where('tour_country_id',$id)->delete();
          } catch (Exception $ex) {
               return $ex;
        }
    }
    public function getTourCountryByName($input_tour_country_name){
          try {
            if($input_tour_country_name!=null){
            $tourcountryList = Tour_Country::
                    leftJoin('country', 'tour_country.country_id', '=', 'country.country_id')
            ->select('tour_country.*', 'country.country_name')
            ->where('tour_country.tour_country_name', '=', $input_tour_country_name)
            ->get();
                return $tourcountryList;
            }else{
            $tourcountryList = Tour_Country::
                    leftJoin('country', 'tour_country.country_id', '=', 'country.country_id')
            ->select('tour_country.*', 'country.country_name')
            ->get();
                return $tourcountryList;
            }
           } catch (Exception $ex) {
                return $ex;
           }
 
    }
    public function insertTourCountry($tour_country_name,$country_id,$tour_country_detail,$tour_country_img){
             try {
             $date = \Carbon\Carbon::now();
            \DB::table('tour_country')->insert(
            ['tour_country_name' => $tour_country_name
             , 'country_id' => $country_id
             , 'tour_country_detail' => $tour_country_detail
             , 'tour_country_img' => $tour_country_img
             , 'created_by' => 'admin'
             , 'created_at' => $date
             , 'updated_by' => 'admin'        
             , 'updated_at' => $date]
            );
            
            if(Input::hasFile('file')){
			$file = Input::file('file');
			$file->move('images/tourCountry', $file->getClientOriginalName());
	    }
             } catch (Exception $ex) {
                return $ex;
             }
    }
     public function editTourCountry($id,$update_tour_country_name,$tour_country_img,$country_id,$tour_country_detail){
             try {
                  $date = \Carbon\Carbon::now();
                   if(null==$tour_country_img){
                    \DB::table('tour_country')
                    ->where('tour_country_id',$id)  
                    ->update(['tour_country_name'=>$update_tour_country_name
                           ,'updated_at' => $date 
                           , 'updated_by' => 'admin', 'tour_country_detail' => $tour_country_detail
                           ,'country_id' => $country_id ]);     
             }else{
                    \DB::table('tour_country')
                    ->where('tour_country_id',$id)  
                    ->update(['tour_country_name'=>$update_tour_country_name
                            ,'updated_at' => $date 
                            , 'updated_by' => 'admin'  , 'tour_country_img' => $tour_country_img
                            , 'tour_country_detail' => $tour_country_detail
                            ,'country_id' => $country_id  ]);  
                   if(Input::hasFile('file')){
			$file = Input::file('file');
			$file->move('images/tourCountry', $file->getClientOriginalName());
                }
             }
                 
             } catch (Exception $ex) {

             }
     }
}
