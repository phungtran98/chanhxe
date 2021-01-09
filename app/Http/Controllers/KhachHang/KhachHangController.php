<?php

namespace App\Http\Controllers\KhachHang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chanhxe =DB::table('chanhxe')->get();
        
        $binhluan =DB::table('chanhxe as cx')
        ->join('binhluan as bl','cx.cx_id','bl.cx_id')
        ->whereNotNull('bl.bl_danhgia')
        ->get();
        // dd($chanhxe);

           
        return view('users.pages.index',compact('chanhxe','binhluan'));
    }


    //Trang quản trị của khách hàng
    public function AdminKhachHang()
    {
        $chanhxe = DB::table('chanhxe')->get();
        $dvc =DB::table('donvanchuyen as dvc')
        ->join('chitietdonvanchuyen as ctdvc','ctdvc.dvc_id','dvc.dvc_id')
        ->join('hanghoa as hh','hh.hh_id','ctdvc.hh_id')
        ->where('dvc.kh_id',Auth::guard('khachhang')->id())
        ->get();
        // dd($dvc);


        return view('admin.pages.khachhang.dashboard.index',compact('chanhxe','dvc'));
    }

    
    
   

    



    public function ChiTietTuyen($id)
    {
        $tuyen= DB::table('tuyen as t')
        ->join('xe','xe.x_id','t.x_id')
        ->join('taixe as tx','xe.tx_id','tx.tx_id')
        ->join('chanhxe as cx','cx.cx_id','xe.cx_id')
        // ->join('kho as k','k.t_id','t.t_id')
        ->where('t.t_id',$id)
        ->first();
        $kho = DB::table('kho')->get();

        // dd($tuyen);
        return view('users.pages.chanhxe.chi-tiet-tuyen',compact('tuyen','kho'));
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
    public function ChiTietCX($id)
    {
        $hinhanhcx = DB::table('hinhanhchanhxe')->where('cx_id',$id)->get();
        // dd($hinhanhcx);

        $tuyen= DB::table('tuyen as t')
        ->join('xe','xe.x_id','t.x_id')
        ->join('taixe as tx','xe.tx_id','tx.tx_id')
        ->join('chanhxe as cx','cx.cx_id','xe.cx_id')
        // ->join('kho as k','k.t_id','t.t_id')
        ->where('cx.cx_id',$id)
        ->OrderBy('t.t_id','DESC')
        ->get();


        // dd($tuyen);
        // foreach($tuyen as $val){
        //     $t_id = $val->t_id;
        // }
        $kho = DB::table('kho')->get();
        $chanhxe = DB::table('chanhxe')->where('cx_id',$id)->first();
        //Lấy bình luận của chành xe
        $binhluan = DB::table('binhluan as bl')
        ->join('khachhang as kh','kh.kh_id','bl.kh_id')
        ->join('chanhxe as cx','cx.cx_id','bl.cx_id')
        ->where('cx.cx_id',$id)->get();
        $rate=0;
        $count=0;
        $star[0]=0;
        $star[1]=0;
        $star[2]=0;
        $star[3]=0;
        $star[4]=0;
        foreach($binhluan as $item){
            if($item->bl_danhgia !=0)
            {
                $rate += $item->bl_danhgia;
                $count ++;

                if($item->bl_danhgia==1)
                   { $star[0] = $star[0] +1;}
               

                if($item->bl_danhgia==2)
                   { $star[1] = $star[1] +1;}
              

                if($item->bl_danhgia==3)
                   { $star[2] = $star[2] +1;}
              
                if($item->bl_danhgia==4)
                    {$star[3] = $star[3] +1;}
                

                if($item->bl_danhgia==5)
                   { $star[4] = $star[4] +1;}
                
            }
        }
        if($count ==0){
            $rate=0;
        }
        else
        $rate = number_format($rate/$count,1) ;
  
        return view('users.pages.chanhxe.chi-tiet-chanh-xe',compact(['chanhxe','binhluan','rate','star','tuyen','kho','hinhanhcx']));
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

