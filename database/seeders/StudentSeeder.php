<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'nama' => 'Dava Rezza',
            'jeniskelamin' => 'Laki-laki',
            'notelepon' => '08383583922',
        ]);
    }
}
