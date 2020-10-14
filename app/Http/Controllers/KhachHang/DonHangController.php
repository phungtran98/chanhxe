<?php

namespace App\Http\Controllers\KhachHang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    //Lập đơn hàng
    public function DonHangIndex()
    {
       
        // dd( $data );
        $kh_id = Auth::guard('khachhang')->id();

        $thanhPho = DB::table('tinh')->get();
        $chanhxe = DB::table('chanhxe')->get();
        $khachhang =DB::table('khachhang')->where('kh_id',$kh_id )->first();

        return view('admin.pages.khachhang.lapdonhang.lap-don-hang',compact(['thanhPho','khachhang','chanhxe']));
       
    }

    //quy đổi KG
    // Dịch vụ trong nước: Chiều dài x Chiều rộng x Chiều cao (cm)  / 3000
    // Dịch vụ quốc tế:      Chiều dài x Chiều rộng x Chiều cao (cm) / 5000
    public function changeHangHoa(Request $request)
    {
        if(\Request::ajax()){
            
            $dai= $request->dai;
            $rong= $request->rong;
            $cao= $request->cao;
            $data = number_format(($dai * $rong * $cao)/3000,1) ;
            return response()->json($data, 200);
        }
        return abort(404);
    }


    //Lấy Xe
    public function getTuyen($id)
    {
        $tuyen = DB::table('tuyen')->where('cx_id', $id)->get();
        if(\Request::ajax()){
      
            return response()->json($tuyen, 200);
        }
        return abort(404);
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
