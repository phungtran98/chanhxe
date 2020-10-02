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
Route::post('dang-ky-khach-hang','AuthController@RegisterKhachHang')->name('register-khachhang');
Route::get('dang-xuat-khach-hang','AuthController@LogoutKhachHang')->name('logout-khachhang');


//Đăng nhập và đăng ký Chành xe
Route::post('dang-nhap-chanh-xe/','AuthController@LoginChanhXe')->name('login-chanhxe');
Route::post('dang-ky-chanh-xe','AuthController@RegisterChanhXe')->name('register-chanhxe');
Route::get('dang-xuat-chanh-xe','AuthController@LogoutChanhXe')->name('logout-chanhxe');







//-----------------Phần này của Khách hàng--------------------------//

Route::group(['prefix' => 'khach-hang'], function () {
    Route::group(['middleware' => ['KhachHangMiddleware']], function () {
        
        Route::get('/dashboard', 'KhachHang\KhachHangController@AdminKhachHang')->name('kh-dashboard');

        Route::get('/lap-don-hang', 'KhachHang\DonHangController@DonHangIndex')->name('kh-don-hang');

        Route::get('/quan-li-don-hang', 'KhachHang\QLDonHangController@QLDonHangIndex')->name('kh-ql-don-hang');

        Route::get('/cai-dat', 'KhachHang\ThongTinCaNhanController@CaiDatIndex')->name('kh-cai-dat');

        Route::get('/uoc-luong-chi-phi', 'KhachHang\UocLuongChiPhiController@TraCuuDonIndex')->name('kh-uoc-luong-chi-phi');

        Route::get('/tra-cuu-chanh-xe', 'KhachHang\TraCuuChanhXeController@TraCuuCXIndex')->name('kh-tra-cuu-chanh-xe');


       
    });
    
});


//--------------------Phần này của chành xe---------------------------------//

Route::group(['prefix' => 'chanh-xe','middleware' => 'ChanhXeMiddleware'], function () {
    // có chức năng nào chung thì đem xuống, v là đc r
    //ơ vi dịu vậy nó hiểu hết à
    Route::get('/dashboard', 'ChanhXe\ChanhXeController@AdminChanhXe')->name('cx-dashboard');       

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