<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input as Input;
use App\Models\Country;
/**
 * Description of AdminController
 *
 * @author champ
 */
class ManageFrontController extends Controller {
    
    public function manage_front_country(){
        return view('manage-front.manage-front-country');
    }
    
    public function searchAllCountry(){
         try {
            $country = Country::all();
            return response($country);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    
    public function searchTourCountry(){
         try {
            $input_tour_country_name = $_POST['input_tour_country_name'];
            if($input_tour_country_name!=null){
            $tourcountry = \DB::table('tour_country')
            ->leftJoin('country', 'tour_country.country_id', '=', 'country.country_id')
            ->select('tour_country.*', 'country.country_name')
            ->where('tour_country.tour_country_name', '=', $input_tour_country_name)
            ->get();
            return response($tourcountry);
            }else{
            $tourcountry = \DB::table('tour_country')
            ->leftJoin('country', 'tour_country.country_id', '=', 'country.country_id')
            ->select('tour_country.*', 'country.country_name')
            ->get();
            return response($tourcountry);
            }
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    
    /*public function saveTourCountry(){
         try {
             
            $tour_country_name = $_POST['tour_country_name'];
            $country_id = $_POST['country_id'];
            $tour_country_detail = $_POST['tour_country_detail'];
            $tour_country_img = $_POST['tour_country_img'];
            
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
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }*/
    
    public function deleteTourCountry(){
         try {
            $id = $_POST['id'];
            \DB::table('tour_country')->where('tour_country_id', $id)->delete();            
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    
    public function updateTourCountry(){
        try {
            $id = $_POST['hidden_update_id'];
            $update_tour_country_name = $_POST['update_tour_country_name'];
            $date = \Carbon\Carbon::now();  
            $tour_country_img= $_FILES['file']['name'];
            $country_id= $_POST['countryEdit'];
            $tour_country_detail= $_POST['update_tour_country_detail'];

             if(null==$tour_country_img){
                    \DB::table('tour_country')
                    ->where('tour_country_id',$id)  
                    ->update(['tour_country_name'=>$update_tour_country_name
                           ,'updated_at' => $date 
                           , 'updated_by' => 'admin', 'tour_country_detail' => $tour_country_detail
                           ,'country_id' => $country_id ]);     
                        echo "<script>
                        alert('แก้ไขข้อมูลเสร็จสมบูรณ์');
                        window.location.href='manage-front-country';
                        </script>";
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
                        echo "<script>
                        alert('แก้ไขข้อมูลเสร็จสมบูรณ์');
                        window.location.href='manage-front-country';
                        </script>";
                }
             }
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    
    public function saveTourCountry(){
        try {
            $tour_country_name = $_POST['tour_country_name'];
            $country_id = $_POST['country'];
            $tour_country_detail = $_POST['tour_country_detail'];
            $tour_country_img = $_FILES['file']['name'];
            
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
             echo "<script>
             alert('บันทึกข้อมูลเสร็จสมบูรณ์');
             window.location.href='manage-front-country';
             </script>";
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
 
}
