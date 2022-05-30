@extends('layouts.app')

@section('content')
    <h3 class="lead text-center text-secondary">Please check your email and verify your account.</h3>
    <form action="/email/verification-notification" method="POST">
        @csrf
        <div class="d-flex justify-content-center align-items-center">
            <button class="btn btn-secondary">Resend verification</button>
        </div>
    </form>
@endsection