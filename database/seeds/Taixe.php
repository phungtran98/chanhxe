<?php

use Illuminate\Database\Seeder;

class Taixe extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $taixe =[
        //     [
        //         'tx_hoten'=>'Nguyễn Quốc Vũ',
        //         'tx_hinhanh'=>'kh1.png',
        //         'tx_vanbang'=>'banglai.jpg',
        //         'tx_sdt'=>'0236598412',
        //         'tx_diachi'=>'Châu Thành - Trà Vinh',
        //         'cx_id'=>1
        //     ],
        //     [
        //         'tx_hoten'=>'Trần Quốc Việt',
        //         'tx_hinhanh'=>'kh1.png',
        //         'tx_vanbang'=>'banglai.jpg',
        //         'tx_sdt'=>'0236598412',
        //         'tx_diachi'=>'Châu Thành - Trà Vinh',
        //         'cx_id'=>2
        //     ],
        //     [
        //         'tx_hoten'=>'Thạch Thanh Bảo',
        //         'tx_hinhanh'=>'kh1.png',
        //         'tx_vanbang'=>'banglai.jpg',
        //         'tx_sdt'=>'0236598412',
        //         'tx_diachi'=>'Châu Thành - Trà Vinh',
        //         'cx_id'=>3
        //     ],
        //     [
        //         'tx_hoten'=>'Phạm Hà Hải Đăng ',
        //         'tx_hinhanh'=>'kh1.png',
        //         'tx_vanbang'=>'banglai.jpg',
        //         'tx_sdt'=>'0236598412',
        //         'tx_diachi'=>'Châu Thành - Trà Vinh',
        //         'cx_id'=>1
        //     ],
        //     [
        //         'tx_hoten'=>'Nguyễn Hoàng Duy',
        //         'tx_hinhanh'=>'kh1.png',
        //         'tx_vanbang'=>'banglai.jpg',
        //         'tx_sdt'=>'0236598412',
        //         'tx_diachi'=>'Châu Thành - Trà Vinh',
        //         'cx_id'=>2
        //     ],
        //     [
        //         'tx_hoten'=>'Nguyễn Thị Ngọc Hân',
        //         'tx_hinhanh'=>'kh1.png',
        //         'tx_vanbang'=>'banglai.jpg',
        //         'tx_sdt'=>'0236598412',
        //         'tx_diachi'=>'Châu Thành - Trà Vinh',
        //         'cx_id'=>3
        //     ],
        //     [
        //         'tx_hoten'=>'Nguyễn Hửu Đăng',
        //         'tx_hinhanh'=>'kh1.png',
        //         'tx_vanbang'=>'banglai.jpg',
        //         'tx_sdt'=>'0236598412',
        //         'tx_diachi'=>'Châu Thành - Trà Vinh',
        //         'cx_id'=>1
        //     ],
        //     [
        //         'tx_hoten'=>'Trịnh Đại Lộc',
        //         'tx_hinhanh'=>'kh1.png',
        //         'tx_vanbang'=>'banglai.jpg',
        //         'tx_sdt'=>'0236598412',
        //         'tx_diachi'=>'Châu Thành - Trà Vinh',
        //         'cx_id'=>2
        //     ],
        //     [
        //         'tx_hoten'=>'Tăng Minh Hậu',
        //         'tx_hinhanh'=>'kh1.png',
        //         'tx_vanbang'=>'banglai.jpg',
        //         'tx_sdt'=>'0236598412',
        //         'tx_diachi'=>'Châu Thành - Trà Vinh',
        //         'cx_id'=>3
        //     ],
        //     [
        //         'tx_hoten'=>'Huynh Văn Được',
        //         'tx_hinhanh'=>'kh1.png',
        //         'tx_vanbang'=>'banglai.jpg',
        //         'tx_sdt'=>'0236598412',
        //         'tx_diachi'=>'Châu Thành - Trà Vinh',
        //         'cx_id'=>2
        //     ],
        //     [
        //         'tx_hoten'=>'Lý Chí Bằng',
        //         'tx_hinhanh'=>'kh1.png',
        //         'tx_vanbang'=>'banglai.jpg',
        //         'tx_sdt'=>'0236598412',
        //         'tx_diachi'=>'Châu Thành - Trà Vinh',
        //         'cx_id'=>2
        //     ],
        //     [
        //         'tx_hoten'=>'Nguyễn Hoàng Huyện',
        //         'tx_hinhanh'=>'kh1.png',
        //         'tx_vanbang'=>'banglai.jpg',
        //         'tx_sdt'=>'0236598412',
        //         'tx_diachi'=>'Châu Thành - Trà Vinh',
        //         'cx_id'=>3
        //     ],
        //     [
        //         'tx_hoten'=>'Huỳnh Gia Hưng',
        //         'tx_hinhanh'=>'kh1.png',
        //         'tx_vanbang'=>'banglai.jpg',
        //         'tx_sdt'=>'0236598412',
        //         'tx_diachi'=>'Châu Thành - Trà Vinh',
        //         'cx_id'=>3
        //     ],
        //     [
        //         'tx_hoten'=>'Cao Hoàng Kha',
        //         'tx_hinhanh'=>'kh1.png',
        //         'tx_vanbang'=>'banglai.jpg',
        //         'tx_sdt'=>'0236598412',
        //         'tx_diachi'=>'Châu Thành - Trà Vinh',
        //         'cx_id'=>2
        //     ],
        //     [
        //         'tx_hoten'=>'Phương Chấn Vũ',
        //         'tx_hinhanh'=>'kh1.png',
        //         'tx_vanbang'=>'banglai.jpg',
        //         'tx_sdt'=>'0236598412',
        //         'tx_diachi'=>'Châu Thành - Trà Vinh',
        //         'cx_id'=>3
        //     ],
        //     [
        //         'tx_hoten'=>'Nguyễn Tấn Phát',
        //         'tx_hinhanh'=>'kh1.png',
        //         'tx_vanbang'=>'banglai.jpg',
        //         'tx_sdt'=>'0236598412',
        //         'tx_diachi'=>'Châu Thành - Trà Vinh',
        //         'cx_id'=>2
        //     ],
        //     [
        //         'tx_hoten'=>'Trần Minh Long',
        //         'tx_hinhanh'=>'kh1.png',
        //         'tx_vanbang'=>'banglai.jpg',
        //         'tx_sdt'=>'0236598412',
        //         'tx_diachi'=>'Châu Thành - Trà Vinh',
        //         'cx_id'=>3
        //     ],
        //     [
        //         'tx_hoten'=>'Thái Võ Thanh Trúc',
        //         'tx_hinhanh'=>'kh1.png',
        //         'tx_vanbang'=>'banglai.jpg',
        //         'tx_sdt'=>'0236598412',
        //         'tx_diachi'=>'Châu Thành - Trà Vinh',
        //         'cx_id'=>2
        //     ],
        //     [
        //         'tx_hoten'=>'Võ Thị Ngọc Diễm',
        //         'tx_hinhanh'=>'kh1.png',
        //         'tx_vanbang'=>'banglai.jpg',
        //         'tx_sdt'=>'0236598412',
        //         'tx_diachi'=>'Châu Thành - Trà Vinh',
        //         'cx_id'=>3
        //     ],
        //     [
        //         'tx_hoten'=>'Huỳnh Thị Ngọc Bích ',
        //         'tx_hinhanh'=>'kh1.png',
        //         'tx_vanbang'=>'banglai.jpg',
        //         'tx_sdt'=>'0236598412',
        //         'tx_diachi'=>'Châu Thành - Trà Vinh',
        //         'cx_id'=>1
        //     ],
        //     [
        //         'tx_hoten'=>'Nguyễn Thị Ngọc Thắm',
        //         'tx_hinhanh'=>'kh1.png',
        //         'tx_vanbang'=>'banglai.jpg',
        //         'tx_sdt'=>'0236598412',
        //         'tx_diachi'=>'Châu Thành - Trà Vinh',
        //         'cx_id'=>1
        //     ],
        //     [
        //         'tx_hoten'=>'Nguyễn Hữu Phúc',
        //         'tx_hinhanh'=>'kh1.png',
        //         'tx_vanbang'=>'banglai.jpg',
        //         'tx_sdt'=>'0236598412',
        //         'tx_diachi'=>'Châu Thành - Trà Vinh',
        //         'cx_id'=>1
        //     ],
        //     [
        //         'tx_hoten'=>'Lâm Chí Kiệt',
        //         'tx_hinhanh'=>'kh1.png',
        //         'tx_vanbang'=>'banglai.jpg',
        //         'tx_sdt'=>'0236598412',
        //         'tx_diachi'=>'Châu Thành - Trà Vinh',
        //         'cx_id'=>3
        //     ],
        //     [
        //         'tx_hoten'=>'Hồ Hửu Khánh',
        //         'tx_hinhanh'=>'kh1.png',
        //         'tx_vanbang'=>'banglai.jpg',
        //         'tx_sdt'=>'0236598412',
        //         'tx_diachi'=>'Châu Thành - Trà Vinh',
        //         'cx_id'=>2
        //     ],

        // ];
        
        // DB::table('taixe')->insert($taixe);
     
    }
}
