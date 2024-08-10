@extends('layouts.app')

@section('content')
    <div class="card mx-auto" style="max-width: 600px; background-color: #f8f9fa;">
        <div class="card-body">
            <h1 class="card-title text-center mb-4">Edit Student</h1>
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="student_name">Student Name</label>
                    <input type="text" name="student_name" id="student_name" class="form-control" 
                           value="{{ old('student_name', $student->student_name) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="class_teacher_id">Class Teacher</label>
                    <select name="class_teacher_id" id="class_teacher_id" class="form-control" required>
                        <option value="">Select Teacher</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}" {{ $teacher->id == $student->class_teacher_id ? 'selected' : '' }}>
                                {{ $teacher->teacher_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="class">Class</label>
                    <input type="text" name="class" id="class" class="form-control" 
                           value="{{ old('class', $student->class) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="admission_date">Admission Date</label>
                    <input type="date" name="admission_date" id="admission_date" class="form-control" 
                           value="{{ old('admission_date', \Illuminate\Support\Carbon::parse($student->admission_date)->format('Y-m-d')) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="yearly_fees">Yearly Fees</label>
                    <input type="number" name="yearly_fees" id="yearly_fees" class="form-control" 
                           value="{{ old('yearly_fees', $student->yearly_fees) }}" required>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
