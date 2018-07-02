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
            $CategoryList = Category::where('category_id', '<', 9999)
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
    
    public function getCategoryByName($input_tour_category_name) {
        try {
            $categoryList = Category::where('category_name', $input_tour_category_name)->get();
            return $categoryList;
        } catch (Exception $ex) {
            return $ex;
        }
    }
}
