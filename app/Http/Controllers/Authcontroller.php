<?php

namespace App\Http\Controllers;
use App\Khachhang;
use Illuminate\Http\Request;
use Auth;
use Hash;
use DB;
use Session;
//Xử lý đăng nhập - đăng ký- đăng xuất cho khách hàng và chành xe

class Authcontroller extends Controller
{

   //Trang đăng nhập chung
   function getLogin(){
       return view('users.login.register');
   }


  



   //------------------------------------Khách hàng------------------------------------------//

   // đăng nhập khách hàng nè!
   public function LoginkhachHang (Request $request){
        $arr = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::guard('khachhang')->attempt($arr, true))
        {
            $taikhoan = Khachhang::where('username', '=' , $request->username)->where('password', '=', $request->password)->first();
            
            return redirect()->route('trang-chu-khach-hang');

        } else {
            Session::flash('kiemtra', 'Sai tài khoản hoặc mật khẩu!'); 
            return redirect()->route('dang-nhap');
            
        }
    }

    //đăng ký khách hàng
   public function RegisterKhachHang(Request $request) 
    {
        $data = [];
        $data['kh_hoten']= $request->kh_hoten;
        $data['kh_sdt']= $request->kh_sdt;
        $data['kh_diachi']= $request->kh_diachi;
        $data['username']= $request->kh_username;
        $data['password']=Hash::make($request->kh_password) ;

        // dd($data);

        try
        {
            DB::table('khachhang')->insert($data);
            return redirect()->route('kh-dashboard');
        }
        catch( ModelNotFoundException $exception)
        {
            dd('Lỗi rồi bạn ơi!');
        }
    }

    //đăng xuất khách hàng
    public function LogoutKhachHang()
    {
            Auth::guard('khachhang')->logout();
            return redirect()->back();
        
    }
   

 //------------------------------------Kết thúc Khách hàng------------------------------------------//


  //Trang đăng nhập của admin
  function LoginAdminIndex(){

    return view('users.login.login-admin');
    }
    //đăng xuất admmin
    public function LogoutAdmin()
    {
            Auth::guard('admin')->logout();
            return redirect()->back();
        
    }

   // đăng nhập admin!
   public function LoginAdmin(Request $request){

    // dd($request->all());
    $arr = [
        'username' => $request->username,
        'password' => $request->password,
    ];

    if (Auth::guard('admin')->attempt($arr, true))
    {
        
        return redirect()->route('admin-dashboard');

    } else {
        // dd('sai');
        Session::flash('kiemtra', 'Sai tài khoản hoặc mật khẩu!'); 
        return redirect()->route('login-admin-index');
    }
}







 //------------------------------------Chành xe ------------------------------------------//


   // đăng nhập khách hàng nè!
   public function LoginChanhXe(Request $request){
    $arr = [
        'username' => $request->username,
        'password' => $request->password,
    ];

    if (Auth::guard('chanhxe')->attempt($arr, true))
    {
        
        return redirect()->route('cx-dashboard');

    } else {
        Session::flash('kiemtra', 'Sai tài khoản hoặc mật khẩu!'); 
            return redirect()->route('dang-nhap');
    }
}

//đăng ký chành xe
public function RegisterChanhXe(Request $request) 
{
    $data = [];
    $data['cx_hoten']= $request->cx_hoten;
    $data['cx_sdt']= $request->cx_sdt;
    $data['cx_diachi']= $request->cx_diachi;
    $data['username']= $request->cx_username;
    $data['password']=Hash::make($request->cx_password) ;

    // dd($data);

    try
    {
        DB::table('chanhxe')->insert($data);
        
        return redirect()->route('cx-dashboard');
    }
    catch( ModelNotFoundException $exception)
    {
        dd('Lỗi rồi bạn ơi!');
    }
}

// //đăng xuất Chành xe
public function LogoutChanhXe()
{
        Auth::guard('chanhxe')->logout();
        return redirect()->back();
    
}

//------------------------------------Kết thúc Chành xe------------------------------------------//

}

