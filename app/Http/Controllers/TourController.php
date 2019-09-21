<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\Tour_Package;
use App\Models\Tour_Package_Day;
use App\Models\Orders;
use App\Models\Tour_Attraction_Day;
use Illuminate\Support\Facades\Response;
use App\Models\Tag;
use App\Models\Country;

/* * x
 * Description of TourController
 *
 * @author chonl
 */

class TourController extends Controller {

    public function tour_detail($tour_country_name, $tour_package_id, $tour_package_name) {
        $tourModel = new Tour_Package();
        $tourDayModel = new Tour_Package_Day();
        $countryModel = new Country();
        $countryList = $countryModel->getCountryAll();
        $tagList = $tourModel->getFilterTag($tour_country_name);
        $tourPackage = $tourModel->getTourDetail($tour_package_id);
        $tourPackageList = $tourModel->getTourDetailList($tour_package_id);
        $tourPackageDayList = $tourDayModel->getTourPackageDay($tour_package_id);
        $array = array();
        foreach ($tourPackageDayList as $tour) {
            array_push($array, $tour->tour_package_day_id);
        }
        $tourAttractionDayList = Tour_Attraction_Day::whereIn('tour_package_day_id', $array)
                ->join('attraction', 'attraction.attraction_id', '=', 'tour_attraction_day.attraction_id')
                ->get();
        $tourPackageImagesList = $tourModel->getTourImages($tour_package_id);
        foreach ($tourPackageList as $tourPackageObj) {
//            $newStartDate = date("d-m-Y", strtotime($tourPackageObj->tour_period_start));
//            $newEndDate = date("d-m-Y", strtotime($tourPackageObj->tour_period_end));
            $tourPackageObj->tour_period_start = $this->DateThai($tourPackageObj->tour_period_start);
            $tourPackageObj->tour_period_end = $this->DateThai($tourPackageObj->tour_period_end);
        }
        $page_title = $tourPackage->meta_title;
        return view('tour.tour-detail', compact('tourPackage', 'tourPackageList', 'tourPackageImagesList', 'tourPackageDayList', 'page_title', 'tourAttractionDayList', 'tagList', 'countryList'));
    }

    public function DateThai($strDate) {
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strHour = date("H", strtotime($strDate));
        $strMinute = date("i", strtotime($strDate));
        $strSeconds = date("s", strtotime($strDate));
        $strMonthCut = Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }

    public function tour_confirm($tour_package_id, $tour_period_id) {
        $tourModel = new Tour_Package();
        $countryModel = new Country();
        $countryList = $countryModel->getCountryAll();
        $tourPackage = $tourModel->getTourDetail($tour_package_id);
        $tourPackageList = $tourModel->getTourDetailList($tour_package_id);
        $tourPackagePeriod = $tourModel->getTourDetailPeriod($tour_package_id, $tour_period_id);
        $newStartDate = date("d-m-Y", strtotime($tourPackagePeriod->tour_period_start));
        $newEndDate = date("d-m-Y", strtotime($tourPackagePeriod->tour_period_end));
        $tourPackagePeriod->tour_period_start = $newStartDate;
        $tourPackagePeriod->tour_period_end = $newEndDate;
//
        $tourPackageImagesList = $tourModel->getTourImages($tour_package_id);
        foreach ($tourPackageList as $tourPackageObj) {
            $newStartDate = date("d-m-Y", strtotime($tourPackageObj->tour_period_start));
            $newEndDate = date("d-m-Y", strtotime($tourPackageObj->tour_period_end));
            $tourPackageObj->tour_period_start = $newStartDate;
            $tourPackageObj->tour_period_end = $newEndDate;
        }
        $page_title = 'รายการจองทัวร์ ' . $tourPackage->tour_package_name;
        return view('tour.tour-confirm', compact('tourPackage', 'tourPackageImagesList', 'page_title', 'tourPackagePeriod', 'tourPackageList', 'countryList'));
    }

    public function orders() {
        try {
            $order = new Orders();
            $customer_id = request()->get('customer_id');
            $order_total_price = request()->get('all_total_amount');
            $tour_package_id = request()->get('tour_package_id');
            $tour_period_id = request()->get('tour_period_id');
            $quantity_adult = request()->get('adult_qty');
            $quantity_child = request()->get('child_qty');

            $cus_name = request()->get('cus_name');
            $cus_email = request()->get('cus_email');
            $line_id = request()->get('line_id');
            $phone = request()->get('phone');
            $remark = request()->get('remark');
            if ($customer_id != null || $customer_id != "") {
                $suc = $order->saveOrder($customer_id, $cus_name, $cus_email, $phone, $line_id, $remark, $order_total_price, $tour_package_id, $tour_period_id, $quantity_adult, $quantity_child);
                if ($suc) {
                    return response('true');
                }
                return response('false');
            } else {
                $suc = $order->saveOrder($customer_id, $cus_name, $cus_email, $phone, $line_id, $remark, $order_total_price, $tour_package_id, $tour_period_id, $quantity_adult, $quantity_child);
                if ($suc) {
                    return response('true');
                }
                return response('false');
            }
        } catch (\Exception $ex) {
            return response($ex);
        }
    }

    public function getDownload($tour_package_id) {
        $tourModel = new Tour_Package();
        $tourPackage = $tourModel->getTourDetail($tour_package_id);
        $pdf_name = $tourPackage->tour_package_pdf;
        $file = "./images/pdf/" . $pdf_name;

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, $pdf_name, $headers);
    }

}
