<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Department;
use App\Models\Student;
use App\Models\User;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = User::role('student')->paginate(10);

        return view('students.index', compact('students'));
    }

    /**
     * Display the specified resource.
     */
    public function show($user_id)
    {
        $user = User::findOrFail($user_id);

        $student = $user->student;

        return view('students.show', compact('user','student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $departments = Department::all();

        return view('students.edit', compact('student', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        if($request->phone_number)  {
            $student->user()->update([
                'phone_number' => $request->phone_number,
            ]);
        }

        $student->update([
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
        ]);

        return redirect()->route('students.index')->with('success', 'Bio data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
