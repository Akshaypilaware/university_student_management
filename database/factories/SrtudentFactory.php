<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        return [
            'student_name' => $this->faker->name,
            'class_teacher_id' => Teacher::inRandomOrder()->first()->id, // Assign a random teacher
            'class' => $this->faker->word,
            'admission_date' => $this->faker->date,
            'yearly_fees' => $this->faker->numberBetween(1000, 10000),
        ];
    }
}
