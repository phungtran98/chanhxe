<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class TinhQuanHuyenContrller extends Controller
{
    public function getQuan($id)
    {
        $quanHuyen = DB::table('quan')->where('t_id', $id)->get();
        if(\Request::ajax()){
      
            return response()->json($quanHuyen, 200);
        }
        return abort(404);
    }

    public function getPhuong($id)
    {
        $quanHuyen = DB::table('phuong')->where('q_id', $id)->get();
        if(\Request::ajax()){
      
            return response()->json($quanHuyen, 200);
        }
        return abort(404);
    }
}
