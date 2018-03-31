<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Province;
use App\Models\District;
use App\Models\Subdistrict;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller {

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
