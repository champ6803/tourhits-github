<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

/**
 * Description of Employee
 *
 * @author Champ
 */
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Tour_Country;

class Country_Article extends Model {

    protected $table = 'country_article';

    public function getCountryArticleAll() {
        try {
            $countryArticleList = Country_Article::join('tour_country', 'tour_country.tour_country_id', '=', 'country_article.tour_country_id')->get();
            return $countryArticleList;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getCountryArticleByID($country_article_id) {
        try {
            $countryArticleDetailList = Country_Article::where('country_article_id', '=', $country_article_id)->get();
            return $countryArticleDetailList;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function insertCountryArticle($country_article_name, $country_article_detail, $tour_country_id) {
        try {
            DB::transaction(function ()use($country_article_name, $country_article_detail, $tour_country_id) {
                $date = \Carbon\Carbon::now();
                $id_max = DB::table('country_article')->max('country_article_id');
                $country_article_id = Country_Article::insertGetId(
                                ['tour_country_id' => $tour_country_id
                                    , 'country_article_name' => $country_article_name
                                    , 'country_article_detail' => $country_article_detail
                                    , 'created_by' => 'admin'
                                    , 'updated_by' => 'admin'
                                ]
                );
            });
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function updateCountryArticle($country_article_id, $country_article_name, $country_article_detail, $tour_country_id) {
        try {
            $date = \Carbon\Carbon::now();
            $id_max = DB::table('country_article')->max('country_article_id');
            Country_Article::where('country_article_id', $country_article_id)
                    ->update([
                        'tour_country_id' => $tour_country_id,
                        'country_article_name' => $country_article_name,
                        'country_article_detail' => $country_article_detail,
                        'updated_by' => 'admin'
            ]);
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function removeCountryArticle($id) {
        try {
            Country_Article::where('country_article_id', $id)->delete();
        } catch (Exception $ex) {
            return $ex;
        }
    }

}
