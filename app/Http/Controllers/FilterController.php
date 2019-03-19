<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\Tour_Package;
use App\Models\Holiday;
use App\Models\Country;
use App\Models\Tour_Period;
use App\Models\Tag;
use App\Models\Attraction;
use Illuminate\Support\Facades\DB;
use App\Models\Tour_Country;

/**
 * Description of FilterController
 *
 * @author chonl
 */
class FilterController extends Controller {

    protected $_tourCountryModel;
    protected $_tagModel;
    protected $_attractionModel;

    public function __construct(Tour_Country $tourCountryModel, Tag $tagModel, Attraction $attractionModel) {
        $this->_tourCountryModel = $tourCountryModel;
        $this->_tagModel = $tagModel;
        $this->_attractionModel = $attractionModel;
    }

    public function search_tour($country) {
        $tourModel = new Tour_Package();
        $countryModel = new Country();
        $price_most = $tourModel->getMostPrice($country);
        $routeList = $tourModel->getFilterRoute($country);
        $airlineList = $tourModel->getFilterAirline($country);
        $holidayList = $tourModel->getFilterHoliday($country);
        $monthList = $tourModel->getFilterMonth($country);
        $dayList = $tourModel->getFilterDay($country);
        $tagList = $tourModel->getFilterTag($country);
        $attractionList = $tourModel->getFilterAttraction($country);
        $countryList = $countryModel->getCountryAll();

        return view('filter.search-tour', compact('routeList', 'airlineList', 'holidayList', 'monthList', 'dayList', 'tagList', 'price_most', 'attractionList', 'countryList'));
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
            $sort_by = request()->get('_sort_by');

            $filterName = "";
            $filterType = "tag";

            if (strlen($search_text) > 2) {
                $search_text_sub = substr($search_text, 0, 2);
                if (strcasecmp($search_text_sub, 'th') == 0) {
                    $search_text = substr($search_text, 2);
                }
            }

            $_take = request()->get('_take');
            $_page_num = request()->get('_page_num');

            $take = (int) $_take;
            $page_num = (int) $_page_num;
            $skip = ($page_num - 1) * $take;

            $order_by = 'tour_package.tour_package_price';
            $sort = 'asc';
            if ($sort_by == "lowest_price") {

                $order_by = 'tour_package.tour_package_price';
                $sort = 'asc';
            } else if ($sort_by == "most_price") {
                $order_by = 'tour_package.tour_package_price';
                $sort = 'desc';
            } else {
                $order_by = 'tour_package.tour_package_price';
                $sort = 'asc';
            }

            $countryList = $this->_tourCountryModel->getTourCountryByUrl($country);
            $tagList = $this->_tagModel->getTagByUrl($country);
            $attractionList = $this->_attractionModel->getAttractionByUrl($country);

            if (count($countryList) > 0 && $countryList != null) {
                if (!(count($route) > 0) && empty($start_date) && empty($end_date) && !(count($month) > 0) && !(count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && !empty($search_text)) {
                    $query = Tour_Package::join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('route', 'route.route_id', '=', 'tour_route.route_id')
                            ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->where('tour_country.tour_country_url', $country)
                            ->where(function ($query) use ($search_text) {
                                $query->where('tour_package.tour_package_id', 'like', '%' . $search_text . '%')
                                ->orWhere('tour_package.tour_package_name', 'like', '%' . $search_text . '%');
                            })
                            ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_id, tour_country.tour_country_name'))
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();
                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                } else if (!(count($route) > 0) && empty($start_date) && empty($end_date) && !(count($month) > 0) && !(count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && empty($search_text) && !empty($price_from) && !empty($price_to)) {
                    $query = Tour_Package::join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('route', 'route.route_id', '=', 'tour_route.route_id')
                            ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->where('tour_country.tour_country_url', $country)
                            ->where('tour_package.tour_package_price', '>=', $price_from)
                            ->where('tour_package.tour_package_price', '<=', $price_to)
                            ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_id, tour_country.tour_country_name'))
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();
                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                } else if (count($route) > 0 && empty($start_date) && empty($end_date) && !(count($month) > 0) && !(count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && empty($search_text)) {
                    $query = Tour_Package::join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('route', 'route.route_id', '=', 'tour_route.route_id')
                            ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->where('tour_country.tour_country_url', $country)
                            ->whereIn('route.route_name', $route)
                            ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_id'))
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();
                    $array = array();
                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                } else if (!(count($route) > 0) && !empty($start_date) && !empty($end_date) && !(count($month) > 0) && !(count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && empty($search_text)) {
                    $query = Tour_Package::join('tour_period', 'tour_period.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->where('tour_country.tour_country_url', $country)
//                            ->where(function($q) {
//                                $q->orWhere('tour_period.tour_period_start', '>=', $start_date)
//                                ->orWhere('tour_period.tour_period_end', '<=', $end_date);
//                            })
                            ->where('tour_period.tour_period_start', '<=', $start_date)
                            ->Where('tour_period.tour_period_end', '>=', $end_date)
                            //->where('tour_period.tour_period_end', '<=', $end_date)
                            ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_id'))
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();
                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                } else if (!(count($route) > 0) && empty($start_date) && empty($end_date) && count($month) > 0 && !(count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && empty($search_text)) {
                    $query = Tour_Package::join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->where('tour_country.tour_country_id', $country)
                            ->whereRaw('extract(month from tour_package.tour_package_period_start) = ?', $month)
                            //->whereMonth('tour_period.tour_period_start', $month)
                            ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_id'))
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();
                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                } else if (!(count($route) > 0) && empty($start_date) && empty($end_date) && !count($month) > 0 && (count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && empty($search_text)) {
                    $query = Tour_Package::join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->where('tour_country.tour_country_id', $country)
                            ->whereIn('tour_package.tour_period_day_number', $days)
                            ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_id'))
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();
                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                } else if (!(count($route) > 0) && empty($start_date) && empty($end_date) && !count($month) > 0 && !(count($days) > 0) && count($airline) > 0 && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && empty($search_text)) {
                    $query = Tour_Package::join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->where('tour_country.tour_country_url', $country)
                            ->whereIn('airline.airline_name', $airline)
                            ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_id'))
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();
                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                } else if (count($route) > 0 && !empty($start_date) && !empty($end_date) && !(count($month) > 0) && !(count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && empty($search_text)) {
                    $query = Tour_Package::join('tour_period', 'tour_period.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('route', 'route.route_id', '=', 'tour_route.route_id')
                            ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->where('tour_country.tour_country_id', $country)
                            ->whereIn('route.route_name', $route)
                            ->where('tour_period.tour_period_start', '>=', $start_date)
                            ->where('tour_period.tour_period_end', '<=', $end_date)
                            ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_id'))
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();
                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                } else if (count($route) > 0 && !empty($start_date) && !empty($end_date) && count($month) > 0 && !(count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && empty($search_text)) {
                    $query = Tour_Package::join('tour_period', 'tour_period.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('route', 'route.route_id', '=', 'tour_route.route_id')
                            ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->where('tour_country.tour_country_url', $country)
                            ->whereIn('route.route_name', $route)
                            ->where('tour_period.tour_period_start', '>=', $start_date)
                            ->where('tour_period.tour_period_end', '<=', $end_date)
                            ->whereRaw('extract(month from tour_package.tour_package_period_start) = ?', $month)
                            ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_id'))
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();
                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                } else if (count($route) > 0 && !empty($start_date) && !empty($end_date) && count($month) > 0 && (count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && empty($search_text)) {
                    $query = Tour_Package::join('tour_period', 'tour_period.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('route', 'route.route_id', '=', 'tour_route.route_id')
                            ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->where('tour_country.tour_country_url', $country)
                            ->whereIn('route.route_name', $route)
                            ->where('tour_period.tour_period_start', '>=', $start_date)
                            ->where('tour_period.tour_period_end', '<=', $end_date)
                            ->whereRaw('extract(month from tour_package.tour_package_period_start) = ?', $month)
                            ->whereIn('tour_package.tour_period_day_number', $days)
                            ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_id'))
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();
                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                } else if (count($route) > 0 && !empty($start_date) && !empty($end_date) && count($month) > 0 && (count($days) > 0) && (count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && empty($search_text)) {
                    $query = Tour_Package::join('tour_period', 'tour_period.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('route', 'route.route_id', '=', 'tour_route.route_id')
                            ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->where('tour_country.tour_country_url', $country)
                            ->whereIn('route.route_name', $route)
                            ->where('tour_period.tour_period_start', '>=', $start_date)
                            ->where('tour_period.tour_period_end', '<=', $end_date)
                            ->whereRaw('extract(month from tour_package.tour_package_period_start) = ?', $month)
                            ->whereIn('tour_package.tour_period_day_number', $days)
                            ->whereIn('airline.airline_name', $airline)
                            ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_id'))
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();
                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                } else if (count($route) > 0 && !empty($start_date) && !empty($end_date) && count($month) > 0 && (count($days) > 0) && (count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && !empty($search_text)) {
                    $query = Tour_Package::join('tour_period', 'tour_period.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('route', 'route.route_id', '=', 'tour_route.route_id')
                            ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->where('tour_country.tour_country_url', $country)
                            ->whereIn('route.route_name', $route)
                            ->where('tour_period.tour_period_start', '>=', $start_date)
                            ->where('tour_period.tour_period_end', '<=', $end_date)
                            ->whereRaw('extract(month from tour_package.tour_package_period_start) = ?', $month)
                            ->whereIn('tour_package.tour_period_day_number', $days)
                            ->whereIn('airline.airline_name', $airline)
                            ->where(function ($query) use ($search_text) {
                                $query->where('tour_package.tour_package_id', 'like', '%' . $search_text . '%')
                                ->orWhere('tour_package.tour_package_name', 'like', '%' . $search_text . '%');
                            })
                            ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_id, tour_country.tour_country_name'))
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();
                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                } else if (count($route) > 0 && !empty($start_date) && !empty($end_date) && count($month) > 0 && (count($days) > 0) && (count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && !empty($search_text)) {
                    $query = Tour_Package::join('tour_period', 'tour_period.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('route', 'route.route_id', '=', 'tour_route.route_id')
                            ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->where('tour_country.tour_country_url', $country)
                            ->whereIn('route.route_name', $route)
                            ->where('tour_period.tour_period_start', '>=', $start_date)
                            ->where('tour_period.tour_period_end', '<=', $end_date)
                            ->whereRaw('extract(month from tour_package.tour_package_period_start) = ?', $month)
                            ->whereIn('tour_package.tour_period_day_number', $days)
                            ->whereIn('airline.airline_name', $airline)
                            ->where(function ($query) use ($search_text) {
                                $query->where('tour_package.tour_package_id', 'like', '%' . $search_text . '%')
                                ->orWhere('tour_package.tour_package_name', 'like', '%' . $search_text . '%');
                            })
                            ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_id'))
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();
                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                    // กรีณีมาจากหน้าแรก 1
                } else if (!count($route) > 0 && !empty($start_date) && !empty($end_date) && !count($month) > 0 && (count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && !empty($search_text)) {
                    $query = Tour_Package::join('tour_period', 'tour_period.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('route', 'route.route_id', '=', 'tour_route.route_id')
                            ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->where('tour_country.tour_country_url', $country)
                            ->where('tour_period.tour_period_start', '>=', $start_date)
                            ->where('tour_period.tour_period_end', '<=', $end_date)
                            ->whereIn('tour_package.tour_period_day_number', $days)
                            ->where(function ($query) use ($search_text) {
                                $query->where('tour_package.tour_package_id', 'like', '%' . $search_text . '%')
                                ->orWhere('tour_package.tour_package_name', 'like', '%' . $search_text . '%');
                            })
                            ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_id'))
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();
                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                    // กรีณีมาจากหน้าแรก 2
                } else if (!count($route) > 0 && !empty($start_date) && !empty($end_date) && !count($month) > 0 && (count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && empty($search_text)) {
                    $query = Tour_Package::join('tour_period', 'tour_period.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('route', 'route.route_id', '=', 'tour_route.route_id')
                            ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->where('tour_country.tour_country_url', $country)
                            ->where('tour_period.tour_period_start', '>=', $start_date)
                            ->where('tour_period.tour_period_end', '<=', $end_date)
                            ->whereIn('tour_package.tour_period_day_number', $days)
                            ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_id'))
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();
                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                    // กรีณีมาจากหน้าแรก 3
                } else if (!count($route) > 0 && !empty($start_date) && !empty($end_date) && !count($month) > 0 && !(count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && !empty($search_text)) {
                    $query = Tour_Package::join('tour_period', 'tour_period.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('route', 'route.route_id', '=', 'tour_route.route_id')
                            ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->where('tour_country.tour_country_url', $country)
                            ->where('tour_period.tour_period_start', '<=', $start_date)
                            ->where('tour_period.tour_period_end', '>=', $end_date)
                            ->where(function ($query) use ($search_text) {
                                $query->where('tour_package.tour_package_id', 'like', '%' . $search_text . '%')
                                ->orWhere('tour_package.tour_package_name', 'like', '%' . $search_text . '%');
                            })
                            ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_id'))
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();
                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                } else {
                    $query = Tour_Package::join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->where('tour_country.tour_country_url', $country)
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();

                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                }
                $filterName = $tourPackageList[0]->tour_country_name;
                $filterType = "country";
            } else if (count($tagList) > 0 && $tagList != null) {
                if (!(count($route) > 0) && empty($start_date) && empty($end_date) && !(count($month) > 0) && !(count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && !empty($search_text)) {
                    $query = Tour_Package::join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('route', 'route.route_id', '=', 'tour_route.route_id')
                            ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->join('tour_tag', 'tour_tag.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('tag', 'tag.tag_id', '=', 'tour_tag.tag_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->where('tag.tag_url', $country)
                            ->where(function ($query) use ($search_text) {
                                $query->where('tour_package.tour_package_id', 'like', '%' . $search_text . '%')
                                ->orWhere('tour_package.tour_package_name', 'like', '%' . $search_text . '%');
                            })
                            ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_id, tour_country.tour_country_name'))
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();
                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                } else {
                    $query = Tour_Package::join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->join('tour_tag', 'tour_tag.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('tag', 'tag.tag_id', '=', 'tour_tag.tag_id')
                            ->where('tag.tag_url', $country)
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();

                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                }
                $filterName = $tourPackageList[0]->tag_name;
                $filterType = "tag";
            } else if (count($attractionList) > 0 && $attractionList != null) {
                if (!(count($route) > 0) && empty($start_date) && empty($end_date) && !(count($month) > 0) && !(count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && !empty($search_text)) {
                    $query = Tour_Package::join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('route', 'route.route_id', '=', 'tour_route.route_id')
                            ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->join('tour_tag', 'tour_tag.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('tag', 'tag.tag_id', '=', 'tour_tag.tag_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->where('attraction.attraction_url', $country)
                            ->where(function ($query) use ($search_text) {
                                $query->where('tour_package.tour_package_id', 'like', '%' . $search_text . '%')
                                ->orWhere('tour_package.tour_package_name', 'like', '%' . $search_text . '%');
                            })
                            ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_id, tour_country.tour_country_name'))
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();
                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                } else {
                    $query = Tour_Package::join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->join('tour_attraction', 'tour_attraction.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('attraction', 'attraction.attraction_id', '=', 'tour_attraction.attraction_id')
                            ->where('attraction.attraction_url', $country)
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();

                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                }
                $filterName = $tourPackageList[0]->tag_name;
                $filterType = "attraction";
            } else if ($country == "search") {
                if (!(count($route) > 0) && empty($start_date) && empty($end_date) && !(count($month) > 0) && !(count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && !empty($search_text)) {
                    $query = Tour_Package::join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->leftJoin('tour_tag', 'tour_tag.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->leftJoin('tag', 'tag.tag_id', '=', 'tour_tag.tag_id')
                            ->where(function ($query) use ($search_text) {
                                $query->where('tour_package.tour_package_id', 'like', '%' . $search_text . '%')
                                ->orWhere('tour_package.tour_package_name', 'like', '%' . $search_text . '%')
                                ->orWhere('tag.tag_name', 'like', '%' . $search_text . '%')
                                ->orWhere('tag.tag_url', 'like', '%' . $search_text . '%');
                            })
                            ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_id, tour_country.tour_country_name'))
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();

                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                } else if (!(count($route) > 0) && !empty($start_date) && !empty($end_date) && !(count($month) > 0) && !(count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && empty($search_text)) {
                    $query = Tour_Package::join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->join('tour_period', 'tour_period.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->where('tour_period.tour_period_start', '<=', $start_date)
                            ->Where('tour_period.tour_period_end', '>=', $end_date)
                            ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_id, tour_country.tour_country_name'))
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();

                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                } else if (!(count($route) > 0) && !empty($start_date) && !empty($end_date) && !(count($month) > 0) && !(count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && !empty($search_text)) {
                    $query = Tour_Package::join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->join('tour_period', 'tour_period.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->where(function ($query) use ($search_text) {
                                $query->where('tour_package.tour_package_id', 'like', '%' . $search_text . '%')
                                ->orWhere('tour_package.tour_package_name', 'like', '%' . $search_text . '%');
                            })
                            ->where('tour_period.tour_period_start', '<=', $start_date)
                            ->Where('tour_period.tour_period_end', '>=', $end_date)
                            ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_id, tour_country.tour_country_name'))
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();

                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                } else if (!(count($route) > 0) && !empty($start_date) && !empty($end_date) && !(count($month) > 0) && (count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && !empty($search_text)) {
                    $query = Tour_Package::join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->join('tour_period', 'tour_period.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->where(function ($query) use ($search_text) {
                                $query->where('tour_package.tour_package_id', 'like', '%' . $search_text . '%')
                                ->orWhere('tour_package.tour_package_name', 'like', '%' . $search_text . '%');
                            })
                            ->where('tour_period.tour_period_start', '<=', $start_date)
                            ->Where('tour_period.tour_period_end', '>=', $end_date)
                            ->whereIn('tour_package.tour_period_day_number', $days)
                            ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_id, tour_country.tour_country_name'))
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();

                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                } else {
                    $query = Tour_Package::join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();
                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                }
                $filterName = $search_text;
                $filterType = "search";
            } else {
                if (!(count($route) > 0) && empty($start_date) && empty($end_date) && !(count($month) > 0) && !(count($days) > 0) && !(count($airline) > 0) && !(count($tags) > 0) && !(count($attraction) > 0) && !(count($others) > 0) && !empty($search_text)) {
                    $query = Tour_Package::join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('route', 'route.route_id', '=', 'tour_route.route_id')
                            ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->join('tour_tag', 'tour_tag.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('tag', 'tag.tag_id', '=', 'tour_tag.tag_id')
                            ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->where('tour_country.tour_country_url', $country)
                            ->where(function ($query) use ($search_text) {
                                $query->where('tour_package.tour_package_id', 'like', '%' . $search_text . '%')
                                ->orWhere('tour_package.tour_package_name', 'like', '%' . $search_text . '%');
                            })
                            ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_name, airline.airline_picture, tour_package.tour_package_price, tour_package.tour_package_special_price, tour_country.tour_country_id, tour_country.tour_country_name'))
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();

                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                } else {
                    $query = Tour_Package::join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                            ->join('country', 'country.country_id', '=', 'tour_country.country_id')
                            ->join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                            ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                            ->where('tour_country.tour_country_url', $country)
                            ->orderBy($order_by, $sort);
                    $totalRecord = $query->count();
                    $tourPackageList = $query->skip($skip)
                            ->take($take)
                            ->get();

                    $array = array();
                    foreach ($tourPackageList as $tour) {
                        array_push($array, $tour->tour_package_id);
                    }
                    $tourPeriod = Tour_Period::whereIn('tour_package_id', $array)
                            ->get();
                }

                $filterName = $search_text;
                $filterType = "search";
            }
            return response()->json(array('tourPackageList' => $tourPackageList, 'tourPeriod' => $tourPeriod, 'totalRecord' => $totalRecord, 'filterName' => $filterName, 'filterType' => $filterType));
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
