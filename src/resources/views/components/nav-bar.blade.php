<nav class="navbar mb-2" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="https://bulma.io">
            <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                @auth
                <a href="{{ route('dashboard') }}" class="navbar-item">
                    Dashboard
                </a>
                @endauth
                <a href="{{ route('questions.index') }}" class="navbar-item {{ request()->routeIs('questions.index') ? 'is-active' : ''}}"" >
                    Questions
                </a>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                    Categories
                    </a>

                    <div class="navbar-dropdown">
                    @if ($categories)
                        @foreach ($categories as $category)
                            <a href="{{ route('categories.show', $category) }}" class="navbar-item">
                                {{ $category->title }}
                            </a>
                        @endforeach
                    @endif
                    </div>
                </div>
            </div>

            <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    @auth
                    <a href="{{ route('questions.create') }}" class="button is-primary">
                        <strong>Ask</strong>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="/logout" class="button is-light"
                        onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            Log out
                        </a>
                    </form>
                    @else
                    <a href="/register" class="button is-primary">
                        <strong>Sign up</strong>
                    </a>
                    <a href="/login" class="button is-light">
                        Log in
                    </a>
                    @endauth
                </div>
            </div>
            </div>
        </div>
    </div>
</nav>
