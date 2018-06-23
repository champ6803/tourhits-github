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

}
