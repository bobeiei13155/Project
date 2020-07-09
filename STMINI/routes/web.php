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
Route::get('/Stminishow/createEmployee','Stminishow\EmployeeController@index');
Route::get('/Stminishow/createPosition','Stminishow\PositionController@index');
Route::post('/Stminishow/createPosition','Stminishow\PositionController@store');
Route::get('/Stminishow/editPosition/{Id_Position}','Stminishow\PositionController@edit');
Route::post('/Stminishow/updatePosition/{Id_Position}','Stminishow\PositionController@update');