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

class Tour_Conditions extends Model {

    protected $table = 'tour_conditions';

//    public function insertTourTag($id, $tag_id) {
//        try {
//            $date = \Carbon\Carbon::now();
//            Tour_Tag::insert(
//                    ['tag_id' => $tag_id
//                        , 'tour_package_id' => $id
//                        , 'created_by' => 'admin'
//                        , 'created_at' => $date
//                        , 'updated_by' => 'admin'
//                        , 'updated_at' => $date]
//            );
//        } catch (Exception $ex) {
//            return $ex;
//        }
//    }
//
//    public function updateTourTag($id, $tag_id) {
//        try {
//            $date = \Carbon\Carbon::now();
//            $tourTagList = Tour_Tag::where('tour_package_id', $id)
//                    ->where('tag_id', $tag_id)
//                    ->get();
//            if ($tourTagList != null && count($tourTagList) > 0) {
//                Tour_Tag::where('tag_id', $tag_id)
//                        ->where('tour_package_id', $id)
//                        ->update(
//                                ['tag_id' => $tag_id
//                                    , 'tour_package_id' => $id
//                                    , 'updated_by' => 'admin'
//                                    , 'updated_at' => $date]
//                );
//            } else {
//                Tour_Tag::insert(
//                        ['tag_id' => $tag_id
//                            , 'tour_package_id' => $id
//                            , 'created_by' => 'admin'
//                            , 'created_at' => $date
//                            , 'updated_by' => 'admin'
//                            , 'updated_at' => $date]
//                );
//            }
//        } catch (Exception $ex) {
//            return $ex;
//        }
//    }

}
