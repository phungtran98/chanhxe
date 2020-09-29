<?php

namespace App\Http\Controllers;
use App\Khachhang;
use Illuminate\Http\Request;
use Auth;


class Authcontroller extends Controller
{
   //Trang đăng nhập chung
   function getLogin(){
       return view('users.login.register');
   }

   // đăng nhập khách hàng nè!
   public function LoginkhachHang (Request $request){
    $arr = [
        'username' => $request->username,
        'password' => $request->password,
    ];

    if (Auth::guard('khachhang')->attempt($arr, true))
    {
        $taikhoan = Khachhang::where('username', '=' , $request->username)->where('password', '=', $request->password)->first();
        
        return redirect()->route('kh-quan-tri');

    } else {
        dd('Sai cmn rồi Phụng ơi! mầy ngu quá');
    }
}
}

