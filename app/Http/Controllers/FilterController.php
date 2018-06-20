<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\Tour_Package;
use App\Models\Holiday;
use App\Models\Tour_Period;
use Illuminate\Support\Facades\DB;

/**
 * Description of FilterController
 *
 * @author chonl
 */
class FilterController extends Controller {

    public function search_tour($country) {
        $tourModel = new Tour_Package();
        $routeList = $tourModel->getFilterRoute($country);
        $airlineList = $tourModel->getFilterAirline($country);
        $holidayList = $tourModel->getFilterHoliday($country);
        $monthList = $tourModel->getFilterMonth($country);
        $dayList = $tourModel->getFilterDay($country);
        $tagList = $tourModel->getFilterTag($country);
        return view('filter.search-tour', compact('routeList', 'airlineList', 'holidayList', 'monthList', 'dayList', 'tagList'));
    }

    public function getTourPackage() {
        try {
            $country = request()->get('_country');
            $route = json_decode(request()->get('_route'));
            $start_date = request()->get('_start_date');
            $end_date = request()->get('_end_date');
            $month = json_decode(request()->get('_month'));
            $days = json_decode(request()->get('_days'));
            $airline = json_decode(request()->get('_airline'));
            $tags = json_decode(request()->get('_tags'));
            $attraction = json_decode(request()->get('_attraction'));
            $others = json_decode(request()->get('_others'));
            $tourPackageList = Tour_Package::join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                    ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                    ->where('tour_country.tour_country_id', $country)
                    ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code'))
                    ->get();
            $array = array();
            foreach ($tourPackageList as $tour) {
                array_push($array, $tour->tour_package_id);
            }
            $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                    ->get();
            
            
//            if (count($route) > 0 && empty($start_date) && empty($end_date) && !(count($month) > 0) && !(count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0)) {
//                $tourPackageList = Tour_Package::join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
//                        ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
//                        ->join('country', 'country.country_id', '=', 'tour_country.country_id')
//                        ->join('route', 'route.route_id', '=', 'tour_route.route_id')
//                        ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
//                        ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
//                        ->where('tour_country.tour_country_id', $country)
//                        ->whereIn('route.route_name', $route)
//                        ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_picture'))
//                        ->get();
//                $array = array();
//                foreach ($tourPackageList as $tour) {
//                    array_push($array, $tour->tour_package_id);
//                }
//                $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
//                        ->get();
//            } else if (!(count($route) > 0) && !empty($start_date) && !empty($end_date) && !(count($month) > 0) && !(count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0)) {
//                $tourPackageList = Tour_Package::join('tour_period', 'tour_period.tour_package_id', '=', 'tour_package.tour_package_id')
//                        ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
//                        ->join('country', 'country.country_id', '=', 'tour_country.country_id')
//                        ->where('tour_country.tour_country_id', $country)
//                        ->where('tour_period.tour_period_start', '>', $start_date)
//                        ->where('tour_period.tour_period_end', '<', $end_date)
//                        ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code'))
//                        ->get();
//                $array = array();
//                foreach ($tourPackageList as $tour) {
//                    array_push($array, $tour->tour_package_id);
//                }
//                $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
//                        ->get();
//            } else if (empty($route) && empty($start_date) && !empty($end_date) && empty($month) && empty($days) && empty($airline) && empty($tags) && empty($attraction)) {
//                $tourPackageList = Tour_Package::join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
//                        ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
//                        ->where('tour_country.tour_country_id', $country)
//                        ->where('tour_route.route_id', $route)
//                        ->get();
//            } else if (empty($route) && empty($start_date) && empty($end_date) && !empty($month) && empty($days) && empty($airline) && empty($tags) && empty($attraction)) {
//                $tourPackageList = Tour_Package::join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
//                        ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
//                        ->where('tour_country.tour_country_id', $country)
//                        ->where('tour_route.route_id', $route)
//                        ->get();
//            } else {
//                $tourPackageList = Tour_Package::join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
//                        ->join('country', 'country.country_id', '=', 'tour_country.country_id')
//                        ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
//                        ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
//                        ->where('tour_country.tour_country_id', $country)
//                        ->get();
//                $array = array();
//                foreach ($tourPackageList as $tour) {
//                    array_push($array, $tour->tour_package_id);
//                }
//                $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
//                        ->get();
//            }
            return response()->json(array('tourPackageList' => $tourPackageList, 'tourPeriod' => $tourPeriod));
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }

    public function test() {
        $this->delete($id);
        return true;
    }

    private function delete($id) {
        $tourModel = new Tour_Package();
        $tourModel->deleteRoute($id);
    }

}
