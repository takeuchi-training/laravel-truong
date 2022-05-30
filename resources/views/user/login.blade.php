@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <div class="border rounded mt-5 p-4 row">
                    <div class="col col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                        <h1 class="display-4">Login</h1>
    
                        <hr>

                        <form action="/login" method="POST">
                            @csrf
                            <div class="row">
                                <div class="control-group col-12 mt-2">
                                    <label for="email">Email</label>
                                    <input id="email" class="form-control" name="email"
                                        class="@error('email') is-invalid @enderror" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="control-group col-12 mt-2">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div>
                                    <input id="remember" type="checkbox" class="form-check-input me-1" name="remember">
                                    <label for="remember" class="form-check-label" >Remmember me</label>
                                </div>
                                <div>
                                    <a href="/forgot-password">Forgot password?</a>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="control-group col-12 text-center">
                                    <button id="btn-submit" class="btn btn-primary">
                                        Login
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