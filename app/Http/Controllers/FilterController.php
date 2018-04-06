<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\Tour_Package;
use App\Models\Holiday;
use Illuminate\Support\Facades\DB;

/**
 * Description of FilterController
 *
 * @author chonl
 */
class FilterController extends Controller {

    public function search_tour($country) {
        $routeList = Tour_Package::join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
                ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                ->join('route', 'route.route_id', '=', 'tour_route.route_id')
                ->select(DB::raw('COUNT(*) as r_num, route.route_id as r_id, route.route_name as r_name'))
                ->groupBy('r_id', 'r_name')
                ->where('tour_country.tour_country_name', $country)
                ->get();

        $airlineList = Tour_Package::join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                ->select(DB::raw('COUNT(*) as a_num, airline.airline_id as a_id, airline.airline_name as a_name'))
                ->groupBy('a_id', 'a_name')
                ->where('tour_country.tour_country_name', $country)
                ->get();

        $holidayList = Holiday::all();

        $monthList = Tour_Package::join('tour_period', 'tour_period.tour_package_id', '=', 'tour_package.tour_package_id')
                ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                ->select(DB::raw('COUNT(*) as m_num, month(tour_period.tour_period_start) as m_month'))
                ->groupBy('m_month')
                ->where('tour_country.tour_country_name', $country)
                ->get();

        $dayList = Tour_Package::join('tour_period', 'tour_period.tour_package_id', '=', 'tour_package.tour_package_id')
                ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                ->select(DB::raw('COUNT(*) as sum, DATEDIFF(tour_period.tour_period_end,tour_period.tour_period_start) + 1 AS duration'))
                ->groupBy('duration')
                ->where('tour_country.tour_country_name', $country)
                ->get();

        return view('filter.search-tour', compact('routeList', 'airlineList', 'holidayList', 'monthList', 'dayList'));
    }

    public function getTourPackage() {
        try {
            $country = request()->get('country');
//            $route = request()->get('_rooute');
//            $start_date = request()->get('_start_date');
//            $end_date = request()->get('_end_date');
//            $month = request()->get('_month');
//            $days = request()->get('_days');
//            $airline = request()->get('_airline');
//            $tags = request()->get('_tags');
//            $attraction = request()->get('_attraction');
//
//            if (!empty($route) && empty($start_date) && empty($end_date) && empty($month) && empty($days) && empty($airline) && empty($tags) && empty($attraction)) {
//                $tourPackageList = Tour_Package::join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
//                        ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
//                        ->where('tour_country.tour_country_name', $country)
//                        ->where('tour_route.route_id', $route)
//                        ->get();
//            } else {
//                $tourPackageList = Tour_Package::join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
//                        ->where('tour_country.tour_country_name', $country)
//                        ->where('tour_route.route_id', $route)
//                        ->get();
//            }
            return $country;
        } catch (\Exception $e) {
            
        }
    }

}
