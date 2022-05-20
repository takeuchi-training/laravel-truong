@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">All Users</h1>
                    </div>
                    <div class="col-4">
                        <p>Register new user</p>
                        <a href="/users/new" class="btn btn-primary btn-sm">Register</a>
                    </div>
                </div>                
                @forelse($users as $user)
                    <ul>
                        <li><a href="/users/{{ $user->id }}">{{ $user->name }}</a></li>
                    </ul>
                @empty
                    <p class="text-warning">No users available</p>
                @endforelse
            </div>
        </div>
    </div>
    
@endsection