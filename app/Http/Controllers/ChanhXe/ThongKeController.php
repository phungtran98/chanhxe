<?php

namespace App\Http\Controllers\ChanhXe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use auth;
class ThongKeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gia = DB::table('giacuoc')->first();
        $cuoc = $gia->gc_gia;


        $donTong=0;
        $donDaGiao=0;
        $donDangGiao=0;
        $donHuy=0;
        $donChoDuyet=0;
        $donDaDuyet=0;
        $donDaXoa=0;
        $tongDoanhThu = 0;
        $don = DB::table('chitietdonvanchuyen as ctdvc')
        ->join('donvanchuyen as dvc','dvc.dvc_id','ctdvc.dvc_id')
        ->where('dvc.cx_id',Auth::guard('chanhxe')->id())->get();
        $donTong += count($don);
        
        foreach($don as $val){
            if($val->ctdvc_trangthaidon == 0)
            {
                $donChoDuyet+=1;
            }
            if($val->ctdvc_trangthaidon == 3)
            {
                $donDaGiao+=1;
            }
            if($val->ctdvc_trangthaidon == 4)
            {
                $donHuy+=1;
            }
            if($val->ctdvc_trangthaidon == 2)
            {
                $donDangGiao+=1;
            }
            if($val->ctdvc_trangthaidon == 1)
            {
                $donDaDuyet+=1;
            }
        }


        $ctdvc = DB::table('chitietdonvanchuyen as ctdvc')
        ->join('donvanchuyen as dvc','dvc.dvc_id','ctdvc.dvc_id')
        ->join('khachhang as kh','kh.kh_id','dvc.kh_id')
        ->join('hanghoa as hh','hh.hh_id','ctdvc.hh_id')
        ->join('tuyen as t','t.t_id','ctdvc.t_id')
        ->join('xe as x','x.x_id','t.x_id')
        ->join('chanhxe as cx','cx.cx_id','x.cx_id')
        ->where('cx.cx_id',auth::guard('chanhxe')->id())
        ->orderBy('ctdvc.ctdvc_id','DESC')
        ->get();

        


        $TongXe=DB::table('xe')->where('cx_id',Auth::guard('chanhxe')->id())
        ->get();
        $TongTuyen=DB::table('tuyen')
        ->join('xe','xe.x_id','tuyen.x_id')
        ->where('xe.cx_id',Auth::guard('chanhxe')->id())
        ->get();
        $TongTaiXe= DB::table('taixe')->where('cx_id',Auth::guard('chanhxe')->id())
        ->get();

        // dd($ctdvc);
        foreach($ctdvc as $tong)
        {
            if($tong->ctdvc_trangthaidon == 3)
            {
                $tongDoanhThu+= (int)$tong->ctdvc_km * $tong->hh_khoiluong * $cuoc;
            }
        }
        // dd($tongDoanhThu);

        return view('admin.pages.chanhxe.thongke.thong-ke-don-hang',compact('TongTaiXe','donChoDuyet','donDaGiao','donHuy','donTong','donDangGiao','donDaDuyet','tongDoanhThu','TongXe','TongTuyen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAjax(Request $request)
    {
        $tongDoanhThu = 0;
        $gia = DB::table('giacuoc')->first();
        $dataset = Array();
        $chanhxe  = DB::table('chanhxe')->get();
        $cuoc = $gia->gc_gia;

        for($i=1; $i<=12; $i++)
        {
            $layThang = DB::table('chitietdonvanchuyen as ctdvc')
            ->join('donvanchuyen as dvc','dvc.dvc_id','ctdvc.dvc_id')
            ->join('chanhxe as cx','cx.cx_id','dvc.cx_id')
            ->join('hanghoa as hh','hh.hh_id','ctdvc.hh_id')
            ->where('cx.cx_id',Auth::guard('chanhxe')->id())
            ->whereMonth('dvc.dvc_ngaylap',$i)
            ->whereYear('dvc.dvc_ngaylap',$request->nam)
            ->where('ctdvc.ctdvc_trangthaidon',3)
            ->select('hh.hh_tienthuho','hh.hh_khoiluong','ctdvc.ctdvc_phigui','ctdvc.ctdvc_km')
            ->get();
            array_push($dataset,$layThang);
        }
        $temp=Array();
        for($i=0; $i < count($dataset); $i++)
        {
            if(count($dataset[$i])!=0)
            {
                foreach($dataset[$i] as $val)
                {
                    $tongDoanhThu=$val->hh_khoiluong * $val->ctdvc_km * $gia->gc_gia;
                }
                array_push($temp,$tongDoanhThu);
                // array_push($temp,'co');
            }
            else
            {
                array_push($temp,0);
            }
            
            
        }
        
        return response()->json($temp, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ThongKeAjax(Request $request)
    {
        $tongDoanhThu = 0;
        $gia = DB::table('giacuoc')->first();
        $dataset = Array();
        $chanhxe  = DB::table('chanhxe')->get();
        $cuoc = $gia->gc_gia;

        for($i=1; $i<=12; $i++)
        {
            $layThang = DB::table('chitietdonvanchuyen as ctdvc')
            ->join('donvanchuyen as dvc','dvc.dvc_id','ctdvc.dvc_id')
            ->join('chanhxe as cx','cx.cx_id','dvc.cx_id')
            ->join('hanghoa as hh','hh.hh_id','ctdvc.hh_id')
            ->where('cx.cx_id',auth::guard('chanhxe')->id())
            ->whereMonth('dvc.dvc_ngaylap',$i)
            ->whereYear('dvc.dvc_ngaylap',2021)
            ->where('ctdvc.ctdvc_trangthaidon',3)
            ->select('hh.hh_tienthuho','hh.hh_khoiluong','ctdvc.ctdvc_phigui','ctdvc.ctdvc_km')
            ->get();
            array_push($dataset,$layThang);
        }
        $temp=Array();
        for($i=0; $i < count($dataset); $i++)
        {
            if(count($dataset[$i])!=0)
            {
                foreach($dataset[$i] as $val)
                {
                    $tongDoanhThu=$val->hh_khoiluong * $val->ctdvc_km * $gia->gc_gia;
                }
                array_push($temp,$tongDoanhThu);
                // array_push($temp,'co');
            }
            else
            {
                array_push($temp,0);
            }
            
            
        }
        
        return response()->json($temp, 200);
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
