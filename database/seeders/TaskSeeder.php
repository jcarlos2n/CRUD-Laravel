<?php

namespace Database\Seeders;



use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert(
            [
                'title' => 'eh',
                'name' => 'echo1',
                'hecho?' => false,
                'user_id' => '1'
            ]
        );
        DB::table('tasks')->insert(
            [
                'title' => 'eh2',
                'name' => 'echo2',
                'hecho?' => true,
                'user_id' => '2'
            ]
        );
    }
}
