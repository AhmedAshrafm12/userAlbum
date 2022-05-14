@extends('layouts.app')
@section('content')
<form class="simpleForm" action="/albums" method="POST" enctype="multipart/form-data">      {{-- simple login form --}}
    @csrf  
    <div class="mb-3">
          <label for="name" class="form-label">name </label>
          <input type="name" class="form-control" id="name" name="name" value="{{ old('name') }}">
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
          {{-- get error massage --}}

            @error('cover')
          <span class="error" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
     
        <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection