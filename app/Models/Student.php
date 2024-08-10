<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_name',
        'class_teacher_id',
        'class',
        'admission_date',
        'yearly_fees',
    ];

    // Cast the admission_date field to Carbon instance
    protected $dates = ['admission_date'];

    // Relationship with Teacher
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'class_teacher_id');
    }
}
