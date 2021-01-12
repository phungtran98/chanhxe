<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use auth;
use DB;
use Session;
use Hash;
use Nexmo;
class DanhSachChanhXeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chanhxe =DB::table('chanhxe')->get();

        return view('admin.pages.admin.danh-sach-chanh-xe.index',compact('chanhxe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ChiTiet($id)
    {
       
        $chanhxe = DB::table('chanhxe')->where('cx_id',$id)->first();
        $tuyen = DB::table('chanhxe as cx')
        ->join('xe','xe.cx_id','cx.cx_id')
        ->join('tuyen','tuyen.x_id','xe.x_id')
        ->where('cx.cx_id', $id)
        ->get();
        // dd($tuyen);

        $hinhanhcx = DB::table('hinhanhchanhxe')->where('cx_id',$id)->get();

        //xe
        $xe = DB::table('xe')->where('cx_id',$id)->get();


        //Lấy bình luận của chành xe
        $binhluan = DB::table('binhluan as bl')
        ->join('khachhang as kh','kh.kh_id','bl.kh_id')
        ->where('cx_id',$id)->get();
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


        return view('admin.pages.admin.danh-sach-chanh-xe.chi-tiet-cx',compact(['chanhxe','binhluan','rate','star','tuyen','hinhanhcx','xe']));
    }





    public function Search(Request $request)
    {
        $chanhxe =DB::table('chanhxe')
        ->orWhere('cx_tenchanhxe','like','%'.$request->content.'%')
        ->orWhere('cx_hoten','like','%'.$request->content.'%')
        ->orWhere('cx_email','like','%'.$request->content.'%')
        ->orWhere('cx_sdt','like','%'.$request->content.'%')
        ->orWhere('cx_masothue','like','%'.$request->content.'%')
        ->get();

        return view('admin.pages.admin.danh-sach-chanh-xe.index',compact('chanhxe'));
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
    public function XacThuc($id)
    {
        DB::table('chanhxe')->where('cx_id',$id)->update([
            'active'=>1,
            'code'=>Hash::make(0000)
        ]);
         Session::flash('XacThuc', 'Xác thực thành công!');
         return redirect()->back();
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
