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

    protected $table = 'tour_image';

    public function insertTourImage($id, $images) {
        try {
            $date = \Carbon\Carbon::now();
            foreach ($images as $value) {
                if ($value != "" && $value != null) {
                    Tour_Image::insert(
                            ['tour_package_id' => $id
                                , 'tour_image_name' => $id . '-' .$value
                                , 'created_by' => 'admin'
                                , 'created_at' => $date
                                , 'updated_by' => 'admin'
                                , 'updated_at' => $date]
                    );
                }
            }
            if (Input::hasFile('file_img')) {
                $files = Input::file('file_img');
                foreach ($files as $image) {
                    $image->move('images/tour-images', $id . "-" . $image->getClientOriginalName());
                }
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }

}
