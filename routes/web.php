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

//-----------------HỆ THỐNG QUẢN LÍ CHÀNH XE-----------------//
//GVHD: PHẠM NGỌC QUYỀN
//SINH VIÊN THỰC HIỆN: TRẦN THANH PHỤNG B1605240



//Giao diện chính cho khách hàng
Route::get('/trang-chu', 'KhachHangController@index')->name('trang-chu-khach-hang');

//Đăng nhập cho khách hàng và chành xe
Route::get('/dang-nhap', 'AuthController@getLogin')->name('dang-nhap');



//Đăng nhập và đăng ký Khách hàng
Route::post('dang-nhap-khach-hang/','AuthController@LoginKhachHang')->name('login-khach-hang');
Route::post('dang-ky/nong-dan','AuthController@RegisterKhachHang')->name('register-khachhang');


// Khách hàng
Route::group(['prefix' => 'khach-hang'], function () {
    
    Route::get('/quan-tri', 'KhachHangController@AdminKhachHang')->name('kh-quan-tri');

});




























// Route::get('/', function () {
//     return view('googlemaps.marker');
// });

Route::get('/chi-duong', function () {
    return view('googlemaps.direct');
});


Route::get('/nguoi-dung-trang-chu', function () {
    return view('users.template.masters');
});


Route::get('/chanh-xe-trang-chu', function () {
    return view('admin.template.masters');
});


Route::get('/dang-ki', function () {
    return view('users.login.register');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
