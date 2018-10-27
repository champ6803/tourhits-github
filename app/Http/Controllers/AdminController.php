<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Route;
use App\Models\Airline;
use App\Models\Attraction;
use App\Models\Tag;
use App\Models\Holiday;
use App\Models\Other;
use App\Models\Tour_Category;
use App\Models\Tour_Country;
use App\Models\Tour_Package;
use App\Models\Tour_Package_Day;
use Illuminate\Support\Facades\Input as Input;
use App\Models\Category;
use App\Models\Tour_Holiday;
use App\Models\Tour_Tag;
use App\Models\Tour_Attraction;
use App\Models\Tour_Airline;
use App\Models\Tour_Period;
use App\Models\Tour_Image;
use App\Models\Tour_Route;

/**
 * Description of AdminController
 *
 * @author champ
 */
class AdminController extends Controller {

    public function manage_route() {
        return view('admin.manage-route');
    }

    public function manage_airline() {
        return view('admin.manage-airline');
    }

    public function manage_attraction() {
        return view('admin.manage-attraction');
    }

    public function manage_tag() {
        return view('admin.manage-tag');
    }

    public function manage_holiday() {
        return view('admin.manage-holiday');
    }

    public function manage_othertag() {
        return view('admin.manage-othertag');
    }

    public function manage_category() {
        return view('admin.manage-category');
    }

    public function manage_tourlist() {
        return view('admin.manage-tourlist');
    }

    public function manage_edit_tourlist(Request $request) {
        $tour_package_id = $request->query('id');
        $tourPackageDetail = null;
        if ($tour_package_id != null) {
            $tourPackage = Tour_Package::where('tour_package.tour_package_id', '=', $tour_package_id)
                    ->first();
            $tourPeriodList = Tour_Period::where('tour_period.tour_package_id', '=', $tour_package_id)
                    ->get();
            $tourPackageDay = Tour_Package_Day::where('tour_package_day.tour_package_id', '=', $tour_package_id)
                    ->get();
            $tourImage = Tour_Image::where('tour_image.tour_package_id', '=', $tour_package_id)
                    ->get();
            $tourRoute = Tour_Route::join('route', 'route.route_id', '=', 'tour_route.route_id')
                    ->where('tour_route.tour_package_id', '=', $tour_package_id)
                    ->get();
            $tourAirline = Tour_Airline::join('airline', 'airline.airline_id', '=', 'tour_airline.airline_id')
                    ->where('tour_airline.tour_package_id', '=', $tour_package_id)
                    ->get();
            $tourTag = Tour_Tag::join('tag', 'tag.tag_id', '=', 'tour_tag.tag_id')
                    ->where('tour_tag.tour_package_id', '=', $tour_package_id)
                    ->get();
            $tourHoliday = Tour_Holiday::join('holiday', 'holiday.holiday_id', '=', 'tour_holiday.holiday_id')
                    ->where('tour_holiday.tour_package_id', '=', $tour_package_id)
                    ->get();
            $tourAttraction = Tour_Attraction::join('attraction', 'attraction.attraction_id', '=', 'tour_attraction.attraction_id')
                    ->where('tour_attraction.tour_package_id', '=', $tour_package_id)
                    ->get();
            $tourAttractionDay = Tour_Package_Day::join('tour_attraction_day', 'tour_attraction_day.tour_package_day_id', '=', 'tour_package_day.tour_package_day_id')
                    ->join('attraction', 'attraction.attraction_id', '=', 'tour_attraction_day.attraction_id')
                    ->where('tour_package_day.tour_package_id', '=', $tour_package_id)
                    ->select('tour_package_day.tour_package_day_id', 'attraction.*')
                    ->get();

            $arrRoute = [];
            foreach ($tourRoute as $arr) {
                array_push($arrRoute, $arr["route_id"]);
            }
            $arrAirline = [];
            foreach ($tourAirline as $arr) {
                array_push($arrAirline, $arr["airline_id"]);
            }
            $arrTag = [];
            foreach ($tourTag as $arr) {
                array_push($arrTag, $arr["tag_id"]);
            }
            $arrAttraction = [];
            foreach ($tourAttraction as $arr) {
                array_push($arrAttraction, $arr["attraction_id"]);
            }
            $arrHoliday = [];
            foreach ($tourHoliday as $arr) {
                array_push($arrHoliday, $arr["holiday_id"]);
            }

            $attractionDay = [];
            foreach ($tourAttractionDay as $arr) {
                if (!isset($attractionDay[$arr["tour_package_day_id"]])) {
                    $key = 0;
                    $attractionDay[$arr["tour_package_day_id"]][$key] = $arr["attraction_id"];
                    $key++;
                } else if (isset($attractionDay[$arr["tour_package_day_id"]])) {
                    $attractionDay[$arr["tour_package_day_id"]][$key] = $arr["attraction_id"];
                    $key++;
                }
            }

            $tourPackage->tour_package_period_start = date("d-m-Y", strtotime($tourPackage->tour_package_period_start));
            $tourPackage->tour_package_period_end = date("d-m-Y", strtotime($tourPackage->tour_package_period_end));

            foreach ($tourPeriodList as $tourPeriod) {
                $newStartDate = date("d-m-Y", strtotime($tourPeriod->tour_period_start));
                $newEndDate = date("d-m-Y", strtotime($tourPeriod->tour_period_end));
                $tourPeriod->tour_period_start = $newStartDate;
                $tourPeriod->tour_period_end = $newEndDate;
            }

            $tourPackageDetail = ['tourPackage' => $tourPackage, 'tourPeriod' => $tourPeriodList, 'tourPackageDay' => $tourPackageDay, 'tourImage' => $tourImage, 'tourRoute' => $arrRoute,
                'tourAirline' => $arrAirline, 'tourTag' => $arrTag, 'tourHoliday' => $arrHoliday, 'tourAttraction' => $arrAttraction, 'tourAttractionDay' => $tourAttractionDay, 'attractionDay' => $attractionDay];
        } else {
            return redirect('order-list');
        }
        return view('admin.manage-edit-tourlist', compact('tourPackageDetail'));
    }

    public function tour_package_list() {
        $tourPackageList = $this->getTourPackageAll();
        return view('admin.tour-package-list', compact('tourPackageList'));
    }

    public function checkAdminLogin() {
        session_start();
        $user = $_SESSION['a_user'];
        if ($user != null) {
            return true;
        }
        return false;
    }

    public function searchRoute() {
        $routeModel = new Route();
        try {
            $input_route_name = $_POST['input_route_name'];
            if ($input_route_name != null) {
                $route = $routeModel->getRouteByName($input_route_name);
            } else {
                $route = $routeModel->getRouteAll();
            }
            return response($route);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function saveRoute() {
        $routeModel = new Route();
        try {
            $route_name = $_POST['route_name'];
            $routeModel->insertRoute($route_name);
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function deleteRoute() {
        $routeModel = new Route();
        try {
            $id = $_POST['id'];
            $routeModel->removeRoute($id);
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function updateRoute() {
        $routeModel = new Route();
        try {
            $id = $_POST['id'];
            $update_route_name = $_POST['update_route_name'];
            $routeModel->editRoute($id, $update_route_name);
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function searchAirline() {
        $airlineModel = new Airline();
        try {
            $input_airline_name = $_POST['input_airline_name'];
            if ($input_airline_name != null) {
                $airline = $airlineModel->getAirlineByName($input_airline_name);
            } else {
                $airline = $airlineModel->getAirlineAll();
            }
            return response($airline);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function saveAirline() {
        $airlineModel = new Airline();
        try {
            $airline_name = $_POST['airline_name'];
            $airline_picture = $_FILES['file']['name'];
            $airlineModel->insertAirline($airline_name, $airline_picture);
            echo "<script>
             alert('บันทึกข้อมูลเสร็จสมบูรณ์');
             window.location.href='manage-airline';
             </script>";
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function deleteAirline() {
        try {
            $id = $_POST['id'];
            \DB::table('airline')->where('airline_id', $id)->delete();
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function updateAirline() {
        $airlineModel = new Airline();
        try {
            $id = $_POST['hidden_update_id'];
            $update_airline_name = $_POST['update_airline_name'];
            $airline_picture = $_FILES['file']['name'];
            $airlineModel->editAirline($id, $update_airline_name, $airline_picture);
            echo "<script>
                        alert('แก้ไขข้อมูลเสร็จสมบูรณ์');
                        window.location.href='manage-airline';
                        </script>";
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function searchAttraction() {
        $attractionModel = new Attraction();
        try {
            $input_attraction_name = $_POST['input_attraction_name'];
            if ($input_attraction_name != null) {
                $attraction = $attractionModel->getAttractionByName($input_attraction_name);
            } else {
                $attraction = $attractionModel->getAttractionAll();
            }
            return response($attraction);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function saveAttraction() {
        $attractionModel = new Attraction();
        try {
            $attraction_name = $_POST['attraction_name'];
            $attraction_picture = $_FILES['file']['name'];
            $country_id = $_POST['country_select'];
            if (!$this->IsNullOrEmptyString($attraction_name) && !$this->IsNullOrEmptyString($attraction_picture) && !$this->IsNullOrEmptyString($country_id)) {
                $attractionModel->insertAttraction($country_id, $attraction_name, $attraction_picture);
                echo "<script>
             alert('บันทึกข้อมูลเสร็จสมบูรณ์');
             window.location.href='manage-attraction';
             </script>";
            } else {
                echo "<script>
             alert('ไม่สามารถบันทึกข้อมูลได้');
             window.location.href='manage-attraction';
             </script>";
            }
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function deleteAttraction() {
        $attractionModel = new Attraction();
        try {
            $id = $_POST['id'];
            $attractionModel->removeAttraction($id);
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function updateAttraction() {
        $attractionModel = new Attraction();
        try {
            $id = $_POST['hidden_update_id'];
            $update_attraction_name = $_POST['update_attraction_name'];
            $attraction_picture = $_FILES['file']['name'];
            $country_id = $_POST['update_country_select'];
            $attractionModel->editAttraction($id, $country_id, $update_attraction_name, $attraction_picture);
            echo "<script>
             alert('แก้ไขข้อมูลเสร็จสมบูรณ์');
             window.location.href='manage-attraction';
             </script>";
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function searchTag() {
        $tagModel = new Tag();
        try {
            $input_tag_name = $_POST['input_tag_name'];
            if ($input_tag_name != null) {
                $tag = $tagModel->getTagByName($input_tag_name);
            } else {
                $tag = $tagModel->getTagAll();
            }
            return response($tag);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function saveTag() {
        $tagModel = new Tag();
        try {
            $tag_name = $_POST['tag_name'];
            $tagModel->insertTag($tag_name);
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function deleteTag() {
        $tagModel = new Tag();
        try {
            $id = $_POST['id'];
            $tagModel->removeTag($id);
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function updateTag() {
        $tagModel = new Tag();
        try {
            $id = $_POST['id'];
            $update_tag_name = $_POST['update_tag_name'];
            $tagModel->editTag($id, $update_tag_name);
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function searchHoliday() {
        $holidayModel = new Holiday();
        try {
            $input_holiday_name = $_POST['input_holiday_name'];
            if ($input_holiday_name != null) {
                $holiday = $holidayModel->getHolidayByName($input_holiday_name);
            } else {
                $holiday = $holidayModel->getHolidayAll();
            }
            return response($holiday);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function saveHoliday() {
        $holidayModel = new Holiday();
        try {
            $holiday_name = $_POST['holiday_name'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $dateStart = str_replace('/', '-', $start_date);
            $dateEnd = str_replace('/', '-', $end_date);
            $holidayModel->insertHoliday($holiday_name, $dateStart, $dateEnd);

            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function deleteHoliday() {
        $holidayModel = new Holiday();
        try {
            $id = $_POST['id'];
            $holidayModel->removeHoliday($id);
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function updateHoliday() {
        $holidayModel = new Holiday();
        try {

            $id = $_POST['id'];
            $update_holiday_name = $_POST['update_holiday_name'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $dateStart = str_replace('/', '-', $start_date);
            $dateEnd = str_replace('/', '-', $end_date);
            $holidayModel->editHoliday($id, $update_holiday_name, $dateStart, $dateEnd);
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function searchOther() {
        $otherModel = new Other();
        try {
            $input_other_name = $_POST['input_other_name'];
            if ($input_other_name != null) {
                $other = $otherModel->getOtherByName($input_other_name);
            } else {
                $other = $otherModel->getOtherAll();
            }
            return response($other);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function saveOther() {
        $otherModel = new Other();
        try {
            $other_name = $_POST['other_name'];
            $date = \Carbon\Carbon::now();
            $otherModel->insertOther($other_name);
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function deleteOther() {
        $otherModel = new Other();
        try {
            $id = $_POST['id'];
            $otherModel->removeOther($id);
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function updateOther() {
        $otherModel = new Other();
        try {
            $id = $_POST['id'];
            $update_other_name = $_POST['update_other_name'];
            $otherModel->editOther($id, $update_other_name);
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function searchCategory() {
        $categoryModel = new Category();
        try {
            $input_tour_category_name = $_POST['input_tour_category_name'];
            if ($input_tour_category_name != null && $input_tour_category_name != "") {
                $tour_category = $categoryModel->getCategoryByName($input_tour_category_name);
            } else {
                $tour_category = $categoryModel->getCategoryGenaral();
            }
            return response($tour_category);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function saveCategory() {
        $categoryModel = new Category();
        try {
            $category_name = $_POST['tour_category_name'];
            $category_picture = $_FILES['file']['name'];
            $categoryModel->insertCategory($category_name, $category_picture);
            echo "<script>
             alert('บันทึกข้อมูลเสร็จสมบูรณ์');
             window.location.href='manage-category';
             </script>";
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function deleteCategory() {
        $categoryModel = new Category();
        try {
            $id = $_POST['id'];
            $categoryModel->removeCategory($id);
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function updateCategory() {
        $categoryModel = new Category();
        try {

            $id = $_POST['hidden_update_id'];
            $update_category_name = $_POST['update_tour_category_name'];
            $category_picture = $_FILES['file']['name'];
            $categoryModel->editCategory($id, $update_category_name, $category_picture);
            echo "<script>
             alert('แก้ไขข้อมูลเสร็จสมบูรณ์');
             window.location.href='manage-category';
             </script>";

            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function searchAllTourCountry() {
        $tourCountryModel = new Tour_Country();
        try {
            $tourCountry = $tourCountryModel->getTourCountryAll();
            return response($tourCountry);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function searchAllTourCategory() {
        $tourCategoryModel = new Tour_Category();
        try {
            $tourCategory = $tourCategoryModel->getTourCategoryAll();
            return response($tourCategory);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function saveTourlistAndDay(Request $request) {
        $quick_tour = ($_POST['quick_tour'] === 'true');
        if ($quick_tour) {
            $validator = Validator::make($request->all(), [
                        "tour_country" => "required",
                        "conditions_id" => "required",
                        "tour_name" => 'required',
                        "tour_detail" => "required",
                        "pdf_file" => "required",
                        "file" => 'required',
                        "day_tour" => "required",
                        "night_tour" => "required",
                        "start_date" => "required",
                        "end_date" => "required",
                        "tour_package_code" => 'required',
                        "period_start" => "required",
                        "period_end" => "required",
                        "adult_price" => "required",
                        "child_price" => 'required',
                        "tag_select" => "required",
                        "airline_select" => "required",
                        "route_select" => "required",
                        "main_price" => "required",
                        "main_special_price" => "required"
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                                ->withErrors($validator)
                                ->withInput();
                
            }
        } else {
            $validator = Validator::make($request->all(), [
                        "tour_country" => "required",
                        "conditions_id" => "required",
                        "tour_name" => 'required',
                        "tour_detail" => "required",
                        "pdf_file" => "required",
                        "file" => 'required',
                        "day_tour" => "required",
                        "night_tour" => "required",
                        "start_date" => "required",
                        "end_date" => "required",
                        "tour_package_code" => 'required',
                        "tour_detail_0" => "required",
                        "attraction_select0" => 'required',
                        "period_start" => "required",
                        "period_end" => "required",
                        "adult_price" => "required",
                        "child_price" => 'required',
                        "tag_select" => "required",
//                    "attraction_select" => "required",
                        "airline_select" => "required",
                        "route_select" => "required",
                        "main_price" => "required",
                        "main_special_price" => "required"
            ]);

            if ($validator->fails()) {
                return redirect('manage-tourlist')
                                ->withErrors($validator)
                                ->withInput();
            }
            $day = $_POST['day_tour'];
            if ($day > 0) {
                for ($x = 0; $x < $day; $x++) {
                    $tourdetailStr = 'tour_detail_' . $x;
                    $attractionStr = 'attraction_select' . $x;
                    $validatorDetail = Validator::make($request->all(), [
                                $tourdetailStr => "required",
                                $attractionStr => "required",
                    ]);
                    if ($validatorDetail->fails()) {
                        return redirect('manage-tourlist')
                                        ->withErrors($validatorDetail)
                                        ->withInput();
                    }
                }
            }
        }

        DB::transaction(function () {
            try {
                $quick_tour = ($_POST['quick_tour'] === 'true');
                $tour_category = null;
                $tour_country = $_POST['tour_country'];
                $conditions_id = $_POST['conditions_id'];
                $tour_name = $_POST['tour_name'];
                $tour_detail = $_POST['tour_detail'];
                $highlight_tour = null;
                $tourlist_picture = $_FILES['file']['name'];
                $day = $_POST['day_tour'];
                $night = $_POST['night_tour'];
                $start_date = $_POST['start_date'];
                $end_date = $_POST['end_date'];
                $tour_package_code = $_POST['tour_package_code'];
                $tourlist_pdf = $_FILES['pdf_file']['name'];
                $main_price = str_replace(",", "", $_POST['main_price']);
                $main_special_price = str_replace(",", "", $_POST['main_special_price']);

                $holiday_select = null;
                if (isset($_POST['holiday_select'])) {
                    $holiday_select = $_POST['holiday_select'];
                }
                $tag_select = null;
                if (isset($_POST['tag_select'])) {
                    $tag_select = $_POST['tag_select'];
                }
//                $attraction_select = null;
//                if (isset($_POST['attraction_select'])) {
//                    $attraction_select = $_POST['attraction_select'];
//                }
                $airline_select = null;
                if (isset($_POST['airline_select'])) {
                    $airline_select = $_POST['airline_select'];
                }
                $route_select = null;
                if (isset($_POST['route_select'])) {
                    $route_select = $_POST['route_select'];
                }
                $images = null;
                if (isset($_FILES['file_img']['name'])) {
                    $images = $_FILES['file_img']['name'];
                }

                $start_date = str_replace('/', '-', $start_date);
                $dateStart = date('Y-m-d H:i:s', strtotime($start_date));
                $end_date = str_replace('/', '-', $end_date);
                $dateEnd = date('Y-m-d H:i:s', strtotime($end_date));

                $attractionModel = new Attraction();
                $tourPackageModel = new Tour_Package();
                $tourPackageDayModel = new Tour_Package_Day();
                $tourHolidayModel = new Tour_Holiday();
                $tourTagModel = new Tour_Tag();
                $tourAttractionModel = new Tour_Attraction();
                $tourAirlineModel = new Tour_Airline();
                $tourImageModel = new Tour_Image();
                $tourRoute = new Tour_Route();
                $tourPeriodModel = new Tour_Period();
                $id = $tourPackageModel->insertTourPackage($tour_package_code, $tour_country, $conditions_id, $tour_category
                        , $tour_name, $tour_detail, $highlight_tour, $tourlist_picture, $day
                        , $night, $tourlist_pdf, $dateStart, $dateEnd, $main_price, $main_special_price, $quick_tour);

                if ($id != null && $id != 0) {
                    $tour_period_start = $_POST['period_start'];
                    $tour_period_end = $_POST['period_end'];
                    $tour_period_adult_price = $_POST['adult_price'];
                    $tour_period_child_price = $_POST['child_price'];
                    $tour_period_child_nb_price = 0;
                    $tour_period_alone_price = 0;
                    $tour_period_adult_special_price = $_POST['special_price'];
                    $tour_period_child_special_price = 0;
                    $tour_period_status = 'Y';

                    for ($i = 0; $i < count($tour_period_start); $i++) {
                        $tour_period_start[$i] = str_replace('/', '-', $tour_period_start[$i]);
                        $dateStart = date('Y-m-d H:i:s', strtotime($tour_period_start[$i]));
                        $tour_period_end[$i] = str_replace('/', '-', $tour_period_end[$i]);
                        $dateEnd = date('Y-m-d H:i:s', strtotime($tour_period_end[$i]));
                        $speriod = $tourPeriodModel->insertTourPeriod($id, $dateStart, $dateEnd, $tour_period_adult_price[$i]
                                , $tour_period_child_price[$i], $tour_period_child_nb_price
                                , $tour_period_alone_price, $tour_period_adult_special_price[$i]
                                , $tour_period_child_special_price, $tour_period_status);
                    }

                    if ($speriod && !$quick_tour) {
                        for ($x = 0; $x < $day; $x++) {
                            $tourdetailStr = 'tour_detail_' . $x;
                            $tourname = "";
                            $tourdetail = $_POST[$tourdetailStr];
                            $attractionStr = 'attraction_select' . $x;
                            $attraction = $_POST[$attractionStr];
                            foreach ($attraction as $key => $value) {
                                $attraction_name = $attractionModel->getAttractionById($value);
                                if ($key == 0) {
                                    $tourname = $attraction_name->attraction_name;
                                } else {
                                    $tourname = $tourname . '-' . $attraction_name->attraction_name;
                                }
                                $tourAttractionModel->insertTourAttraction($id, $value);
                            }
                            $tour_day_id = $tourPackageDayModel->insertTourPackageDay($id, $x + 1, $tourname, $tourdetail);
                            if ($tour_day_id > 0) {
                                foreach ($attraction as $key => $value) {
                                    $tourPackageDayModel->insertTourAttractionDay($tour_day_id, $value);
                                }
                            }
                        }
                    }
                    if (($airline_select != null) && ($airline_select != '')) {
                        foreach ($airline_select as $value) {
                            $tourAirlineModel->insertTourAirline($id, $value);
                        }
                    }

                    if (($holiday_select != null) && ($holiday_select != '')) {
                        foreach ($holiday_select as $value) {
                            $tourHolidayModel->insertTourHoliday($id, $value);
                        }
                    }

//                        if (($attraction_select != null) && ($attraction_select != '')) {
//                            foreach ($attraction_select as $value) {
//                                $tourAttractionModel->insertTourAttraction($id, $value);
//                            }
//                        }

                    if (($tag_select != null) && ($tag_select != '')) {
                        foreach ($tag_select as $value) {
                            $tourTagModel->insertTourTag($id, $value);
                        }
                    }

                    if (($route_select != null) && ($route_select != '')) {
                        foreach ($route_select as $value) {
                            $tourRoute->insertTourRoute($id, $value);
                        }
                    }

                    //                        if (($images != null) && ($images != '')) {
//                            $tourImageModel->insertTourImage($id, $images);
//                        }
                }
                echo "<script>
             alert('บันทึกข้อมูลเรียบร้อย');    
             window.location.href='manage-tourlist';
             </script>";
            } catch (\Exception $e) {
                $msg = $e->getMessage();
                return dd($msg);
            }
        });
    }

    public function updateTourlistAndDay(Request $request) {
        $tour_package_id = $request->get('tour_package_id');
        if ($tour_package_id != null) {
            $quick_tour = ($_POST['quick_tour'] === 'true');
            if ($quick_tour) {
                $validator = Validator::make($request->all(), [
                            "tour_country" => "required",
                            "conditions_id" => "required",
                            "tour_name" => 'required',
                            "tour_detail" => "required",
                            "day_tour" => "required",
                            "night_tour" => "required",
                            "start_date" => "required",
                            "end_date" => "required",
                            "tour_package_code" => 'required',
                            "period_start" => "required",
                            "period_end" => "required",
                            "adult_price" => "required",
                            "child_price" => 'required',
                            "tag_select" => "required",
                            "airline_select" => "required",
                            "route_select" => "required",
                            "main_price" => "required",
                            "main_special_price" => "required"
                ]);

                if ($validator->fails()) {
                    return redirect('manage-edit-tourlist?id=' . $tour_package_id)
                                    ->withErrors($validator)
                                    ->withInput();
                }
            } else {
                $validator = Validator::make($request->all(), [
                            "tour_country" => "required",
                            "conditions_id" => "required",
                            "tour_name" => 'required',
                            "tour_detail" => "required",
                            "day_tour" => "required",
                            "night_tour" => "required",
                            "start_date" => "required",
                            "end_date" => "required",
                            "tour_package_code" => 'required',
                            "tour_detail_0" => "required",
                            "period_start" => "required",
                            "period_end" => "required",
                            "adult_price" => "required",
                            "child_price" => 'required',
                            "tag_select" => "required",
                            "airline_select" => "required",
                            "route_select" => "required",
                            "main_price" => "required",
                            "main_special_price" => "required"
                ]);

                if ($validator->fails()) {
                    return redirect('manage-edit-tourlist?id=' . $tour_package_id)
                                    ->withErrors($validator)
                                    ->withInput();
                }
            }

            DB::transaction(function () {
                try {
                    $quick_tour = ($_POST['quick_tour'] === 'true');
                    $tour_package_id = $_POST['tour_package_id'];
                    $tour_package_day_id = $_POST['tour_package_day_id'];
                    $tour_period_id = $_POST['tour_period_id'];
                    $tour_image_id = $_POST['tour_image_id'];
                    $tour_category = null;
                    $tour_country = $_POST['tour_country'];
                    $tour_name = $_POST['tour_name'];
                    $conditions_id = $_POST['conditions_id'];
                    $tour_detail = $_POST['tour_detail'];
                    $highlight_tour = null;
                    $tourlist_picture = $_FILES['file']['name'];
                    $day = $_POST['day_tour'];
                    $night = $_POST['night_tour'];
                    $start_date = $_POST['start_date'];
                    $end_date = $_POST['end_date'];
                    $tour_package_code = $_POST['tour_package_code'];
                    $tourlist_pdf = $_FILES['pdf_file']['name'];
                    $main_price = $_POST['main_price'];
                    $main_special_price = $_POST['main_special_price'];

                    $holiday_select = null;
                    if (isset($_POST['holiday_select'])) {
                        $holiday_select = $_POST['holiday_select'];
                    }
                    $tag_select = null;
                    if (isset($_POST['tag_select'])) {
                        $tag_select = $_POST['tag_select'];
                    }
//                    $attraction_select = null;
//                    if (isset($_POST['attraction_select'])) {
//                        $attraction_select = $_POST['attraction_select'];
//                    }
                    $airline_select = null;
                    if (isset($_POST['airline_select'])) {
                        $airline_select = $_POST['airline_select'];
                    }
                    $route_select = null;
                    if (isset($_POST['route_select'])) {
                        $route_select = $_POST['route_select'];
                    }
                    $images = null;
                    if (isset($_FILES['file_img']['name'])) {
                        $images = $_FILES['file_img']['name'];
                    }

                    $start_date = str_replace('/', '-', $start_date);
                    $dateStart = date('Y-m-d H:i:s', strtotime($start_date));
                    $end_date = str_replace('/', '-', $end_date);
                    $dateEnd = date('Y-m-d H:i:s', strtotime($end_date));

                    $attractionModel = new Attraction();
                    $tourPackageModel = new Tour_Package();
                    $tourPackageDayModel = new Tour_Package_Day();
                    $tourHolidayModel = new Tour_Holiday();
                    $tourTagModel = new Tour_Tag();
                    $tourAttractionModel = new Tour_Attraction();
                    $tourAirlineModel = new Tour_Airline();
                    $tourImageModel = new Tour_Image();
                    $tourRoute = new Tour_Route();
                    $tourPeriodModel = new Tour_Period();
                    $tourPackageModel->updateTourPackage($tour_package_id, $tour_package_code, $tour_country, $conditions_id, $tour_category
                            , $tour_name, $tour_detail, $highlight_tour, $tourlist_picture, $day
                            , $night, $tourlist_pdf, $dateStart, $dateEnd, $main_price, $main_special_price);

                    if ($tour_period_id != null && $tour_period_id != 0) {
                        $arr_tour_period_id = explode(",", $tour_period_id);
                        $tour_period_start = $_POST['period_start'];
                        $tour_period_end = $_POST['period_end'];
                        $tour_period_adult_price = $_POST['adult_price'];
                        $tour_period_child_price = $_POST['child_price'];
                        $tour_period_child_nb_price = 0;
                        $tour_period_alone_price = 0;
                        $tour_period_adult_special_price = $_POST['special_price'];
                        $tour_period_child_special_price = 0;
                        $tour_period_status = 'Y';

                        for ($i = 0; $i < count($tour_period_start); $i++) {
                            $tour_period_start[$i] = str_replace('/', '-', $tour_period_start[$i]);
                            $dateStart = date('Y-m-d H:i:s', strtotime($tour_period_start[$i]));
                            $tour_period_end[$i] = str_replace('/', '-', $tour_period_end[$i]);
                            $dateEnd = date('Y-m-d H:i:s', strtotime($tour_period_end[$i]));
                            $speriod = $tourPeriodModel->updateTourPeriod($arr_tour_period_id[$i], $tour_package_id, $dateStart, $dateEnd, $tour_period_adult_price[$i]
                                    , $tour_period_child_price[$i], $tour_period_child_nb_price
                                    , $tour_period_alone_price, $tour_period_adult_special_price[$i]
                                    , $tour_period_child_special_price, $tour_period_status);
                        }

                        if ($speriod && !$quick_tour) {
                            for ($x = 0; $x < $day; $x++) {
                                $tourname = "";
                                $tourdetailStr = 'tour_detail_' . $x;
                                isset($_POST[$tourdetailStr]) ? $tourdetail = $_POST[$tourdetailStr] : $tourdetail = null;
                                $attractionStr = 'attraction_select' . $x;
                                isset($_POST[$attractionStr]) ? $attraction = $_POST[$attractionStr] : $attraction = null;
                                if ($tourdetail != null && $attraction != null) {
                                    foreach ($attraction as $key => $value) {
                                        $attraction_name = $attractionModel->getAttractionById($value);
                                        if ($key == 0) {
                                            $tourname = $attraction_name->attraction_name;
                                        } else {
                                            $tourname = $tourname . '-' . $attraction_name->attraction_name;
                                        }
                                        $tourAttractionModel->updateTourAttraction($tour_package_id, $value);
                                    }

                                    $arr_tour_package_day_id = explode(",", $tour_package_day_id);
                                    foreach ($arr_tour_package_day_id as $keys => $values) {
                                        $tourPackageDayModel->updateTourPackageDay($arr_tour_package_day_id[$keys], $tour_package_id, $x + 1, $tourname, $tourdetail);
                                        foreach ($attraction as $key => $value) {
                                            $tourPackageDayModel->updateTourAttractionDay($arr_tour_package_day_id[$keys], $value);
                                        }
                                    }
                                }
                            }
                        }

                        if (($airline_select != null) && ($airline_select != '')) {
                            $tourAirlineModel->removeTourAirline($tour_package_id);
                            foreach ($airline_select as $value) {
                                $tourAirlineModel->updateTourAirline($tour_package_id, $value);
                            }
                        }

                        if (($holiday_select != null) && ($holiday_select != '')) {
                            $tourHolidayModel->removeTourHoliday($tour_package_id);
                            foreach ($holiday_select as $value) {
                                $tourHolidayModel->updateTourHoliday($tour_package_id, $value);
                            }
                        }

//                            if (($attraction_select != null) && ($attraction_select != '')) {
//                                foreach ($attraction_select as $value) {
//                                    $tourAttractionModel->updateTourAttraction($tour_package_id, $value);
//                                }
//                            }

                        if (($tag_select != null) && ($tag_select != '')) {
                            $tourTagModel->removeTourTag($tour_package_id);
                            foreach ($tag_select as $value) {
                                $tourTagModel->updateTourTag($tour_package_id, $value);
                            }
                        }

                        if (($route_select != null) && ($route_select != '')) {
                            $tourRoute->removeTourRoute($tour_package_id);
                            foreach ($route_select as $value) {
                                $tourRoute->updateTourRoute($tour_package_id, $value);
                            }
                        }

//                            $arr_tour_image_id = explode(",", $tour_image_id);
//                            if (($images != null) && ($images != '')) {
//                                foreach ($images as $key => $value) {
//                                    $tourImageModel->updateTourImage($arr_tour_image_id[$key], $tour_package_id, $images);
//                                }
//                            }
                    }


                    echo "<script>alert('บันทึกข้อมูลเรียบร้อย');window.location.href='manage-edit-tourlist?id=$tour_package_id';</script>";
                } catch (\Exception $e) {
                    $msg = $e->getMessage();
                    return dd($msg);
                }
            });
        } else {
            echo "<script>
             alert('ไม่สามารถทึกได้');    
             window.location.href='manage-tourlist';
             </script>";
        }
    }

    public function deleteTourPackage() {
        $tourPackageModel = new Tour_Package();
        try {
            $id = $_POST['tour_package_id'];
            $result = $tourPackageModel->removeTourPackageById($id);
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function searchAllCategory() {
        $categoryModel = new Category();
        try {
            $category = $categoryModel->getCategoryGenaral();
            return response($category);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function searchAllHoliday() {
        $holidayModel = new Holiday();
        try {
            $holiday = $holidayModel->getHolidayAll();
            return response($holiday);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function searchAllAttraction() {
        $attractionModel = new Attraction();
        try {
            $attraction = $attractionModel->getAttractionAll();
            return response($attraction);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function getAttractionByTourCountryId() {
        $attractionModel = new Attraction();
        $tour_country_id = $_POST['tour_country_id'];
        try {
            $attraction = $attractionModel->getAttractionByTourCountryId($tour_country_id);
            return response($attraction);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function searchAllTag() {
        $tagModel = new Tag();
        try {
            $tag = $tagModel->getTagAll();
            return response($tag);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function searchAllAirline() {
        $airlineModel = new Airline();
        try {
            $airline = $airlineModel->getAirlineAll();
            return response($airline);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function searchAllRoute() {
        $routeModel = new Route();
        try {
            $route = $routeModel->getRouteAll();
            return response($route);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function getTourPackageAll() {
        $tourModel = new Tour_Package();
        try {
            $tourPackageList = $tourModel->getTourPackageAll();
            foreach ($tourPackageList as $tourPackageObj) {
                $newStartDate = date("d-m-Y", strtotime($tourPackageObj->tour_package_period_start));
                $newEndDate = date("d-m-Y", strtotime($tourPackageObj->tour_package_period_end));
                $tourPackageObj->tour_package_period_start = $newStartDate;
                $tourPackageObj->tour_package_period_end = $newEndDate;
            }

            return $tourPackageList;
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return $msg;
        }
    }

    public function getTourPackageById() {
        $tourModel = new Tour_Package();
        try {
            $tourPackageList = $tourModel->getTourPackageAll();
            return $tourPackageList;
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return $msg;
        }
    }

    public function getTourPackageDetail($tour_package_id) {
        try {
            $tourModel = new Tour_Package();
            $tourDayModel = new Tour_Package_Day();
            $tourPackage = $tourModel->getTourDetail($tour_package_id);
            $tourPackageList = $tourModel->getTourDetailList($tour_package_id);
            $tourPackageDayList = $tourDayModel->getTourPackageDay($tour_package_id);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return $msg;
        }
    }

}
