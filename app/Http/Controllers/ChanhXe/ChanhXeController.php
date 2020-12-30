<?php

namespace App\Http\Controllers\ChanhXe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Auth;
class ChanhXeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AdminChanhXe()
    {
        $donTong=0;
        $donDaGiao=0;
        $donHuy=0;
        $donChoDuyet=0;
        $don = DB::table('chitietdonvanchuyen')->get();
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
        }

  
        return view('admin.pages.chanhxe.index',compact('donChoDuyet','donDaGiao','donHuy','donTong'));
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
