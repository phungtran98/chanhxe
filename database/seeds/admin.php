<?php

use Illuminate\Database\Seeder;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin =[
            [
                'ad_hoten'=>'Phạm Ngọc Quyền',
                'username'=>'admin',
                'password'=>bcrypt('ctu')
            ]
            ];

        DB::table('admin')->insert($admin);
    }
}
