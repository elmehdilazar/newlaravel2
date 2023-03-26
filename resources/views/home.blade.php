@extends("master.layout")

@section('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

@endsection
@section("title")
home
@endsection
@section('content')
          @if (session()->has("success"))
  <div class="alert alert-success" role="alert">
  {{ session()->get('success'); }}
  </div>
                @endif
<div class="row my-4">
@foreach ($posts as $value)
<div class="col-4 my-4">
    <div class="card  ">
      <img class="card-img-top" src="{{asset("uploads/".$value->image)}}" alt="Title">
      <div class="card-body pb-6" style="height: 16vh">
        <h4 class="card-title">{{ $value->title }}</h4>
        <p class="card-text">{{ Str::limit($value->body, 80, '...') }}</p>
      </div>
  <div class="card-footer">

      <a name="" id="" class="btn btn-primary" href="{{ route('post.show', ['slug'=>$value->slug]) }}" role="button">voir</a>
        </div>
    </div>
</div>
@endforeach

</div>
<div class="row justify-content-center align-items-center g-2">
 <div class="col-2 justify-content-center">

    {{ $posts->links() }}
</div>
</div>

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
@endsection