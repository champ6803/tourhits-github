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
use Illuminate\Support\Facades\DB;

class Article extends Model {

    protected $table = 'article';
    
    public function getArticleAll(){
        try {
         $articleList = Article::all();
         return $articleList;
        } catch (Exception $ex) {
               return $ex;
        }
    }
    
    public function getAirlineByName($input_airline_name){
        try {
         $airlineList = Airline::where('airline_name', $input_airline_name)->get();
         return $airlineList;
        } catch (Exception $ex) {
               return $ex;
        }
    }
    
    public function insertAirline($airline_name,$airline_picture){
          try {
            $date = \Carbon\Carbon::now();
            Airline::insert(
            ['airline_name' => $airline_name
             , 'created_by' => 'admin'
             , 'created_at' => $date
             , 'updated_by' => 'admin'        
             , 'updated_at' => $date
             , 'airline_picture' => $airline_picture]
            );
            
            if(Input::hasFile('file')){
			$file = Input::file('file');
			$file->move('images/airline', $file->getClientOriginalName());
	    }
          } catch (Exception $ex) {
               return $ex;
          }
    }
    
    public function editAirline($id,$update_airline_name,$airline_picture){
           try {
            $date = \Carbon\Carbon::now();  
             if(null==$airline_picture){
                    Airline::where('airline_id',$id)  
                    ->update(['airline_name'=>$update_airline_name
                             ,'updated_at' => $date 
                            , 'updated_by' => 'admin'  ]);       
             }else{
                    Airline::where('airline_id',$id)  
                    ->update(['airline_name'=>$update_airline_name
                             ,'updated_at' => $date 
                            , 'updated_by' => 'admin'  , 'airline_picture' => $airline_picture  ]);   
                if(Input::hasFile('file')){
			$file = Input::file('file');
			$file->move('images/airline', $file->getClientOriginalName());
                } 
             }
           }
             catch (Exception $ex) {
               return $ex;
          }
    }
    
    public function removeAirline($id){
          try {
          Airline::where('airline_id',$id)->delete();
          } catch (Exception $ex) {
               return $ex;
        }
    }
}