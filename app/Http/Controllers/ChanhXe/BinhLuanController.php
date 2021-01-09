<?php

namespace App\Http\Controllers\ChanhXe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
class BinhLuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {                                        
        $data = [];
        $data['bl_noidung'] = $request->bl_noidung;
        $data['cx_id'] = Auth::guard('chanhxe')->id();
    //    $data['kh_id'] = Auth::guard('khachhang')->id();
    //    $data['bl_danhgia'] = $request->bl_danhgia;

        // dd($data);
        DB::table('binhluan')->insert($data);
        return redirect()->back();

      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }



    public function replystore(Request $request,$id)
    {
        // echo $id;
        $data = [];
       $data['bl_noidung'] = $request->bl_noidung;
       $data['cx_id'] = Auth::guard('chanhxe')->id();
       $data['kh_id'] = $request->kh_id;
       $data['cx_rep'] = Auth::guard('chanhxe')->id();
       $data['bl_idtraloi'] = $request->kh_id;
    
        
      try{

        DB::table('binhluan')->insert($data);
        return redirect()->back();

      }
      catch(ModelNotFoundException $exception)
      {
          dd('Sai rồi bạn ơi! Đừng quạo, kiểm tra kỉ lại nhé!');
      }
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
