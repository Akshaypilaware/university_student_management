@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Teachers</h1>
    
    <a href="{{ route('teachers.create') }}" class="btn btn-primary mb-3">Add Teacher</a>
    
    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>Teacher Name</th>
                <th>Subject</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->teacher_name }}</td>
                    <td>{{ $teacher->subject }}</td>
                    <td>
                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
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
    {{ $teachers->links() }}
</div>

<!-- JavaScript for confirmation dialog -->
<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this teacher? This action cannot be undone.');
    }
</script>
@endsection
