<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;


class UserController extends Controller
{
    public function index()
    {
        $this->authorize('viewany', User::class);
        
        $users = User::with(['roles',])
                    ->orderBy('id')
                    ->orderByDesc('created_at')
                    ->paginate(10);

        return view('users.index', compact('users'));
    }

    public function create() {

        $this->authorize('create', User::class);
       
        $roles = Role::pluck('name', 'id');

        return view('users.create', compact(['roles',]));
    }

    public function store(StoreUserRequest $request)
    {
        // Authorize the creation of a new user
        $this->authorize('create', User::class);

        // Create a new user with the provided data
        $user = User::create([
            'name'          => $request->name,
            'phone_number'  => $request->phone_number,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
        ]);

        // Synchronize roles based on the input from the form
        $user->syncRoles($request->input('roles', []));

        // Redirect to the users index page after successful creation
        return redirect()->route('users.index');

    }

    public function show(User $user)
    {
        $this->authorize('view', $user);

        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $roles = Role::pluck('name', 'id');
        
        return view('users.edit', compact('user', 'roles'));
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $validated = $request->validated();

        if ($request->password) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        $user->update([
            'name'          => $request->name,
            'phone_number'  => $request->phone_number,
            'email'         => $request->email,
        ]);

        $user->syncRoles($request->input('roles', []));

        return redirect()->back()->with('success', 'User updated.');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        if(auth()->user()->hasRole('Administrator')) {
            return back()->with('errors', 'User Administrator cannot be deleted.');
        }

        dd($user);

        $user->delete();

        return redirect()->route('users.index');
    }

}
