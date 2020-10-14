<?php

use Illuminate\Database\Seeder;

class XeTableSeeder extends Seeder
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
                'x_bienso' =>Str::random(6),
                'x_taixe' =>'Nguyễn văn A',
                
            ],
            [   
                'x_bienso' =>Str::random(6),
                'x_taixe' =>'Nguyễn văn B',
               
            ],
            [   
                'x_bienso' =>Str::random(6),
                'x_taixe' =>'Nguyễn văn C',
               
            ],
        ];
        DB::table('xe')->insert($data);
    }
}
