<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\Tour_Package;
use App\Models\Tour_Period;
use Illuminate\Http\Request;

/**
 * Description of ManageTourController
 *
 * @author Admin
 */
class ManageTourController extends Controller {

    public function status_package() {
        $tourPackageList = $this->getTourPackageAll();
        return view('manage-tour.status-package', compact('tourPackageList'));
    }

    public function getTourPackageAll() {
        $date = \Carbon\Carbon::now()->format('Y-m-d');
        ;
        $tourModel = new Tour_Package();
        try {
            $tourPackageList = $tourModel->getTourPackageAll();
            foreach ($tourPackageList as $tourPackageObj) {
                $newStartDate = date("d-m-Y", strtotime($tourPackageObj->tour_package_period_start));
                $newEndDate = date("d-m-Y", strtotime($tourPackageObj->tour_package_period_end));
                $status = $date > $tourPackageObj->tour_package_period_end ? "Expire" : "Available";
                $tourPackageObj->tour_package_period_start = $newStartDate;
                $tourPackageObj->tour_package_period_end = $newEndDate;
                $tourPackageObj->tour_package_status = $status;
            }

            return $tourPackageList;
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return $msg;
        }
    }

    public function status_period(Request $request) {
        $tour_package_id = $request->query('tour_package_id');
        $tourPeriodList = $this->getTourPeriodByTourPackageId($tour_package_id);
        return view('manage-tour.status-period', compact('tourPeriodList'));
    }

    public function getTourPeriodByTourPackageId($tour_package_id) {
        $tourModel = new Tour_Period();
        try {
            $tourPeriodList = $tourModel->getTourPeriodByTourPackageId($tour_package_id);
            foreach ($tourPeriodList as $tourPeriodObj) {
                $newStartDate = date("d-m-Y", strtotime($tourPeriodObj->tour_period_start));
                $newEndDate = date("d-m-Y", strtotime($tourPeriodObj->tour_period_end));
                $tourPeriodObj->tour_period_start = $newStartDate;
                $tourPeriodObj->tour_period_end = $newEndDate;
            }
            return $tourPeriodList;
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return $msg;
        }
    }

    public function updateTourPeriodStatus(Request $request) {
        $tourModel = new Tour_Period();
        try {
            $tour_period_id = $request->get('tour_period_id');
            $tour_period_status = $request->get('tour_period_status');
            $result = $tourModel->updateTourPeriodStatus($tour_period_id, $tour_period_status);
            if ($result) {
                return response('success');
            }
            return response('fail');
        } catch (\Exception $ex) {
            return response($ex);
        }
    }

}
