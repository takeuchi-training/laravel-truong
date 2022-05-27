<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Laravel Example</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
        data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" 
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ $path === 'blog' ? 'active text-danger' : '' }}" aria-current="page" href="/blog">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ $path === 'files' ? 'active text-danger' : '' }}" href="/files">Files</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ $path === 'users' ? 'active text-danger' : '' }}" href="/users">Users</a>
          </li>
        </ul>
        <ul class="navbar-nav mb-2 mb-lg-0">
          @if (!auth()->user())
            <li class="nav-item">
              <a class="nav-link {{ $path === 'users/new' ? 'active text-danger' : '' }}" href="/users/new">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ $path === 'login' ? 'active text-danger' : '' }}" href="/login">Login</a>
            </li>
          @else
            <li class="nav-item">
              <form action="/logout" method="POST">
                @csrf
                <button class="btn btn-danger">Logout</button>
              </form>
            </li>
          @endif
        </ul>
    </div>
</div>
</nav>
@php
    $subNavBg = $isErrorMessage === true ? 'bg-warning' : 'bg-info';
@endphp
<div {{ $attributes->merge(['class' => "p-5 d-flex flex-column justify-content-center align-items-center $subNavBg"]) }}">
    <h5 class="text-center {{ $isErrorMessage === true ? 'text-danger' : 'text-white' }}" :path="$path">{{ $message }}</h5>
    <p><small class="text-center"><i>{{ $slot }}</i></small></p>
</div>