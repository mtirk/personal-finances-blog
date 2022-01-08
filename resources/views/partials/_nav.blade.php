@if (Auth::check())
<div class="nav wrap">
    <div class="nav left">
        <li class="nav-item">
            <a href="/home" class="nav-link {{ (request()->is('home')) ? 'active' : '' }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('finances')) ? 'active' : '' }}" href="/finances">Finances</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('goals')) ? 'active' : '' }}" href="/goals">Goals</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('blog*')) ? 'active' : '' }}" href="/blog">Blog</a>
        </li>
    </div>
    <div class="nav right">
            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Edit Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a href="{{ route('logout') }}" class="dropdown-item" 
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    {{ csrf_field() }}
                </form></li>
        </ul>
    </div>
</div>
@endif