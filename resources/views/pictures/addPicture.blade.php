@extends('layouts.app')
@section('content')
<form class="simpleForm" action="/p/{{ $album->id }}" method="POST" enctype="multipart/form-data">      {{-- simple login form --}}
    @csrf  
    <h5>add to ... {{ $album->name }}</h5>
    <div class="mb-3">
          <label for="name" class="form-label">name </label>
          <input type="name" class="form-control" id="name" name="name" value="{{ old('name') }}">
          @error('name')
          <span class="error" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">image</label>
          <input type="file" class="form-control" id="exampleInputPassword1" name="image">
          @error('image')
          <span class="error" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
     
        <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection