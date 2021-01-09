<?php

namespace App\Http\Controllers\KhachHang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
class TraCuuDonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ctdvc  = DB::table('donvanchuyen as dvc')
        ->join('chitietdonvanchuyen as ctdvc','dvc.dvc_id','ctdvc.dvc_id')
        ->join('hanghoa as hh','hh.hh_id','ctdvc.hh_id')
        ->where('dvc.dvc_madon',$request->madon)
        ->first();
        // dd($ctdvc);   
        
        return view('users.pages.tracuu.index',compact('ctdvc'));
    }



    public function UocTinhPhi(Request $request)
    {
        $gia = DB::table('giacuoc')->first();
        $cuoc = $gia->gc_gia;
        // dd((int) $request->tong_khoi_luong);
        $data['khoiluong']=$request->tong_khoi_luong;
        $km=$request->kh_nhan_km;
        $data['km']= number_format($request->kh_nhan_km);
        $data['noidi']= $request->noidi;
        $data['noiden']= $request->noiden;
        $a= $km* $data['khoiluong'] * $cuoc;
        $data['cuoc'] = number_format($a) ;


        
        return view('users.pages.tracuu.uoc-tinh-phi',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function TraCuuTuyen(Request $request)
    {
        $binhluan =DB::table('chanhxe as cx')
        ->join('binhluan as bl','cx.cx_id','bl.cx_id')
        ->whereNotNull('bl.bl_danhgia')
        ->get();
        $chanhxe =DB::table('chanhxe as cx')
        ->join('xe','xe.cx_id','cx.cx_id') 
        ->join('tuyen as t','xe.x_id','t.x_id') 
        ->where('t.t_tentuyen','like','%'.$request->tentuyen.'%')->select('cx.cx_id','cx.cx_tenchanhxe','active')->distinct()->get();
    
        // dd($chanhxe);
        return view('users.pages.tracuu.tra-cuu-tuyen',compact('chanhxe','binhluan'));
    }




    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
