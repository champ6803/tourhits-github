<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

/**
 * Description of ArticleIndexController
 *
 * @author green
 */
class ArticleIndexController extends Controller{
    
     public function article_index() {
        return view('article.article-index');
    }
}
