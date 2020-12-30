<?php

namespace App\Http\Controllers\ChanhXe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Auth;
use PDF;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\IOFactory;
use carbon\carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use peal\barcodegenerator\Server\BarCodeServer;
use peal\barcodegenerator\BarCode;
use \Milon\Barcode\DNS1D;

class QuanLiDonDatHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ctdvc = DB::table('chitietdonvanchuyen as ctdvc')
        ->join('donvanchuyen as dvc','dvc.dvc_id','ctdvc.dvc_id')
        ->join('khachhang as kh','kh.kh_id','dvc.kh_id')
        ->join('hanghoa as hh','hh.hh_id','ctdvc.hh_id')
        ->join('tuyen as t','t.t_id','ctdvc.t_id')
        ->join('xe as x','x.x_id','t.x_id')
        ->join('chanhxe as cx','cx.cx_id','x.cx_id')
        ->where('cx.cx_id',auth::guard('chanhxe')->id())
        ->orderBy('ctdvc.ctdvc_id','DESC')
        ->get();
        // dd($ctdvc);
      return view('admin.pages.chanhxe.quanlidondathang.index',compact('ctdvc'));
    }

   
    public function ChiTietDonHangIndex($id)
    {
        $hh_id = DB::table('chitietdonvanchuyen')->where('ctdvc_id',$id)->select('hh_id')->first();
        
        $hinhanh = DB::table('hinhanhhanghoa')->where('hh_id',$hh_id->hh_id)->select('hhhh_hinhanh')->get();
        $ctdvc = DB::table('chitietdonvanchuyen as ctdvc')
        ->join('donvanchuyen as dvc','dvc.dvc_id','ctdvc.dvc_id')
        ->join('khachhang as kh','kh.kh_id','dvc.kh_id')
        ->join('hanghoa as hh','hh.hh_id','ctdvc.hh_id')
        ->join('tuyen as t','t.t_id','ctdvc.t_id')
        ->join('xe as x','x.x_id','t.x_id')
        ->join('chanhxe as cx','cx.cx_id','x.cx_id')
        ->where('ctdvc_id',$id)->first();
        //   dd($ctdvc);
        return view('admin.pages.chanhxe.quanlidondathang.chi-tiet-don-hang',compact('ctdvc','hinhanh'));
    }


    //Tìm kiếm theo trạng thái
    public function FindStatus(Request $request)
    {
        $data['ctdcv_trangthaidon'] = $request->loc_trangthai;

        $ctdvc = DB::table('chitietdonvanchuyen as ctdvc')
        ->join('donvanchuyen as dvc','dvc.dvc_id','ctdvc.dvc_id')
        ->join('khachhang as kh','kh.kh_id','dvc.kh_id')
        ->join('hanghoa as hh','hh.hh_id','ctdvc.hh_id')
        ->join('tuyen as t','t.t_id','ctdvc.t_id')
        ->join('xe as x','x.x_id','t.x_id')
        ->join('chanhxe as cx','cx.cx_id','x.cx_id')
        ->where('cx.cx_id',auth::guard('chanhxe')->id())
        ->where('ctdvc.ctdvc_trangthaidon',$data)
        ->orderBy('ctdvc.ctdvc_id','DESC')
        ->get();

        // dd($ctdvc);
      
        return view('admin.pages.chanhxe.quanlidondathang.index',compact('ctdvc'));
    }


    public function FindContent(Request $request)
    {
        $ctdvc=[];
        // dd($request->kh_content);
        if($request->cx_luachon == 'nguoigui')
        {
            $ctdvc = DB::table('chitietdonvanchuyen as ctdvc')
            ->join('donvanchuyen as dvc','dvc.dvc_id','ctdvc.dvc_id')
            ->join('khachhang as kh','kh.kh_id','dvc.kh_id')
            ->join('hanghoa as hh','hh.hh_id','ctdvc.hh_id')
            ->join('tuyen as t','t.t_id','ctdvc.t_id')
            ->join('xe as x','x.x_id','t.x_id')
            ->join('chanhxe as cx','cx.cx_id','x.cx_id')
            ->where('cx.cx_id',auth::guard('chanhxe')->id())
            ->where('kh.kh_hoten','like','%'.$request->cx_content.'%')
            ->orderBy('ctdvc.ctdvc_id','DESC')
            ->get();
            // dd($ctdvc);
        }
        if($request->cx_luachon == 'nguoinhan')
        {
            $ctdvc = DB::table('chitietdonvanchuyen as ctdvc')
            ->join('donvanchuyen as dvc','dvc.dvc_id','ctdvc.dvc_id')
            ->join('khachhang as kh','kh.kh_id','dvc.kh_id')
            ->join('hanghoa as hh','hh.hh_id','ctdvc.hh_id')
            ->join('tuyen as t','t.t_id','ctdvc.t_id')
            ->join('xe as x','x.x_id','t.x_id')
            ->join('chanhxe as cx','cx.cx_id','x.cx_id')
            ->where('cx.cx_id',auth::guard('chanhxe')->id())
            ->where('ctdvc.ctdvc_hotennhan','like','%'.$request->cx_content.'%')
            ->orderBy('ctdvc.ctdvc_id','DESC')
            ->get();
        }
        if($request->cx_luachon == 'hanghoa')
        {
            $ctdvc = DB::table('chitietdonvanchuyen as ctdvc')
            ->join('donvanchuyen as dvc','dvc.dvc_id','ctdvc.dvc_id')
            ->join('khachhang as kh','kh.kh_id','dvc.kh_id')
            ->join('hanghoa as hh','hh.hh_id','ctdvc.hh_id')
            ->join('tuyen as t','t.t_id','ctdvc.t_id')
            ->join('xe as x','x.x_id','t.x_id')
            ->join('chanhxe as cx','cx.cx_id','x.cx_id')
            ->where('cx.cx_id',auth::guard('chanhxe')->id())
            ->where('hh.hh_ten','like','%'.$request->cx_content.'%')
            ->orderBy('ctdvc.ctdvc_id','DESC')
            ->get();
            // dd($ctdvc);
        }

       

        return view('admin.pages.chanhxe.quanlidondathang.index',compact('ctdvc'));
    }







    //Cập nhật trạng thái đơn vận chuyển
    public function AjaxCapNhatTrangThai(Request $request)
    {
        if($request->ajax()){
            $data['ctdvc_trangthaidon']=$request->status;

            DB::table('chitietdonvanchuyen')->where('ctdvc_id',$request->id)->update($data);
            return response()->json($request->status, 200);
        }
    }


    //tìm kiếm
    public function TimKiem(Request $request)
    {
        $data['ctdcv_trangthaidon'] = $request->loc_trangthai;

        $ctdvc = DB::table('chitietdonvanchuyen as ctdvc')
        ->join('donvanchuyen as dvc','dvc.dvc_id','ctdvc.dvc_id')
        ->join('khachhang as kh','kh.kh_id','dvc.kh_id')
        ->join('hanghoa as hh','hh.hh_id','ctdvc.hh_id')
        ->join('tuyen as t','t.t_id','ctdvc.t_id')
        ->join('xe as x','x.x_id','t.x_id')
        ->join('chanhxe as cx','cx.cx_id','x.cx_id')
        ->where('cx.cx_id',auth::guard('chanhxe')->id())
        ->where('ctdvc.ctdvc_trangthaidon',$data)
        // ->orderBy('ctdvc.ctdvc_id','DESC')
        ->get();
        // dd($ctdvc);
        return view('admin.pages.chanhxe.quanlidondathang.index',compact('ctdvc'));
    }



    public function InDonHanPDF($ctdvvc_id)
    {
        $pdf = \App::make('dompdf.wrapper');
        $ctdvc = DB::table('chitietdonvanchuyen as ctdvc')
        ->join('donvanchuyen as dvc','dvc.dvc_id','ctdvc.dvc_id')
        ->join('khachhang as kh','kh.kh_id','dvc.kh_id')
        ->join('hanghoa as hh','hh.hh_id','ctdvc.hh_id')
        ->join('tuyen as t','t.t_id','ctdvc.t_id')
        ->join('xe as x','x.x_id','t.x_id')
        ->join('chanhxe as cx','cx.cx_id','x.cx_id')
        ->where('ctdvc_id',$ctdvvc_id)->first();
        $thoigian = new Carbon();

        $Barcode = new DNS1D();
        $Barcode->setStorPath(__DIR__.'/cache/');
       



        $pdf = PDF::loadView('admin.pages.chanhxe.quanlidondathang.hoa-don',compact('ctdvc','thoigian','Barcode'));
        // return view('admin.pages.chanhxe.quanlidondathang.hoa-don',compact('ctdvc'));
        return $pdf->stream();
    }
    public function InDonHang($ctdvvc_id)
    {
        
        
        // $pdf->loadHTML($this->In_Don_Convert($ctdvvc_id));
       
        // $data = ['title' => 'Welcome to ItSolutionStuff.com'];
        
  
        // return $pdf->download('itsolutionstuff.pdf');
         
        $ctdvc = DB::table('chitietdonvanchuyen as ctdvc')
        ->join('donvanchuyen as dvc','dvc.dvc_id','ctdvc.dvc_id')
        ->join('khachhang as kh','kh.kh_id','dvc.kh_id')
        ->join('hanghoa as hh','hh.hh_id','ctdvc.hh_id')
        ->join('tuyen as t','t.t_id','ctdvc.t_id')
        ->join('xe as x','x.x_id','t.x_id')
        ->join('chanhxe as cx','cx.cx_id','x.cx_id')
        ->where('ctdvc_id',$ctdvvc_id)->first();

        $p1= (int)$ctdvc->ctdvc_km  * $ctdvc->hh_khoiluong * 1000 ;          
        $thoigian = new Carbon();

        $templateProcessor = new TemplateProcessor('hoadon/phieuguihang.docx');
        $templateProcessor->setValue('cx_tenchanhxe', $ctdvc->cx_tenchanhxe);
        $templateProcessor->setValue('t_tentuyen', $ctdvc->t_tentuyen);
        $templateProcessor->setValue('ngaylapdon', date('d-m-Y H:i:s', strtotime($thoigian)));
        $templateProcessor->setValue('kh_hoten', $ctdvc->kh_hoten);
        $templateProcessor->setValue('kh_diachi', $ctdvc->kh_diachi);
        $templateProcessor->setValue('kh_sdt', $ctdvc->kh_sdt);

        $templateProcessor->setValue('nguoinhan', $ctdvc->ctdvc_hotennhan);
        $templateProcessor->setValue('ctdvc_diachinhan', $ctdvc->ctdvc_diachinhan);
        $templateProcessor->setValue('ctdvc_sdtnhan', $ctdvc->ctdvc_sdtnhan);
        $templateProcessor->setValue('hh_tienthuho', number_format($ctdvc->hh_tienthuho));
        $templateProcessor->setValue('ghichu', $ctdvc->ctdvc_mota);
        $templateProcessor->setValue('hh_ten', $ctdvc->hh_ten);
        $templateProcessor->setValue('hh_khoiluong', $ctdvc->hh_khoiluong);
        $templateProcessor->setValue('hh_soluong', $ctdvc->hh_soluong);
        $templateProcessor->setValue('hh_kichthuoc', $ctdvc->hh_kichthuoc);
        $templateProcessor->setValue('hh_soluong', $ctdvc->hh_soluong);
        $templateProcessor->setValue('QR',$ctdvc->dvc_madon);
        $templateProcessor->setValue('cuocphi',number_format($p1));
        
        
        if ($ctdvc->ctdvc_phigui !=0)
        {
            $templateProcessor->setValue('tongtienthu',number_format($ctdvc->hh_tienthuho));
            $templateProcessor->setValue('datra',number_format($p1));
        }
        else
        {

            $templateProcessor->setValue('tongtienthu',number_format($p1+$ctdvc->hh_tienthuho));
            $templateProcessor->setValue('datra',0);
        }
        
        






        $ngaythang = date('d-m-Y', strtotime($thoigian));
        // dd($ngaythang);
        $madon = $ctdvc->dvc_madon;








        $templateProcessor->saveAs('hoadon/'.$ngaythang.'_'.$madon.'.docx');
        return response()->download('hoadon/'.$ngaythang.'_'.$madon.'.docx')->deleteFileAfterSend(false);
    }


    public function FindDate(Request $request)
    {
       
        $ctdvc = DB::table('chitietdonvanchuyen as ctdvc')
        ->join('donvanchuyen as dvc','dvc.dvc_id','ctdvc.dvc_id')
        ->join('khachhang as kh','kh.kh_id','dvc.kh_id')
        ->join('hanghoa as hh','hh.hh_id','ctdvc.hh_id')
        ->join('tuyen as t','t.t_id','ctdvc.t_id')
        ->join('xe as x','x.x_id','t.x_id')
        ->join('chanhxe as cx','cx.cx_id','x.cx_id')
        ->where('cx.cx_id',auth::guard('chanhxe')->id())
        ->whereBetween('dvc.dvc_ngaylap',[$request->BDate,$request->EDate])
        ->orderBy('ctdvc.ctdvc_id','DESC')
        ->get();
        dd($ctdvc);

        return view('admin.pages.khachhang.quanlidonhang.quan-li-don-hang',compact('ctdvc'));
    }



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
