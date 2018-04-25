<header>
    <header class="navbar is-primary">
        <div class="container">
          <div class="navbar-brand">
            {{-- <a class="navbar-item">
              <h1 class='title is-2'>Blog &#9788;</h1>
            </a> --}}
            <a class="navbar-item is-active" href="/">
              Home
            </a>
            @auth
            <a class="navbar-item" href="/posts/create">
              New Post
            </a>
            @endauth
            <span class="navbar-burger burger" data-target="navbarMenuHeroC">
              <span></span>
              <span></span>
              <span></span>
            </span>
          </div>
          <div id="navbarMenuHeroC" class="navbar-menu">
            <div class="navbar-end">
              @guest
                <a class="navbar-item" href="/login">
                  Login
                </a>
                <a class="navbar-item" href="/register">
                  Register
                </a>
              @endguest
              @auth
                <a class="navbar-item" href="/">
                  {{Auth::user()->name}}
                </a>
                <a class="navbar-item" href="/logout">
                  Logout
                </a>
              @endauth
            </div>
          </div>
        </div>
    </header>
</header>