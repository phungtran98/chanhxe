<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ThongKeController extends Controller
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
            ->where('cx.cx_id',$request->id)
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
