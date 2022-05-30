@extends('layouts.app')

@section('content')
    <h3 class="lead text-center text-secondary">Please check your email and verify your account.</h3>
    <form action="/reset-password" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
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
                <input id="password" type="password" class="form-control" name="password"
                    class="@error('password') is-invalid @enderror">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="control-group col-12 mt-2">
                <label for="password_confirmation">Confirm password</label>
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"
                    class="@error('password_confirmation') is-invalid @enderror">
                @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <button class="btn btn-secondary">Reset password</button>
        </div>
    </form>
@endsection