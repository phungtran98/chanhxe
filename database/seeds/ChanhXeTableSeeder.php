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
                'username' => 'ctu',
                'password' => bcrypt('ctu'),
            ],
            [   
                'cx_tenchanhxe' =>'Chành xe Phương Trang',
                'cx_hoten' =>'Lê Minh Nghĩa',
                'cx_sdt' =>'0123456789',
                'username' => 'ctu',
                'password' => bcrypt('ctu'),
            ],
            [   
                'cx_tenchanhxe' =>'Chành xe Trần Quyên',
                'cx_hoten' =>'Lê Ngọc Nguyên',
                'cx_sdt' =>'0123456789',
                'username' => 'ctu',
                'password' => bcrypt('ctu'),
            ],
            [   
                'cx_tenchanhxe' =>'Chành xe Huệ Nghĩa',
                'cx_hoten' =>'Trần Quốc Cường',
                'cx_sdt' =>'0123456789',
                'username' => 'ctu',
                'password' => bcrypt('ctu'),
            ],
            [   
                'cx_tenchanhxe' =>'Chành xe Trọng Tấn',
                'cx_hoten' =>'Trần Quốc Khánh',
                'cx_sdt' =>'0123456789',
                'username' => 'ctu',
                'password' => bcrypt('ctu'),
            ],
            
        ];
        DB::table('chanhxe')->insert($data);
    }
}
