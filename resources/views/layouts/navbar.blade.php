<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{route('home.index')}}">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#forumNav" aria-controls="forumNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="forumNav">
            <ul class="navbar-nav ml-auto">
                <li>
                    <form class="form-inline" action="{{route('search.post')}}" method='post'>
                        @csrf
                        <input name='search' class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.login.get')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-success" href="#">Sign up</a>
                    </li>
                    @endguest
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profile
                        </a>
                        <div class="dropdown-menu" aria-labelledby="profile">
                            <a class="dropdown-item" href="{{route('user.profile')}}">Profile</a>
                            <a class="dropdown-item" href="{{route('user.settings')}}">settings</a>
                            <a class="dropdown-item" href="{{route('user.logout')}}">Logout</a>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>