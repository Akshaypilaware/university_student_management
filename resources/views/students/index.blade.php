@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Students</h1>
    
    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add Student</a>
    
    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>Student Name</th>
                <th>Class</th>
                <th>Class Teacher</th>
                <th>Admission Date</th>
                <th>Yearly Fees</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->student_name }}</td>
                    <td>{{ $student->class }}</td>
                    <td>{{ $student->teacher->teacher_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($student->admission_date)->format('Y-m-d') }}</td>
                    <td>{{ number_format($student->yearly_fees, 2) }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDeletion();">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- Pagination Links -->
    {{ $students->links() }}
</div>

<script>
    function confirmDeletion() {
        return confirm('Are you sure you want to delete this student? This action cannot be undone.');
    }
</script>
@endsection
