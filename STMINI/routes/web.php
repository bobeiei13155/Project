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
//พนักงาน

Route::get('/Stminishow/SearchEmployee', 'Stminishow\EmployeeController@searchEmp');

Route::get('/Stminishow/showEmployee', 'Stminishow\EmployeeController@ShowEmp');
Route::get('/Stminishow/createEmployee', 'Stminishow\EmployeeController@index');
Route::post('/Stminishow/createEmployee', 'Stminishow\EmployeeController@store');
Route::post('/Stminishow/createEmployee/f_amphures', 'Stminishow\EmployeeController@f_amphures')->name('Employee.f_amphures');
Route::post('/Stminishow/createEmployee/f_districts', 'Stminishow\EmployeeController@f_districts')->name('Employee.f_districts');
Route::post('/Stminishow/createEmployee/f_postcode', 'Stminishow\EmployeeController@f_postcode')->name('Employee.f_postcode');
Route::get('/Stminishow/editEmployee/{Id_Emp}', 'Stminishow\EmployeeController@edit');
Route::post('/Stminishow/updateEmployee/{Id_Emp}', 'Stminishow\EmployeeController@update');
Route::get('/Stminishow/deleteEmployee/{Id_Position}', 'Stminishow\EmployeeController@delete');
//ตำแหน่ง
Route::get('/Stminishow/createPosition', 'Stminishow\PositionController@index');
Route::post('/Stminishow/createPosition', 'Stminishow\PositionController@store');
Route::get('/Stminishow/editPosition/{Id_Position}', 'Stminishow\PositionController@edit');
Route::post('/Stminishow/updatePosition/{Id_Position}', 'Stminishow\PositionController@update');
Route::get('/Stminishow/deletePosition/{Id_Position}', 'Stminishow\PositionController@delete');

//ลูกค้า
Route::get('/Stminishow/showMember', 'Stminishow\MemberController@ShowMem');
Route::get('/Stminishow/createMember', 'Stminishow\MemberController@index');
Route::post('/Stminishow/createMember', 'Stminishow\MemberController@store');
Route::post('/Stminishow/createMember/f_amphures', 'Stminishow\MemberController@f_amphures')->name('Member.f_amphures');
Route::post('/Stminishow/createMember/f_districts', 'Stminishow\MemberController@f_districts')->name('Member.f_districts');
Route::post('/Stminishow/createMember/f_postcode', 'Stminishow\MemberController@f_postcode')->name('Member.f_postcode');



//ประเภทสินค้า
Route::get('/Stminishow/createCategory', 'Stminishow\CategoryController@index');
Route::post('/Stminishow/createCategory', 'Stminishow\CategoryController@store');
Route::get('/Stminishow/editCategory/{Id_Category}', 'Stminishow\CategoryController@edit');
Route::post('/Stminishow/updateCategory/{Id_Category}', 'Stminishow\CategoryController@update');
Route::get('/Stminishow/deleteCategory/{Id_Category}', 'Stminishow\CategoryController@delete');

//รุ่นรถ
Route::get('/Stminishow/createCarmodel', 'Stminishow\CarmodelController@index');
Route::post('/Stminishow/createCarmodel', 'Stminishow\CarmodelController@store');
Route::get('/Stminishow/editCarmodel/{Id_Carmodel}', 'Stminishow\CarmodelController@edit');
Route::post('/Stminishow/updateCarmodel/{Id_Carmodel}', 'Stminishow\CarmodelController@update');
Route::get('/Stminishow/deleteCarmodel/{Id_Carmodel}', 'Stminishow\CarmodelController@delete');
//สี
Route::get('/Stminishow/createColor', 'Stminishow\ColorController@index');
Route::post('/Stminishow/createColor', 'Stminishow\ColorController@store');
Route::get('/Stminishow/editColor/{Id_Color}', 'Stminishow\ColorController@edit');
Route::post('/Stminishow/updateColor/{Id_Color}', 'Stminishow\ColorController@update');
Route::get('/Stminishow/deleteColor/{Id_Color}', 'Stminishow\ColorController@delete');
