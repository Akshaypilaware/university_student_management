<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Teacher;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seed teachers
        Teacher::factory()->count(10)->create();

        // Seed students
        Student::factory()->count(50)->create();
    }
}
