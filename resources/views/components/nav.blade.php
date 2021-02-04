<nav id="navbar" class="navbar navbar-expand-xl bg-transparent transition">

            <img class="" height="120" id="navLogo" src="/media/logo-white.png" alt="Craft Beer Main Demo">

    <!-- Right Side Of Navbar -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <i class=" hamburger fas fa-bars fa-2x text-dark"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav ml-auto mr-5">

            <li class="nav-item">
                <a class="nav-link text-light lead font-weight-bold py-0 my-0" href="{{ route('home') }}">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-light lead font-weight-bold py-0 my-0" href="{{ route('about_us') }}">Contattaci</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-light lead font-weight-bold py-0 my-0" href="{{ route('team') }}">Il Team</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-light lead font-weight-bold py-0 my-0" href="{{ route('breweries') }}">Le Birerrie</a>
            </li>

            <!-- Authentication Links -->
            @guest
            @if (Route::has('login'))
            <li class="nav-item ">
                <a class="nav-link text-light lead font-weight-bold py-0 my-0" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endif
            
            @if (Route::has('register'))
            <li class="nav-item ">
                <a class="nav-link text-light lead font-weight-bold py-0 my-0" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link text-light lead font-weight-bold py-0 my-0 dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
                
               

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">                    
                    @if (Auth::user()->role == 'admin')                   
                    <a class="dropdown-item" href="/admin">Admin</a>                    
                    @endif
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            </li>
            @endguest
        </ul>
    </div>
</nav> 













     