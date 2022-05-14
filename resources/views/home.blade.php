@extends('layouts.app')
@section('content')
<h2 class="m-4">my albums</h2>
<section class="albumsview">
<div class="row">
@if ($albums->count()>0)                               {{-- if user has albums --}}
@foreach (auth()->user()->albums as $album )
    <div class="col-lg-3">  
        <div class="card" style="width: 18rem;">           {{-- start card --}}
        <img src="storage/{{ $album->cover }}" class="card-img-top" alt="..." height="200px">
            <div class="card-body">
                <h5 class="card-title mb-3">{{ $album->name }}</h5>
                <a href="albums/{{ $album->id }}" class="btn btn-success">view</a>
                <button class="btn btn-danger delete" onclick="showDelteOptions({{ $album->id }})">delete</button>
            </div>
      </div>                          {{-- end card --}}
  </div>
@endforeach

@extends('layouts.sideOptions')
@extends('layouts.albums')

@else                                          {{-- if user doesn't  has albums --}}
<div>no albums yet start create some..</div>
@endif 
</div>
</section>

<a class="btn btn-primary" href="/albums/create">new Album</a>


@endsection

@section('scripts')
<script src="{{ asset('js/main.js') }}"></script>
@endsection



