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

        DB::table('bang')->insert([
        	'STT' => '25',
        	'họ và tên' => 'Bùi Đình Hiếu',
        	'số điện thoại' => '0383207498',
        ]);

        DB::table('users')->insert([
            
            'name' => 'Hieu',
            'email' => 'hieubignose003696@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }

}

