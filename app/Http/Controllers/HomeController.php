<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\Tour_Category;
use App\Models\Tour_Package;
use App\Models\Category;
use App\Models\Tour_Period;
use App\Models\Country;
use App\Models\Article;

/**
 * Description of HomeController
 *
 * @author champ
 */
class HomeController extends Controller {

    public function index() {
        $cate = new Category();
        $tourList = new Tour_Package();
        $countryModel = new Country();
        $articleModel = new Article();
        $articleList = $articleModel->getArticleAll();
        $categoryList = $cate->getCategoryGenaral();
        $tourHitsPackageActiveList = $tourList->getTourPackageByCategory(100000, 0); //แพ็คเกจยอดนิยม
        $tourHitsPackageList = $tourList->getTourPackageByCategory(100000, 4);
        $tourSalesPackageActiveList = $tourList->getTourPackageByCategory(100001, 0); //แพ็คเกจยอดนิยม
        $countryList = $countryModel->getCountryAll();
        $arrayHitActive = array();
        foreach ($tourHitsPackageActiveList as $tour) {
            array_push($arrayHitActive, $tour->tour_package_id);
        }
        $tourHitPeriodActive = Tour_Period::whereIn('tour_package_id', $arrayHitActive)
                ->get();

        $arraySalesActive = array();
        foreach ($tourSalesPackageActiveList as $tour) {
            array_push($arraySalesActive, $tour->tour_package_id);
        }
        $tourSalesPeriodActive = Tour_Period::whereIn('tour_package_id', $arraySalesActive)
                ->get();
        
        $meta_title = 'บริษัททัวร์,บริษัทนำเที่ยว,บริษัททัวร์ชั้นนำ,บริษัทจัดทัวร์,จัดทัวร์ราคาถูก,ทัวร์คุณภาพ,รับจัดทัวร์,รับจัดกรุ๊ปทัวร์,จัดกรุ๊ปส่วนตัว,จัดกรุ๊ปทัวร์ส่วนตัว,จัดกรุ๊ปเหมา,ทัวร์กรุ๊ปเหมา,รับจัดทัวร์หมู่คณะ,ทัวร์ดูงาน,ทัวร์สัมมนา,รับจัดทัวร์เกาหลี,ญี่ปุ่น,ฮ่องกง,ทัวร์,ท่องเที่ยว,ทัวร์ต่างประเทศ,เที่ยวต่างประเทศ,tour ต่างประเทศ, tour agency,แพ็คเกจทัวร์,insensitive group';
        $meta_keywords = 'บริษัททัวร์,บริษัทนำเที่ยว,บริษัททัวร์ชั้นนำ,บริษัทจัดทัวร์,จัดทัวร์ราคาถูก,ทัวร์คุณภาพ,รับจัดทัวร์,รับจัดกรุ๊ปทัวร์,จัดกรุ๊ปส่วนตัว,จัดกรุ๊ปทัวร์ส่วนตัว,จัดกรุ๊ปเหมา,ทัวร์กรุ๊ปเหมา,รับจัดทัวร์หมู่คณะ,ทัวร์ดูงาน,ทัวร์สัมมนา,รับจัดทัวร์เกาหลี,ญี่ปุ่น,ฮ่องกง,ทัวร์,ท่องเที่ยว,ทัวร์ต่างประเทศ,เที่ยวต่างประเทศ,tour ต่างประเทศ, tour agency,แพ็คเกจทัวร์,insensitive group';
        $meta_description = 'บริการรับจัดกรุ๊ปทัวร์ แบบส่วนตัว แบบหมู่คณะ เส้นทางต่างประเทศทั่วโลก ทัวร์ญี่ปุ่น ทัวร์เกาหลี ทัวร์ฮ่องกง ทัวร์เวียดนาม ทัวร์ไต้หวัน ดูแลเรื่อง ตั๋วเครื่องบิน จองที่พัก จองโรงแรม เดินทางท่องเที่ยวต่างประเทศราคาพิเศษ พร้อมไกด์ผู้ชำนาญเส้นทาง และหัวหน้าทัวร์มืออาชีพ ดูแลท่านตลอดการเดินทาง';

        return view('home.index', compact('categoryList', 'tourHitsPackageActiveList', 'tourSalesPackageActiveList', 'tourHitPeriodActive', 'tourSalesPeriodActive', 'countryList', 'articleList', 'meta_title', 'meta_keywords', 'meta_description'));
    }

}
