<?php

namespace App\Http\Controllers\ChanhXe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Session;
class TuyenXeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $xe = DB::table('xe')->where('cx_id',auth::guard('chanhxe')->id())->get();
       
        $tinh = DB::table('tinh')->get();
        $data = DB::table('tuyen as t')
        ->join('xe','xe.x_id','t.x_id')
        ->OrderBy('t.t_id','DESC')
        ->get();
        // dd($data);
        return view('admin.pages.chanhxe.quanlituyen.dang-ki-tuyen',compact('xe','tinh','data'));
    }


    public function StoreTuyen(Request $request)
    {
       
           

            $kho['k_diachi']=$request->vitri;
            $kho['lat']=$request->lat;
            $kho['lng']=$request->lng;
            $kho['t_id']=$request->t_id;
            $kho['k_ten']=$request->kho_ten;

            $data = DB::table('kho')->insert($kho);

            $getKho =  DB::table('kho')->where('t_id',$request->t_id)->get();

            return response()->json($getKho,200);
            
        
    }


    public function CheckTuyen(Request $request)
    {
        $mss=0;
        $data = DB::table('chitiettuyen')->where('t_id',$request->t_id)->where('x_id',$request->t_id)->first();
        if($data){
            $mss=1;
        }
        if($request->ajax())
        {
           return response()->json($mss,200);
        }
    }



    public function store(Request $request)
    {
        $di=$request->tuyendi;
        $den = $request->tuyenden;

        $tuyen['t_tentuyen']= $di.' - '.$den;
        $tuyen['x_id']=$request->banso ;
        $tuyen['t_mota']=$request->mota ;
        // dd($tuyen);
        DB::table('tuyen')->insert($tuyen);
        return redirect()->back();
    }

  
    public function ShowMap(Request $request)
    {
        $chanhxe = DB::table('chitiettuyen as ctt')
        ->join('tuyen as t','t.t_id','ctt.t_id')
        ->join('xe as x','x.x_id','ctt.x_id')
        ->join('baidauxedi as bdx','bdx.bdxdi_id','t.bdxdi_id')
        ->select('bdx.lat','bdx.lng')
        ->get();
        if($request->ajax())
        {
            return response()->json($chanhxe, 200);
        }
       
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

 
    public function destroy(Request $request,$id)
    {
        $result = DB::table('tuyen')->where('t_id',$id)->delete();
        if($result)
        {
            $request->session()->flash('mss', 'Xóa thành công!');
            return redirect()->back();
        }
        else
        {
            $request->session()->flash('error', 'Xóa thất bại!');
            return redirect()->back();
        }
    }
}
