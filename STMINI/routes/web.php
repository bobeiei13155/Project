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

 
Route::get('logout', 'Stminishow\LoginController@logout');
Route::get('login', 'Stminishow\LoginController@index');
Route::post('login', 'Stminishow\LoginController@login');

//พนักงาน

Route::get('/Stminishow/SearchEmployee', 'Stminishow\EmployeeController@searchEmp');
Route::get('/Stminishow/indexform', 'Stminishow\EmployeeController@indexform');
Route::get('/Stminishow/showEmployee', 'Stminishow\EmployeeController@ShowEmp');
Route::get('/Stminishow/createEmployee', 'Stminishow\EmployeeController@index');
Route::post('/Stminishow/createEmployee', 'Stminishow\EmployeeController@store');
Route::post('/Stminishow/createEmployee/f_amphures', 'Stminishow\EmployeeController@f_amphures')->name('Employee.f_amphures');
Route::post('/Stminishow/createEmployee/f_districts', 'Stminishow\EmployeeController@f_districts')->name('Employee.f_districts');
Route::post('/Stminishow/createEmployee/f_postcode', 'Stminishow\EmployeeController@f_postcode')->name('Employee.f_postcode');
Route::get('/Stminishow/editEmployee/{Id_Emp}', 'Stminishow\EmployeeController@edit');
Route::post('/Stminishow/updateEmployee/{Id_Emp}', 'Stminishow\EmployeeController@update');
Route::get('/Stminishow/deleteEmployee/{Id_Emp}', 'Stminishow\EmployeeController@delete');
//ตำแหน่ง

Route::get('/Stminishow/showPosition', 'Stminishow\PositionController@ShowPosition');
Route::get('/Stminishow/createPosition', 'Stminishow\PositionController@index');
Route::post('/Stminishow/createPosition', 'Stminishow\PositionController@store');
Route::get('/Stminishow/editPosition/{Id_Position}', 'Stminishow\PositionController@edit');
Route::post('/Stminishow/updatePosition/{Id_Position}', 'Stminishow\PositionController@update');
Route::get('/Stminishow/deletePosition/{Id_Position}', 'Stminishow\PositionController@delete');





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
Route::get('/Stminishow/SearchCategorymember', 'Stminishow\CategorymemberController@searchCMB');
Route::get('/Stminishow/createCategorymember', 'Stminishow\CategorymemberController@index');
Route::post('/Stminishow/createCategorymember', 'Stminishow\CategorymemberController@store');
Route::get('/Stminishow/editCategorymember/{Id_Cmember}', 'Stminishow\CategorymemberController@edit');
Route::post('/Stminishow/updateCategorymember/{Id_Cmember}', 'Stminishow\CategorymemberController@update');
Route::get('/Stminishow/deleteCategorymember/{Id_Cmember}', 'Stminishow\CategorymemberController@delete');


//ลูกค้า
Route::get('/Stminishow/SearchMember', 'Stminishow\MemberController@searchMEM');
Route::get('/Stminishow/showMember', 'Stminishow\MemberController@ShowMem');
Route::get('/Stminishow/createMember', 'Stminishow\MemberController@index');
Route::post('/Stminishow/createMember', 'Stminishow\MemberController@store');
Route::post('/Stminishow/createMember/f_amphures', 'Stminishow\MemberController@f_amphures')->name('Member.f_amphures');
Route::post('/Stminishow/createMember/f_districts', 'Stminishow\MemberController@f_districts')->name('Member.f_districts');
Route::post('/Stminishow/createMember/f_postcode', 'Stminishow\MemberController@f_postcode')->name('Member.f_postcode');
Route::get('/Stminishow/editMember/{Id_Member}', 'Stminishow\MemberController@edit');
Route::post('/Stminishow/updateMember/{Id_Member}', 'Stminishow\MemberController@update');



//ประเภทสินค้า
Route::get('/Stminishow/SearchCategory', 'Stminishow\CategoryController@searchCRP');
Route::get('/Stminishow/createCategory', 'Stminishow\CategoryController@index');
Route::post('/Stminishow/createCategory', 'Stminishow\CategoryController@store');
Route::get('/Stminishow/editCategory/{Id_Category}', 'Stminishow\CategoryController@edit');
Route::post('/Stminishow/updateCategory/{Id_Category}', 'Stminishow\CategoryController@update');
Route::get('/Stminishow/deleteCategory/{Id_Category}', 'Stminishow\CategoryController@delete');

//รุ่นรถ
Route::get('/Stminishow/SearchCarmodel', 'Stminishow\CarmodelController@searchCMD');
Route::get('/Stminishow/createCarmodel', 'Stminishow\CarmodelController@index');
Route::post('/Stminishow/createCarmodel', 'Stminishow\CarmodelController@store');
Route::get('/Stminishow/editCarmodel/{Id_Carmodel}', 'Stminishow\CarmodelController@edit');
Route::post('/Stminishow/updateCarmodel/{Id_Carmodel}', 'Stminishow\CarmodelController@update');
Route::get('/Stminishow/deleteCarmodel/{Id_Carmodel}', 'Stminishow\CarmodelController@delete');
//สี
Route::get('/Stminishow/SearchColor', 'Stminishow\ColorController@searchCLR');
Route::get('/Stminishow/createColor', 'Stminishow\ColorController@index');
Route::post('/Stminishow/createColor', 'Stminishow\ColorController@store');
Route::get('/Stminishow/editColor/{Id_Color}', 'Stminishow\ColorController@edit');
Route::post('/Stminishow/updateColor/{Id_Color}', 'Stminishow\ColorController@update');
Route::get('/Stminishow/deleteColor/{Id_Color}', 'Stminishow\ColorController@delete');



//ยี่ห้อ
Route::get('/Stminishow/SearchBrand', 'Stminishow\BrandController@searchBND');
Route::get('/Stminishow/createBrand', 'Stminishow\BrandController@index');
Route::post('/Stminishow/createBrand', 'Stminishow\BrandController@store');
Route::get('/Stminishow/editBrand/{Id_Brand}', 'Stminishow\BrandController@edit');
Route::post('/Stminishow/updateBrand/{Id_Brand}', 'Stminishow\BrandController@update');
Route::get('/Stminishow/deleteBrand/{Id_Brand}', 'Stminishow\BrandController@delete');

//Gen
Route::get('/Stminishow/SearchGen', 'Stminishow\GenController@searchGEN');
Route::get('/Stminishow/createGen', 'Stminishow\GenController@index');
Route::post('/Stminishow/createGen', 'Stminishow\GenController@store');
Route::get('/Stminishow/editGen/{Id_Gen}', 'Stminishow\GenController@edit');
Route::post('/Stminishow/updateGen/{Id_Gen}', 'Stminishow\GenController@update');
Route::get('/Stminishow/deleteGen/{Id_Gen}', 'Stminishow\GenController@delete');

//ลาย
Route::get('/Stminishow/SearchPTN', 'Stminishow\PatternController@searchPTN');
Route::get('/Stminishow/createPattern', 'Stminishow\PatternController@index');
Route::post('/Stminishow/createPattern', 'Stminishow\PatternController@store');
Route::get('/Stminishow/editPattern/{Id_Pattern}', 'Stminishow\PatternController@edit');
Route::post('/Stminishow/updatePattern/{Id_Pattern}', 'Stminishow\PatternController@update');
Route::get('/Stminishow/deletePattern/{Id_Pattern}', 'Stminishow\PatternController@delete');

//สินค้า
Route::get('/Stminishow/SearchPRO', 'Stminishow\ProductController@searchPRO');
Route::get('/Stminishow/ShowProduct', 'Stminishow\ProductController@ShowProduct');
Route::get('/Stminishow/createProduct', 'Stminishow\ProductController@index');
Route::post('/Stminishow/createProduct', 'Stminishow\ProductController@store');
Route::get('/Stminishow/editProduct/{Id_Product}', 'Stminishow\ProductController@edit');
Route::post('/Stminishow/updateProduct/{Id_Product}', 'Stminishow\ProductController@update');
Route::get('/Stminishow/deleteProduct/{Id_Product}', 'Stminishow\ProductController@delete');


//สินค้าของแถม
Route::get('/Stminishow/SearchPremiumPro', 'Stminishow\PremiumProController@searchPMP');
Route::get('/Stminishow/ShowPremiumPro', 'Stminishow\PremiumProController@ShowPremiumPro');
Route::get('/Stminishow/createPremiumPro', 'Stminishow\PremiumProController@index');
Route::post('/Stminishow/createPremiumPro', 'Stminishow\PremiumProController@store');
Route::get('/Stminishow/editPremiumPro/{Id_Premium_Pro}', 'Stminishow\PremiumProController@edit');
Route::post('/Stminishow/updatePremiumPro/{Id_Premium_Pro}', 'Stminishow\PremiumProController@update');
Route::get('/Stminishow/deletePremiumPro/{Id_Premium_Pro}', 'Stminishow\PremiumProController@delete');

//โปรโมชั้นยอดชำระ
Route::get('/Stminishow/ShowPromotionPay', 'Stminishow\PromotionController@ShowPromotionPay');
Route::get('/Stminishow/createPromotionPay', 'Stminishow\PromotionController@indexPay');
Route::post('/Stminishow/createPromotionPay', 'Stminishow\PromotionController@createPromotionPay');
Route::get('/Stminishow/indexPremiumPro', 'Stminishow\PromotionController@indexPremiumPro');
Route::get('/Stminishow/addToCartPay/{Id_Premium_Pro}', 'Stminishow\PromotionController@addPremiumProToCartPay');
Route::get('/Stminishow/deleteFromCart/{Id_Premium_Pro}', 'Stminishow\PromotionController@deleteFromCart');
Route::get('/Stminishow/incrementCart/{Id_Premium_Pro}', 'Stminishow\PromotionController@incrementCart');
Route::get('/Stminishow/decrementCart/{Id_Premium_Pro}', 'Stminishow\PromotionController@decrementCart');
Route::get('/Stminishow/editPromotionPay/{Id_Promotion}', 'Stminishow\PromotionController@edit');
Route::post('/Stminishow/updatePromotionPay/{Id_Promotion}', 'Stminishow\PromotionController@update');
Route::get('/Stminishow/deletePromotionPay/{Id_Premium_Pro}', 'Stminishow\PromotionController@delete');



