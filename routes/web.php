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
Route::get('/trang-chu', 'KhachHang\KhachHangController@index')->name('trang-chu-khach-hang');

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

        Route::get('/uoc-luong-chi-phi', 'KhachHang\UocLuongChiPhiController@TraCuuDonIndex')->name('kh-uoc-luong-chi-phi');

        Route::get('/tra-cuu-chanh-xe', 'KhachHang\TraCuuChanhXeController@TraCuuCXIndex')->name('kh-tra-cuu-chanh-xe');
        
        //Cài đặt thông tin cá nhân của khách hàng
        Route::get('/cai-dat', 'KhachHang\ThongTinCaNhanController@CaiDatIndex')->name('kh-cai-dat');

        Route::get('/cai-dat/thong-tin-ca-nhan', 'KhachHang\ThongTinCaNhanController@InfotIndex')->name('kh-cai-dat-thong-tin-ca-nhan');

        Route::post('/cai-dat/thong-tin-ca-nhan/cap-nhat/', 'KhachHang\ThongTinCaNhanController@InfoUpdate')->name('kh-cai-dat-cap-nhat');

        Route::post('/cai-dat/thong-tin-ca-nhan/cap-nhat/xac-thuc', 'KhachHang\ThongTinCaNhanController@XacThuc')->name('kh-cai-dat-cap-nhat-xac-thuc');

        // ajax đổi mật khẩu
        Route::get('/cai-dat/thong-tin-ca-nhan/doi-mat-khau/', 'KhachHang\ThongTinCaNhanController@ChangePass')->name('kh-cai-dat-doi-mat-khau');

        Route::post('/cai-dat/thong-tin-ca-nhan/doi-mat-khau/', 'KhachHang\ThongTinCaNhanController@ChangePassAjax')->name('kh-cai-dat-doi-mat-khau-ajax');

        Route::post('/cai-dat/thong-tin-ca-nhan/doi-mat-khau/cap-nhat', 'KhachHang\ThongTinCaNhanController@Change')->name('kh-cai-dat-doi-mat-khau-cap-nhat');


        //Ajax lấy tên tuyến và xe
        Route::get('/lap-don-hang/{id}/tuyen','KhachHang\DonHangController@getTuyen');


        //Chuyển đổi Dài Cao Rộng thành KG
        Route::post('/lap-don-hang/chuyen-doi-kich-thuoc','KhachHang\DonHangController@changeHangHoa')->name('chuyen-doi-kich-thuoc');


        //Lấy chành xe theo Thành Phố
        Route::post('/lay-chanh-xe','AjaxController@GetChanhXe')->name('lay-chanh-xe');

        // Xem tin chi tiết chành xe
        Route::get('/thong-tin-chanh-xe/{id}', 'KhachHang\ThongTinChanhXeController@index')->name('kh-thong-tin-chanh-xe');


        //Bình luận của khách hàng về chành xe
        Route::post('/binh-luan-chanh-xe','KhachHang\BinhLuanController@store')->name('kh-binh-luan');

        Route::post('/binh-luan-chanh-xe/tra-loi/{id}','KhachHang\BinhLuanController@replystore')->name('kh-binh-luan-tl');

        Route::get('/binh-luan-chanh-xe/xoa/{id}','KhachHang\BinhLuanController@destroy')->name('kh-binh-luan-xoa');


        //Ajax lấy thông tin bình luận cần cập nhật
        Route::get('/binh-luan-chanh-xe/cap-nhat','KhachHang\BinhLuanController@AjaxComment')->name('kh-binh-luan-lay-tt');

        Route::post('/binh-luan-chanh-xe/cap-nhat','KhachHang\BinhLuanController@Updatestore')->name('kh-binh-luan-cap-nhat');

    });
    
});


//--------------------Phần này của chành xe---------------------------------//

Route::group(['prefix' => 'chanh-xe','middleware' => 'ChanhXeMiddleware'], function () {
    
    Route::get('/dashboard', 'ChanhXe\ChanhXeController@AdminChanhXe')->name('cx-dashboard');

    // Quản lí khách hàng       
    Route::get('/quan-li-khach-hang', 'ChanhXe\QuanLiKhachHangController@index')->name('cx-quan-li-khach-hang');
    
    //Quản lí đơn đặt hàng
    Route::get('/quan-li-don-dat-hang', 'ChanhXe\QuanLiDonDatHangController@index')->name('cx-quan-li-don-dat-hang');   

    //Quản lí đơn đặt hàng
    Route::get('/cai-dat', 'ChanhXe\CaiDatController@index')->name('cx-cai-dat');       

});





//Lấy dữ liệu Tỉnh  - Quận - Huyện
Route::get('quan/{id}/quan-huyen', 'TinhQuanHuyenContrller@getQuan')->name('quan-huyen');

Route::get('phuong/{id}/phuong-xa','TinhQuanHuyenContrller@getPhuong')->name('phuong-xa');
























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
