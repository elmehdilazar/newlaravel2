<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="{{url("/")}}">{{ env("APP_NAME","laravel")}}</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="{{url("/")}}" aria-current="page"><span><i class="fa fa-home" aria-hidden="true"></i></span>home</a>
                </li>


                 @auth
                 <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">posts</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="{{ route('post.add')}}">ajouter</a>
                        <a class="dropdown-item" href="#"></a>
                    </div></li>
          <li class="nav-item">
                    <a class="nav-link active" href="{{ route('profile.show')}}" aria-current="page"><span><i class="fa fa-home" aria-hidden="true"></i></span>{{ auth()->user()->name}}</a>
                </li>

@endauth

@guest
          <li class="nav-item">
                    <a class="nav-link active" href="{{url("/login")}}" aria-current="page"><span><i class="fa fa-home" aria-hidden="true"></i></span>login</a>
                </li>
                        <li class="nav-item">
                    <a class="nav-link active" href="{{url("/register")}}" aria-current="page"><span><i class="fa fa-home" aria-hidden="true"></i></span>register</a>
                </li>
@endguest


            </ul>
            <form class="d-flex my-2 my-lg-0">
                <input class="form-control me-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
  </div>
</nav>
