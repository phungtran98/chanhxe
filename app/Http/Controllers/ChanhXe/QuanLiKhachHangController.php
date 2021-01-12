<?php

namespace App\Http\Controllers\ChanhXe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
class QuanLiKhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $id = DB::table('chitietdonvanchuyen as ctdvc')
        ->join('donvanchuyen as dvc','dvc.dvc_id','ctdvc.dvc_id')
        ->join('khachhang as kh','kh.kh_id','dvc.kh_id')
        ->join('hanghoa as hh','hh.hh_id','ctdvc.hh_id')
        ->join('tuyen as t','t.t_id','ctdvc.t_id')
        ->join('xe as x','x.x_id','t.x_id')
        ->where('x.cx_id',auth::guard('chanhxe')->id())
        ->select('kh.kh_id')->distinct('kh_id')
        ->get();
          
        // dd($kh);
      

        
        for($i=0; $i< count($id) ; $i++){
            $kh[$i]=DB::table('khachhang')->where('kh_id',$id[$i]->kh_id)->first();
        }
        // dd(isset($kh));
        
        if(isset($kh))
        {
            for($i=0; $i< count($id) ; $i++){
                $donhang_khachhang[$i] = DB::table('chitietdonvanchuyen as ctdvc')
                ->join('donvanchuyen as dvc','dvc.dvc_id','ctdvc.dvc_id')
                ->join('khachhang as kh','kh.kh_id','dvc.kh_id')
                ->where('kh.kh_id',$kh[$i]->kh_id)->get();
            }
        }
        else
        {
            $kh=[];
            $donhang_khachhang=[];
        }

        
        

    //    dd($kh);
        
        
        // dd($donhang_khachhang[0]);
        return view('admin.pages.chanhxe.quanlikhachhang.index',compact('kh','donhang_khachhang'));
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
