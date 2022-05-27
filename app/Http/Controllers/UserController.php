<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use App\Events\RegisteredUser;
use App\MyObservers\TestUserObserverInterface;

class UserController extends Controller
{
    use SoftDeletes;

    public function index() {
        return view('user.index', [
            'users' => User::lazy(10)
        ]);
    }

    public function create() {
        return view('user.create');
    }

    public function store(StoreUserRequest $request, TestUserObserverInterface $observer) {
        // User::withoutEvents(function () use ($request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

            // $user = new User();
            // $user->name = $request->name;
            // $user->email = $request->email;
            // $user->password= bcrypt($request->password);
            // $user->save();
        // });

        // event(new RegisteredUser($user));
        $observer->afterRegister($user);

        return redirect()->route('users.index');
    }
}
