<?php

use Illuminate\Database\Seeder;

class KhachHangTableSeeder extends Seeder
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
                'kh_hoten' =>'Trần Thanh Phụng',
                'username' => 'phung',
                'password' => bcrypt('ctu'),
            ],
            [   
                'kh_hoten' =>'Trần Quốc Cường',
                'username' => 'cuong',
                'password' => bcrypt('ctu'),
            ],
            [   
                'kh_hoten' =>'Trần Quốc Khánh',
                'username' => 'khanh',
                'password' => bcrypt('ctu'),
            ],
            [   
                'kh_hoten' =>'Lê Quốc Đảm',
                'username' => 'dam',
                'password' => bcrypt('ctu'),
            ],
            [   
                'kh_hoten' =>'Trần Văn Sang',
                'username' => 'sang',
                'password' => bcrypt('ctu'),
            ],
            [   
                'kh_hoten' =>'Nguyễn Thi Mai',
                'username' => 'mai',
                'password' => bcrypt('ctu'),
            ],
            [   
                'kh_hoten' =>'Trương Thị Cúc',
                'username' => 'cuc',
                'password' => bcrypt('ctu'),
            ],
        ];
        DB::table('khachhang')->insert($data);
    }
}
