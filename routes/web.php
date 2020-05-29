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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [
    'as' => 'trang-chu',
    'uses'=>'PageController@getIndex'
]);

Route::get('/product-type/{type}', [
    'as' => 'loaisanpham',
    'uses'=>'PageController@getProductType'
]);

Route::get('/product-detail', [
    'uses'=>'PageController@ProductDetail'
]);

Route::get('/contacts', [
    'as' => 'lien-he',
    'uses'=>'PageController@contacts'
]);

Route::get('/about', [
    'as' => 'gioi-thieu',
    'uses'=>'PageController@About'
]);