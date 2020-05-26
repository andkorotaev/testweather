<?php

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

Auth::routes();

Route::get('/feedback', 'CreateFeedbackController@index')->name('feedback');
Route::post('/feedback/create', 'CreateFeedbackController@create')->name('feedback.create');

Route::middleware('auth')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/feedback-list', 'ListFeedbackController@index')->name('feedback.list');
});
