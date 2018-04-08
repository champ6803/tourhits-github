<!DOCTYPE html>
@extends('layout.main')
@section('page_title','เกี่ยวกับเรา')
@section('main-content')   
<style>
    
.tabs .ui-tabs-nav li.ui-tabs-active .ui-tabs-anchor {
    color: #EC2424;
    border-bottom-color: #EC2424; }

.hero-section {
    height: 300px;
}
    
    
</style>

    <!-- PAGE WRAP -->
    <div id="page-wrap">
        <!-- PRELOADER -->
        <div class="preloader"></div>
        <!-- END / PRELOADER -->
        
        
        <section class="hero-section">
            <div id="slider-revolution">
            <ul>
            <li data-slotamount="7" data-masterspeed="500" data-title="Slide title 1">
                <img src="images/head/aboutus.png" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">
            </li>
            
            </ul>
            </div>
        </section>    
        
        
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 tabs-aboutpage">
                        <div class="product-tabs tabs">
                            <ul>
                                <li>
                                    <a href="#tabs-1">About Us</a>
                                </li>
                                <li>
                                    <a href="#tabs-2">ใบอนุญาต</a>
                                </li>
                                <li>
                                    <a href="#tabs-3">วิสัยทัศน์</a>
                                </li>
                            </ul>
                        
                        <div class="product-tabs__content">
                                <div id="tabs-1">
                                    <div class="trip-schedule-accordion accordion">
                                        
                                            About Us

                                        
                                              
                                                
                                                                                  
                                        
                                    </div>
                                </div>

                                <div id="tabs-2">
                                    <table class="good-to-know-table">
                                        <tbody>
                                            <tr>
                                                <th>
                                                    <p>Check in</p>
                                                </th>
                                                <td>
                                                    <p>From 15:00 hours</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <p>Check out</p>
                                                </th>
                                                <td>
                                                    <p>Until 11:00 hours</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <p>Cancellation / prepayment</p>
                                                </th>
                                                <td>
                                                    <p>Cancellation and prepayment policies vary according to room type. Please check the room conditions when selecting your room above.</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <p>Children and extra beds</p>
                                                </th>
                                                <td>
                                                    <p>The maximum number of children’s cots/cribs in a room is 1.</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <p>Internet</p>
                                                </th>
                                                <td>
                                                    <p>free! WiFi is available in all areas and is free of charge.</p>
                                                    <p><span class="light">Free</span>children under 2 years stay free of charge when using existing beds.</p>
                                                    <p><span class="light">Free</span>children under 2 years stay free of charge when using existing beds.</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <p>Pets</p>
                                                </th>
                                                <td>
                                                    <p>Pets are allowed. Charges may be applicable.</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <p>Groups</p>
                                                </th>
                                                <td>
                                                    <p>When booking for more than 11 persons, different policies and additional supplements may apply.</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <p>Accepted cards for payment</p>
                                                </th>
                                                <td>
                                                    <p><img src="images/paypal2.png" alt=""></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="tabs-3">
                                    <div id="reviews">
                                        <div class="rating-info">
                                            <div class="average-rating-review good">
                                                <span class="count">7.5</span>
                                                <em>Average rating</em>
                                                <span>Good</span>
                                            </div>
                                            <ul class="rating-review">
                                                <li>
                                                    <em>Facility</em>
                                                    <span>7.5</span>
                                                </li>
                                                <li>
                                                    <em>Human</em>
                                                    <span>9.0</span>
                                                </li>
                                                <li>
                                                    <em>Service</em>
                                                    <span>9.5</span>
                                                </li>
                                                <li>
                                                    <em>Interesting</em>
                                                    <span>8.7</span>
                                                </li>
                                            </ul>
                                            <a href="#" class="write-review">Write a review</a>
                                        </div>
                                        <div id="add_review">
                                            <h3 class="comment-reply-title">Add a review</h3>
                                            <form>
                                                <div class="comment-form-author">
                                                    <label for="author">Name <span class="required">*</span></label>
                                                    <input id="author" type="text">
                                                </div>
                                                <div class="comment-form-email">
                                                    <label for="email">Email <span class="required">*</span></label>
                                                    <input id="email" type="text">
                                                </div>
                                                <div class="comment-form-rating">
                                                    <h4>Your Rating</h4>
                                                    <div class="comment-form-rating__content">
                                                        <div class="item facility">
                                                            <label>Facility</label>
                                                            <select class="awe-select">
                                                                <option>5.0</option>
                                                                <option>6.5</option>
                                                                <option>7.5</option>
                                                                <option>8.5</option>
                                                                <option>9.0</option>
                                                                <option>10</option>
                                                            </select>
                                                        </div>
                                                        <div class="item human">
                                                            <label>Human</label>
                                                            <select class="awe-select">
                                                                <option>5.0</option>
                                                                <option>6.5</option>
                                                                <option>7.5</option>
                                                                <option>8.5</option>
                                                                <option>9.0</option>
                                                                <option>10</option>
                                                            </select>
                                                        </div>
                                                        <div class="item service">
                                                            <label>Service</label>
                                                            <select class="awe-select">
                                                                <option>5.0</option>
                                                                <option>6.5</option>
                                                                <option>7.5</option>
                                                                <option>8.5</option>
                                                                <option>9.0</option>
                                                                <option>10</option>
                                                            </select>
                                                        </div>
                                                        <div class="item interesting">
                                                            <label>Interesting</label>
                                                            <select class="awe-select">
                                                                <option>5.0</option>
                                                                <option>6.5</option>
                                                                <option>7.5</option>
                                                                <option>8.5</option>
                                                                <option>9.0</option>
                                                                <option>10</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="comment-form-comment">
                                                    <label for="comment">Your Review</label>
                                                    <textarea id="comment"></textarea>
                                                </div>
                                                <div class="form-submit">
                                                    <input type="submit" class="submit" value="Submit">
                                                </div>
                                            </form>
                                        </div>
                                        <div id="comments">
                                            <ol class="commentlist">
                                                <li>
                                                    <div class="comment-box">
                                                        <div class="avatar">
                                                            <img src="images/img/demo-thumb.jpg" alt="">
                                                        </div>
                                                        <div class="comment-body">
                                                            <p class="meta">
                                                                <strong>Nguyen Gallahendahry</strong>
                                                                <span class="time">December 10, 2012</span>
                                                            </p>
                                                            <div class="description">
                                                                <p>Takes me back to my youth. I love the design of this soda machine. A bit pricy though..!</p>
                                                            </div>

                                                            <div class="rating-info">
                                                                <div class="average-rating-review good">
                                                                    <span class="count">7.5</span>
                                                                    <em>Average rating</em>
                                                                    <span>Good</span>
                                                                </div>
                                                                <ul class="rating-review">
                                                                    <li>
                                                                        <em>Facility</em>
                                                                        <span>7.5</span>
                                                                    </li>
                                                                    <li>
                                                                        <em>Human</em>
                                                                        <span>9.0</span>
                                                                    </li>
                                                                    <li>
                                                                        <em>Service</em>
                                                                        <span>9.5</span>
                                                                    </li>
                                                                    <li>
                                                                        <em>Interesting</em>
                                                                        <span>8.7</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="comment-box">
                                                        <div class="avatar">
                                                            <img src="images/img/demo-thumb.jpg" alt="">
                                                        </div>
                                                        <div class="comment-body">
                                                            <p class="meta">
                                                                <strong>James Bond not 007</strong>
                                                                <span class="time">December 10, 2012</span>
                                                            </p>
                                                            <div class="description">
                                                                <p>Takes me back to my youth. I love the design of this soda machine. A bit pricy though..!</p>
                                                            </div>

                                                            <div class="rating-info">
                                                                <div class="average-rating-review good">
                                                                    <span class="count">7.5</span>
                                                                    <em>Average rating</em>
                                                                    <span>Good</span>
                                                                </div>
                                                                <ul class="rating-review">
                                                                    <li>
                                                                        <em>Facility</em>
                                                                        <span>7.5</span>
                                                                    </li>
                                                                    <li>
                                                                        <em>Human</em>
                                                                        <span>9.0</span>
                                                                    </li>
                                                                    <li>
                                                                        <em>Service</em>
                                                                        <span>9.5</span>
                                                                    </li>
                                                                    <li>
                                                                        <em>Interesting</em>
                                                                        <span>8.7</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="comment-box">
                                                        <div class="avatar">
                                                            <img src="images/img/demo-thumb.jpg" alt="">
                                                        </div>
                                                        <div class="comment-body">
                                                            <p class="meta">
                                                                <strong>Bratt not Pitt</strong>
                                                                <span class="time">December 10, 2012</span>
                                                            </p>
                                                            <div class="description">
                                                                <p>Takes me back to my youth. I love the design of this soda machine. A bit pricy though..!</p>
                                                            </div>

                                                            <div class="rating-info">
                                                                <div class="average-rating-review fine">
                                                                    <span class="count">5.0</span>
                                                                    <em>Average rating</em>
                                                                    <span>Fine</span>
                                                                </div>
                                                                <ul class="rating-review">
                                                                    <li>
                                                                        <em>Facility</em>
                                                                        <span>7.5</span>
                                                                    </li>
                                                                    <li>
                                                                        <em>Human</em>
                                                                        <span>9.0</span>
                                                                    </li>
                                                                    <li>
                                                                        <em>Service</em>
                                                                        <span>9.5</span>
                                                                    </li>
                                                                    <li>
                                                                        <em>Interesting</em>
                                                                        <span>8.7</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
                        </div>    

                </div>            
        </section>
            


@stop