<?php

namespace App\Http\Controllers\KhachHang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
class BinhLuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
       $data['cx_id'] = $request->cx_id;
       $data['kh_id'] = Auth::guard('khachhang')->id();
       $data['bl_danhgia'] = $request->bl_danhgia;

      try{

        DB::table('binhluan')->insert($data);
        return redirect()->back();

      }
      catch(ModelNotFoundException $exception)
      {
          dd('Sai rồi bạn ơi! Đừng quạo, kiểm tra kỉ lại nhé!');
      }

    }


    public function replystore(Request $request, $id)
    {
       $data = [];
       $data['bl_noidung'] = $request->bl_noidung;
       $data['cx_id'] = $request->cx_id;
       $data['kh_id'] = Auth::guard('khachhang')->id();
       $data['bl_idtraloi'] = $id;

        // dd($data);
      try{

        DB::table('binhluan')->insert($data);
        return redirect()->back();

      }
      catch(ModelNotFoundException $exception)
      {
          dd('Sai rồi bạn ơi! Đừng quạo, kiểm tra kỉ lại nhé!');
      }

    }

    public function AjaxComment(Request $request)
    {
      $com_id = $request->com_id;
      $data = DB::table('binhluan')->where('bl_id',$com_id)->select('bl_id','bl_noidung')->first();
      if(\Request::ajax())
      {
        return response()->json($data , 200);
      }
      return abort(404);
    }

    //cập nhật bình luận khi submit
    public function Updatestore(Request $request)
    {
      $data['bl_noidung'] = $request->bl_noidung;
      
      DB::table('binhluan')->where('bl_id', $request->bl_id)->update($data);
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
        DB::table('binhluan')->where('bl_id',$id)->delete();
        return redirect()->back();
    
    }
}
