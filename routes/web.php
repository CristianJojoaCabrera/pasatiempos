<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/register', 'HomeController@register_user')->name('register_user');
Route::get('/usuarios_tbl', 'HomeController@usuarios_tbl')->name('usuarios_tbl');
Route::post('/edit_user', 'HomeController@edit_user')->name('edit_user');
Route::post('/register_hobby', 'HomeController@register_hobby')->name('register_hobby');
Route::get('/usuarios_hobbies_tbl/{userId?}', 'HomeController@usuarios_hobbies_tbl')->name('usuarios_hobbies_tbl');
Route::post('/edit_user_hobby', 'HomeController@edit_user_hobby')->name('edit_user_hobby');
Route::post('/delete_user_hobby', 'HomeController@delete_user_hobby')->name('delete_user_hobby');

