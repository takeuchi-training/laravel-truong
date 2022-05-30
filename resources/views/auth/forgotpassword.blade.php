@extends('layouts.app')

@section('content')
    <h3 class="lead text-center text-secondary">Please enter your email.</h3>
    <form action="/forgot-password" method="POST">
        @csrf
        <div class="row">
            <div class="control-group col-12 col-lg-6 offset-lg-3 my-2">
                <label for="email">Email</label>
                <input id="email" class="form-control" name="email"
                    class="@error('email') is-invalid @enderror" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <button class="btn btn-secondary">Send request</button>
        </div>
        @if (isset($status))
            <div>
                <p class="text-success">{{ dd($status) }}</p>
            </div>
        @endif
    </form>
@endsection