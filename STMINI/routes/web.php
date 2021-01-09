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
//ล็อคอิน


Route::get('/logout', 'Stminishow\LoginController@logout');
Route::get('/login', 'Stminishow\LoginController@index');
Route::post('/login', 'Stminishow\LoginController@login');
Route::get('/Stminishow/indexform', 'Stminishow\LoginController@indexform');
//พนักงาน

Route::get('/Stminishow/SearchEmployee', 'Stminishow\EmployeeController@searchEmp'); //ทำสิทธิ์แล้ว
Route::get('/Stminishow/showEmployee', 'Stminishow\EmployeeController@ShowEmp'); //ทำสิทธิ์แล้ว
Route::get('/Stminishow/createEmployee', 'Stminishow\EmployeeController@index'); //ทำสิทธิ์แล้ว
Route::post('/Stminishow/createEmployee', 'Stminishow\EmployeeController@store');
Route::post('/Stminishow/createEmployee/f_amphures', 'Stminishow\EmployeeController@f_amphures')->name('Employee.f_amphures');
Route::post('/Stminishow/createEmployee/f_districts', 'Stminishow\EmployeeController@f_districts')->name('Employee.f_districts');
Route::post('/Stminishow/createEmployee/f_postcode', 'Stminishow\EmployeeController@f_postcode')->name('Employee.f_postcode');
Route::get('/Stminishow/editEmployee/{Id_Emp}', 'Stminishow\EmployeeController@edit'); //ทำสิทธิ์แล้ว
Route::post('/Stminishow/updateEmployee/{Id_Emp}', 'Stminishow\EmployeeController@update');
Route::get('/Stminishow/deleteEmployee/{Id_Emp}', 'Stminishow\EmployeeController@delete'); //ทำสิทธิ์แล้ว
//ตำแหน่ง

Route::get('/Stminishow/SearchPOS', 'Stminishow\PositionController@searchPOS'); //ทำสิทธิ์แล้ว
Route::get('/Stminishow/showPosition', 'Stminishow\PositionController@ShowPosition'); //ทำสิทธิ์แล้ว
Route::get('/Stminishow/createPosition', 'Stminishow\PositionController@index'); //ทำสิทธิ์แล้ว
Route::post('/Stminishow/createPosition', 'Stminishow\PositionController@store');
Route::get('/Stminishow/editPosition/{Id_Position}', 'Stminishow\PositionController@edit'); //ทำสิทธิ์แล้ว
Route::post('/Stminishow/updatePosition/{Id_Position}', 'Stminishow\PositionController@update');
Route::get('/Stminishow/deletePosition/{Id_Position}', 'Stminishow\PositionController@delete'); //ทำสิทธิ์แล้ว





//บริษัทคู่ค้า
Route::get('/Stminishow/SearchPartner', 'Stminishow\PartnerController@searchPTN');
Route::get('/Stminishow/showPartner', 'Stminishow\PartnerController@ShowPTN');
Route::get('/Stminishow/createPartner', 'Stminishow\PartnerController@index');
Route::post('/Stminishow/createPartner', 'Stminishow\PartnerController@store');
Route::post('/Stminishow/createPartner/f_amphures', 'Stminishow\PartnerController@f_amphures')->name('Partner.f_amphures');
Route::post('/Stminishow/createPartner/f_districts', 'Stminishow\PartnerController@f_districts')->name('Partner.f_districts');
Route::post('/Stminishow/createPartner/f_postcode', 'Stminishow\PartnerController@f_postcode')->name('Partner.f_postcode');
Route::get('/Stminishow/editPartner/{Id_Partner}', 'Stminishow\PartnerController@edit');
Route::post('/Stminishow/updatePartner/{Id_Partner}', 'Stminishow\PartnerController@update');
Route::get('/Stminishow/deletePartner/{Id_Partner}', 'Stminishow\PartnerController@delete');


//ประเภทลูกค้า
Route::get('/Stminishow/SearchCategorymember', 'Stminishow\CategorymemberController@searchCMB'); //ทำสิทธิ์แล้ว
Route::get('/Stminishow/createCategorymember', 'Stminishow\CategorymemberController@index'); //ทำสิทธิ์แล้ว
Route::post('/Stminishow/createCategorymember', 'Stminishow\CategorymemberController@store');
Route::get('/Stminishow/editCategorymember/{Id_Cmember}', 'Stminishow\CategorymemberController@edit'); //ทำสิทธิ์แล้ว
Route::post('/Stminishow/updateCategorymember/{Id_Cmember}', 'Stminishow\CategorymemberController@update');
Route::get('/Stminishow/deleteCategorymember/{Id_Cmember}', 'Stminishow\CategorymemberController@delete'); //ทำสิทธิ์แล้ว


//ลูกค้า
Route::get('/Stminishow/SearchMember', 'Stminishow\MemberController@searchMEM'); //ทำสิทธิ์แล้ว
Route::get('/Stminishow/showMember', 'Stminishow\MemberController@ShowMem'); //ทำสิทธิ์แล้ว
Route::get('/Stminishow/createMember', 'Stminishow\MemberController@index'); //ทำสิทธิ์แล้ว
Route::post('/Stminishow/createMember', 'Stminishow\MemberController@store');
Route::post('/Stminishow/createMember/f_amphures', 'Stminishow\MemberController@f_amphures')->name('Member.f_amphures');
Route::post('/Stminishow/createMember/f_districts', 'Stminishow\MemberController@f_districts')->name('Member.f_districts');
Route::post('/Stminishow/createMember/f_postcode', 'Stminishow\MemberController@f_postcode')->name('Member.f_postcode');
Route::get('/Stminishow/editMember/{Id_Member}', 'Stminishow\MemberController@edit'); //ทำสิทธิ์แล้ว
Route::post('/Stminishow/updateMember/{Id_Member}', 'Stminishow\MemberController@update');
Route::get('/Stminishow/deleteMember/{Id_Member}', 'Stminishow\MemberController@delete'); //ทำสิทธิ์แล้ว
//ลบ





//ประเภทสินค้า
Route::get('/Stminishow/SearchCategory', 'Stminishow\CategoryController@searchCRP'); //ทำสิทธิ์แล้ว
Route::get('/Stminishow/createCategory', 'Stminishow\CategoryController@index'); //ทำสิทธิ์แล้ว
Route::post('/Stminishow/createCategory', 'Stminishow\CategoryController@store');
Route::get('/Stminishow/editCategory/{Id_Category}', 'Stminishow\CategoryController@edit'); //ทำสิทธิ์แล้ว
Route::post('/Stminishow/updateCategory/{Id_Category}', 'Stminishow\CategoryController@update');
Route::get('/Stminishow/deleteCategory/{Id_Category}', 'Stminishow\CategoryController@delete'); //ทำสิทธิ์แล้ว

//รุ่นรถ
Route::get('/Stminishow/SearchCarmodel', 'Stminishow\CarmodelController@searchCMD'); //ทำสิทธิ์แล้ว
Route::get('/Stminishow/createCarmodel', 'Stminishow\CarmodelController@index'); //ทำสิทธิ์แล้ว
Route::post('/Stminishow/createCarmodel', 'Stminishow\CarmodelController@store');
Route::get('/Stminishow/editCarmodel/{Id_Carmodel}', 'Stminishow\CarmodelController@edit'); //ทำสิทธิ์แล้ว
Route::post('/Stminishow/updateCarmodel/{Id_Carmodel}', 'Stminishow\CarmodelController@update');
Route::get('/Stminishow/deleteCarmodel/{Id_Carmodel}', 'Stminishow\CarmodelController@delete'); //ทำสิทธิ์แล้ว
//สี
Route::get('/Stminishow/SearchColor', 'Stminishow\ColorController@searchCLR'); //ทำสิทธิ์แล้ว
Route::get('/Stminishow/createColor', 'Stminishow\ColorController@index'); //ทำสิทธิ์แล้ว
Route::post('/Stminishow/createColor', 'Stminishow\ColorController@store');
Route::get('/Stminishow/editColor/{Id_Color}', 'Stminishow\ColorController@edit'); //ทำสิทธิ์แล้ว
Route::post('/Stminishow/updateColor/{Id_Color}', 'Stminishow\ColorController@update');
Route::get('/Stminishow/deleteColor/{Id_Color}', 'Stminishow\ColorController@delete'); //ทำสิทธิ์แล้ว


//ยี่ห้อ
Route::get('/Stminishow/SearchBrand', 'Stminishow\BrandController@searchBND'); //ทำสิทธิ์แล้ว
Route::get('/Stminishow/createBrand', 'Stminishow\BrandController@index'); //ทำสิทธิ์แล้ว
Route::post('/Stminishow/createBrand', 'Stminishow\BrandController@store');
Route::get('/Stminishow/editBrand/{Id_Brand}', 'Stminishow\BrandController@edit'); //ทำสิทธิ์แล้ว
Route::post('/Stminishow/updateBrand/{Id_Brand}', 'Stminishow\BrandController@update');
Route::get('/Stminishow/deleteBrand/{Id_Brand}', 'Stminishow\BrandController@delete'); //ทำสิทธิ์แล้ว

//Gen
Route::get('/Stminishow/SearchGen', 'Stminishow\GenController@searchGEN'); //ทำสิทธิ์แล้ว
Route::get('/Stminishow/createGen', 'Stminishow\GenController@index'); //ทำสิทธิ์แล้ว
Route::post('/Stminishow/createGen', 'Stminishow\GenController@store');
Route::get('/Stminishow/editGen/{Id_Gen}', 'Stminishow\GenController@edit'); //ทำสิทธิ์แล้ว
Route::post('/Stminishow/updateGen/{Id_Gen}', 'Stminishow\GenController@update');
Route::get('/Stminishow/deleteGen/{Id_Gen}', 'Stminishow\GenController@delete'); //ทำสิทธิ์แล้ว

//ลาย
Route::get('/Stminishow/SearchPTN', 'Stminishow\PatternController@searchPTN'); //ทำสิทธิ์แล้ว
Route::get('/Stminishow/createPattern', 'Stminishow\PatternController@index'); //ทำสิทธิ์แล้ว
Route::post('/Stminishow/createPattern', 'Stminishow\PatternController@store');
Route::get('/Stminishow/editPattern/{Id_Pattern}', 'Stminishow\PatternController@edit'); //ทำสิทธิ์แล้ว
Route::post('/Stminishow/updatePattern/{Id_Pattern}', 'Stminishow\PatternController@update');
Route::get('/Stminishow/deletePattern/{Id_Pattern}', 'Stminishow\PatternController@delete'); //ทำสิทธิ์แล้ว

//สินค้า
Route::get('/Stminishow/SearchPRO', 'Stminishow\ProductController@searchPRO'); //ทำสิทธิ์แล้ว
Route::get('/Stminishow/ShowProduct', 'Stminishow\ProductController@ShowProduct'); //ทำสิทธิ์แล้ว
Route::get('/Stminishow/createProduct', 'Stminishow\ProductController@index'); //ทำสิทธิ์แล้ว
Route::post('/Stminishow/createProduct', 'Stminishow\ProductController@store');
Route::get('/Stminishow/editProduct/{Id_Product}', 'Stminishow\ProductController@edit'); //ทำสิทธิ์แล้ว
Route::post('/Stminishow/updateProduct/{Id_Product}', 'Stminishow\ProductController@update');
Route::get('/Stminishow/deleteProduct/{Id_Product}', 'Stminishow\ProductController@delete'); //ทำสิทธิ์แล้ว


//สินค้าของแถม
Route::get('/Stminishow/SearchPremiumPro', 'Stminishow\PremiumProController@searchPMP'); //ทำสิทธิ์แล้ว
Route::get('/Stminishow/ShowPremiumPro', 'Stminishow\PremiumProController@ShowPremiumPro'); //ทำสิทธิ์แล้ว
Route::get('/Stminishow/createPremiumPro', 'Stminishow\PremiumProController@index'); //ทำสิทธิ์แล้ว
Route::post('/Stminishow/createPremiumPro', 'Stminishow\PremiumProController@store');
Route::get('/Stminishow/editPremiumPro/{Id_Premium_Pro}', 'Stminishow\PremiumProController@edit'); //ทำสิทธิ์แล้ว
Route::post('/Stminishow/updatePremiumPro/{Id_Premium_Pro}', 'Stminishow\PremiumProController@update');
Route::get('/Stminishow/deletePremiumPro/{Id_Premium_Pro}', 'Stminishow\PremiumProController@delete'); //ทำสิทธิ์แล้ว



//โปรโมชั้นของแถม
Route::get('/Stminishow/SearchPromotionPro', 'Stminishow\PromotionController@searchPOP'); //ทำสิทธิ์แล้ว
Route::get('/Stminishow/ShowPromotionPro', 'Stminishow\PromotionController@ShowPromotionPro');
Route::get('/Stminishow/createPromotionPro', 'Stminishow\PromotionController@indexPro');
Route::post('/Stminishow/createPromotionPro', 'Stminishow\PromotionController@createPromotionPro');
Route::get('/Stminishow/editPromotionPro/{Id_Promotion}', 'Stminishow\PromotionController@editPro'); //ทำสิทธิ์แล้ว
Route::post('/Stminishow/updatePromotionPro/{Id_Promotion}', 'Stminishow\PromotionController@updatePro');
Route::get('/Stminishow/deletePromotionPro/{Id_Promotion}', 'Stminishow\PromotionController@deletePro'); //ทำสิทธิ์แล้ว




//โปรโมชั้นยอดชำระ
Route::get('/Stminishow/SearchPromotionPay', 'Stminishow\PromotionController@searchPOM'); //ทำสิทธิ์แล้ว
Route::get('/Stminishow/ShowPromotionPay', 'Stminishow\PromotionController@ShowPromotionPay');
Route::get('/Stminishow/createPromotionPay', 'Stminishow\PromotionController@indexPay');
Route::post('/Stminishow/createPromotionPay', 'Stminishow\PromotionController@createPromotionPay');
Route::get('/Stminishow/editPromotionPay/{Id_Promotion}', 'Stminishow\PromotionController@editPay');
Route::post('/Stminishow/updatePromotionPay/{Id_Promotion}', 'Stminishow\PromotionController@updatePay');
Route::get('/Stminishow/deletePromotionPay/{Id_Premium_Pro}', 'Stminishow\PromotionController@deletePay');
