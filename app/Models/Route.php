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

class Route extends Model {

    protected $table = 'route';
    
    public function getRouteAll(){
        try {
         $routeList = Route::all();
         return $routeList;
        } catch (Exception $ex) {
               return $ex;
        }
    }
    
    public function getRouteByName($routeName){
        try {
         $routeList = Route::where('route_name', $routeName)->get();
         return $routeList;
        } catch (Exception $ex) {
               return $ex;
        }
    }
    public function insertRoute($route_name){
         try {
            $date = \Carbon\Carbon::now();
            Route::insert(
            ['route_name' => $route_name
             , 'created_by' => 'admin'
             , 'created_at' => $date
             , 'updated_by' => 'admin'        
             , 'updated_at' => $date]
            );
        } catch (Exception $ex) {
               return $ex;
        }
    }
    
    public function editRoute($id,$update_route_name){
        try {
            $date = \Carbon\Carbon::now();
            Route::where('route_id',$id)  
            ->update(['route_name'=>$update_route_name
                    ,'updated_at' => $date 
                    , 'updated_by' => 'admin'  ]);  
          } catch (Exception $ex) {
               return $ex;
        }
     }
     
    public function removeRoute($id){
        try {
          Route::where('route_id',$id)->delete();
          } catch (Exception $ex) {
               return $ex;
        }
     }

}