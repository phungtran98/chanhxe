<?php

use Illuminate\Database\Seeder;

class BaiDauXeTableSeeder extends Seeder
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
                'bdx_diachi'=>'Số 209, Đường 30/4, Ninh Kiều, Cần Thơ, Việt Nam, Trung tâm thành phố Cần Thơ, Cần Thơ'
            ],
            [
                'bdx_diachi'=>'46 Hai Bà Trưng, Lê Bình, Cái Răng, Cần Thơ'
            ],
            [
                'bdx_diachi'=>'106 Hai Bà Trưng, Tân An, Ninh Kiều, Cần Thơ, Việt Nam'
            ],
            [
                'bdx_diachi'=>'144 Bùi Hữu Nghĩa, Bình Thuỷ, Bình Thủy, Cần Thơ, Việt Nam'
            ],
            [
                'bdx_diachi'=>'32, Hai Bà Trưng, Tân An, Ninh Kiều, Cần Thơ, Việt Nam'
            ],
            [
                'bdx_diachi'=>'Mỹ Khánh, Phong Điền, Cần Thơ, Việt Nam'
            ],
        ];
        DB::table('baidauxe')->insert($data);
    }
}
