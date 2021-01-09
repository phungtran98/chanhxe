<?php

namespace App\Http\Controllers\ChanhXe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Carbon\Carbon;
use Session;
class ThongBaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAjax(Request $request)
    {
        if($request->ajax())
        {
            $data = DB::table('donvanchuyen as dvc')
            ->join('chitietdonvanchuyen as ctdvc','ctdvc.dvc_id','dvc.dvc_id')
            ->join('khachhang as kh','kh.kh_id','dvc.kh_id')
            ->where('dvc.dvc_thongbao','=',0)
            ->orderBy('dvc.dvc_id','DESC')
            ->get();

            return response()->json($data, 200);
        }
    }


    //Cập nhật lại trang thái của thông báo 
    public function CapNhatThongBao($id,$dvc_id)
    {
        $gia = DB::table('giacuoc')->first();
        $cuoc = $gia->gc_gia;
        DB::table('donvanchuyen')->where('dvc_id',$dvc_id)->update([
            'dvc_thongbao'=>1
        ]);

        $hh_id = DB::table('chitietdonvanchuyen')->where('ctdvc_id',$id)->select('hh_id')->first();
        
        $hinhanh = DB::table('hinhanhhanghoa')->where('hh_id',$hh_id->hh_id)->select('hhhh_hinhanh')->get();
        $ctdvc = DB::table('chitietdonvanchuyen as ctdvc')
        ->join('donvanchuyen as dvc','dvc.dvc_id','ctdvc.dvc_id')
        ->join('khachhang as kh','kh.kh_id','dvc.kh_id')
        ->join('hanghoa as hh','hh.hh_id','ctdvc.hh_id')
        ->join('tuyen as t','t.t_id','ctdvc.t_id')
        ->join('xe as x','x.x_id','t.x_id')
        ->join('chanhxe as cx','cx.cx_id','x.cx_id')
        ->where('ctdvc_id',$id)->first();
        //   dd($ctdvc);
        return view('admin.pages.chanhxe.quanlidondathang.chi-tiet-don-hang',compact('ctdvc','hinhanh','cuoc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
