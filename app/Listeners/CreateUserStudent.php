<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\User;


class CreateUserStudent
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserCreated $event): void
    {
        $user = $event->user;

        if ($user->hasRole('student')) {
            DB::transaction(function () use ($user) {
                Student::create([
                    'user_id' => $user->id,
                    'student_number' => User::generateStudentNumber(),
                    'department_id' => 1,
                ]);
            });
        }
    }
}
