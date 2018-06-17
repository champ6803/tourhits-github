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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input as Input;
use App\Models\Tour_Period;

class Tour_Package extends Model {

    protected $table = 'tour_package';

    public function insertTourPackage($tour_package_code, $tour_country, $tour_category, $tour_name
    , $tour_detail, $highlight_tour, $tourlist_picture, $day, $night, $dateStart, $dateEnd) {
        try {
            $id = DB::table('tour_package')->max('tour_package_id');
            $date = \Carbon\Carbon::now();
            Tour_Package::insert(
                    ['tour_package_code' => $tour_package_code
                        , 'tour_category_id' => $tour_category
                        , 'tour_country_id' => $tour_country
                        , 'tour_package_name' => $tour_name
                        , 'tour_package_detail' => $tour_detail
                        , 'tour_package_highlight' => $highlight_tour
                        , 'tour_package_image' => $tourlist_picture
                        , 'tour_period_day_number' => $day
                        , 'tour_period_night_number' => $night
                        , 'tour_package_period_start' => $dateStart
                        , 'tour_package_period_end' => $dateEnd
                        , 'created_by' => 'admin'
                        , 'created_at' => $date
                        , 'updated_by' => 'admin'
                        , 'updated_at' => $date]
            );

            if (Input::hasFile('file')) {
                $file = Input::file('file');
                $file->move('images/tourlist', $file->getClientOriginalName());
            }
            return $id + 1;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getFilterRoute($country) {
        try {
            return Tour_Package::join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('route', 'route.route_id', '=', 'tour_route.route_id')
                            ->select(DB::raw('COUNT(*) as r_num, route.route_id as r_id, route.route_name as r_name'))
                            ->groupBy('r_id', 'r_name')
                            ->where('tour_country.tour_country_name', $country)
                            ->get();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getFilterAirline($country) {
        try {
            return Tour_Package::join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->select(DB::raw('COUNT(*) as a_num, airline.airline_id as a_id, airline.airline_name as a_name'))
                            ->groupBy('a_id', 'a_name')
                            ->where('tour_country.tour_country_name', $country)
                            ->get();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getFilterHoliday() {
        try {
            $date = \Carbon\Carbon::now();
            return Holiday::where('start_date', '<=', $date)
                            ->get();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getFilterMonth($country) {
        try {
            return Tour_Package::join('tour_period', 'tour_period.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->select(DB::raw('COUNT(*) as m_num, month(tour_period.tour_period_start) as m_month'))
                            ->groupBy('m_month')
                            ->where('tour_country.tour_country_name', $country)
                            ->get();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getFilterDay($country) {
        try {
            return Tour_Package::join('tour_period', 'tour_period.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->select(DB::raw('COUNT(*) as sum, DATEDIFF(tour_period.tour_period_end,tour_period.tour_period_start) + 1 AS duration'))
                            ->groupBy('duration')
                            ->where('tour_country.tour_country_name', $country)
                            ->get();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getFilterTag($country) {
        try {
            return Tour_Package::join('tour_tag', 'tour_tag.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('tag', 'tag.tag_id', '=', 'tour_tag.tag_id')
                            ->select(DB::raw('COUNT(*) as t_num, tag.tag_id as t_id, tag.tag_name as t_name'))
                            ->groupBy('t_id', 't_name')
                            ->where('tour_country.tour_country_name', $country)
                            ->get();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getTourDetail($tour_package_id) {
        try {
            $tourPackageList = Tour_Package::join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                    ->join('tour_airline', 'tour_package.tour_package_id', '=', 'tour_airline.tour_package_id')
                    ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                    ->join('tour_period', 'tour_period.tour_package_id', 'tour_package.tour_package_id')
                    ->where('tour_package.tour_package_id', '=', $tour_package_id)
                    ->first();
            return $tourPackageList;
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getTourDetailList($tour_package_id) {
        try {
            $tourPackageList = Tour_Package::join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                    ->join('tour_airline', 'tour_package.tour_package_id', '=', 'tour_airline.tour_package_id')
                    ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                    ->join('tour_period', 'tour_period.tour_package_id', 'tour_package.tour_package_id')
                    ->where('tour_package.tour_package_id', '=', $tour_package_id)
                    ->get();
            return $tourPackageList;
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getTourDetailPeriod($tour_package_id, $tour_period_id) {
        try {
            $tourPackagePeriod = Tour_Package::join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                    ->join('tour_airline', 'tour_package.tour_package_id', '=', 'tour_airline.tour_package_id')
                    ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                    ->join('tour_period', 'tour_period.tour_package_id', 'tour_package.tour_package_id')
                    ->where('tour_package.tour_package_id', '=', $tour_package_id)
                    ->where('tour_period.tour_period_id', '=', $tour_period_id)
                    ->first();
            return $tourPackagePeriod;
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getTourImages($tour_package_id) {
        try {
            $tourImages = Tour_Package::join('tour_image', 'tour_image.tour_package_id', '=', 'tour_package.tour_package_id')
                    ->where('tour_package.tour_package_id', '=', $tour_package_id)
                    ->get();
            return $tourImages;
        } catch (\Exception $ex) {
            return $ex;
        }
    }

    public function getTourPackageByCategory($cate_id, $number) {
        try {
            $tourPackageList = Tour_Package::join('tour_category', 'tour_category.tour_package_id', '=', 'tour_package.tour_package_id')
                    ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                    ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                    ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                    ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                    ->where('tour_category.category_id', $cate_id)
                    ->skip($number)->take(4)
                    //->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_picture'))
                    ->get();
            
            return $tourPackageList;
        } catch (\Exception $ex) {
            return $ex;
        }
    }

}
