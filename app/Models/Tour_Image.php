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
use Illuminate\Support\Facades\Input as Input;
class Tour_Image extends Model {

    protected $table = 'admin';
    public function insertTourImage($tour_image_name) {
        try {
            $id = DB::table('tour_package')->max('tour_package_id');
            $date = \Carbon\Carbon::now();
            Tour_Period::insert(
                    [  'tour_package_id' => $id
                        , 'tour_image_name' => $tour_image_name
                        , 'created_by' => 'admin'
                        , 'created_at' => $date
                        , 'updated_by' => 'admin'
                        , 'updated_at' => $date]
            );
            
            if (Input::hasFile('file')) {
                $file = Input::file('file');
                $file->move('images/tourlist', $file->getClientOriginalName());
            }
        } catch (Exception $ex) {
            return $ex;
        }
        
    }
}