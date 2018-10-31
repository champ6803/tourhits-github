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

class Attraction extends Model {

    protected $table = 'attraction';

    public function getAttractionAll() {
        try {
            $attractionList = Attraction::Leftjoin('country', 'attraction.country_id', 'country.country_id')
                    ->select('attraction.*', 'country.country_name')
                    ->get();
            return $attractionList;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getAttractionByTourCountryId($tour_country_id) {
        try {
            $attractionList = Attraction::Leftjoin('country', 'attraction.country_id', 'country.country_id')
                    ->join('tour_country', 'country.country_id', 'tour_country.country_id')
                    ->where('tour_country.tour_country_id', $tour_country_id)
                    ->select('attraction.*', 'country.country_name')
                    ->get();
            return $attractionList;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getAttractionByName($input_attraction_name) {
        try {
            $attractionList = Attraction::join('country', 'attraction.country_id', 'country.country_id')
                            ->select('attraction.*', 'country.country_name')
                            ->where('attraction_name', $input_attraction_name)->get();
            return $attractionList;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getAttractionById($id) {
        try {
            $attraction = Attraction::join('country', 'attraction.country_id', 'country.country_id')
                            ->select('attraction.*', 'country.country_name')
                            ->where('attraction_id', $id)->first();
            return $attraction;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function insertAttraction($country_id, $attraction_name, $attraction_picture) {
        try {
            $date = \Carbon\Carbon::now();
            \DB::table('attraction')->insert(
                    ['country_id' => $country_id
                        , 'attraction_name' => $attraction_name
                        , 'created_by' => 'admin'
                        , 'created_at' => $date
                        , 'updated_by' => 'admin'
                        , 'updated_at' => $date
                        , 'attraction_picture' => $attraction_picture]
            );
            if (Input::hasFile('file')) {
                $file = Input::file('file');
                $file->move('images/attraction', $file->getClientOriginalName());
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function removeAttraction($id) {
        try {
            Attraction::where('attraction_id', $id)->delete();
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function editAttraction($id, $country_id, $update_attraction_name, $attraction_picture) {
        try {
            $date = \Carbon\Carbon::now();
            if (null == $attraction_picture) {
                \DB::table('attraction')
                        ->where('attraction_id', $id)
                        ->update(['country_id' => $country_id
                            , 'attraction_name' => $update_attraction_name
                            , 'updated_at' => $date
                            , 'updated_by' => 'admin']);
            } else {
                \DB::table('attraction')
                        ->where('attraction_id', $id)
                        ->update(['country_id' => $country_id
                            , 'attraction_name' => $update_attraction_name
                            , 'attraction_picture' => $attraction_picture
                            , 'updated_at' => $date
                            , 'updated_by' => 'admin']);
                if (Input::hasFile('file')) {
                    $file = Input::file('file');
                    $file->move('images/attraction', $file->getClientOriginalName());
                }
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getAttractionByUrl($url) {
        try {
            $attractionList = null;
            if ($url != null && $url != "") {
                $attractionList = Attraction::where('attraction.attraction_url', $url)
                        ->get();
            }
            return $attractionList;
        } catch (Exception $ex) {
            return $ex;
        }
    }

}
