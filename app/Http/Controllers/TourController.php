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

/* * x
 * Description of TourController
 *
 * @author chonl
 */

class TourController extends Controller {

    public function tour_detail($tour_country_name, $tour_package_id, $tour_package_name) {
        $tourModel = new Tour_Package();
        $tourDayModel = new Tour_Package_Day();
        $tourPackage = $tourModel->getTourDetail($tour_package_id);
        $tourPackageList = $tourModel->getTourDetailList($tour_package_id);
        $tourPackageDayList = $tourDayModel->getTourPackageDay($tour_package_id);
        $tourPackageImagesList = $tourModel->getTourImages($tour_package_id);
        foreach ($tourPackageList as $tourPackageObj) {
            $newStartDate = date("d-m-Y", strtotime($tourPackageObj->tour_period_start));
            $newEndDate = date("d-m-Y", strtotime($tourPackageObj->tour_period_end));
            $tourPackageObj->tour_period_start = $newStartDate;
            $tourPackageObj->tour_period_end = $newEndDate;
        }
        $page_title = $tourPackage->tour_package_name;
        return view('tour.tour-detail', compact('tourPackage', 'tourPackageList', 'tourPackageImagesList', 'tourPackageDayList', 'page_title'));
    }

    public function tour_confirm($tour_package_id, $tour_period_id) {
        $tourModel = new Tour_Package();
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
        return view('tour.tour-confirm', compact('tourPackage', 'tourPackageImagesList', 'page_title', 'tourPackagePeriod', 'tourPackageList'));
    }

    public function orders() {
        try {
            $customer_id = request()->get('customer_id');
            if ($customer_id != null || $customer_id != "") {
                
            } else {
                $cus_name = request()->get('cus_name');
                $cus_email = request()->get('cus_email');
                $line_id = request()->get('line_id');
                $phone = request()->get('phone');
                $remark = request()->get('remark');
                $arrOrders = ['order_name' => $cus_name, 'order_email' => $cus_email, 'order_line' => $line_id, 'order_phone' => $phone, 'order_remark' => $remark];
                return($arrOrders);
            }
            return response(['name' => $name, 'customer' => $customer_id]);
        } catch (\Exception $ex) {
            return response($ex);
        }
    }

}
