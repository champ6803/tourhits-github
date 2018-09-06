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

class Category extends Model {

    protected $table = 'category';

    public function getCategoryIndex() {
        try {
            $CategoryList = Category::where('category_type', '=', 'I')
                    ->get();
            return $CategoryList;
        } catch (\Exception $ex) {
            return $ex;
        }
    }

    public function getCategoryAll() {
        try {
            $categoryList = Category::all();
            return $categoryList;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getCategoryGenaral() {
        try {
            $categoryList = Category::where('category_type', '=', 'G')
                    ->get();
            return $categoryList;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getCategoryByCategoryType($categoryType) {
        try {
            $categoryList = Category::where('category_type', '=', $categoryType)
                    ->get();
            return $categoryList;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getCategoryByName($input_tour_category_name) {
        try {
            $categoryList = Category::where('category_name', $input_tour_category_name)->get();
            return $categoryList;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function insertCategory($category_name, $category_picture) {
        try {
            $id_max = DB::table('category')->max('category_id');
            $date = \Carbon\Carbon::now();
            Category::insert(
                    ['category_name' => $category_name
                        , 'category_img' => $category_picture
                        , 'category_block' => 1
                        , 'created_by' => 'admin'
                        , 'created_at' => $date
                        , 'updated_by' => 'admin'
                        , 'updated_at' => $date
                    ]
            );
            if (Input::hasFile('file')) {
                $file = Input::file('file');
                $file->move('images/category', ($id_max + 1) . "-" . $file->getClientOriginalName());
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function removeCategory($id) {
        try {
            Category::where('category_id', $id)->delete();
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function editCategory($id, $update_category_name, $category_picture) {
        try {
            $date = \Carbon\Carbon::now();
            if (null == $tour_category_picture) {
                \DB::table('category')
                        ->where('category_id', $id)
                        ->update(['category_name' => $update_category_name
                            , 'updated_at' => $date
                            , 'updated_by' => 'admin']);
            } else {
                \DB::table('category')
                        ->where('category_id', $id)
                        ->update(['category_name' => $update_category_name
                            , 'category_img' => $category_picture
                            , 'updated_at' => $date
                            , 'updated_by' => 'admin']);
                if (Input::hasFile('file')) {
                    $file = Input::file('file');
                    $file->move('images/category', ($id_max + 1) . "-" . $file->getClientOriginalName());
                }
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }

}
