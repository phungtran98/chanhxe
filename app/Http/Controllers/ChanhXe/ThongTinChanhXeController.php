<?php

namespace App\Http\Controllers\ChanhXe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Hash;
use Session;
class ThongTinChanhXeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::guard('chanhxe')->id();
        $chanhxe = DB::table('chanhxe')->where('cx_id',$id)->first();
        $tuyen = DB::table('chanhxe as cx')
        ->join('xe','xe.cx_id','cx.cx_id')
        ->join('tuyen','tuyen.x_id','xe.x_id')
        ->where('cx.cx_id', $id)
        ->get();
        // dd($tuyen);

        $hinhanhcx = DB::table('hinhanhchanhxe')->where('cx_id',Auth::guard('chanhxe')->id())->get();

        //xe
        $xe = DB::table('xe')->where('cx_id',Auth::guard('chanhxe')->id())->get();


        //Lấy bình luận của chành xe
        $binhluan = DB::table('binhluan as bl')
        ->join('khachhang as kh','kh.kh_id','bl.kh_id')
        ->where('cx_id',$id)->get();
        $rate=0;
        $count=0;
        $star[0]=0;
        $star[1]=0;
        $star[2]=0;
        $star[3]=0;
        $star[4]=0;
        foreach($binhluan as $item){
            if($item->bl_danhgia !=0)
            {
                $rate += $item->bl_danhgia;
                $count ++;

                if($item->bl_danhgia==1)
                   { $star[0] = $star[0] +1;}
               

                if($item->bl_danhgia==2)
                   { $star[1] = $star[1] +1;}
              

                if($item->bl_danhgia==3)
                   { $star[2] = $star[2] +1;}
              
                if($item->bl_danhgia==4)
                    {$star[3] = $star[3] +1;}
                

                if($item->bl_danhgia==5)
                   { $star[4] = $star[4] +1;}
                
            }
        }
        if($count ==0){
            $rate=0;
        }
        else
        $rate = number_format($rate/$count,1) ;
        // dd($star);
        return view('admin.pages.chanhxe.caidat.index',compact(['chanhxe','binhluan','rate','star','tuyen','hinhanhcx','xe']));
    }

 
   


    // Cap nhật hình ảnh
    public function UpdateImg(Request $request)
    {
        // dd($request->all());
        if($request->hasFile('cx_hinhanh')){
                
            $file = $request->file('cx_hinhanh');
            $filename =$file->getClientOriginalName('cx_hinhanh');
            $file->move('upload/chanhxe',$filename); 
            $data['cx_hinhanh'] =$filename ;


            $images=array();
            if($files1=$request->file('hacx_hinhanh')){
                foreach($files1 as $file2){
                    $name=$file2->getClientOriginalName();
                    $file2->move('upload/chanhxe',$name);
                    $images[]=$name;
                }     
            }
            
           for ($i=0; $i < count($images) ; $i++) { 
            DB::table('hinhanhchanhxe')->insert([
                'hacx_hinhanh'=>$images[$i],
                'cx_id'=>Auth::guard('chanhxe')->id()
            ]);
           }

            
            DB::table('chanhxe')->where('cx_id',Auth::guard('chanhxe')->id())->update($data);
            return redirect()->back();
        }
        return redirect()->back();
    }


    public function UpdateInfo(Request $request)
    {
        $data['cx_masothue'] = $request->cx_masothue;
        $data['cx_giayphep'] = $request->cx_giayphep;
        $data['cx_sdt'] = $request->cx_sdt;
        $data['cx_email'] = $request->cx_email;

        DB::table('chanhxe')->where('cx_id',Auth::guard('chanhxe')->id())->update($data);
        return redirect()->back();
    }


    //Lấy mã xác thực Ajax
    public function AjaxGetCode(Request $request)
    {
        $string=rand(1000,9999);
        // $string=404;
       
        // $basic  = new \Nexmo\Client\Credentials\Basic('a81ee7fa', 'Amv1gQPDJrZbc0yG');
        // $client = new \Nexmo\Client($basic);
        
        // $message = $client->message()->send([
        //     'to' => '84868692240',
        //     'from' => 'Vonage APIs',
        //     'text' =>  $string
        // ]);




        $data = Hash::make($string);
        // $data = $string;

        if(\Request::ajax()){

            return response()->json($data, 200);
        }
        return abort(404);
    }
    
    public function AuthCode(Request $request)
    {
        // $code_1=Hash::make($request->cx_code1);
        $code_1=$request->cx_code1;
        $code_2=$request->cx_code2;
        if(Hash::check($code_1, $code_2))
        // if($code_1 == $code_2)
        {
            $data['code']=Hash::make($request->cx_code1);
            $data['active']=1;
           DB::table('chanhxe')->where('cx_id',auth::guard('chanhxe')->id())->update($data);
           Session::flash('OTPS', 'Xác thực thành công!');
           return redirect()->back();
        }
        else
        {
            Session::flash('OTPF', 'Xác thực không thành công!');
            return redirect()->back();
        }
        
    }


    public function Mota()
    {
        $id = Auth::guard('chanhxe')->id();
        $chanhxe = DB::table('chanhxe')->where('cx_id',$id)->select('cx_tenchanhxe','cx_mota')->first();
       return view('admin.pages.chanhxe.caidat.mo-ta',compact('chanhxe'));
    }


    public function MotaCapnhat(Request $request)
    {
       $data['cx_mota']=$request->cx_mota;
       DB::table('chanhxe')->where('cx_id',Auth::guard('chanhxe')->id())->update($data);
       return redirect()->route('cx-cai-dat');
    }


    //Đổi mật khẩu chành xe
    public function ChangeUserPass()
    {
        $id = Auth::guard('chanhxe')->id();
        $chanhxe = DB::table('chanhxe')->where('cx_id',$id)->select('username')->first();
       return view('admin.pages.chanhxe.caidat.doi-mat-khau',compact('chanhxe'));
    }
  
    //ajax lấy mật khẩu chành xe
    public function ChangePassAjax(Request $request)
    {
        if(\Request::ajax()){
            
            $data= $request->pass;
            $cx = DB::table('chanhxe')->where('cx_id',auth::guard('chanhxe')->id())->select('password')->first();
            if(Hash::check($data, $cx->password)){
                $success=1;
            }
            else
            {
                $success=0;
            }
            return response()->json( $success, 200);
        }
        return abort(404);
    }

  
    public function Change(Request $request)
    {
        $data['password']=Hash::make($request->kh_password3);
        // dd($data);
        try{

            DB::table('chanhxe')->where('cx_id',Auth::guard('chanhxe')->id())->update($data);
            Session::flash('alert', 'Đổi mật khẩu thành công!');
            return redirect()->back();
        }
        catch(ModelNotFoundException $exception)
        {
            dd('Bị lỗi cập nhật rồi bạn ơi!');
        }
    }

   
    public function destroy($id)
    {
        //
    }
}
