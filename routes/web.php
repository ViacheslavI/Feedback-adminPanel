<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes([
    'reset'=>false,
    'confirm'=>false,
    'verify'=>false
]);
Route::get('/','AuthController@index')->name('index');

Route::middleware('guest')->group(function() {

   Route::get('/signup', 'AuthController@getSignup')->name('auth.signup');
    Route::post('/signup', 'AuthController@postSignup');


    Route::get('/signin', 'AuthController@getSignin')->name('auth.signin');
    Route::post('/signin', 'AuthController@postSignin');

});
# For authorized users only
Route::middleware('auth')->group(function(){
    Route::middleware('is_admin')->group(function(){
        # Home page
        Route::get('/feedbacks', 'FeedbackController@index')->name('feedbacks');
            Route::get('/feedbacks/UserMessage/{id}','UserFeedbackController@index')->name('user.message');
        Route::post('/feedbacks/UserMessage/{id}/view', 'UserFeedbackController@view')->name('feedback.view');
        Route::post('/feedback/UserMessage/{id}/remove', 'UserFeedbackController@destroy')->name('feedback.destroy');
    });
    Route::middleware('can_send')->group(function() {
        Route::get('/UserFeedback', 'UserFeedbackController@feedbackforms')->name('user.feedback');

        Route::post('/Feedback/send', 'FeedbackController@store')->name('feedback.store');
    });

    Route::get('/signout', 'AuthController@getSignout')->name('get-logout');
});

