@extends('master.layout')


@section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
@endsection
@section('title')
    ajouter
@endsection
@section('content')
    <div class="row justify-content-center mx-auto mt-5">
        <div class="col-6">
            <div class="card">
                <div class="card-header d-flex justify-content-center bg-dark text-light">
                    ajouter post
                </div>

                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <form action="{{ route("post.store") }}" method="post" enctype="multipart/form-data">
                   @csrf  {{-- crsf tocken    --}}
                    <div class="card-body">
                        <div class="mb-3">

                            <input type="text" name="title" id="" class="form-control" placeholder="title"
                                aria-describedby="helpId">

                        </div>

                        <div class="mb-3">

                            <textarea id="my-textarea" class="form-control" placeholder="description"name="body" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Choose file</label>
                            <input type="file" class="form-control" name="image" id="" placeholder=""
                                aria-describedby="fileHelpId">
                        </div>
                        <div class="form-group">
                            <label for="my-select">categories</label>
                            <select id="my-select" class="form-control" name="cat_id">
                                <option selected>select category</option>
                            @foreach ($cat as $item)
                                      <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary">ajouter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
@endsection
