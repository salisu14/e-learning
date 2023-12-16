<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnrollmentRequest;
use App\Http\Requests\UpdateEnrollmentRequest;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Session;
use App\Models\User;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $enrollments = Enrollment::latest()->paginate(10);

        // $enrollments = Enrollment::has('user')
        //             ->orderByDesc('created_at')
        //             ->distinct()
        //             ->get();

        // $enrollments = Enrollment::select('users.id','users.name', 'enrollments.created_at')
        //     ->selectRaw('count(enrollments.id) as num_enrollments')
        //     ->join('users', 'enrollments.user_id', '=', 'users.id')
        //     ->groupBy('users.id', 'users.name', 'enrollments.created_at')
        //     ->get();

        // $enrollments = Enrollment::join('users', 'enrollments.user_id', '=', 'users.id')
        //     ->select('users.id', 'users.name', 'enrollments.created_at')
        //     ->selectRaw('COUNT(enrollments.id) AS num_enrollments')
        //     ->groupBy('users.id', 'users.name', 'enrollments.created_at')
        //     ->get();

    //     $enrollments = Enrollment::join('users', 'enrollments.user_id', '=', 'users.id')
    // ->select('users.id', 'users.name', 'enrollments.created_at', 'enrollments.session_id')
    // ->selectRaw('COUNT(enrollments.id) AS num_enrollments')
    // ->groupBy('users.id', 'users.name', 'enrollments.created_at', 'enrollments.session_id')
    // ->get();

        $enrollments = Enrollment::with('user')->get();


        // dd($enrollments);

        return view('enrollments.index', compact('enrollments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::latest()->get();
        
        $users = User::role('student')->paginate(10);

        $sessions = Session::get();

        // $users = $users->filter(function($user){
        //     return $user->hasRole('Student');
        // });

        return view('enrollments.create', compact('courses', 'users', 'sessions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnrollmentRequest $request)
    {
        $validated = $request->validated();

        $validated['enrollment_date'] = now();

        dd($validated);

        $enrollment = Enrollment::create($validated);

        return redirect()->route('enrollments.index')->with('success', 'Enrollment created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment)
    {
        $courses = Course::latest()->get();
        
        $users = user::latest()->get();

        $sessions = Session::get();

        return view('enrollments.edit', compact('enrollment','courses', 'users', 'sessions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnrollmentRequest $request, Enrollment $enrollment)
    {
        $validated = $request->validated();

        $enrollment->update($validated);

        return redirect()->route('enrollments.index')->with('success', 'Enrollment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        if(!$enrollment) {
            return redirect()->route('enrollments.index')->with('error', 'Enrollment not found!.');
        }

        $enrollment->delete();

        return redirect()->route('enrollments.index')->with('success', 'Enrollment deleted successfully.');
    }
}
