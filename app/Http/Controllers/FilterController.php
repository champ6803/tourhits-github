<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\Tour_Package;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\DatabaseManager;

/**
 * Description of FilterController
 *
 * @author chonl
 */
class FilterController extends Controller {

    public function search_tour(DatabaseManager $db, $country) {
        $route = Tour_Package::join('tour_route', 'tour_route.tour_package_id', '=', 'tour_package.tour_package_id')
                ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                ->join('route', 'route.route_id', '=', 'tour_route.route_id')
                ->select(DB::raw('COUNT(*) as r_num, route.route_id as r_id, route.route_name as r_name'))
                ->groupBy('r_id', 'r_name')
                ->where('tour_country.tour_country_name', $country)
                ->get();

        $airline = Tour_Package::join('tour_airline', 'tour_airline.tour_package_id', '=', 'tour_package.tour_package_id')
                ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                ->select(DB::raw('COUNT(*) as a_num, airline.airline_id as a_id, airline.airline_name as a_name'))
                ->groupBy('a_id', 'a_name')
                ->where('tour_country.tour_country_name', $country)
                ->get();

        return view('filter.search-tour'
                , ['routeList' => $route]
                , ['airlineList' => $airline]);
    }
    
    

}
