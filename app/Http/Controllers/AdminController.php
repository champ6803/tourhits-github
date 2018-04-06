<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use App\Models\Route;
/**
 * Description of AdminController
 *
 * @author champ
 */
class AdminController extends Controller {

    public function dashboard() {
        return view('admin.dashboard');
    }
    
    public function manage_route(){
        return view('admin.manage-route');
    }
    public function searchRoute(){
         try {
            $input_route_name = $_POST['input_route_name'];
            if($input_route_name!=null){
               $route = Route::where('route_name', $input_route_name)->get();
            }else{
               $route = Route::all();
            }
            return response($route);
            
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    public function saveRoute(){
         try {
            $route_name = $_POST['route_name'];
            $date = \Carbon\Carbon::now();
            \DB::table('route')->insert(
            ['route_name' => $route_name
             , 'created_by' => 'admin'
             , 'created_at' => $date
             , 'updated_by' => 'admin'        
             , 'updated_at' => $date]
            );
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    
    public function deleteRoute(){
         try {
            $id = $_POST['id'];
            \DB::table('route')->where('route_id', $id)->delete();            
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    
     public function updateRoute(){
        try {
            $id = $_POST['id'];
            $update_route_name = $_POST['update_route_name'];
            
            \DB::table('route')
            ->where('route_id',$id)  
            ->update(['route_name'=>$update_route_name]);     
            
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
}
