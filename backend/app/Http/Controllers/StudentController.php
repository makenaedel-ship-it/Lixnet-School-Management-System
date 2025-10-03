<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        // Only allow users with 'admin' or 'teacher' role to view all students
        if (Auth::user()->hasAnyRole(['admin', 'teacher'])) {
            return response()->json(Student::with('user')->get());
        }
        // Students can only view their own profile
        if (Auth::user()->hasRole('student')) {
            return response()->json(Auth::user()->student()->with('user')->first());
        }
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    public function show(Student $student)
    {
        // Admins and teachers can view any student
        if (Auth::user()->hasAnyRole(['admin', 'teacher'])) {
            return response()->json($student->load('user'));
        }
        // Students can only view their own profile
        if (Auth::user()->hasRole('student') && Auth::user()->id === $student->user_id) {
            return response()->json($student->load('user'));
        }
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    public function store(Request $request)
    {
        // Only admins can create new student profiles
        if (!Auth::user()->hasRole('admin')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'student_id_number' => 'required|unique:students,student_id_number',
            'date_of_birth' => 'required|date',
            'address' => 'required|string',
            'phone_number' => 'required|string',
        ]);

        $student = Student::create($request->all());
        return response()->json($student, 201);
    }

    public function update(Request $request, Student $student)
    {
        // Admins can update any student profile
        if (Auth::user()->hasRole('admin')) {
            $request->validate([
                'user_id' => 'sometimes|required|exists:users,id',
                'student_id_number' => 'sometimes|required|unique:students,student_id_number,' . $student->id,
                'date_of_birth' => 'sometimes|required|date',
                'address' => 'sometimes|required|string',
                'phone_number' => 'sometimes|required|string',
            ]);
            $student->update($request->all());
            return response()->json($student);
        }
        // Students can update their own profile
        if (Auth::user()->hasRole('student') && Auth::user()->id === $student->user_id) {
            $request->validate([
                'date_of_birth' => 'sometimes|required|date',
                'address' => 'sometimes|required|string',
                'phone_number' => 'sometimes|required|string',
            ]);
            $student->update($request->only(['date_of_birth', 'address', 'phone_number']));
            return response()->json($student);
        }
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    public function destroy(Student $student)
    {
        // Only admins can delete student profiles
        if (!Auth::user()->hasRole('admin')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $student->delete();
        return response()->json(null, 204);
    }
}

