<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return 'GET hello dude!';
});

Route::group(['prefix' => 'api/1'], function () {

//User Account routes
Route::post('users/register', 'TokenAuthController@register');
Route::post('users/login', 'TokenAuthController@authenticate');
Route::get('users/me', 'TokenAuthController@getAuthenticatedUser');
Route::get('users/{user_id}', 'TokenAuthController@getUserProfile');
Route::post('users/reset_password','TokenAuthController@resetPasswordRequest');
Route::post('users/reset_password/code','TokenAuthController@resetPassword');

//College Activity News Feed
//get college activity feed
Route::get('feed','NewsFeedController@getNewsFeed');

//post on college activity feed
Route::post('feed',function() {});

//Get College activity feed item details
Route::get('feed/{post_id}',function($post_id) {});

//Like college activity feed item
Route::post('feed/{post_id}/likes',function($post_id) {});

//Get College activity feed item details
Route::delete('feed/{post_id}/likes/{like_id}',function($post_id,$like_id) {});

//Get comments activity feed item
Route::get('feed/{post_id}/comments',function($post_id) {});

//post comment on activity feed item
Route::post('feed/{post_id}/comments',function($post_id) {});

//delete comment on activity feed item
Route::delete('feed/{post_id}/comments/{comment_id}',function($post_id,$comment_id) {});


    //Get College activity feed
    Route::get('anonymousfeed',function() {

    });

    //post on college activity feed
    Route::post('anonymousfeed',function() {

    });

    //Get College activity feed item details
    Route::get('anonymousfeed/{post_id}',function($post_id) {

    });

    //Like college activity feed item
    Route::post('anonymousfeed/{post_id}/vote',function($post_id) {

    });

    //Get College activity feed item details
    Route::delete('anonymousfeed/{post_id}/vote/{vote_id}',function($post_id,$vote_id) {

    });

    //Get comments activity feed item
    Route::get('anonymousfeed/{post_id}/comments',function($post_id) {});

    //post comment on activity feed item
    Route::post('anonymousfeed/{post_id}/comments',function($post_id) {});

    //delete comment on activity feed item
    Route::delete('anonymousfeed/{post_id}/comments/{comment_id}',function($post_id,$comment_id) {});

    //vote on anonymous feed item comment
    Route::post('anonymousfeed/{post_id}/comments/{comment_id}/vote',function($post_id,$comment_id) {});

    //delete comment on anonymous feed item
    Route::delete('anonymousfeed/{post_id}/comments/{comment_id}/vote/{vote_id}',function($post_id,$comment_id,$vote_id) {});
});