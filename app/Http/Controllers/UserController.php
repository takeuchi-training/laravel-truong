<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use SoftDeletes;

    public function index() {
        return view('user.index', [
            'users' => User::justCreated()->lazy(10)
        ]);
    }

    public function create() {
        return view('user.create');
    }

    public function store(StoreUserRequest $request) {
        User::withoutEvents(function () use ($request) {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);
        });

        return redirect()->route('users.index');
    }
}
