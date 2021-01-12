<?php

use Illuminate\Database\Seeder;

class ChanhXeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [   
                'cx_tenchanhxe' =>'Chành xe Tô Châu',
                'cx_hoten' =>'Lê Ngọc Đức',
                'cx_sdt' =>'0123456789',
                'username' => 'tochau',
                // 'cx_mota'=>'Hiện nay xe Tô Châu phục vụ mạnh nhất trong lĩnh vực vận chuyển hàng hóa từ TP.HCM (Sài Gòn) đi các tỉnh miền Tây và ngược lại. Với hệ thống xe tải trọng lớn và nhanh cung với đội ngũ nhân viên chuyên nghiệp công ty luôn đưa phương châm “Chuyên nghiệp – An toàn – Bảo mật”  lên hàng đầu. kèm theo như giao hàng tận nơi, thu hộ tiền hàng. Song song với dịch vụ vận chuyển hàng hóa là dịch vụ chuyển tiền nhanh, trong quá trình giao dịch chưa quá 5 phút khách hàng có thể gửi đi một trong 13 tỉnh miền Tây và TP.HCM, người nhận đã có thể nhận ngay tiền mặt tại các trạm của Tô Châu.',
                'cx_email'=>'tochau@gmail.com',
                'password' => bcrypt('ctu'),
            ],
            [   
                'cx_tenchanhxe' =>'Chành xe Phương Trang',
                'cx_hoten' =>'Lê Minh Nghĩa',
                'cx_sdt' =>'0123456789',
                'username' => 'phuongtrang',
                'cx_email'=>'phuongtrang@gmail.com',
                'password' => bcrypt('ctu'),
            ],
            [   
                'cx_tenchanhxe' =>'Chành xe Trần Quyên',
                'cx_hoten' =>'Lê Ngọc Nguyên',
                'cx_sdt' =>'0123456789',
                'username' => 'tranquyen',
                'cx_email'=>'tranquyen@gmail.com',
                'password' => bcrypt('ctu'),
            ],
            [   
                'cx_tenchanhxe' =>'Chành xe Huệ Nghĩa',
                'cx_hoten' =>'Trần Quốc Cường',
                'cx_sdt' =>'0123456789',
                'username' => 'huenghia',
                'cx_email'=>'huenghia@gmail.com',
                'password' => bcrypt('ctu'),
            ],
            [   
                'cx_tenchanhxe' =>'Chành xe Trọng Tấn',
                'cx_hoten' =>'Trần Quốc Khánh',
                'cx_sdt' =>'0123456789',
                'cx_email'=>'trongtan@gamil.com',
                'username' => 'trongtan',
                'password' => bcrypt('ctu'),
            ],
            
        ];
        DB::table('chanhxe')->insert($data);
    }
}
