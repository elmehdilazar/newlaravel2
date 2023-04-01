@extends('master.layout')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
@endsection
@section('title')
    show
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
            <img class="card-img-top" src="{{asset("uploads/".$posts->image)}}" alt="Title">
                <div class="card-body pb-6" style="height: 16vh">
                    <h4 class="card-title">{{ $posts->title }}</h4>
                    <p class="card-text">{{ $posts->body }}</p>
                </div>

            </div>
            @auth


            @if (auth()->user()->id=$posts->user_id || auth()->user()->is_admin)

            <div class="col mt-3  d-flex justify-content-center">
                <a name="" id="" class="btn btn-primary"
                    href="{{ route('post.edit', ['slug' => $posts->slug]) }}" role="button">editer</a>
                <form id="{{ $posts->id }}"action=" {{ route('post.delete', ['id' => $posts->id]) }}" method="post" >
                    @csrf
                    @method('delete')
                </form>

                <button
                onclick="
                event.preventDefault();
                if(confirm('étes vous sur ?')) document.getElementById({{ $posts->id }}).submit();
                "

                type="button" form="{{ $posts->id }}" class="btn btn-danger">supprimé</button>

            </div>


            @endif
              @endauth
        </div>
    </div>
@endsection
