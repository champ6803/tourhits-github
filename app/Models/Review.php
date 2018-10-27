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

class Review extends Model {

    protected $table = 'review';
    
        public function getReview(){
        try {
         $reviewList = Review::first();
         return $reviewList;
        } catch (Exception $ex) {
               return $ex;
        }
    }
      public function updateReview($review_picture1,$review_picture2,$review_picture3,$review_picture4,$review_picture5
            ,$review_picture6,$review_picture7,$review_picture8,$review_picture9,$id){
          try {
            $datenow = \Carbon\Carbon::now();
            $date = \Carbon\Carbon::now()->format('d-m-Y');
            Review::where('review_id',$id)->update(
            ['review_img_1' => $date.$review_picture1
             ,'review_img_2' => $date.$review_picture2   
             ,'review_img_3' => $date.$review_picture3
             ,'review_img_4' => $date.$review_picture4
             ,'review_img_5' => $date.$review_picture5
             ,'review_img_6' => $date.$review_picture6 
             ,'review_img_7' => $date.$review_picture7
             ,'review_img_8' => $date.$review_picture8
             ,'review_img_9' => $date.$review_picture9
             , 'created_by' => 'admin'
             , 'created_at' => $datenow
             , 'updated_by' => 'admin'        
             , 'updated_at' => $datenow]
            );
            
            if(Input::hasFile('file1')){
			$file = Input::file('file1');
			$file->move('images/review/', $date.$file->getClientOriginalName());
	    }
            if(Input::hasFile('file2')){
			$file = Input::file('file2');
			$file->move('images/review/', $date.$file->getClientOriginalName());
	    }
            if(Input::hasFile('file3')){
			$file = Input::file('file3');
			$file->move('images/review/', $date.$file->getClientOriginalName());
	    }
            if(Input::hasFile('file4')){
			$file = Input::file('file4');
			$file->move('images/review/', $date.$file->getClientOriginalName());
	    }
            if(Input::hasFile('file5')){
			$file = Input::file('file5');
			$file->move('images/review/', $date.$file->getClientOriginalName());
	    }
            if(Input::hasFile('file6')){
			$file = Input::file('file6');
			$file->move('images/review/', $date.$file->getClientOriginalName());
	    }
            if(Input::hasFile('file7')){
			$file = Input::file('file7');
			$file->move('images/review/', $date.$file->getClientOriginalName());
	    }
            if(Input::hasFile('file8')){
			$file = Input::file('file8');
			$file->move('images/review/', $date.$file->getClientOriginalName());
	    }
            if(Input::hasFile('file9')){
			$file = Input::file('file9');
			$file->move('images/review/', $date.$file->getClientOriginalName());
	    }
          } catch (Exception $ex) {
               return $ex;
          }
    }
    
    public function insertReview($review_picture1,$review_picture2,$review_picture3,$review_picture4,$review_picture5
            ,$review_picture6,$review_picture7,$review_picture8,$review_picture9){
          try {
            $date = \Carbon\Carbon::now();
            Review::insert(
            ['review_img_1' => $review_picture1
             ,'review_img_2' => $review_picture2   
             ,'review_img_3' => $review_picture3
             ,'review_img_4' => $review_picture4  
             ,'review_img_5' => $review_picture5  
             ,'review_img_6' => $review_picture6  
             ,'review_img_7' => $review_picture7
             ,'review_img_8' => $review_picture8 
             ,'review_img_9' => $review_picture9 
             , 'created_by' => 'admin'
             , 'created_at' => $date
             , 'updated_by' => 'admin'        
             , 'updated_at' => $date]
            );
            
            if(Input::hasFile('file1')){
			$file = Input::file('file1');
			$file->move('images/review', $file->getClientOriginalName());
	    }
            if(Input::hasFile('file2')){
			$file = Input::file('file2');
			$file->move('images/review', $file->getClientOriginalName());
	    }
            if(Input::hasFile('file3')){
			$file = Input::file('file3');
			$file->move('images/review', $file->getClientOriginalName());
	    }
            if(Input::hasFile('file4')){
			$file = Input::file('file4');
			$file->move('images/review', $file->getClientOriginalName());
	    }
            if(Input::hasFile('file5')){
			$file = Input::file('file5');
			$file->move('images/review', $file->getClientOriginalName());
	    }
            if(Input::hasFile('file6')){
			$file = Input::file('file6');
			$file->move('images/review', $file->getClientOriginalName());
	    }
            if(Input::hasFile('file7')){
			$file = Input::file('file7');
			$file->move('images/review', $file->getClientOriginalName());
	    }
            if(Input::hasFile('file8')){
			$file = Input::file('file8');
			$file->move('images/review', $file->getClientOriginalName());
	    }
            if(Input::hasFile('file9')){
			$file = Input::file('file9');
			$file->move('images/review', $file->getClientOriginalName());
	    }
          } catch (Exception $ex) {
               return $ex;
          }
    }
    
}