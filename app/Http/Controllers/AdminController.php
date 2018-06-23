<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

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
            $attractionModel->insertAttraction($attraction_name, $attraction_picture);
            echo "<script>
             alert('บันทึกข้อมูลเสร็จสมบูรณ์');
             window.location.href='manage-attraction';
             </script>";
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
            $attractionModel->editAttraction($id, $update_attraction_name, $attraction_picture);
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

    public function searchTourCategory() {
        $tourCategoryModel = new Tour_Category();
        try {
            $input_tour_category_name = $_POST['input_tour_category_name'];
            if ($input_tour_category_name != null) {
                $tour_category = $tourCategoryModel->getTourCategoryByName($input_tour_category_name);
            } else {
                $tour_category = $tourCategoryModel->getTourCategoryAll();
            }
            return response($tour_category);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function saveTourCategory() {
        $tourCategoryModel = new Tour_Category();
        try {
            $tour_category_name = $_POST['tour_category_name'];
            $tour_category_picture = $_FILES['file']['name'];
            $tourCategoryModel->insertTourCategory($tour_category_name, $tour_category_picture);
            echo "<script>
             alert('บันทึกข้อมูลเสร็จสมบูรณ์');
             window.location.href='manage-category';
             </script>";
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function deleteTourCategory() {
        $tourCategoryModel = new Tour_Category();
        try {
            $id = $_POST['id'];
            $tourCategoryModel->removeTourCategory($id);
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function updateTourCategory() {
        $tourCategoryModel = new Tour_Category();
        try {

            $id = $_POST['hidden_update_id'];
            $update_tour_category_name = $_POST['update_tour_category_name'];
            $tour_category_picture = $_FILES['file']['name'];
            $tourCategoryModel->editTourCategory($id, $update_tour_category_name, $tour_category_picture);
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

    public function saveTourlistAndDay() {
        $tourPackageModel = new Tour_Package();
        $tourPackageDayModel = new Tour_Package_Day();
        $tourHolidayModel = new Tour_Holiday();
        $tourTagModel = new Tour_Tag;
        $tourAttractionModel = new Tour_Attraction;
        try {
            $tour_category = $_POST['tour_category'];
            $tour_country = $_POST['tour_country'];
            $tour_name = $_POST['tour_name'];
            $tour_detail = $_POST['tour_detail'];
            $highlight_tour = $_POST['highlight_tour'];
            $tourlist_picture = $_FILES['file']['name'];
            $day = $_POST['day_tour'];
            $night = $_POST['night_tour'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $tour_package_code = $_POST['tour_package_code'];
            $holiday_select = null;
            if (isset($_POST['holiday_select'])) {
                $holiday_select = $_POST['holiday_select'];
            }
            $tag_select = null;
            if (isset($_POST['tag_select'])) {
                $tag_select = $_POST['tag_select'];
            }
            $attraction_select = null;
            if (isset($_POST['attraction_select'])) {
                $attraction_select = $_POST['attraction_select'];
            }
            $dateStart = str_replace('/', '-', $start_date);
            $dateEnd = str_replace('/', '-', $end_date);

            $id = $tourPackageModel->insertTourPackage($tour_package_code, $tour_country, $tour_category
                    , $tour_name, $tour_detail, $highlight_tour, $tourlist_picture, $day
                    , $night, $dateStart, $dateEnd);

            //$holiday_array= explode(",",$holiday_select);
            if (($holiday_select != null) && ($holiday_select != '')) {
                foreach ($holiday_select as $value) {
                    $tourHolidayModel->insertTourHoliday($id, $value);
                }
            }

            //$attraction_array= explode(",",$attraction_select);
            if (($attraction_select != null) && ($attraction_select != '')) {
                foreach ($attraction_select as $value) {
                    $tourAttractionModel->insertTourAttraction($id, $value);
                }
            }

            //$tag_array= explode(",",$tag_select);
            if (($tag_select != null) && ($tag_select != '')) {
                foreach ($tag_select as $value) {
                    $tourTagModel->insertTourTag($id, $value);
                }
            }



            for ($x = 0; $x < $day; $x++) {
                $tournameStr = 'tour_name_' . $x;
                $tourdetailStr = 'tour_detail_' . $x;
                $tourname = $_POST[$tournameStr];
                $tourdetail = $_POST[$tourdetailStr];
                $tourPackageDayModel->insertTourPackageDay($id, $x + 1, $tourname, $tourdetail);
            }
            echo "<script>
             alert('บันทึกข้อมูลเสร็จสมบูรณ์');
             window.location.href='manage-tourlist';
             </script>";
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function searchAllCategory() {
        $categoryModel = new Category();
        try {
            $category = $categoryModel->getCategoryAll();
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

}
