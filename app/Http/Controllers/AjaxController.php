<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AjaxController extends Controller
{

    // Giợi ý chành xe theo tỉnh
    public function GetChanhXe(Request $request)
    {
        $id = $request->id;
        $data = DB::table('chitietdiachi')
        ->join('chanhxe','chanhxe.cx_id','chitietdiachi.cx_id')
        ->join('tinh','tinh.t_id','chitietdiachi.t_id')
        ->where('chitietdiachi.t_id',$id)
        // ->select('')
        ->get();
        if(\Request::ajax()){
            
            return response()->json($data, 200);
        }
        return abort(404);
    }
}
