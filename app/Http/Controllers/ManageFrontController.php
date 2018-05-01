<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input as Input;
use App\Models\Country;
use App\Models\Tour_Country;
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
         $countryModel = new Country();
         try {
            $country = $countryModel->getCountryAll();
            return response($country);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    
    public function searchTourCountry(){
         $tourCountryModel = new Tour_Country();
         try {
            $input_tour_country_name = $_POST['input_tour_country_name'];
            $tourcountry = $tourCountryModel->getTourCountryByName($input_tour_country_name);
            return response($tourcountry);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    
    public function deleteTourCountry(){
        $tourCountryModel = new Tour_Country();
         try {
            $id = $_POST['id'];
            $tourCountryModel->removeTourCountry($id);      
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    
    public function updateTourCountry(){
         $tourCountryModel = new Tour_Country();
        try {
            $id = $_POST['hidden_update_id'];
            $update_tour_country_name = $_POST['update_tour_country_name'];
            $tour_country_img= $_FILES['file']['name'];
            $country_id= $_POST['countryEdit'];
            $tour_country_detail= $_POST['update_tour_country_detail'];
            $tourCountryModel->editTourCountry($id, $update_tour_country_name, $tour_country_img
                    , $country_id, $tour_country_detail);
                        echo "<script>
                        alert('แก้ไขข้อมูลเสร็จสมบูรณ์');
                        window.location.href='manage-front-country';
                        </script>";
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }
    
    public function saveTourCountry(){
         $tourCountryModel = new Tour_Country();
        try {
            $tour_country_name = $_POST['tour_country_name'];
            $country_id = $_POST['country'];
            $tour_country_detail = $_POST['tour_country_detail'];
            $tour_country_img = $_FILES['file']['name'];
            $tourCountryModel->insertTourCountry($tour_country_name, $country_id
                    , $tour_country_detail, $tour_country_img);
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
