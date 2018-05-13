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

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home','HomeController@index');

Route::get('/add','HomeController@add');

Route::post('/add','EmpController@addEmp');

Route::get('/delete/{iduser}/{idemp}','EmpController@destroy');


Route::get('/update/{idemployee}', 'EmpController@update');

Route::post('/update/{iduser}/{idemployee}', 'EmpController@edit');

