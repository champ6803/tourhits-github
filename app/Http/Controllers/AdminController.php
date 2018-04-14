<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use App\Models\Route;
use App\Models\Airline;
use App\Models\Attraction;
use App\Models\Tag;
use App\Models\Holiday;
use App\Models\Other;
use App\Models\Tour_Category;
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
    
    public function manage_airline(){
        return view('admin.manage-airline');
    }
    
    public function manage_attraction(){
        return view('admin.manage-attraction');
    }
    
    public function manage_tag(){
        return view('admin.manage-tag');
    }
    
    public function manage_holiday(){
        return view('admin.manage-holiday');
    }
    
    public function manage_othertag(){
        return view('admin.manage-othertag');
    }
    
    public function manage_category(){
        return view('admin.manage-category');
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
            $date = \Carbon\Carbon::now();
            \DB::table('route')
            ->where('route_id',$id)  
            ->update(['route_name'=>$update_route_name
                    ,'updated_at' => $date 
                    , 'updated_by' => 'admin'  ]);     
            
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    
     public function searchAirline(){
         try {
            $input_airline_name = $_POST['input_airline_name'];
            if($input_airline_name!=null){
               $airline = Airline::where('airline_name', $input_airline_name)->get();
            }else{
               $airline = Airline::all();
            }
            return response($airline);
            
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    public function saveAirline(){
         try {
            $airline_name = $_POST['airline_name'];
            $date = \Carbon\Carbon::now();
            \DB::table('airline')->insert(
            ['airline_name' => $airline_name
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
    
    public function deleteAirline(){
         try {
            $id = $_POST['id'];
            \DB::table('airline')->where('airline_id', $id)->delete();            
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    
     public function updateAirline(){
        try {
            $id = $_POST['id'];
            $update_airline_name = $_POST['update_airline_name'];
            $date = \Carbon\Carbon::now();  
            \DB::table('airline')
            ->where('airline_id',$id)  
            ->update(['airline_name'=>$update_airline_name
                     ,'updated_at' => $date 
                    , 'updated_by' => 'admin'  ]);     
            
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    
    public function searchAttraction(){
         try {
            $input_attraction_name = $_POST['input_attraction_name'];
            if($input_attraction_name!=null){
               $attraction = Attraction::where('attraction_name', $input_attraction_name)->get();
            }else{
               $attraction = Attraction::all();
            }
            return response($attraction);
            
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    public function saveAttraction(){
         try {
            $attraction_name = $_POST['attraction_name'];
            $attraction_picture= $_POST['attraction_picture'];
            $date = \Carbon\Carbon::now();
            \DB::table('attraction')->insert(
            ['attraction_name' => $attraction_name
             , 'created_by' => 'admin'
             , 'created_at' => $date
             , 'updated_by' => 'admin'        
             , 'updated_at' => $date
             ,'attraction_picture' => $attraction_picture]
            );
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    
    public function deleteAttraction(){
         try {
            $id = $_POST['id'];
            \DB::table('attraction')->where('attraction_id', $id)->delete();            
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    
     public function updateAttraction(){
        try {
            $id = $_POST['id'];
            $update_attraction_name = $_POST['update_attraction_name'];
            $attraction_picture= $_POST['attraction_picture'];
            $date = \Carbon\Carbon::now();
            if(null==$attraction_picture){
             \DB::table('attraction')
            ->where('attraction_id',$id)  
            ->update(['attraction_name'=>$update_attraction_name
                    , 'updated_at' => $date
                    , 'updated_by' => 'admin'   ]);     
            }else{
            \DB::table('attraction')
            ->where('attraction_id',$id)  
            ->update(['attraction_name'=>$update_attraction_name
                    ,'attraction_picture' => $attraction_picture
                    , 'updated_at' => $date
                    , 'updated_by' => 'admin'   ]);     
            }
            
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    
    public function searchTag(){
         try {
            $input_tag_name = $_POST['input_tag_name'];
            if($input_tag_name!=null){
               $tag = Tag::where('tag_name', $input_tag_name)->get();
            }else{
               $tag = Tag::all();
            }
            return response($tag);
            
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    public function saveTag(){
         try {
            $tag_name = $_POST['tag_name'];
            $date = \Carbon\Carbon::now();
            \DB::table('tag')->insert(
            ['tag_name' => $tag_name
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
    
    public function deleteTag(){
         try {
            $id = $_POST['id'];
            \DB::table('tag')->where('tag_id', $id)->delete();            
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    
     public function updateTag(){
        try {
            $id = $_POST['id'];
            $update_tag_name = $_POST['update_tag_name'];
            $date = \Carbon\Carbon::now();
            \DB::table('tag')
            ->where('tag_id',$id)  
            ->update(['tag_name'=>$update_tag_name
                    , 'updated_at' => $date
                    , 'updated_by' => 'admin'   ]);     
            
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    
    public function searchHoliday(){
         try {
            $input_holiday_name = $_POST['input_holiday_name'];
            if($input_holiday_name!=null){
               $holiday = Holiday::where('holiday_name', $input_holiday_name)->get();
            }else{
               $holiday = Holiday::all();
            }
            return response($holiday);
            
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    public function saveHoliday(){
         try {
            $holiday_name = $_POST['holiday_name'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $dateStart = str_replace('/', '-', $start_date);
            $dateEnd = str_replace('/', '-', $end_date);
            
            $date = \Carbon\Carbon::now();
            \DB::table('holiday')->insert(
            ['holiday_name' => $holiday_name
             , 'created_by' => 'admin'
             , 'created_at' => $date
             , 'updated_by' => 'admin'        
             , 'updated_at' => $date 
             , 'start_date' => date('Y-m-d', strtotime($dateStart))
             , 'end_date' => date('Y-m-d', strtotime($dateEnd))]
            );
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    
    public function deleteHoliday(){
         try {
            $id = $_POST['id'];
            \DB::table('holiday')->where('holiday_id', $id)->delete();            
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    
     public function updateHoliday(){
        try {
            
            $id = $_POST['id'];
            $update_holiday_name = $_POST['update_holiday_name'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $dateStart = str_replace('/', '-', $start_date);
            $dateEnd = str_replace('/', '-', $end_date);
            $date = \Carbon\Carbon::now();
            \DB::table('holiday')
            ->where('holiday_id',$id)  
            ->update(['holiday_name'=>$update_holiday_name           
             , 'start_date' => date('Y-m-d', strtotime($dateStart))
             , 'end_date' => date('Y-m-d', strtotime($dateEnd))
             , 'updated_at' => $date
             , 'updated_by' => 'admin'   ]);     
            
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    
    public function searchOther(){
         try {
            $input_other_name = $_POST['input_other_name'];
            if($input_other_name!=null){
               $other = Other::where('other_name', $input_other_name)->get();
            }else{
               $other = Other::all();
            }
            return response($other);
            
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    public function saveOther(){
         try {
            $other_name = $_POST['other_name'];
              $date = \Carbon\Carbon::now();
            \DB::table('other')->insert(
            ['other_name' => $other_name
             , 'created_by' => 'admin'
             , 'created_at' => $date
             , 'updated_by' => 'admin'        
             , 'updated_at' => $date ]
            );
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    
    public function deleteOther(){
         try {
            $id = $_POST['id'];
            \DB::table('other')->where('other_id', $id)->delete();            
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    
     public function updateOther(){
        try {
            
            $id = $_POST['id'];
            $update_other_name = $_POST['update_other_name'];
            $date = \Carbon\Carbon::now();
            \DB::table('other')
            ->where('other_id',$id)  
            ->update(['other_name'=>$update_other_name
                    , 'updated_at' => $date
                    , 'updated_by' => 'admin'   ]);     
            
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    
     public function searchTourCategory(){
         try {
            $input_tour_category_name = $_POST['input_tour_category_name'];
            if($input_tour_category_name!=null){
               $tour_category = Tour_Category::where('tour_category_name', $input_tour_category_name)->get();
            }else{
               $tour_category = Tour_Category::all();
            }
            return response($tour_category);
            
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    public function saveTourCategory(){
         try {
            $tour_category_name = $_POST['tour_category_name'];
            $tour_category_picture= $_POST['tour_category_picture'];
            $date = \Carbon\Carbon::now();
            \DB::table('tour_category')->insert(
            ['tour_category_name' => $tour_category_name
             , 'created_by' => 'admin'
             , 'created_at' => $date
             , 'updated_by' => 'admin'        
             , 'updated_at' => $date
             ,'tour_category_img' => $tour_category_picture
             ,'tour_category_block'=>1]
            );
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    
    public function deleteTourCategory(){
         try {
            $id = $_POST['id'];
            \DB::table('tour_category')->where('tour_category_id', $id)->delete();            
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    
     public function updateTourCategory(){
        try {
            $id = $_POST['id'];
            $update_tour_category_name = $_POST['update_tour_category_name'];
            $tour_category_picture= $_POST['tour_category_picture'];
            $date = \Carbon\Carbon::now();
            if(null==$tour_category_picture){
            \DB::table('tour_category')
            ->where('tour_category_id',$id)  
            ->update(['tour_category_name'=>$update_tour_category_name
                    , 'updated_at' => $date
                    , 'updated_by' => 'admin'  ]);     
            }else{
             \DB::table('tour_category')
            ->where('tour_category_id',$id)  
            ->update(['tour_category_name'=>$update_tour_category_name
                    ,'tour_category_img' => $tour_category_picture
                    , 'updated_at' => $date
                    , 'updated_by' => 'admin'  ]);     
            }
            
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
}
