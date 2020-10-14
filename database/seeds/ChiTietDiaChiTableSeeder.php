<?php

use Illuminate\Database\Seeder;

class ChiTietDiaChiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'p_id'=>31120,
                'cx_id'=>1,
                'ctdc_tenduong'=>"Đường 30/4"
            ],
            [
                'p_id'=>31153,
                'cx_id'=>2,
                'ctdc_tenduong'=>"Đường 30/4"
            ],
            [
                'p_id'=>31168,
                'cx_id'=>3,
                'ctdc_tenduong'=>"Đường 30/4"
            ],
            [
                'p_id'=>31186,
                'cx_id'=>4,
                'ctdc_tenduong'=>"Đường 30/4"
            ],
        ];
        DB::table('chitietdiachi')->insert($data);
    }
}
