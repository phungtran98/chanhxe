<?php

namespace App\Http\Controllers\KhachHang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use auth;
use DB;
use Carbon\Carbon;
class QLDonHangController extends Controller
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

    
    //Quản lí đơn hàng
    public function QLDonHangIndex()
    {
        $ctdvc = DB::table('chitietdonvanchuyen as ctdvc')
        ->join('donvanchuyen as dvc','dvc.dvc_id','ctdvc.dvc_id')
        ->join('khachhang as kh','kh.kh_id','dvc.kh_id')
        ->join('hanghoa as hh','hh.hh_id','ctdvc.hh_id')
        ->where('dvc.kh_id',auth::guard('khachhang')->id())
        ->orderBy('ctdvc.ctdvc_id','DESC')
        ->get();
        // dd($ctdvc);
        return view('admin.pages.khachhang.quanlidonhang.quan-li-don-hang',compact('ctdvc'));
    }
    
   
    public function ChiTietDonHangIndex($id)
    {
        $hh_id = DB::table('chitietdonvanchuyen')->where('ctdvc_id',$id)->select('hh_id')->first();
        
        $hinhanh = DB::table('hinhanhhanghoa')->where('hh_id',$hh_id->hh_id)->select('hhhh_hinhanh')->get();
        // dd($hinhanh);
        $ctdvc = DB::table('chitietdonvanchuyen as ctdvc')
        ->join('donvanchuyen as dvc','dvc.dvc_id','ctdvc.dvc_id')
        ->join('khachhang as kh','kh.kh_id','dvc.kh_id')
        ->join('hanghoa as hh','hh.hh_id','ctdvc.hh_id')
        ->join('tuyen as t','t.t_id','ctdvc.t_id')
        ->join('xe as x','x.x_id','t.x_id')
        ->join('chanhxe as cx','cx.cx_id','x.cx_id')
        ->where('ctdvc_id',$id)->first();
        //   dd($ctdvc);
        return view('admin.pages.khachhang.quanlidonhang.chi-tiet-don-hang',compact('ctdvc','hinhanh'));
    }



    public function FindStatus(Request $request)
    {
        $data['ctdcv_trangthaidon'] = $request->loc_trangthai;

        $ctdvc = DB::table('chitietdonvanchuyen as ctdvc')
        ->join('donvanchuyen as dvc','dvc.dvc_id','ctdvc.dvc_id')
        ->join('khachhang as kh','kh.kh_id','dvc.kh_id')
        ->join('hanghoa as hh','hh.hh_id','ctdvc.hh_id')
        ->join('tuyen as t','t.t_id','ctdvc.t_id')
        ->join('xe as x','x.x_id','t.x_id')
        ->join('chanhxe as cx','cx.cx_id','x.cx_id')
        ->where('cx.cx_id',auth::guard('khachhang')->id())
        ->where('ctdvc.ctdvc_trangthaidon',$data)
        // ->orderBy('ctdvc.ctdvc_id','DESC')
        ->get();

        // dd($ctdvc);
        return view('admin.pages.khachhang.quanlidonhang.quan-li-don-hang',compact('ctdvc'));
    }



    public function FindDate(Request $request)
    {
       
        $ctdvc = DB::table('chitietdonvanchuyen as ctdvc')
        ->join('donvanchuyen as dvc','dvc.dvc_id','ctdvc.dvc_id')
        ->join('khachhang as kh','kh.kh_id','dvc.kh_id')
        ->join('hanghoa as hh','hh.hh_id','ctdvc.hh_id')
        ->join('tuyen as t','t.t_id','ctdvc.t_id')
        ->join('xe as x','x.x_id','t.x_id')
        ->join('chanhxe as cx','cx.cx_id','x.cx_id')
        ->where('dvc.kh_id',auth::guard('khachhang')->id())
        ->whereBetween('dvc.dvc_ngaylap',[$request->BDate,$request->EDate])
        ->orderBy('ctdvc.ctdvc_id','DESC')
        ->get();
        // dd($ctdvc);

        return view('admin.pages.khachhang.quanlidonhang.quan-li-don-hang',compact('ctdvc'));
    }



    public function FindContent(Request $request)
    {
        $ctdvc=[];
        // dd($request->kh_content);
        if($request->kh_luachon == 'nguoigui')
        {
            $ctdvc = DB::table('chitietdonvanchuyen as ctdvc')
            ->join('donvanchuyen as dvc','dvc.dvc_id','ctdvc.dvc_id')
            ->join('khachhang as kh','kh.kh_id','dvc.kh_id')
            ->join('hanghoa as hh','hh.hh_id','ctdvc.hh_id')
            ->join('tuyen as t','t.t_id','ctdvc.t_id')
            ->join('xe as x','x.x_id','t.x_id')
            ->join('chanhxe as cx','cx.cx_id','x.cx_id')
            ->where('kh.kh_id',auth::guard('khachhang')->id())
            ->where('kh.kh_hoten','like','%'.$request->kh_content.'%')
            ->orderBy('ctdvc.ctdvc_id','DESC')
            ->get();
        }
        if($request->kh_luachon == 'nguoinhan')
        {
            $ctdvc = DB::table('chitietdonvanchuyen as ctdvc')
            ->join('donvanchuyen as dvc','dvc.dvc_id','ctdvc.dvc_id')
            ->join('khachhang as kh','kh.kh_id','dvc.kh_id')
            ->join('hanghoa as hh','hh.hh_id','ctdvc.hh_id')
            ->join('tuyen as t','t.t_id','ctdvc.t_id')
            ->join('xe as x','x.x_id','t.x_id')
            ->join('chanhxe as cx','cx.cx_id','x.cx_id')
            ->where('kh.kh_id',auth::guard('khachhang')->id())
            ->where('ctdvc.ctdvc_hotennhan','like','%'.$request->kh_content.'%')
            ->orderBy('ctdvc.ctdvc_id','DESC')
            ->get();
        }
        if($request->kh_luachon == 'hanghoa')
        {
            $ctdvc = DB::table('chitietdonvanchuyen as ctdvc')
            ->join('donvanchuyen as dvc','dvc.dvc_id','ctdvc.dvc_id')
            ->join('khachhang as kh','kh.kh_id','dvc.kh_id')
            ->join('hanghoa as hh','hh.hh_id','ctdvc.hh_id')
            ->join('tuyen as t','t.t_id','ctdvc.t_id')
            ->join('xe as x','x.x_id','t.x_id')
            ->join('chanhxe as cx','cx.cx_id','x.cx_id')
            ->where('kh.kh_id',auth::guard('khachhang')->id())
            ->where('hh.hh_ten','like','%'.$request->kh_content.'%')
            ->orderBy('ctdvc.ctdvc_id','DESC')
            ->get();
        }
        // dd($ctdvc);

       

        return view('admin.pages.khachhang.quanlidonhang.quan-li-don-hang',compact('ctdvc'));
    }



    public function HuyDon(Request $request)
    {
        if($request->ajax())
        {
            DB::table('chitietdonvanchuyen')->where('ctdvc_id',$request->ctdvc_id)->update([
                'ctdvc_trangthaidon'=>4
            ]);
            $data=1;
            return response()->json($request->ctdvc_id, 200);
        }
    }


    public function CheckHuyDon(Request $request)
    {
        if($request->ajax())
        {
            $data = DB::table('chitietdonvanchuyen')->where('ctdvc_id',$request->id)->select('ctdvc_trangthaidon')->first();
            // $data=1;
            return response()->json($data, 200);
        }
    }


    public function store(Request $request)
    {
        
    }




            
    public function XoaHangIndex($id)
    {
        DB::table('chitietdonvanchuyen')->where('ctdvc_id',$id)->update([
            'ctdvc_trangthaidon'=>4
        ]);
         return redirect()->route('kh-ql-don-hang');
    }






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
