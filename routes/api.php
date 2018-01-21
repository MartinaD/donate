<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout');
Route::post('ask-question', 'QuestionController@store');
Route::post('more-campaigns', 'CampaignController@getMoreCamp');
Route::resource('campaigns', 'CampaignController');

Route::resource('posts', 'PostController');
Route::resource('donations', 'DonationController');
Route::resource('categories', 'CategoryController');