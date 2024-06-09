<header class="w-100 " @style(['color:white'])>
    <nav class="navbar navbar-expand">
        @if ($user)
        <ul class="navbar-nav d-flex flex-row justify-content-between">
            <li class="nav-item"><a class="nav-link text-light btn btn-dark " href="/profile">{{$user->name}}</a></li>
            <li class="nav-item"><a class="nav-link text-light btn btn-dark" href={{route('dashboard')}}>Dashboard</a></li>
            <li class="nav-item"><a class="nav-link text-light btn btn-dark" href="/">Main</a></li>            
        </ul>
        @else
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link text-light btn btn-dark" href={{route('register')}}>Register</a></li>
            <li class="nav-item"><a class="nav-link text-light btn btn-dark" href={{route('login')}}>Login</a></li>
            <li class="nav-item"><a class="nav-link text-light btn btn-dark" href="/">Main</a></li>            
        </ul>
        @endif        
      
    </nav>
</header>