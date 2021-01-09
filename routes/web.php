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





//-----------------Phần này giao diện trang chủ --------------------------//


//Giao diện chính cho khách hàng
Route::get('/', 'KhachHang\KhachHangController@index')->name('trang-chu-khach-hang');

//Xem thông tin chành xe khi chưa đăng nhập
Route::get('/chi-tiet-chanh-xe/{id}', 'KhachHang\KhachHangController@ChiTietCX')->name('chi-tiet-chanh-xe');

//Xem chi tiết tuyến về chành xe đó
Route::get('/chi-tiet-tuyen/{id_tuyen}', 'KhachHang\KhachHangController@ChiTietTuyen')->name('chi-tiet-tuyen');

//khách hàng tra cứu đơn hàng
Route::post('/tra-cuu-don-hang', 'KhachHang\TraCuuDonHangController@index')->name('kh.tra-cuu-don-hang');

Route::post('/uoc-tinh-cuoc', 'KhachHang\TraCuuDonHangController@UocTinhPhi')->name('kh.uoc-tinh-phi');

//tra cứu tuyến
Route::post('/tra-cuu-tuyen', 'KhachHang\TraCuuDonHangController@TraCuuTuyen')->name('kh.tra-cuu-tuyen');

//Sài chung cho chành xe và khách hàng
Route::post('/chi-tiet-kho-map','ChanhXe\ChiTietKhoController@getKhoMap')->name('cx-chi-tiet-kho-map');







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


//Đăng nhập của Admin hệ thống
Route::get('dang-nhap-admin/','AuthController@LoginAdminIndex')->name('login-admin-index');

Route::post('admin/','AuthController@LoginAdmin')->name('login-admin');


//-------------Phần này của Admin hệ thống---------------------//
Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => ['AdminMiddleware']], function () {

        Route::get('/','Admin\AdminconTroller@index')->name('admin-dashboard');

        Route::get('/danh-sach-chanh-xe','Admin\DanhSachChanhXeController@index')->name('admin-ds-chanh-xe');

        Route::get('/danh-sach-chanh-xe/{id}','Admin\DanhSachChanhXeController@ChiTiet')->name('admin-ds-chanh-xe-ct');

        Route::get('/xac-thuc-chanh-xe/{id}','Admin\DanhSachChanhXeController@XacThuc')->name('admin-xac-thuc');
        
        Route::post('/tim-kiem','Admin\DanhSachChanhXeController@Search')->name('admin-ds-chanh-xe-search');
        
        //Thống kê doanh thu
        Route::get('/thong-ke','Admin\DoanhThuController@index')->name('admin-thong-ke');

        Route::post('/thong-ke','Admin\DoanhThuController@ThongKe')->name('admin-thong-ke-submit');

        Route::post('/thong-ke-ajax','Admin\DoanhThuController@ThongKeAjax')->name('admin-thong-ke-ajax');

        Route::post('/thong-ke-thong-tin','Admin\DoanhThuController@ThongKeInfo')->name('admin-info-cx');
    

        //Cập nhật giá cước
        Route::get('/cap-nhat-gia-cuoc','Admin\GiaCuocController@index')->name('admin-gia-cuoc');

        Route::post('/cap-nhat-gia-cuoc','Admin\GiaCuocController@store')->name('admin-gia-cuoc-submit');
    
        //Đăng xuất 
        Route::get('/dang-xuat-admin','AuthController@LogoutAdmin')->name('logout-admin');

    });

});









//-----------------Phần này của Khách hàng--------------------------//

Route::group(['prefix' => 'khach-hang'], function () {
    Route::group(['middleware' => ['KhachHangMiddleware']], function () {
        
        Route::get('/dashboard', 'KhachHang\KhachHangController@AdminKhachHang')->name('kh-dashboard');

        //Tạo đơn hàng 

        //Cho khách hàng khi đã đăng nhập và đã xác thực sđt
        // Route::get('/lap-don-hang', 'KhachHang\DonHangController@DonHangIndex')->name('kh-don-hang');

        Route::get('/lap-don-hang-dh/{id}', 'KhachHang\DonHangController@DonHangIndex2')->name('kh-don-hang-2');

        Route::post('/quan-li-don-hang/luu-don-hang', 'KhachHang\DonHangController@store')->name('kh-ql-don-hang-luu');


        //Thanh toán cước phí vận chuyển
        Route::post('/thanh-toan-cuoc', 'KhachHang\ThanhToanVNPayController@index')->name('kh-thanh-toan-cuoc');

        Route::get('/thanh-toan-cuoc-return', 'KhachHang\ThanhToanVNPayController@store')->name('kh-thanh-toan-cuoc-return');



        //Ajax format number
        Route::post('/lap-don-hang/formart-number', 'KhachHang\DonHangController@Formart_Number')->name('kh-ql-don-formart-number');

        
        //Ajax kiểm tra có tạo đơn hàng chưa nếu có mới cho bình luận
        Route::post('/kiem-tra-lap-don','KhachHang\DonHangController@CheckLapDon')->name('kh-kiem-tra-lap-don');
       

        //quản lí đơn hàng
        Route::get('/quan-li-don-hang', 'KhachHang\QLDonHangController@QLDonHangIndex')->name('kh-ql-don-hang');

        Route::get('/quan-li-don-hang/chi-tiet-don-hang/{id}', 'KhachHang\QLDonHangController@ChiTietDonHangIndex')->name('kh-ql-don-hang-chi-tiet');

        Route::get('/quan-li-don-hang/xoa-don-hang/{id}', 'KhachHang\QLDonHangController@XoaHangIndex')->name('kh-ql-don-hang-xoa');

        //Huy don hang
        Route::post('/quan-li-don-hang/huy-don', 'KhachHang\QLDonHangController@HuyDon')->name('kh-ql-don-hang-huy-don');

        //kiểm tra trạng thái đơn hàng
        Route::post('/quan-li-don-hang/kiem-tra-huy-don', 'KhachHang\QLDonHangController@CheckHuyDon')->name('kh-ql-don-hang-kiem-tra-don');

       
        //Tìm kiếm đơn hàng của khách hàng

        Route::post('/quan-li-don-hang/tim-kiem-trang-thai', 'KhachHang\QLDonHangController@FindStatus')->name('kh-ql-don-tim-kiem');
        
        Route::post('/quan-li-don-hang/tim-kiem-noi-dung', 'KhachHang\QLDonHangController@FindContent')->name('kh-ql-don-tim-kiem-noi-dung');

        Route::post('/quan-li-don-hang/tim-kiem-ngay-lap', 'KhachHang\QLDonHangController@FindDate')->name('kh-ql-don-tim-kiem-ngay-lap');
        
        

        //Ước lượng chi phí
        Route::get('/uoc-luong-chi-phi', 'KhachHang\UocLuongChiPhiController@TraCuuDonIndex')->name('kh-uoc-luong-chi-phi');

        //Tra cứ chành xe
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

        //Ajax lấy kho của tên tuyến
        Route::get('/lap-don-hang/kho/{id}','KhachHang\DonHangController@getKho')->name('getKho');

       

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
    
    Route::get('/quan-li-don-dat-hang/chi-tiet-don-hang/{id}', 'ChanhXe\QuanLiDonDatHangController@ChiTietDonHangIndex')->name('cx-ql-don-hang-chi-tiet');

    Route::post('/quan-li-don-dat-hang/chi-tiet-don-hang/ajax-cap-nhat-trang-thai', 'ChanhXe\QuanLiDonDatHangController@AjaxCapNhatTrangThai')->name('cx-ql-don-hang-trang-thai');

    Route::post('/quan-li-don-dat-hang/tim-kiem', 'ChanhXe\QuanLiDonDatHangController@TimKiem')->name('cx-ql-don-tim-kiem');
    // Route::get('/quan-li-don-dat-hang/chi-tiet-don-hang/in-don/{id}', 'ChanhXe\QuanLiDonDatHangController@InDonHang')->name('cx-ql-don-in-don');

    
    // In hóa đơn của chành xe
    Route::get('/quan-li-don-dat-hang/chi-tiet-don-hang/in-don-word/{id}', 'ChanhXe\QuanLiDonDatHangController@InDonHang')->name('cx-ql-don-in-don-word');
    
    Route::get('/quan-li-don-dat-hang/chi-tiet-don-hang/in-don-pdf/{id}','ChanhXe\QuanLiDonDatHangController@InDonHanPDF')->name('cx-ql-don-in-don-pdf');


    //Tìm kiếm đơn hàng
    Route::post('/quan-li-don-dat-hang/tim-kiem-trang-thai', 'ChanhXe\QuanLiDonDatHangController@FindStatus')->name('cx-ql-don-hang-tim-kiem');
    
    Route::post('/quan-li-don-dat-hang/tim-kiem-noi-dung', 'ChanhXe\QuanLiDonDatHangController@FindContent')->name('cx-ql-don-hang-tim-kiem-noi-dung');
    
    Route::post('/quan-li-don-dat-hang/tim-kiem-ngay-lap', 'ChanhXe\QuanLiDonDatHangController@FindDate')->name('cx-ql-don-tim-kiem-ngay-lap');
    
    // quản lí khách hàng tìm đơn theo từng khách hàng
    Route::get('/quan-li-don-dat-hang/tim-kiem/{kh_id}', 'ChanhXe\QuanLiDonDatHangController@FindKhachHang')->name('cx-ql-don-tim-kiem-khach-hang');

    //Thông báo trên thanh menu search
    Route::get('/thong-bao/{ctdvc_id}/{dvc_id}', 'ChanhXe\ThongBaoController@CapNhatThongBao')->name('cx-ql-don-hang-thong-bao');

    Route::get('/thong-bao-ajax', 'ChanhXe\ThongBaoController@indexAjax')->name('cx-thong-bao');


    //Thông tin chành xe
    Route::get('/cai-dat/thong-tin-chanh-xe', 'ChanhXe\ThongTinChanhXeController@index')->name('cx-cai-dat'); 
    
    Route::post('/cai-dat/cap-nhat-hinh-anh', 'ChanhXe\ThongTinChanhXeController@UpdateImg')->name('cx-cap-nhat-hinh-anh'); 
    
    Route::post('/cai-dat/cap-nhat-thong-tin', 'ChanhXe\ThongTinChanhXeController@UpdateInfo')->name('cx-cap-nhat-tt'); 
    
    Route::get('/cai-dat/ma-xac-thuc', 'ChanhXe\ThongTinChanhXeController@AjaxGetCode')->name('cx-ma-xac-thuc'); 
    
    Route::post('/cai-dat/xac-thuc', 'ChanhXe\ThongTinChanhXeController@AuthCode')->name('cx-xac-thuc');
    
    Route::get('/cai-dat/mo-ta', 'ChanhXe\ThongTinChanhXeController@Mota')->name('cx-mo-ta'); 
    
    Route::post('/cai-dat/mo-ta', 'ChanhXe\ThongTinChanhXeController@MotaCapnhat')->name('cx-mo-ta-cap-nhat'); 
  


    //Đổi mật khẩu
    Route::get('/cai-dat/doi-mat-khau','ChanhXe\ThongTinChanhXeController@ChangeUserPass')->name('cx-doi-mat-khau');

    Route::post('/cai-dat/thong-tin-ca-nhan/doi-mat-khau/','ChanhXe\ThongTinChanhXeController@ChangePassAjax')->name('cx-cai-dat-doi-mat-khau-ajax');
    
    Route::post('/cai-dat/thong-tin-ca-nhan/doi-mat-khau/cap-nhat','ChanhXe\ThongTinChanhXeController@Change')->name('cx-cai-dat-doi-mat-khau-cap-nhat');


    //Bình luận của Chanh xe
    Route::post('/binh-luan-chanh-xe/tra-loi/{id}','ChanhXe\BinhLuanController@replystore')->name('cx-binh-luan-tl');



    //Chành xe đăng kí tuyến
    Route::get('/tuyen-xe','ChanhXe\TuyenXeController@index')->name('cx-tuyen-xe');

    Route::post('/tuyen-xe','ChanhXe\TuyenXeController@StoreTuyen')->name('cx-tuyen-xe-dk');

    Route::post('/tuyen-xe/dang-ki','ChanhXe\TuyenXeController@Store')->name('cx-tuyen-xe-submit');

    Route::get('/tuyen-xe-xoa/{id}','ChanhXe\TuyenXeController@destroy')->name('cx-tuyen-xoa');



    //Chi tiết kho
    Route::get('/tuyen-xe/chi-tiet-kho/{id}','ChanhXe\ChiTietKhoController@index')->name('cx-chi-tiet-kho');

    Route::get('/tuyen-xe/chi-tiet-kho-xoa/{id}','ChanhXe\ChiTietKhoController@destroy')->name('cx-chi-tiet-kho-xoa');
    
    



    //quản lý đăng  ký xe
    Route::get('/xe','ChanhXe\XeController@index')->name('cx-xe');

    Route::post('/xe/them-xe','ChanhXe\XeController@store')->name('cx-them-xe');

    Route::get('/xe/xoa-xe/{id}','ChanhXe\XeController@destroy')->name('cx-xoa-xe');

    Route::post('/xe/cap-nhat','ChanhXe\XeController@update')->name('cx-cap-nhap-xe');

    Route::post('/xe/ajax','ChanhXe\XeController@getXe')->name('cx-ajax-xe');

    Route::post('/xe/tim-kiem','ChanhXe\XeController@Find')->name('cx-tim-kiem-xe');



    //Quản lí tài xế
    Route::get('/tai-xe','ChanhXe\TaiXeController@index')->name('cx-tai-xe');

    Route::post('/tai-xe/them-tai-xe','ChanhXe\TaiXeController@store')->name('cx-them-tai-xe');

    Route::post('/tai-xe/ajax','ChanhXe\TaiXeController@getTaiXe')->name('cx-ajax-tai-xe');

    Route::post('/ai-xe/cap-nhat','ChanhXe\TaiXeController@update')->name('cx-cap-nhap-tai-xe');

    Route::get('/tai-xe/xoa-tai-xe/{id}','ChanhXe\TaiXeController@destroy')->name('cx-xoa-tai-xe');

    Route::post('/tai-xe/tim-kiem','ChanhXe\TaiXeController@Find')->name('cx-tim-kiem-tai-xe');


    //Thống kê theo đơn hàng
    Route::get('/thong-ke-don-hang','ChanhXe\ThongKeController@index')->name('cx-thong-ke-don');
    
    Route::post('/thong-ke-don-hang-ajax','ChanhXe\ThongKeController@ThongKeAjax')->name('cx-thong-ke-ajax');

    //Thống kê theo tháng - năm
    Route::post('/thong-ke-don-theo-nam','ChanhXe\ThongKeController@storeAjax')->name('cx-thong-ke-don-theo-nam');

   

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
Route::get('/google-maps-api', function () {
    return view('googlemaps.maps');
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

