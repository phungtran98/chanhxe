<?php

namespace App\Http\Controllers\ChanhXe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Session;
class ChiTietKhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $tuyen = DB::table('tuyen')->where('t_id',$id)->first();
        $kho = DB::table('kho')->where('t_id',$id)->get();
        return view('admin.pages.chanhxe.quanlituyen.chi-tiet-kho',compact('kho','tuyen','id'));
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

  
    public function getKhoMap(Request $request)
    {
        if($request->ajax())
        {
            $data = DB::table('kho')->where('t_id',$request->tuyen)->get();
            return response()->json($data,200);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $result = DB::table('kho')->where('k_id',$id)->delete();
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

