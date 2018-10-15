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
        $price_most = $tourModel->getMostPrice();
        $routeList = $tourModel->getFilterRoute($country);
        $airlineList = $tourModel->getFilterAirline($country);
        $holidayList = $tourModel->getFilterHoliday($country);
        $monthList = $tourModel->getFilterMonth($country);
        $dayList = $tourModel->getFilterDay($country);
        $tagList = $tourModel->getFilterTag($country);
        return view('filter.search-tour', compact('routeList', 'airlineList', 'holidayList', 'monthList', 'dayList', 'tagList', 'price_most'));
    }

    public function getTourPackage() {
        try {
            $country = request()->get('_country');
            $search_text = request()->get('_search_text');
            $route = json_decode(request()->get('_route'));
            $start_date = request()->get('_start_date');
            $end_date = request()->get('_end_date');
            $month = json_decode(request()->get('_month'));
            $days = json_decode(request()->get('_days'));
            $airline = json_decode(request()->get('_airline'));
            $tags = json_decode(request()->get('_tags'));
            $attraction = json_decode(request()->get('_attraction'));
            $others = json_decode(request()->get('_others'));
            $price_from = request()->get('_price_from');
            $price_to = request()->get('_price_to');

            if (!(count($route) > 0) && empty($start_date) && empty($end_date) && !(count($month) > 0) && !(count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && !empty($search_text)) {
                $tourPackageList = Tour_Package::join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
                        ->join('route', 'route.route_id', '=', 'tour_route.route_id')
                        ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                        ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                        ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                        ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                        ->where('tour_country.tour_country_name', $country)
                        ->where('tour_package.tour_package_name', 'like', '%' . $search_text . '%')
                        ->orWhere('tour_package.tour_package_id', 'like', '%' . $search_text . '%')
                        ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_name'))
                        ->orderBy('tour_package.tour_package_price', 'asc')
                        ->get();
                $array = array();
                foreach ($tourPackageList as $tour) {
                    array_push($array, $tour->tour_package_id);
                }
                $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                        ->get();
            } else if (!(count($route) > 0) && empty($start_date) && empty($end_date) && !(count($month) > 0) && !(count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && empty($search_text) && !empty($price_from) && !empty($price_to)) {
                $tourPackageList = Tour_Package::join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
                        ->join('route', 'route.route_id', '=', 'tour_route.route_id')
                        ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                        ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                        ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                        ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                        ->where('tour_country.tour_country_name', $country)
                        ->where('tour_package.tour_package_price', '>=', $price_from)
                        ->where('tour_package.tour_package_price', '<=', $price_to)
                        ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_name'))
                        ->orderBy('tour_package.tour_package_price', 'asc')
                        ->get();
                $array = array();
                foreach ($tourPackageList as $tour) {
                    array_push($array, $tour->tour_package_id);
                }
                $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                        ->get();
            } else if (count($route) > 0 && empty($start_date) && empty($end_date) && !(count($month) > 0) && !(count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && empty($search_text)) {
                $tourPackageList = Tour_Package::join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
                        ->join('route', 'route.route_id', '=', 'tour_route.route_id')
                        ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                        ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                        ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                        ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                        ->where('tour_country.tour_country_name', $country)
                        ->whereIn('route.route_name', $route)
                        ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_name'))
                        ->orderBy('tour_package.tour_package_price', 'asc')
                        ->get();
                $array = array();
                foreach ($tourPackageList as $tour) {
                    array_push($array, $tour->tour_package_id);
                }
                $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                        ->get();
            } else if (!(count($route) > 0) && !empty($start_date) && !empty($end_date) && !(count($month) > 0) && !(count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && empty($search_text)) {
                $tourPackageList = Tour_Package::join('tour_period', 'tour_period.tour_package_id', '=', 'tour_package.tour_package_id')
                        ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                        ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                        ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                        ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                        ->where('tour_country.tour_country_name', $country)
                        ->where('tour_period.tour_period_start', '>=', $start_date)
                        ->where('tour_period.tour_period_end', '<=', $end_date)
                        ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_name'))
                        ->orderBy('tour_package.tour_package_price', 'asc')
                        ->get();
                $array = array();
                foreach ($tourPackageList as $tour) {
                    array_push($array, $tour->tour_package_id);
                }
                $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                        ->get();
            } else if (!(count($route) > 0) && empty($start_date) && empty($end_date) && count($month) > 0 && !(count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && empty($search_text)) {
                $tourPackageList = Tour_Package::join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                        ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                        ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                        ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                        ->where('tour_country.tour_country_name', $country)
                        ->whereRaw('extract(month from tour_package.tour_package_period_start) = ?', $month)
                        //->whereMonth('tour_period.tour_period_start', $month)
                        ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_name'))
                        ->orderBy('tour_package.tour_package_price', 'asc')
                        ->get();
                $array = array();
                foreach ($tourPackageList as $tour) {
                    array_push($array, $tour->tour_package_id);
                }
                $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                        ->get();
            } else if (!(count($route) > 0) && empty($start_date) && empty($end_date) && !count($month) > 0 && (count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && empty($search_text)) {
                $tourPackageList = Tour_Package::join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                        ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                        ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                        ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                        ->where('tour_country.tour_country_name', $country)
                        ->whereIn('tour_package.tour_period_day_number', $days)
                        ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_name'))
                        ->orderBy('tour_package.tour_package_price', 'asc')
                        ->get();
                $array = array();
                foreach ($tourPackageList as $tour) {
                    array_push($array, $tour->tour_package_id);
                }
                $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                        ->get();
            } else if (!(count($route) > 0) && empty($start_date) && empty($end_date) && !count($month) > 0 && !(count($days) > 0) && count($airline) > 0 && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && empty($search_text)) {
                $tourPackageList = Tour_Package::join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                        ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                        ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                        ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                        ->where('tour_country.tour_country_name', $country)
                        ->whereIn('airline.airline_name', $airline)
                        ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_name'))
                        ->orderBy('tour_package.tour_package_price', 'asc')
                        ->get();
                $array = array();
                foreach ($tourPackageList as $tour) {
                    array_push($array, $tour->tour_package_id);
                }
                $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                        ->get();
            } else if (count($route) > 0 && !empty($start_date) && !empty($end_date) && !(count($month) > 0) && !(count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && empty($search_text)) {
                $tourPackageList = Tour_Package::join('tour_period', 'tour_period.tour_package_id', '=', 'tour_package.tour_package_id')
                        ->join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
                        ->join('route', 'route.route_id', '=', 'tour_route.route_id')
                        ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                        ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                        ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                        ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                        ->where('tour_country.tour_country_name', $country)
                        ->whereIn('route.route_name', $route)
                        ->where('tour_period.tour_period_start', '>=', $start_date)
                        ->where('tour_period.tour_period_end', '<=', $end_date)
                        ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_name'))
                        ->orderBy('tour_package.tour_package_price', 'asc')
                        ->get();
                $array = array();
                foreach ($tourPackageList as $tour) {
                    array_push($array, $tour->tour_package_id);
                }
                $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                        ->get();
            } else if (count($route) > 0 && !empty($start_date) && !empty($end_date) && count($month) > 0 && !(count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && empty($search_text)) {
                $tourPackageList = Tour_Package::join('tour_period', 'tour_period.tour_package_id', '=', 'tour_package.tour_package_id')
                        ->join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
                        ->join('route', 'route.route_id', '=', 'tour_route.route_id')
                        ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                        ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                        ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                        ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                        ->where('tour_country.tour_country_name', $country)
                        ->whereIn('route.route_name', $route)
                        ->where('tour_period.tour_period_start', '>=', $start_date)
                        ->where('tour_period.tour_period_end', '<=', $end_date)
                        ->whereRaw('extract(month from tour_package.tour_package_period_start) = ?', $month)
                        ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_name'))
                        ->orderBy('tour_package.tour_package_price', 'asc')
                        ->get();
                $array = array();
                foreach ($tourPackageList as $tour) {
                    array_push($array, $tour->tour_package_id);
                }
                $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                        ->get();
            } else if (count($route) > 0 && !empty($start_date) && !empty($end_date) && count($month) > 0 && (count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && empty($search_text)) {
                $tourPackageList = Tour_Package::join('tour_period', 'tour_period.tour_package_id', '=', 'tour_package.tour_package_id')
                        ->join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
                        ->join('route', 'route.route_id', '=', 'tour_route.route_id')
                        ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                        ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                        ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                        ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                        ->where('tour_country.tour_country_name', $country)
                        ->whereIn('route.route_name', $route)
                        ->where('tour_period.tour_period_start', '>=', $start_date)
                        ->where('tour_period.tour_period_end', '<=', $end_date)
                        ->whereRaw('extract(month from tour_package.tour_package_period_start) = ?', $month)
                        ->whereIn('tour_package.tour_period_day_number', $days)
                        ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_name'))
                        ->orderBy('tour_package.tour_package_price', 'asc')
                        ->get();
                $array = array();
                foreach ($tourPackageList as $tour) {
                    array_push($array, $tour->tour_package_id);
                }
                $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                        ->get();
            } else if (count($route) > 0 && !empty($start_date) && !empty($end_date) && count($month) > 0 && (count($days) > 0) && (count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && empty($search_text)) {
                $tourPackageList = Tour_Package::join('tour_period', 'tour_period.tour_package_id', '=', 'tour_package.tour_package_id')
                        ->join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
                        ->join('route', 'route.route_id', '=', 'tour_route.route_id')
                        ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                        ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                        ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                        ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                        ->where('tour_country.tour_country_name', $country)
                        ->whereIn('route.route_name', $route)
                        ->where('tour_period.tour_period_start', '>=', $start_date)
                        ->where('tour_period.tour_period_end', '<=', $end_date)
                        ->whereRaw('extract(month from tour_package.tour_package_period_start) = ?', $month)
                        ->whereIn('tour_package.tour_period_day_number', $days)
                        ->whereIn('airline.airline_name', $airline)
                        ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_name'))
                        ->orderBy('tour_package.tour_package_price', 'asc')
                        ->get();
                $array = array();
                foreach ($tourPackageList as $tour) {
                    array_push($array, $tour->tour_package_id);
                }
                $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                        ->get();
            } else {
                $tourPackageList = Tour_Package::join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                        ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                        ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                        ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                        ->where('tour_country.tour_country_name', $country)
                        ->orderBy('tour_package.tour_package_price', 'asc')
                        ->get();
                $array = array();
                foreach ($tourPackageList as $tour) {
                    array_push($array, $tour->tour_package_id);
                }
                $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                        ->get();
            }

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
