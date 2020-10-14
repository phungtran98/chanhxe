<?php

namespace App\Http\Controllers\KhachHang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use auth;
use DB;
use Session;
use Hash;
class ThongTinCaNhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    //cài đặt thông tin cá nhân
    public function InfotIndex()
    {
        $thanhPho = DB::table('tinh')->get();
        $kh = DB::table('khachhang')->where('kh_id',auth::guard('khachhang')->id())->first();
        return view('admin.pages.khachhang.caidat.thong-tin-ca-nhan',compact(['kh','thanhPho']));
    }


    //Cài đặt tài khoản
    public function CaiDatIndex()
    {
       
        return view('admin.pages.khachhang.caidat.cai-dat');
    }
   
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    //Cập nhật thông tin
    public function InfoUpdate(Request $request)
    {

        $data=[];
        
        if($request->phuong == null)
        {
            if($request->hasFile('kh_hinhanh')){
                
                $file = $request->file('kh_hinhanh');
                $filename =$file->getClientOriginalName('kh_hinhanh');
                $file->move('upload/khachhang',$filename); 
                $data['kh_hinhanh'] =$filename ;
            }
            
        }
        else
        {
            $tinh= DB::table('tinh')->where('t_id',$request->tinh)->select('t_ten')->first();
            $quan= DB::table('quan')->where('q_id',$request->quan)->select('q_ten')->first();
            $phuong = DB::table('phuong')->where('p_id',$request->phuong)->select('p_ten')->first();
            $tenduong = $request->tenduong;
            $data['kh_diachi']= $tenduong.', '.$phuong->p_ten.', '.$quan->q_ten.', '.$tinh->t_ten;
        }
        
        $data['kh_hoten'] = $request->kh_hoten;
        $data['kh_sdt'] = $request->kh_sdt;      
        $data['code'] = 000;
        $data['active'] = 0;  


        try{

            DB::table('khachhang')->where('kh_id',Auth::guard('khachhang')->id())->update($data);
            

            $string=rand(1000,9999);
            // $string='phung dep troai';
            // $nexmo = app('Nexmo\Client');

            // $nexmo->message()->send([
            //     'to'   => '84868692240',
            //     'from' => 'Vonage APIs',
            //     'text' => 'Mã xác minh của bạn là: '.$string,
            // ]);
            // $request->merge(['text' => ($string)]);



            // return redirect()->back();
            return view('admin.pages.khachhang.caidat.xac-thuc',compact('request'));
        }
        catch(ModelNotFoundException $exception)
        {
            dd('Bị lỗi cập nhật rồi bạn ơi!');
        }
       
    }
    public function XacThuc(Request $request)
    {
       
    }
  
    //Đổi mật khẩu
    public function ChangePass()
    {
        
        $kh = DB::table('khachhang')->where('kh_id',auth::guard('khachhang')->id())->first();
        return view('admin.pages.khachhang.caidat.doi-mat-khau',compact('kh'));
    }


    public function ChangePassAjax(Request $request)
    {
        if(\Request::ajax()){
            
            $data= $request->pass;
            $kh = DB::table('khachhang')->where('kh_id',auth::guard('khachhang')->id())->select('password')->first();
            if(Hash::check($data, $kh->password)){
                $success=1;
            }
            else
            {
                $success=0;
            }
            return response()->json( $success, 200);
        }
        return abort(404);
    }

    public function Change(Request $request)
    {
        $data['password']=Hash::make($request->kh_password3);
        // dd($data);
        try{

            DB::table('khachhang')->where('kh_id',Auth::guard('khachhang')->id())->update($data);
            Session::flash('alert', 'Đổi mật khẩu thành công!');
            return redirect()->back();
        }
        catch(ModelNotFoundException $exception)
        {
            dd('Bị lỗi cập nhật rồi bạn ơi!');
        }

    }



    public function destroy($id)
    {

    }
}
