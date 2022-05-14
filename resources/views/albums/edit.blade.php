@extends('layouts.app')
@section('content')
<form class="simpleForm" action="/albums/{{ $album->id }}" method="POST" enctype="multipart/form-data">      {{-- simple login form --}}
    @csrf  
    @method('PATCH')
    <div class="mb-3">
          <label for="name" class="form-label">name </label>
          <input type="name" class="form-control" id="name" name="name" value="{{ $album->name }}">

          {{-- get error massage --}}
            @error('name')
          <span class="error" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">cover</label>
          <input type="file" class="form-control" id="exampleInputPassword1" name="cover">
        </div>
     
        <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection