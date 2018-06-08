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

class Tour_Package extends Model {

    protected $table = 'tour_package';

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

}
