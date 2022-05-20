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
        </ul>
    </div>
</div>
</nav>
<div class="p-5 d-flex flex-column justify-content-center align-items-center">
    <h5 class="text-center {{ $isErrorMessage === true ? 'text-danger' : 'text-success' }}" :path="$path">{{ $message }}</h5>
    <p><small class="text-center"><i>{{ $slot }}</i></small></p>
</div>