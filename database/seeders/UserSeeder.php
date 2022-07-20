<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Carlos',
                'email' => 'paco@gmail.com',
                'password' => 'princess'
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'Oscar',
                'email' => 'orcarD@gmail.com',
                'password' => '123456'
            ]
        );

    }
}
