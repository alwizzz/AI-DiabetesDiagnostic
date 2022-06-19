<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">
        <a class="navbar-brand fs-2" href="/">Diabetes Diagnostic</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link {{ ($title == 'Diagnostic') ? 'active':'' }}" href="/">Diagnostic</a>
                <a class="nav-link {{ (str_contains(Route::getCurrentRoute()->uri, 'learning')) ? 'active':'' }}" href="/learning">Learning</a>
                <a class="nav-link {{ ($title == 'About') ? 'active':'' }}" href="/about">About</a>
            </div>
        </div>
    </div>
</nav>