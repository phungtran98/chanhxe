<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $data = [
            [   
                'kh_ten' =>'Trần Thanh Phụng',
                'kh_sdt' =>'0123456789',
                'username' => 'ctu',
                'password' => bcrypt('ctu'),
            ],
            
        ];
        DB::table('khachhang')->insert($data);
    }
}
