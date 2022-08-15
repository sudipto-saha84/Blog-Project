<div class="navigation">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.html">
                <img src="{{asset('/')}}front-assets/images/logo.png" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown active">
                        <a class="nav-link " href="{{route('home')}}">
                            Home
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            Blog Category
                        </a>
                        <div class="dropdown-menu" >
                            @foreach($blogCategories as $blogCategory)
                            <a class="dropdown-item" href="{{route('category-all',['id'=>$blogCategory->id])}}">{{$blogCategory->category_name}}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('service-all')}}">
                            Service
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('blog-all')}}">
                            Blog
                        </a>
                    </li>
                    @if(!\Illuminate\Support\Facades\Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="{{route('login')}}">
                          Log In
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">Register</a>
                    </li>
                    @endif
                    @if(\Illuminate\Support\Facades\Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href=""  onclick="event.preventDefault();document.getElementById('logOut').submit();">Log Out</a>
                        <form action="{{route('logout')}}" method="post" id="logOut">
                            @csrf
                        </form>

                    </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</div>
