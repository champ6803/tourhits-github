<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input as Input;
use App\Models\Country;
use App\Models\Tour_Country;
use App\Models\Company;
use App\Models\Category;
use App\Models\Tour_Category;
use App\Models\Tour_Package;
use App\Models\Review;

/**
 * Description of AdminController
 *
 * @author champ
 */
class ManageFrontController extends Controller {

    public function manage_front_country() {
        return view('manage-front.manage-front-country');
    }

    public function manage_front_category() {
        return view('manage-front.manage-front-category');
    }

    public function profile() {
        return view('manage-front.profile');
    }

    public function manage_front_review() {
        $reviewObj = $this->searchReview();
        return view('manage-front.manage-front-review', compact('reviewObj'));
    }

    public function searchAllCountry() {
        $countryModel = new Country();
        try {
            $country = $countryModel->getCountryAll();
            return response($country);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function searchTourCountry() {
        $tourCountryModel = new Tour_Country();
        try {
            $input_tour_country_name = $_POST['input_tour_country_name'];
            $tourcountry = $tourCountryModel->getTourCountryByName($input_tour_country_name);
            return response($tourcountry);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function deleteTourCountry() {
        $tourCountryModel = new Tour_Country();
        try {
            $id = $_POST['id'];
            $tourCountryModel->removeTourCountry($id);
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function updateTourCountry() {
        $tourCountryModel = new Tour_Country();
        try {
            $id = $_POST['hidden_update_id'];
            $update_tour_country_name = $_POST['update_tour_country_name'];
            //$tour_country_img = $_FILES['file']['name'];
            $country_id = $_POST['countryEdit'];
            $tour_country_detail = $_POST['update_tour_country_detail'];
            $tour_country_url = $_POST['update_tour_country_url'];
            $meta_title = $_POST['update_meta_title'];
            $meta_keywords = $_POST['update_meta_keywords'];
            $meta_description = $_POST['update_meta_description'];

            $tourCountryModel->editTourCountry($id, $update_tour_country_name, null
                    , $country_id, $tour_country_detail, $tour_country_url, $meta_title, $meta_keywords, $meta_description);
            echo "<script>
                        alert('แก้ไขข้อมูลเสร็จสมบูรณ์');
                        window.location.href='manage-front-country';
                        </script>";
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function saveTourCountry() {
        $tourCountryModel = new Tour_Country();
        try {
            $tour_country_name = $_POST['tour_country_name'];
            $country_id = $_POST['country'];
            $tour_country_detail = $_POST['tour_country_detail'];
            $tour_country_url = $_POST['tour_country_url'];
            $meta_title = $_POST['meta_title'];
            $meta_keywords = $_POST['meta_keywords'];
            $meta_description = $_POST['meta_description'];

            //$tour_country_img = $_FILES['file']['name'];
            $tourCountryModel->insertTourCountry($tour_country_name, $country_id
                    , $tour_country_detail, null, $tour_country_url, $meta_title, $meta_keywords, $meta_description);
            echo "<script>
             alert('บันทึกข้อมูลเสร็จสมบูรณ์');
             window.location.href='manage-front-country';
             </script>";
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function searchCompanyByCompanyCode() {
        $companyModel = new Company();
        try {
            $company_code = $_POST['company_code'];
            $company = $companyModel->getCompanyByCompanyCode($company_code);
            return response($company);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function searchAllCategory() {
        $countryModel = new Country();
        try {
            $country = $countryModel->getCountryAll();
            return response($country);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function searchTourCategory() {
        $tourCategoryModel = new Tour_Category();
        try {
            $categoryName = $_POST['category_name'];
            if ($categoryName != null && $categoryName != "") {
                $tourCategoryList = $tourCategoryModel->getTourCategoryDetailByName($categoryName);
            } else {
                $tourCategoryList = $tourCategoryModel->getTourCategoryDetailAll();
            }
            return response($tourCategoryList);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function searchTourPackegeByTourCountryId() {
        $tourPackageModel = new Tour_Package();
        try {
            $tourCountryId = $_POST['tour_country_id'];
            $tourCategoryList = $tourPackageModel->getTourPackegeByTourCountryId($tourCountryId);
            return response($tourCategoryList);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function searchCategoryByCategoryType() {
        $categoryModel = new Category();
        try {
            $categoryType = $_POST['category_type'];
            $categoryList = $categoryModel->getCategoryByCategoryType($categoryType);
            return response($categoryList);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function saveTourCategory() {
        $tourCategoryModel = new Tour_Category();
        try {
            $user = "admin";
            $tour_country_select = $_POST['tour_country_select'];
            $tour_package_select = $_POST['tour_package_select'];
            $category_type_select = $_POST['category_type_select'];
            $category_select = $_POST['category_select'];
            if (!$this->IsNullOrEmptyString($tour_country_select) && !$this->IsNullOrEmptyString($tour_package_select) && !$this->IsNullOrEmptyString($category_type_select) && !$this->IsNullOrEmptyString($category_select)) {
                $tourCategoryModel->insertTourCategory($category_select, $tour_package_select, $user);
                echo "<script>alert('บันทึกข้อมูลเรียบร้อย');window.location.href='manage-front-category';</script>";
            }
            echo "<script>alert('ไม่สามารถบันทึกได้');window.location.href='manage-front-category';</script>";
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function updateTourCategory() {
        $tourCategoryModel = new Tour_Category();
        try {
            $user = "admin";
            $tour_category_id = $_POST['edit_tour_category_id'];
            $tour_country_select = $_POST['edit_tour_country_select'];
            $tour_package_select = $_POST['edit_tour_package_select'];
            $category_type_select = $_POST['edit_category_type_select'];
            $category_select = $_POST['edit_category_select'];
            if (!$this->IsNullOrEmptyString($tour_category_id) && !$this->IsNullOrEmptyString($tour_country_select) && !$this->IsNullOrEmptyString($tour_package_select) && !$this->IsNullOrEmptyString($category_type_select) && !$this->IsNullOrEmptyString($category_select)) {
                $tourCategoryModel->editTourCategory($tour_category_id, $category_select, $tour_package_select, $user);
                echo "<script>alert('บันทึกข้อมูลเรียบร้อย');window.location.href='manage-front-category';</script>";
            }
            echo "<script>alert('ไม่สามารถบันทึกได้');window.location.href='manage-front-category';</script>";
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function removeTourCategory() {
        $tourCategoryModel = new Tour_Category();
        try {
            $tour_category_id = $_POST['tour_category_id'];
            $tourCategoryModel->removeTourCategory($tour_category_id);
            echo "<script>alert('บันทึกข้อมูลเรียบร้อย');window.location.href='manage-front-category';</script>";
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            echo "<script>alert('" . $msg . "');window.location.href='manage-front-category';</script>";
            return response($msg);
        }
    }

    public function saveReview() {
        $reviewModel = new Review();
        try {
            $review_picture1 = $_FILES['file1']['name'];
            $review_picture2 = $_FILES['file2']['name'];
            $review_picture3 = $_FILES['file3']['name'];
            $review_picture4 = $_FILES['file4']['name'];
            $review_picture5 = $_FILES['file5']['name'];
            $review_picture6 = $_FILES['file6']['name'];
            $review_picture7 = $_FILES['file7']['name'];
            $review_picture8 = $_FILES['file8']['name'];
            $review_picture9 = $_FILES['file9']['name'];

            $reviewObj = $this->searchReview();
            if ($reviewObj == null) {
                $reviewModel->insertReview($review_picture1, $review_picture2, $review_picture3, $review_picture4, $review_picture5
                        , $review_picture6, $review_picture7, $review_picture8, $review_picture9);
            } else {
                $reviewModel->updateReview($review_picture1, $review_picture2, $review_picture3, $review_picture4, $review_picture5
                        , $review_picture6, $review_picture7, $review_picture8, $review_picture9, $reviewObj->review_id);
            }



            echo "<script>
             alert('บันทึกข้อมูลเสร็จสมบูรณ์');
             window.location.href='manage-front-review';
             </script>";
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function searchReview() {
        $reviewModel = new Review();
        try {
            $review = $reviewModel->getReview();
            return $review;
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function manage_front_country_article() {
        return view('manage-front.manage-front-country-article');
    }

}
