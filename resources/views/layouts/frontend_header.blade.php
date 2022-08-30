<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center">
            <img src="{{URL::asset('assets/images/logo.png')}}" alt="">
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link " href="/">Home</a></li>
                <li><a class="nav-link " href="/about">About</a></li>
                <li><a class="nav-link" href="/membership">Membership</a></li>
                <li><a class="nav-link" href="/blog">Blog</a></li>
                <li><a class="nav-link" href="/contact">Contact</a></li>
                @auth
                    @if(Auth::user()->user_type == "Administrator")
                        <li><a class="nav-link" href="/admin/dashboard"><button class="btn btn-success">Dashboard</button></a></li>
                    @else
                        <li><a class="nav-link" href="{{ route('home') }}"><button class="btn btn-success">Dashboard</button></a></li>
                    @endif
                @else
                    <li><a class="nav-link" href="{{ route('login') }}"><button class="btn btn-success">Login</button></a></li>
                @endauth
                <!-- <li><a class="nav-link" href="{{ route('register') }}"><button class="btn btn-success">Sign Up</button></a></li> -->
            </ul>
            <i class="fas fa-bars mobile-nav-toggle"></i>
        </nav>
    </div>
</header>