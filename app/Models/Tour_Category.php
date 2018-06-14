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

class Tour_Category extends Model {

    protected $table = 'tour_category';

    public function getTourCategoryAll() {
        try {
            $tourCategoryList = Tour_Category::all();
            return $tourCategoryList;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getTourCategoryByName($input_tour_category_name) {
        try {
            $tourCategoryList = Tour_Category::where('tour_category_name', $input_tour_category_name)->get();
            return $tourCategoryList;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function insertTourCategory($tour_category_name, $tour_category_picture) {
        try {
            $date = \Carbon\Carbon::now();
            Tour_Category::insert(
                    ['tour_category_name' => $tour_category_name
                        , 'created_by' => 'admin'
                        , 'created_at' => $date
                        , 'updated_by' => 'admin'
                        , 'updated_at' => $date
                        , 'tour_category_img' => $tour_category_picture
                        , 'tour_category_block' => 1]
            );
            if (Input::hasFile('file')) {
                $file = Input::file('file');
                $file->move('images/category', $file->getClientOriginalName());
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function removeTourCategory($id) {
        try {
            Tour_Category::where('tour_category_id', $id)->delete();
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function editTourCategory($id, $update_tour_category_name, $tour_category_picture) {
        try {
            $date = \Carbon\Carbon::now();
            if (null == $tour_category_picture) {
                \DB::table('tour_category')
                        ->where('tour_category_id', $id)
                        ->update(['tour_category_name' => $update_tour_category_name
                            , 'updated_at' => $date
                            , 'updated_by' => 'admin']);
            } else {
                \DB::table('tour_category')
                        ->where('tour_category_id', $id)
                        ->update(['tour_category_name' => $update_tour_category_name
                            , 'tour_category_img' => $tour_category_picture
                            , 'updated_at' => $date
                            , 'updated_by' => 'admin']);
                if (Input::hasFile('file')) {
                    $file = Input::file('file');
                    $file->move('images/category', $file->getClientOriginalName());
                }
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getTourCategoryIndex(){
        try{
            $tourCategoryList = Tour_Category::where('tour_category_id','<>', 1)
                    ->where('tour_category_id','<>', 2)
                    ->get();
            return $tourCategoryList;
        } catch(\Exception $ex){
            return $ex;
        }
    }
}