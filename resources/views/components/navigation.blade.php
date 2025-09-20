<nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-red">
    <p class="title navbar-title yellow">hoKAbento</p>
    <div class="flex" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is('menu') ? 'active' : '' }}" href="/menu">Menu</a>
            </li>
            @if (Auth::check())
                @if (Auth::user()->role == 'customer')
                    <li class="nav-item flex align-center">
                        <a class="nav-link text-white {{ request()->is('cart') ? 'active' : '' }}"
                            href="/cart">Cart</a>
                    </li>
                @endif
                <li class="nav-item flex align-center">
                    <a class="nav-link text-white {{ request()->is('history') ? 'active' : '' }}"
                        href="/history">History</a>
                </li>
            @endif

        </ul>
        @if (Auth::check())
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/profile"> <!-- Wrap the image in an anchor tag -->
                        <img class="profile-picture" src="imges/default_pp.jpg" alt="Profile Picture" />
                    </a>
                </li>
                <li class="nav-item flex align-center ml-2">
                    <span class=" text-white">{{ Auth::user()->name }}</span>
                </li>
            </ul>
        @else
            <ul class="navbar-nav">
                <li class="nav-item">

                    <button class="navbar-btn" onclick="location.href='/login'">Sign In</button>

                </li>

            </ul>
        @endif

    </div>
</nav>
