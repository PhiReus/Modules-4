<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name' => 'Phi',
            'email' => 'Phireus2002@gmail.com',
            'password' => '123',
            'birthday' => '1999-02-20'
        ];
        DB::table('users')->insert($data);
    }
}
