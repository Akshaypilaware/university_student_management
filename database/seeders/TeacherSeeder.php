<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    public function run()
    {
        DB::table('teachers')->insert([
            [
                'teacher_name' => 'Jane Smith',
                'subject' => 'Mathematics',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more teachers as needed
        ]);
    }
}
