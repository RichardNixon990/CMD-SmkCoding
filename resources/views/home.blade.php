@extends('layouts.main')
@section('Content')

<div class="row">
@foreach ($articles as $article)
<div class="col-md-4">
    <div class="card" style="width: 15rem;">
        <img src="{{asset('storage/'. $article->image)}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $article->judul}}</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
</div>
@endforeach

</div>

@endsection
