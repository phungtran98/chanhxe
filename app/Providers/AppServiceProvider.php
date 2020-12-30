<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use Auth;
use View;
use Carbon\Carbon;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $kh = DB::table('khachhang')->where('kh_id',auth::guard('khachhang')->id())->first();
      
        // View::share('shareKH',$kh);

        $taixeShare = DB::table('taixe')->get();
        View::share('taixeShare',$taixeShare);



        Carbon::setLocale('vi');
        $thoigianhientai = Carbon::now();
        //Thông báo đơn hàng mới
        $Neworder = DB::table('donvanchuyen as dvc')
        ->join('chitietdonvanchuyen as ctdvc','ctdvc.dvc_id','dvc.dvc_id')
        ->join('khachhang as kh','kh.kh_id','dvc.kh_id')
        ->where('dvc.dvc_thongbao','=',0)
        ->orderBy('dvc.dvc_id','DESC')
        ->get();
        View::share('Neworder',$Neworder);
        View::share('thoigianhientai',$thoigianhientai);

    }
}
