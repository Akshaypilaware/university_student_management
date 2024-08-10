@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center mt-5">
        <div class="card shadow-lg" style="width: 40rem; background-color: #f8f9fa;">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Register Student</h3>
                <form action="{{ route('students.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="student_name">Student Name</label>
                        <input type="text" name="student_name" id="student_name" class="form-control" value="{{ old('student_name') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="class_teacher_id">Class Teacher</label>
                        <select name="class_teacher_id" id="class_teacher_id" class="form-control" required>
                            <option value="">Select Teacher</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->teacher_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="class">Class</label>
                        <input type="text" name="class" id="class" class="form-control" value="{{ old('class') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="admission_date">Admission Date</label>
                        <input type="date" name="admission_date" id="admission_date" class="form-control" value="{{ old('admission_date') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="yearly_fees">Yearly Fees</label>
                        <input type="number" name="yearly_fees" id="yearly_fees" class="form-control" value="{{ old('yearly_fees') }}" required>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
