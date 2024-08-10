@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $student->student_name }}</h1>
        <p>Class: {{ $student->class }}</p>
        <p>Class Teacher: {{ $student->teacher->teacher_name }}</p>
        <p>Admission Date: {{ $student->admission_date->format('Y-m-d') }}</p>
        <p>Yearly Fees: {{ $student->yearly_fees }}</p>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection
