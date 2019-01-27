<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use Illuminate\Support\Facades\Input as Input;
/**
 * Description of Employee
 *
 * @author Champ
 */
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class Article_Detail extends Model {

    protected $table = 'article_detail';

    public function getArticleDetailByArticleID($article_id) {
        try {
            $articleDetailList = Article_Detail::join('article', 'article.article_id', '=', 'article_detail.article_id')
                            ->where('article_detail.article_id', '=', $article_id)->get();
            return $articleDetailList;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getArticleDetailAll() {
        try {
            $articleDetailList = Article_Detail::join('article', 'article.article_id', '=', 'article_detail.article_id')->get();
            return $articleDetailList;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function insertArticle($article_title, $article_detail_name, $article_image) {
        try {
            DB::transaction(function ()use($article_title, $article_detail_name, $article_image) {
                $date = \Carbon\Carbon::now();
                $id_max = DB::table('article')->max('article_id');
                $article_id = Article::insertGetId(
                                ['article_title' => $article_title
                                    , 'article_image' => ($id_max + 1) . "-" . $article_image
                                    , 'created_by' => 'admin'
                                    , 'updated_by' => 'admin'
                                ]
                );

                if (Input::hasFile('image')) {
                    $file = Input::file('image');
                    $file->move('images/article-img', ($id_max + 1) . "-" . $file->getClientOriginalName());
                }

                if ($article_id != 0) {
                    Article_Detail::insert([
                        'article_id' => $article_id,
                        'article_detail_name' => $article_detail_name,
                        'created_by' => 'admin',
                        'updated_by' => 'admin'
                    ]);
                }
            });
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function updateArticle($article_id, $article_title, $article_detail_name, $article_image) {
        try {
            $date = \Carbon\Carbon::now();
            $id_max = DB::table('article')->max('article_id');
            if ($article_image != "" && $article_image != null) {
                Article::where('article_id', $article_id)
                        ->update(
                                ['article_title' => $article_title
                                    , 'article_image' => ($id_max + 1) . "-" . $article_image
                                    , 'updated_by' => 'admin'
                                    , 'updated_at' => $date]
                );

                Article_Detail::where('article_id', $article_id)
                        ->update(
                                ['article_detail_name' => $article_detail_name
                                    , 'updated_by' => 'admin'
                                    , 'updated_at' => $date]
                );

                if (Input::hasFile('image')) {
                    $file = Input::file('image');
                    $file->move('images/article-img', ($id_max + 1) . "-" . $file->getClientOriginalName());
                }
            } else {
                Article::where('article_id', $article_id)
                        ->update([
                            'article_title' => $article_title,
                            'updated_by' => 'admin'
                ]);
                Article_Detail::where('article_id', $article_id)
                        ->update(
                                ['article_detail_name' => $article_detail_name
                                    , 'updated_by' => 'admin']
                );
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function removeArticle($id) {
        try {
            Article::where('article_id', $id)->delete();
            Article_Detail::where('article_id', $id)->delete();
        } catch (Exception $ex) {
            return $ex;
        }
    }

}
