<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
            @if (Route::has('login'))
                @auth
                    <a class="nav-link" href="{{ url('/home') }}">Home</a>
                @else
                    <a class="nav-link" href="{{ route('post.list') }}">Post</a>
                    <a class="nav-link" href="{{ route('comment.guest') }}">Guest</a>
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                    {{-- @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    @endif --}}
                @endauth
            @endif
        </div>
        </div>
    </div>    
</nav>