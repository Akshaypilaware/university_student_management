<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    public function run()
    {
        DB::table('students')->insert([
            [
                'student_name' => 'John Doe',
                'class_teacher_id' => 1,
                'class' => '10th Grade',
                'admission_date' => '2024-08-01',
                'yearly_fees' => 50000,
                'created_at' => now(),
                'updated_at' => now(),
                
            ],
            // Add more students as needed
        ]);
        
    }
}
