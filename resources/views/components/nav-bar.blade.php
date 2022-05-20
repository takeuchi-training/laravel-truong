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
            <a class="nav-link {{ $path === 'blog' ? 'active' : '' }}" aria-current="page" href="/blog">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ $path === 'files' ? 'active' : '' }}" href="/files">Files</a>
          </li>
        </ul>
    </div>
</div>
</nav>
<h5 class="text-center {{ $isErrorMessage === true ? 'text-danger' : 'text-success' }} p-5" :path="$path">{{ $message }}</h5>