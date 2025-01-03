<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::with('posts')->withCount('posts')->get();

        // return view('users.index', ['users' => $users]);
        return view('users.index', compact('users'));

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {



        $data = $request->validated(); // return an array

        $data['roles'] = ['user'];


        $user = User::create($data);

        if ($user) {
            return redirect()
                ->route('users.show', $user->id)
                ->with('success', 'User Saved Successfully');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // return $request;
        $data = $request->validated();

        if ($user->update($data))
            return 'User Updated Successfully';

        return 'Something went wrong, please reload the page and try again';

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        return $user->delete();
    }

    /**
     * Show all employees in specific role.
     */
    public function role($role)
    {
        return User::where('roles', $role)->get();

    }

    public function trashed()
    {
        return User::onlyTrashed()->get();
    }

    public function restore($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();

        if ($user->trashed()) {
            return $user->restore();
        } else {
            return 'The user is already in your company';
        }
    }
}
