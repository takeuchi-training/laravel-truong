<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('user.index', [
            'users' => User::all()
        ]);
    }

    public function create() {
        return view('user.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:60',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:60',
            'confirmPassword' => 'required|max:60'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect()->route('users.index');
    }
}
