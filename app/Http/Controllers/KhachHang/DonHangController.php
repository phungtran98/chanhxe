<?php

namespace App\Http\Controllers\KhachHang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Carbon\Carbon;
use Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
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
    
        // dd( $id ); id của tuyến đường sau khi được chọn
        $kh_id = Auth::guard('khachhang')->id();
        $kho =DB::table('kho')->where('t_id',1)->get();
        $tuyen= DB::table('tuyen as t')
        ->join('xe','xe.x_id','t.x_id')
        ->join('chanhxe as cx','cx.cx_id','xe.cx_id')
        ->where('t.t_id',1)
        ->first();
        // dd($tuyen);

        $thanhPho = DB::table('tinh')->get();
        $khachhang =DB::table('khachhang')->where('kh_id',$kh_id )->first();

        


        return view('admin.pages.khachhang.lapdonhang.lap-don-hang',compact(['thanhPho','khachhang','tuyen','kho']));
       
    }


    //Sử dụng cái này lập đơn hàng
    public function DonHangIndex2($id)
    {
        
        $kiemtra = DB::table('khachhang')->where('kh_id',auth::guard('khachhang')->id())->first();

        if($kiemtra->active == 0)
        {
            Session::flash('OTPF', 'Bạn chưa xác thực tài khoản, vui lòng nhập số điện thoại!');
            return redirect()->route('kh-cai-dat-thong-tin-ca-nhan');
        }


        // dd( $id ); id của tuyến đường sau khi được chọn
        $kh_id = Auth::guard('khachhang')->id();
        $kho =DB::table('kho')->where('t_id',$id)->get();
        $tuyen= DB::table('tuyen as t')
        ->join('xe','xe.x_id','t.x_id')
        ->join('chanhxe as cx','cx.cx_id','xe.cx_id')
        ->where('t.t_id',$id)
        ->first();
        // dd($tuyen);

        $thanhPho = DB::table('tinh')->get();
        $khachhang =DB::table('khachhang')->where('kh_id',$kh_id )->first();

        


        return view('admin.pages.khachhang.lapdonhang.index',compact(['thanhPho','khachhang','tuyen','kho']));
       
    }

    //quy đổi KG
    // Dịch vụ trong nước: Chiều dài x Chiều rộng x Chiều cao (cm)  / 3000
    // Dịch vụ quốc tế:      Chiều dài x Chiều rộng x Chiều cao (cm) / 5000
    public function changeHangHoa(Request $request)
    {
        try {
            //code...
            if(\Request::ajax()){
            
                $dai= $request->dai;
                $rong= $request->rong;
                $cao= $request->cao;
                $data = number_format(($dai * $rong * $cao)/3000,1);
    
                return response()->json($data, 200);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th, 200);
        }
        // if(\Request::ajax()){
            
        //     $dai= $request->dai;
        //     $rong= $request->rong;
        //     $cao= $request->cao;
        //     $data = ($dai * $rong * $cao * 1000 )/3000 ;
                
        //     return response()->json($data, 200);
        // }
        // return abort(404);
    }

    //Formart_Number


    public function Formart_Number(Request $request)
    {
        if($request->ajax())
        {
        //     $num =number_format( (double)$request->num);
            return response()->json($request->num, 200);
        }
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
    //Lấy Xe
    public function getKho($id)
    {
        $kho = DB::table('kho')->where('t_id', $id)->first();
        // if(\Request::ajax()){
      
            return response()->json($kho, 200);
        // }
        // return abort(404);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $madon = rand(111111111111,99999999999);
        // dd($madon);

        // lấy thông tin người gửi
        $kh['kh_id'] = Auth::guard('khachhang')->id();
        $kh['t_id'] = $request->t_id;
        if($request->Send_Method == 1){
            $kh['method_value'] = $request->method_value;
        }
        if($request->Send_Method == 2){
            $kh['method_value'] = "Gửi tại kho";
        }
        
        // dd($kh); 


        //Thông tin người nhận
        $nguoinhan['kh_nhan_ten']=$request->kh_nhan_ten;
        $nguoinhan['kh_nhan_sdt']=$request->kh_nhan_sdt;
        $nguoinhan['kh_nhan_diachi']=$request->kh_nhan_diachi;
        $nguoinhan['kh_nhan_ghichu']=$request->kh_nhan_ghichu;

        // dd($nguoinhan);





        // Thông tin hàng hóa
        $hanghoa['hh_ten']= $request->hh_ten;
        // $hanghoa['hh_hinhanh']= $request->hh_hinhanh;
        $hanghoa['hh_soluong']= $request->hh_soluong;
        $hanghoa['hh_khoiluong']= $request->hh_khoiluong;
        $hanghoa['hh_giatri']= $request->hh_giatri;
        $hanghoa['hh_mota']= $request->hh_ghichu;
        $hanghoa['hh_kichthuoc']= $request->Dai.'x'.$request->Rong.'x'.$request->Cao;
        $hanghoa['hh_khoiluong']= $request->hh_khoiluong;
        $hanghoa['hh_tienthuho']= $request->hh_tienthuho;

        // if($request->hasfile('hh_hinhanh')){
        //     $file = $request->file('hh_hinhanh');
        //     $filename =$file->getClientOriginalName('hh_hinhanh');
        //     $file->move('upload/khachhang/hanghoa',$filename); 
        //     $hanghoa['hh_hinhanh']=$filename ;
        // }

        $result_hh_id = DB::table('hanghoa')->insertGetId($hanghoa);
        //  dd($result_hh_id);
         $hinhanhhanghoa=array();
         if($files=$request->file('hh_hinhanh')){
             foreach($files as $file){
                 $name=$file->getClientOriginalName();
                 $file->move('upload/khachhang/hanghoa',$name);
                DB::table('hinhanhhanghoa')->insert([
                    'hhhh_hinhanh'=>$name,
                    'hh_id'=>$result_hh_id
                ]);
             }      
         }


        // dd($request->file('hh_hinhanh'));


        

        $mytime = Carbon::now();
        $dvc['dvc_ngaylap'] =date('Y-m-d H:i:s', strtotime($mytime));
        $dvc['kh_id'] =$kh['kh_id'];
        $dvc['dvc_madon'] =$madon;
        $dvc['dvc_thongbao'] =0; // nếu là 0 sẽ hiện thông báo cho chành xe, 1 sẽ ẩn thông báo
        $dvc['dvc_hinhthucgui'] =$kh['method_value'];
        $dvc['cx_id'] =$request->cx_id;
        $dvc_id = DB::table('donvanchuyen')->insertGetId($dvc);
        // dd($dvc);


        $km=explode(" ",$request->kh_nhan_km);
        $gio=explode(" ",$request->kh_nhan_tgchay);
        // dd($gio);
        $ctdvc['dvc_id']=$dvc_id;
        $ctdvc['hh_id']=$result_hh_id;
        $ctdvc['t_id']=(int)$kh['t_id'];
        $ctdvc['ctdvc_trangthaidon']=0;
        $ctdvc['ctdvc_phigui']=0;
        $ctdvc['ctdvc_hotennhan']=$nguoinhan['kh_nhan_ten'];
        $ctdvc['ctdvc_sdtnhan']=$nguoinhan['kh_nhan_sdt'];
        $ctdvc['ctdvc_km']=$km[0];
        $ctdvc['ctdvc_thoigian']=$gio[0].' Giờ '.$gio[0].' phút';
        $ctdvc['ctdvc_diachinhan']=$nguoinhan['kh_nhan_diachi'];
        $ctdvc['ctdvc_mota']= $nguoinhan['kh_nhan_ghichu'];


        // dd($ctdvc);

        $result_ctdvc=DB::table('chitietdonvanchuyen')->insert($ctdvc);
        if($result_ctdvc)
        {
            $request->session()->flash('mss', 'Tạo đơn thành công!');
            return redirect()->route('kh-ql-don-hang');
        }
        else
        {
            $request->session()->flash('error', 'Tạo đơn thất bại!');
            return redirect()->back();
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
    public function CheckLapDon(Request $request)
    {
        $data =DB::table('donvanchuyen')->where('kh_id',$request->kh_id)->get();
        return response()->json($data, 200);
       
        
    }








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
