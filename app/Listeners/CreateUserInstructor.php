<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use App\Models\Instructor;
use App\Models\User;


class CreateUserInstructor
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

        if ($user->hasRole('instructor')) {
            DB::transaction(function () use ($user) {
                Instructor::create([
                    'user_id' => $user->id,
                    'staff_number' => User::generateStaffNumber(),
                    'department_id' => 1,
                ]);
            });
        }
    }
}
