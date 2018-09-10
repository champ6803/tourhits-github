<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Province;
use App\Models\District;
use App\Models\Subdistrict;
use App\Models\Conditions;
use App\Models\Tour_Package;

class MasterController extends Controller {

    protected $_conditions;

    public function __construct(Conditions $conditions) {
        $this->_conditions = $conditions;
    }

    public function manage_conditions() {
        return view('master.manage-conditions');
    }

    public function manage_conditions_action() {
        return view('master.manage-conditions-action');
    }

    public function getConditionsList() {
        try {
            $result = $this->_conditions->getConditionsList();
            return response($result);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function getConditionsById(Request $request) {
        try {
            $conditions_id = $request->get('conditions_id');
            $result = $this->_conditions->getConditionsById($conditions_id);
            return response($result);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function saveConditions(Request $request) {
        try {
            $conditions_id = $request->get('conditions_id');
            if ($this->IsNullOrEmptyString($conditions_id)) {
                $conditions_name = $request->get('conditions_name');
                $rate_include = $request->get('rate_include');
                $rate_not_include = $request->get('rate_not_include');
                $payment_condition = $request->get('payment_condition');
                $cancel_change = $request->get('cancel_change');
                $other_condition = $request->get('other_condition');
                $beyond_respon = $request->get('beyond_respon');
                $suggest_warning = $request->get('suggest_warning');
                $visa_detail = $request->get('visa_detail');
                $agreement = $request->get('agreement');
                $this->_conditions->insertConditions($conditions_name, $rate_include, $rate_not_include, $payment_condition, $cancel_change, $other_condition, $beyond_respon, $suggest_warning, $visa_detail, $agreement);
                echo "<script>
                        alert('บันทึกเรียบร้อย');
                        window.location.href='manage-conditions';
                        </script>";
            } else {
                $conditions_name = $request->get('conditions_name');
                $rate_include = $request->get('rate_include');
                $rate_not_include = $request->get('rate_not_include');
                $payment_condition = $request->get('payment_condition');
                $cancel_change = $request->get('cancel_change');
                $other_condition = $request->get('other_condition');
                $beyond_respon = $request->get('beyond_respon');
                $suggest_warning = $request->get('suggest_warning');
                $visa_detail = $request->get('visa_detail');
                $agreement = $request->get('agreement');
                $this->_conditions->updateConditions($conditions_id, $conditions_name, $rate_include, $rate_not_include, $payment_condition, $cancel_change, $other_condition, $beyond_respon, $suggest_warning, $visa_detail, $agreement);
                echo "<script>
                        alert('บันทึกเรียบร้อย');
                        window.location.href='manage-conditions';
                        </script>";
            }
            echo "<script>
                        alert('ไม่สามารถบันทึกได้');
                        window.location.href='manage-conditions';
                        </script>";
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            dd($msg);
        }
    }

    public function removeConditions(Request $request) {
        try {
            $conditions_id = $request->get('conditions_id');
            $result = Tour_Package::where('conditions_id', $conditions_id)->get();
            if ($result == null && count($result) == 0) {
                if (!$this->IsNullOrEmptyString($conditions_id)) {
                    $this->_conditions->removeConditions($conditions_id);
                    return response("success");
                } else {
                    return response("no conditions_id");
                }
            } else {
                return response("exist tour package");
            }
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

// ไม่ได้ใช้
    public function getCountry() {
        try {
            $country = Country::all();
            return response($countryList);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

// ไม่ได้ใช้
    public function getProvince() {
        try {
            $province = Province::all();
            return response($province);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function getDistrict() {
        try {
            $province_id = request()->get('province_id');
            $district = District::where('province_id', $province_id)->get();
            return response($district);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function getSubdistrict() {
        try {
            $district_id = request()->get('district_id');
            $subdistrict = Subdistrict::join('postcode', 'postcode.subdistrict_code', '=', 'subdistrict.subdistrict_code')
                    ->select('subdistrict.*', 'postcode.post_code')
                    ->where('district_id', $district_id)
                    ->get();
            return response($subdistrict);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

}
