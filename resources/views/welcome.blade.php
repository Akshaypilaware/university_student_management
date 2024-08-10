@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron text-center">
            <h1 class="display-4">Welcome to the University Management System</h1>
            <p class="lead">Manage students and teachers efficiently with our easy-to-use platform.</p>
            <hr class="my-4">
            <p>Use the links below to navigate through the application:</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="{{ route('students.index') }}" role="button">View Students</a>
                <a class="btn btn-primary btn-lg" href="{{ route('teachers.index') }}" role="button">View Teachers</a>
            </p>
        </div>
    </div>
@endsection
