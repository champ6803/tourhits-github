<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', 'HomeController@index');

Route::get('register', 'RegisterController@index');

Route::post('register', 'RegisterController@register');

Route::get('login', 'LoginController@index');

Route::post('login', 'LoginController@login');

Route::post('getDistrict', 'MasterController@getDistrict');

Route::post('getSubdistrict', 'MasterController@getSubdistrict');

Route::get('tour/{country_url}', 'FilterController@search_tour');

//Route::get('adminlogin','LoginController@adminLogin');

Route::get('dashboard', 'DashboardController@dashboard');

Route::get('tour-detail/{tour_country}/{tour_pakage_id}/{tour_package_name}', 'TourController@tour_detail');

Route::get('manage-route', 'AdminController@manage_route');

Route::post('searchRoute', 'AdminController@searchRoute');

Route::post('saveRoute', 'AdminController@saveRoute');

Route::post('deleteRoute', 'AdminController@deleteRoute');

Route::post('updateRoute', 'AdminController@updateRoute');

Route::get('manage-airline', 'AdminController@manage_airline');

Route::post('searchAirline', 'AdminController@searchAirline');

Route::post('saveAirline', 'AdminController@saveAirline');

Route::post('deleteAirline', 'AdminController@deleteAirline');

Route::post('updateAirline', 'AdminController@updateAirline');

Route::get('manage-attraction', 'AdminController@manage_attraction');

Route::post('searchAttraction', 'AdminController@searchAttraction');

Route::post('saveAttraction', 'AdminController@saveAttraction');

Route::post('deleteAttraction', 'AdminController@deleteAttraction');

Route::post('updateAttraction', 'AdminController@updateAttraction');

Route::get('manage-tag', 'AdminController@manage_tag');

Route::post('searchTag', 'AdminController@searchTag');

Route::post('saveTag', 'AdminController@saveTag');

Route::post('deleteTag', 'AdminController@deleteTag');

Route::post('updateTag', 'AdminController@updateTag');

Route::get('manage-holiday', 'AdminController@manage_holiday');

Route::post('searchHoliday', 'AdminController@searchHoliday');

Route::post('saveHoliday', 'AdminController@saveHoliday');

Route::post('deleteHoliday', 'AdminController@deleteHoliday');

Route::post('updateHoliday', 'AdminController@updateHoliday');

Route::get('manage-othertag', 'AdminController@manage_othertag');

Route::post('searchOther', 'AdminController@searchOther');

Route::post('saveOther', 'AdminController@saveOther');

Route::post('deleteOther', 'AdminController@deleteOther');

Route::post('updateOther', 'AdminController@updateOther');

Route::get('manage-category', 'AdminController@manage_category');

Route::post('tour/getTourPackage', 'FilterController@getTourPackage');

Route::post('getTourPackage', 'FilterController@getTourPackage');

Route::get('about', 'AboutController@about_us');

Route::get('tour-confirm/{tour_pakage_id}/{tour_period_id}', 'TourController@tour_confirm');

Route::get('contact', 'ContactController@contact_us');

Route::get('hothits', 'HothitsController@hot_hits');

Route::get('tourhit', 'HothitsController@tour_hit');

Route::get('logout', 'LoginController@logout');

Route::get('manage-front-country', 'ManageFrontController@manage_front_country');

Route::post('searchAllCountry', 'ManageFrontController@searchAllCountry');

Route::post('searchTourCountry', 'ManageFrontController@searchTourCountry');

Route::post('saveTourCountry', 'ManageFrontController@saveTourCountry');

Route::post('deleteTourCountry', 'ManageFrontController@deleteTourCountry');

Route::post('updateTourCountry', 'ManageFrontController@updateTourCountry');

Route::get('admin', 'AdminLoginController@login_admin');

Route::get('loading', 'LoadingScreenController@loading_screen');

Route::get('profile', 'ManageFrontController@profile');

Route::post('searchCompanyByCompanyCode', 'ManageFrontController@searchCompanyByCompanyCode');

Route::post('orders', 'TourController@orders');

Route::get('manage-tourlist', 'AdminController@manage_tourlist');

Route::get('manage-edit-tourlist', 'AdminController@manage_edit_tourlist');

Route::post('searchAllTourCountry', 'AdminController@searchAllTourCountry');

Route::post('searchAllTourCategory', 'AdminController@searchAllTourCategory');

Route::post('saveTourlistAndDay', 'AdminController@saveTourlistAndDay');

Route::post('updateTourlistAndDay', 'AdminController@updateTourlistAndDay');

Route::post('searchAllCategory', 'AdminController@searchAllCategory');

Route::post('searchAllHoliday', 'AdminController@searchAllHoliday');

Route::get('order-list', 'DashboardController@order_list');

Route::post('searchAllAttraction', 'AdminController@searchAllAttraction');

Route::post('searchAllTag', 'AdminController@searchAllTag');

Route::post('searchAllAirline', 'AdminController@searchAllAirline');

Route::post('searchAllRoute', 'AdminController@searchAllRoute');

Route::get('tour-detail2', 'TourDetailController@tour_detail2');

Route::post('order_action', 'DashboardController@order_action');

Route::post('getOrderDetailList', 'DashboardController@getOrderDetailList');
// for redirect to facebook auth.
Route::get('auth/login/facebook', 'LoginController@facebookAuthRedirect');
// facebook call back after login success.
Route::get('auth/login/facebook/index', 'LoginController@facebookSuccess');

Route::get('tour-package-list', 'AdminController@tour_package_list');

Route::get('/download_pdf/{tour_pakage_id}', 'TourController@getDownload');

Route::get('tour-package-list', 'AdminController@tour_package_list');

Route::get('manage-front-category', 'ManageFrontController@manage_front_category');

Route::post('searchTourCategory', 'ManageFrontController@searchTourCategory');

Route::post('searchTourPackegeByTourCountryId', 'ManageFrontController@searchTourPackegeByTourCountryId');

Route::post('searchCategoryByCategoryType', 'ManageFrontController@searchCategoryByCategoryType');

Route::post('saveTourCategory', 'ManageFrontController@saveTourCategory');

Route::post('updateTourCategory', 'ManageFrontController@updateTourCategory');

Route::post('removeTourCategory', 'ManageFrontController@removeTourCategory');

// category manage //

Route::post('searchCategory', 'AdminController@searchCategory');

Route::post('saveCategory', 'AdminController@saveCategory');

Route::post('deleteCategory', 'AdminController@deleteCategory');

Route::post('updateCategory', 'AdminController@updateCategory');

Route::post('deleteTourPackage', 'AdminController@deleteTourPackage');

Route::get('manage-conditions', 'MasterController@manage_conditions');

Route::get('manage-conditions-action', 'MasterController@manage_conditions_action');

Route::post('getConditionsById', 'MasterController@getConditionsById');

Route::post('getConditionsList', 'MasterController@getConditionsList');

Route::post('removeConditions', 'MasterController@removeConditions');

Route::post('saveConditions', 'MasterController@saveConditions');

// Attraction Manage //

Route::get('getCountry', 'MasterController@getCountry');

Route::post('getAttractionByTourCountryId', 'AdminController@getAttractionByTourCountryId');

Route::get('status-package', 'ManageTourController@status_package');

Route::get('status-period', 'ManageTourController@status_period');

Route::post('updateTourPeriodStatus', 'ManageTourController@updateTourPeriodStatus');

Route::get('manage-front-review', 'ManageFrontController@manage_front_review');

Route::post('saveReview', 'ManageFrontController@saveReview');

Route::post('searchReview', 'ManageFrontController@searchReview');

// Article //

Route::get('article-index', 'ArticleIndexController@article_index');

Route::get('article-content', 'ArticleIndexController@article_content');

Route::get('article-manage', 'ArticleIndexController@article_manage');

Route::get('article-manage-action', 'ArticleIndexController@article_manage_action');

Route::post('searchArticle', 'ArticleIndexController@searchArticle');

Route::post('saveArticle', 'ArticleIndexController@saveArticle');

Route::post('getArticleById', 'ArticleIndexController@getArticleById');

Route::post('removeArticle', 'ArticleIndexController@removeArticle');

// Email //

Route::post('confirmOrderEmail', 'EmailController@confirmOrderEmail');