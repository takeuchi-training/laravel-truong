@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/users" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="border rounded mt-5 p-4 row">
                    <div class="col col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                        <h1 class="display-4">Register a new user</h1>
    
                        <hr>

                        <form action="/users/new" method="POST">
                            @csrf
                            <div class="row">
                                @if ($errors->any() > 0)
                                    <div class="text-danger control-group col-12">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>                                                
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="control-group col-12">
                                    <label for="name">User name</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                        class="@error('name') is-invalid @enderror" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="control-group col-12 mt-2">
                                    <label for="email">User email</label>
                                    <input id="email" class="form-control" name="email"
                                        class="@error('email') is-invalid @enderror" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="control-group col-12 mt-2">
                                    <label for="password">Password</label>
                                    <input id="password" class="form-control" name="password"
                                        class="@error('password') is-invalid @enderror">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="control-group col-12 mt-2">
                                    <label for="password_confirmation">Confirm password</label>
                                    <input id="password_confirmation" class="form-control" name="password_confirmation"
                                        class="@error('password_confirmation') is-invalid @enderror">
                                    @error('password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="control-group col-12 text-center">
                                    <button id="btn-submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection