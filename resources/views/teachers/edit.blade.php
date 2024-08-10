@extends('layouts.app')

@section('content')
    <div class="card mx-auto" style="max-width: 600px; background-color: #f8f9fa; transition: transform 0.3s, box-shadow 0.3s;">
        <div class="card-body">
            <h1 class="card-title text-center mb-4">Edit Teacher</h1>
            <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="teacher_name">Teacher Name</label>
                    <input type="text" name="teacher_name" id="teacher_name" class="form-control" 
                           value="{{ old('teacher_name', $teacher->teacher_name) }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" id="subject" class="form-control" 
                           value="{{ old('subject', $teacher->subject) }}" required>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
@endsection
