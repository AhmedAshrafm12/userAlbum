@extends('layouts.app')
@section('content')
<section class="pictures p-4" style="margin-top: 10%" >
      <h3  class="mb-3">....    {{$album->name}} ... </h3 >      
    <div class="row">
          @if ($album->pictures->count() == 0)               {{-- if there is no pictures --}}
           <div>no pictures yet start adding some..</div>
          @endif

        @foreach ($album->pictures as $picture)
              <div class="col-lg-3">
                <div>
                <img src="/storage/{{ $picture->image }}" class="m-2" alt="..." height="300px" width="300px">
                <h4>{{ $picture->name }}</h4>
              </div>
              </div>

        @endforeach
    </div>
</section>

<a class="btn btn-success" href="/addPicture/{{ $album->id }}">add Picture</a>
<a href="/albums/{{ $album->id}}/edit" class="btn btn-primary">edit album</a>

@endsection