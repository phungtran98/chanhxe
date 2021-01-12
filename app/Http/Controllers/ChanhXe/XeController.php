<?php

namespace App\Http\Controllers\ChanhXe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Session;
class XeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cx =DB::table('chanhxe')->where('cx_id',Auth::guard('chanhxe')->id())
        ->first();

        $xe =DB::table('xe as x')
        ->join('chanhxe as cx','cx.cx_id','x.cx_id')
        ->join('taixe as tx','tx.tx_id','x.tx_id')
        ->where('cx.cx_id', Auth::guard('chanhxe')->id())
        ->get();
        $taixe = DB::table('taixe')->where('cx_id',Auth::guard('chanhxe')->id())->get();
        // dd($xe);
        return view('admin.pages.chanhxe.xe.index',compact('xe','cx','taixe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['x_bienso']=$request->x_bienso;
        // $data['x_tentaixe']=$request->x_tentaixe;
        // $data['x_sdttaixe']=$request->x_sdttaixe;
        $data['x_mota']=$request->x_mota;
        $data['cx_id']=$request->cx_id;
        $data['tx_id']=$request->tx_id;
      
        // dd($data);
        $images=array();
        if($files=$request->file('images_car')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('upload/chanhxe',$name);
                $images[]=$name;
            }     
        }

        // $files2=$request->file('x_hinhanhtaixe');
        // $name2=$files2->getClientOriginalName();
        // $files2->move('images',$name2);

        $data['x_hinhanhxe'] = implode("|", $images);

        // $data['x_hinhanhtaixe'] = $name2;
        // dd($data);

        $result = DB::table('xe')->insert($data);
        if($result)
        {
            $request->session()->flash('mss', 'Thêm thành công!');
            return redirect()->back();
        }
        else
        {
            $request->session()->flash('error', 'Thêm thất bại!');
            return redirect()->back();
        }
    }


    public function Find(Request $request)
    {
        $cx =DB::table('chanhxe')->where('cx_id',Auth::guard('chanhxe')->id())
        ->first();


       
        $xe =DB::table('xe as x')
        ->join('taixe as tx','tx.tx_id','x.tx_id')
        ->where('tx.tx_hoten','like','%'.$request->x_content.'%')
        ->orWhere('tx.tx_sdt','like','%'.$request->x_content.'%')
        ->orWhere('x.x_bienso','like','%'.$request->x_content.'%')
        ->orWhere('x.x_mota','like','%'.$request->x_content.'%')
        ->get();
        // dd($xe);

        return view('admin.pages.chanhxe.xe.index',compact('xe','cx'));
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

 
    public function getXe(Request $request)
    {
        if($request->ajax())
        {
            $xe = DB::table('xe as x')
            ->join('taixe as tx','tx.tx_id','x.tx_id')
            ->where('x_id',$request->x_id)->first();

            return response()->json($xe, 200);
        }
        
    }




    public function update(Request $request)
    {
        $data['x_bienso']=$request->x_bienso;
        $data['x_mota']=$request->x_mota;
        $data['cx_id']=$request->cx_id;
        $data['tx_id']=$request->tx_id;
      
        // dd($data);
        $images=array();
        if($files=$request->file('images_car')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('upload/chanhxe',$name);
                $images[]=$name;
            }     
            $data['x_hinhanhxe'] = implode("|", $images);
        }


        // dd($data);

        $result = DB::table('xe')->where('x_id',$request->x_id)->update($data);
        if($result)
        {
            $request->session()->flash('mss', 'Cập nhật thành công!');
            return redirect()->back();
        }
        else
        {
            $request->session()->flash('error', 'Cập nhật thất bại!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $result = DB::table('xe')->where('x_id',$id)->delete();
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
