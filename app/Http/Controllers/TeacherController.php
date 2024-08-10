<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Student; // Import the Student model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Import the Log facade

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::paginate(10);
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'teacher_name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
        ]);

        Teacher::create($validated);

        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully.');
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'teacher_name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
        ]);

        $teacher->update($validated);

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }

    public function destroy(Teacher $teacher)
    {
        try {
            // Check if there are any students associated with this teacher
            $studentsCount = Student::where('class_teacher_id', $teacher->id)->count();
            if ($studentsCount > 0) {
                // Return a friendly error message if there are associated students
                return redirect()->route('teachers.index')->with('error', 'Cannot delete this teacher because there are ' . $studentsCount . ' students assigned to them.');
            }
    
            // Delete the teacher if no associated students
            $teacher->delete();
    
            return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Log detailed error information for debugging
            Log::error('Error deleting teacher: ' . $e->getMessage());
            // Return a user-friendly error message
            return redirect()->route('teachers.index')->with('error', 'Error deleting teacher. Please check if there are any dependencies or constraints.');
        }
    }
}
