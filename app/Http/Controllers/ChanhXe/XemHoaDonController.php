<?php

namespace App\Http\Controllers\ChanhXe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Hash;
use Session;
class XemHoaDonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoadon =DB::table('xemhoadon')
        ->where('cx_id',Auth::guard('chanhxe')->id())
        ->orderBy('xhd_id','DESC')
        ->get();
        // dd($hoadon);
        return view('admin.pages.chanhxe.xemhoadon.index',compact('hoadon'));
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
    public function destroy(Request $request,$id)
    {
        $result = DB::table('xemhoadon')->where('xhd_id',$id)->delete();
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
