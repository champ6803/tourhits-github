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
use App\Models\Tour_Airline;
use App\Models\Tour_Attraction;
use App\Models\Tour_Attraction_Day;
use App\Models\Tour_Holiday;
use App\Models\Tour_Category;
use App\Models\Tour_Image;
use App\Models\Tour_Package_Day;
use App\Models\Tour_Route;
use App\Models\Tour_Tag;

class Tour_Package extends Model {

    protected $table = 'tour_package';

    function IsNullOrEmptyString($str) {
        return (!isset($str) || trim($str) === '');
    }

    public function insertTourPackage($tour_package_code, $tour_country, $conditions_id, $tour_category, $tour_name
    , $tour_detail, $highlight_tour, $tourlist_picture, $day, $night, $pdf, $dateStart, $dateEnd, $price, $special_price) {
        try {
            $id_max = DB::table('tour_package')->max('tour_package_id');
            $date = \Carbon\Carbon::now();
            $id = Tour_Package::insertGetId(
                            ['tour_package_code' => $tour_package_code
                                , 'tour_category_id' => $tour_category
                                , 'tour_country_id' => $tour_country
                                , 'conditions_id' => $conditions_id
                                , 'tour_package_name' => $tour_name
                                , 'tour_package_detail' => $tour_detail
                                , 'tour_package_highlight' => $highlight_tour
                                , 'tour_package_image' => ($id_max + 1) . '-' . $tourlist_picture
                                , 'tour_period_day_number' => $day
                                , 'tour_period_night_number' => $night
                                , 'tour_package_price' => $price
                                , 'tour_package_special_price' => $special_price
                                , 'tour_package_period_start' => $dateStart
                                , 'tour_package_period_end' => $dateEnd
                                , 'tour_package_pdf' => ($id_max + 1) . '-' . $pdf
                                , 'created_by' => 'admin'
                                , 'created_at' => $date
                                , 'updated_by' => 'admin'
                                , 'updated_at' => $date]
            );

            if (Input::hasFile('file')) {
                $file = Input::file('file');
                $file->move('images/tour', ($id_max + 1) . "-" . $file->getClientOriginalName());
            }
            if (Input::hasFile('pdf_file')) {
                $file_pdf = Input::file('pdf_file');
                $file_pdf->move('images/pdf', ($id_max + 1) . "-" . $file_pdf->getClientOriginalName());
            }
            return $id;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function updateTourPackage($tour_package_id, $tour_package_code, $tour_country, $conditions_id, $tour_category, $tour_name
    , $tour_detail, $highlight_tour, $tourlist_picture, $day, $night, $pdf, $dateStart, $dateEnd, $price, $special_price) {
        try {
            $date = \Carbon\Carbon::now();
            if ($this->IsNullOrEmptyString($tourlist_picture) && !$this->IsNullOrEmptyString($pdf)) {
                Tour_Package::where('tour_package_id', '=', $tour_package_id)
                        ->update(
                                ['tour_package_code' => $tour_package_code
                                    , 'tour_category_id' => $tour_category
                                    , 'tour_country_id' => $tour_country
                                    , 'conditions_id' => $conditions_id
                                    , 'tour_package_name' => $tour_name
                                    , 'tour_package_detail' => $tour_detail
                                    , 'tour_package_highlight' => $highlight_tour
                                    , 'tour_period_day_number' => $day
                                    , 'tour_period_night_number' => $night
                                    , 'tour_package_price' => $price
                                    , 'tour_package_special_price' => $special_price
                                    , 'tour_package_period_start' => $dateStart
                                    , 'tour_package_period_end' => $dateEnd
                                    , 'tour_package_pdf' => $tour_package_id . '-' . $pdf
                                    , 'updated_by' => 'admin'
                                    , 'updated_at' => $date]    
                );
                
            } else if ($this->IsNullOrEmptyString($pdf) && !$this->IsNullOrEmptyString($tourlist_picture)) {
                Tour_Package::where('tour_package_id', '=', $tour_package_id)
                        ->update(
                                ['tour_package_code' => $tour_package_code
                                    , 'tour_category_id' => $tour_category
                                    , 'tour_country_id' => $tour_country
                                    , 'conditions_id' => $conditions_id
                                    , 'tour_package_name' => $tour_name
                                    , 'tour_package_detail' => $tour_detail
                                    , 'tour_package_highlight' => $highlight_tour
                                    , 'tour_package_image' => $tour_package_id . '-' . $tourlist_picture
                                    , 'tour_period_day_number' => $day
                                    , 'tour_period_night_number' => $night
                                    , 'tour_package_price' => $price
                                    , 'tour_package_special_price' => $special_price
                                    , 'tour_package_period_start' => $dateStart
                                    , 'tour_package_period_end' => $dateEnd
                                    , 'updated_by' => 'admin'
                                    , 'updated_at' => $date]
                );
                if (Input::hasFile('file')) {
                    $file = Input::file('file');
                    $file->move('images/tour', $tour_package_id . "-" . $file->getClientOriginalName());
                }
            } else if ($this->IsNullOrEmptyString($pdf) && $this->IsNullOrEmptyString($tourlist_picture)) {
                Tour_Package::where('tour_package_id', '=', $tour_package_id)
                        ->update(
                                ['tour_package_code' => $tour_package_code
                                    , 'tour_category_id' => $tour_category
                                    , 'tour_country_id' => $tour_country
                                    , 'tour_package_name' => $tour_name
                                    , 'tour_package_detail' => $tour_detail
                                    , 'tour_package_highlight' => $highlight_tour
                                    , 'tour_period_day_number' => $day
                                    , 'tour_period_night_number' => $night
                                    , 'tour_package_price' => $price
                                    , 'tour_package_special_price' => $special_price
                                    , 'tour_package_period_start' => $dateStart
                                    , 'tour_package_period_end' => $dateEnd
                                    , 'updated_by' => 'admin'
                                    , 'updated_at' => $date]
                );
            } else {
                Tour_Package::where('tour_package_id', '=', $tour_package_id)
                        ->update(
                                ['tour_package_code' => $tour_package_code
                                    , 'tour_category_id' => $tour_category
                                    , 'tour_country_id' => $tour_country
                                    , 'tour_package_name' => $tour_name
                                    , 'tour_package_detail' => $tour_detail
                                    , 'tour_package_highlight' => $highlight_tour
                                    , 'tour_package_image' => $tour_package_id . '-' . $tourlist_picture
                                    , 'tour_period_day_number' => $day
                                    , 'tour_period_night_number' => $night
                                    , 'tour_package_price' => $price
                                    , 'tour_package_special_price' => $special_price
                                    , 'tour_package_period_start' => $dateStart
                                    , 'tour_package_period_end' => $dateEnd
                                    , 'tour_package_pdf' => $tour_package_id . '-' . $pdf
                                    , 'updated_by' => 'admin'
                                    , 'updated_at' => $date]
                );
                if (Input::hasFile('file')) {
                    $file = Input::file('file');
                    $file->move('images/tour', $tour_package_id . "-" . $file->getClientOriginalName());
                }
                if (Input::hasFile('pdf_file')) {
                    $file_pdf = Input::file('pdf_file');
                    $file_pdf->move('images/pdf', $tour_package_id . "-" . $file_pdf->getClientOriginalName());
                }
            }
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
            $tourPackage = Tour_Package::join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                    ->join('tour_airline', 'tour_package.tour_package_id', '=', 'tour_airline.tour_package_id')
                    ->join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                    ->join('tour_period', 'tour_period.tour_package_id', 'tour_package.tour_package_id')
                    ->join('conditions', 'tour_package.conditions_id', 'conditions.conditions_id')
                    ->where('tour_package.tour_package_id', '=', $tour_package_id)
                    ->first();
            return $tourPackage;
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
//                    ->skip($number)->take(4)
                    //->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.tour_package_name, tour_package.tour_package_detail, tour_package.tour_package_highlight, tour_package.tour_package_image, tour_package.tour_period_day_number, tour_package.tour_period_night_number, tour_package.tour_package_period_start, tour_package.tour_package_period_end, country.country_code, airline.airline_picture'))
                    ->get();

            return $tourPackageList;
        } catch (\Exception $ex) {
            return $ex;
        }
    }

    public function getTourPackageAll() {
        try {
            $tourPackageList = Tour_Package::join('tour_package_day', 'tour_package.tour_package_id', '=', 'tour_package_day.tour_package_id')
                    ->join('tour_country', 'tour_country.tour_country_id', '=', 'tour_package.tour_country_id')
                    ->select(DB::raw('distinct(tour_package.tour_package_id),tour_package.*,tour_country.tour_country_name'))
                    ->get();
            return $tourPackageList;
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function getTourPackageById($tour_package_id) {
        try {
            $tourPackage = Tour_Package::where('tour_package.tour_package_id', '=', $tour_package_id)
                    ->first();
            return $tourPackage;
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function getTourPackegeByTourCountryId($tourCountryId) {
        try {
            $tourPackage = Tour_Package::where('tour_package.tour_country_id', '=', $tourCountryId)
                    ->get();
            return $tourPackage;
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function removeTourPackageById($id) {
        try {
            DB::transaction(function ()use($id) {
                Tour_Package::where('tour_package_id', $id)->delete();
                Tour_Airline::where('tour_package_id', $id)->delete();
                Tour_Attraction::where('tour_package_id', $id)->delete();
                Tour_Holiday::where('tour_package_id', $id)->delete();
                Tour_Category::where('tour_package_id', $id)->delete();
                Tour_Image::where('tour_package_id', $id)->delete();
                $tourPackageDayList = Tour_Package_Day::where('tour_package_id', $id)->get();
                foreach ($tourPackageDayList as $tourPackageDay) {
                    Tour_Attraction_Day::where('tour_package_day_id', $tourPackageDay->tour_package_day_id)->delete();
                }
                Tour_Package_Day::where('tour_package_id', $id)->delete();
                Tour_Period::where('tour_package_id', $id)->delete();
                Tour_Route::where('tour_package_id', $id)->delete();
                Tour_Tag::where('tour_package_id', $id)->delete();
            });
            return true;
        } catch (Exception $ex) {
            return $ex;
        }
    }

}
