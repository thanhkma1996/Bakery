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

Route::get('index', [
    'as' => 'trang-chu',
    'uses'=>'PageController@getIndex'
]);

Route::get('product-type/{type}', [
    'as' => 'loaisanpham',
    'uses'=>'PageController@getProductType'
]);

Route::get('product-detail/{id}', [
    'as' => 'product-detail',
    'uses'=>'PageController@ProductDetail'
]);

Route::get('contacts', [
    'as' => 'lien-he',
    'uses'=>'PageController@contacts'
]);

Route::get('about', [
    'as' => 'gioi-thieu',
    'uses'=>'PageController@About'
]);

Route::get('add-to-cart/{id}',[
    'as' => "themgiohang",
    'uses'=>'PageController@getAddtoCart'
]);

Route::get('delete-cart/{id}',[
    'as' => 'xoagiohang',
    'uses' => 'PageController@getDeletetoCart'
]);

Route::get('check-out', [
    'as' => 'dathang',
    'uses'=>'PageController@getCheckout'
]);

Route::post('check-out', [
    'as' => 'dathang',
    'uses'=>'PageController@postCheckout'
]);

Route::get('register', [
    'as' => 'dangki',
    'uses'=>'PageController@getRegister'
]);

Route::get('login', [
    'as' => 'dangnhap',
    'uses'=>'PageController@getLogin'
]);

Route::post('register', [
    'as' => 'dangki',
    'uses'=>'PageController@postRegister'
]);

Route::post('login', [
    'as' => 'dangnhap',
    'uses'=>'PageController@postLogin'
]);

Route::get('logout', [
    'as' => 'dangxuat',
    'uses'=>'PageController@getLogout'
]);

Route::get('search', [
    'as' => 'tim-kiem',
    'uses'=>'PageController@getSearch'
]);

