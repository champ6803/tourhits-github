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

    public function getTourCategoryDetailAll() {
        try {
            $tourCategoryDetailList = Tour_Category::join('category', 'category.category_id', '=', 'tour_category.category_id')
                    ->join('tour_package', 'tour_package.tour_package_id', '=', 'tour_category.tour_package_id')
                    ->select('tour_package.tour_package_id', 'tour_package.tour_package_name', 'tour_package.tour_country_id', 'category.*', 'tour_category.*')
                    ->get();
            return $tourCategoryDetailList;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getTourCategoryDetailByName($categoryName) {
        try {
            $tourCategoryDetailList = Tour_Category::join('category', 'category.category_id', '=', 'tour_category.category_id')
                    ->join('tour_package', 'tour_package.tour_package_id', '=', 'tour_category.tour_package_id')
                    ->where('category.category_name', $categoryName)
                    ->select('tour_package.tour_package_id', 'tour_package.tour_package_name', 'tour_package.tour_country_id', 'category.*', 'tour_category.*')
                    ->get();
            return $tourCategoryDetailList;
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

    public function insertTourCategory($category_id, $tour_package_id, $user) {
        try {
            $date = \Carbon\Carbon::now();
            Tour_Category::insert(
                    ['category_id' => $category_id
                        , 'tour_package_id' => $tour_package_id
                        , 'created_by' => $user
                        , 'created_at' => $date
                        , 'updated_by' => $user
                        , 'updated_at' => $date
                    ]
            );
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

    public function editTourCategory($tour_category_id, $category_id, $tour_package_id, $user) {
        try {
            $date = \Carbon\Carbon::now();
            Tour_Category::where('tour_category_id', $tour_category_id)
                    ->update(['category_id' => $category_id
                        , 'tour_package_id' => $tour_package_id
                        , 'updated_by' => $user
                        , 'updated_at' => $date
            ]);
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getTourCategoryIndex() {
        try {
            $tourCategoryList = Tour_Category::where('tour_category_id', '<>', 1)
                    ->where('tour_category_id', '<>', 2)
                    ->get();
            return $tourCategoryList;
        } catch (\Exception $ex) {
            return $ex;
        }
    }

}
