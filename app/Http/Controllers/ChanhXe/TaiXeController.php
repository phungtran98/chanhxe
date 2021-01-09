<?php

namespace App\Http\Controllers\ChanhXe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
class TaiXeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taixe = DB::table('taixe')->where('cx_id',Auth::guard('chanhxe')->id())->get();

        
        return view('admin.pages.chanhxe.quanlitaixe.index',compact('taixe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        if($request->file('tx_hinhanh') && $request->file('tx_vanbang')){
           
            $taixe['tx_hoten'] =$request->tx_hoten;
            $taixe['tx_sdt'] =$request->tx_sdt;
            $taixe['tx_diachi'] =$request->tx_diachi;
            $taixe['cx_id'] =Auth::guard('chanhxe')->id();

            $tx_hinhanh = $request->file('tx_hinhanh');
            $filename =$tx_hinhanh->getClientOriginalName('tx_hinhanh');
            $tx_hinhanh->move('upload/chanhxe/taixe',$filename); 
            $taixe['tx_hinhanh'] =$filename ;


            $tx_vanbang = $request->file('tx_vanbang');
            $filename1 =$tx_vanbang->getClientOriginalName('tx_vanbang');
            $tx_vanbang->move('upload/chanhxe/taixe',$filename1); 
            $taixe['tx_vanbang'] =$filename1 ;



            DB::table('taixe')->insert($taixe);
            return redirect()->back();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Find(Request $request)
    {
        $taixe = DB::table('taixe')
        ->where('tx_hoten','like','%'.$request->tx_content.'%')
        ->orWhere('tx_sdt','like','%'.$request->tx_content.'%')
        ->orWhere('tx_diachi','like','%'.$request->tx_content.'%')
        ->get();
        // dd($finded);
        return view('admin.pages.chanhxe.quanlitaixe.index',compact('taixe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getTaiXe(Request $request)
    {
        if($request->ajax())
        {
            $taixe = DB::table('taixe')->where('tx_id',$request->tx_id)->first();
            return response()->json($taixe, 200);
        }
    }




    public function update(Request $request)
    {
        if($request->file('tx_hinhanh')){
            $tx_hinhanh = $request->file('tx_hinhanh');
            $filename =$tx_hinhanh->getClientOriginalName('tx_hinhanh');
            $tx_hinhanh->move('upload/chanhxe/taixe',$filename); 
            $taixe['tx_hinhanh'] =$filename ;
          
        }
        if($request->file('tx_vanbang')){
            $tx_vanbang = $request->file('tx_vanbang');
            $filename1 =$tx_vanbang->getClientOriginalName('tx_vanbang');
            $tx_vanbang->move('upload/chanhxe/taixe',$filename1); 
            $taixe['tx_vanbang'] =$filename1 ;
        }

        $taixe['tx_hoten'] =$request->tx_hoten;
        $taixe['tx_sdt'] =$request->tx_sdt;
        $taixe['tx_diachi'] =$request->tx_diachi;
        $taixe['cx_id'] =Auth::guard('chanhxe')->id();

        DB::table('taixe')->where('tx_id',$request->tx_id)->update($taixe);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('taixe')->where('tx_id',$id)->delete();
        return redirect()->back();
    }
}
