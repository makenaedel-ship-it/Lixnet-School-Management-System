<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index()
    {
        // Only allow users with 'admin' role to view all teachers
        if (Auth::user()->hasRole('admin')) {
            return response()->json(Teacher::with('user')->get());
        }
        // Teachers can only view their own profile
        if (Auth::user()->hasRole('teacher')) {
            return response()->json(Auth::user()->teacher()->with('user')->first());
        }
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    public function show(Teacher $teacher)
    {
        // Admins can view any teacher
        if (Auth::user()->hasRole('admin')) {
            return response()->json($teacher->load('user'));
        }
        // Teachers can only view their own profile
        if (Auth::user()->hasRole('teacher') && Auth::user()->id === $teacher->user_id) {
            return response()->json($teacher->load('user'));
        }
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    public function store(Request $request)
    {
        // Only admins can create new teacher profiles
        if (!Auth::user()->hasRole('admin')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'employee_id_number' => 'required|unique:teachers,employee_id_number',
            'date_of_hire' => 'required|date',
            'department' => 'required|string',
        ]);

        $teacher = Teacher::create($request->all());
        return response()->json($teacher, 201);
    }

    public function update(Request $request, Teacher $teacher)
    {
        // Admins can update any teacher profile
        if (Auth::user()->hasRole('admin')) {
            $request->validate([
                'user_id' => 'sometimes|required|exists:users,id',
                'employee_id_number' => 'sometimes|required|unique:teachers,employee_id_number,' . $teacher->id,
                'date_of_hire' => 'sometimes|required|date',
                'department' => 'sometimes|required|string',
            ]);
            $teacher->update($request->all());
            return response()->json($teacher);
        }
        // Teachers can update their own profile
        if (Auth::user()->hasRole('teacher') && Auth::user()->id === $teacher->user_id) {
            $request->validate([
                'date_of_hire' => 'sometimes|required|date',
                'department' => 'sometimes|required|string',
            ]);
            $teacher->update($request->only(['date_of_hire', 'department']));
            return response()->json($teacher);
        }
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    public function destroy(Teacher $teacher)
    {
        // Only admins can delete teacher profiles
        if (!Auth::user()->hasRole('admin')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $teacher->delete();
        return response()->json(null, 204);
    }
}

