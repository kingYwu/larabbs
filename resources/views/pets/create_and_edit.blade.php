@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Pet /
          @if($pet->id)
            Edit #{{ $pet->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($pet->id)
          <form action="{{ route('pets.update', $pet->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('pets.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                	<label for="name-field">Name</label>
                	<input class="form-control" type="text" name="name" id="name-field" value="{{ old('name', $pet->name ) }}" />
                </div> 
                <div class="form-group">
                    <label for="longittude-field">Longittude</label>
                    <input class="form-control" type="text" name="longittude" id="longittude-field" value="{{ old('longittude', $pet->longittude ) }}" />
                </div> 
                <div class="form-group">
                    <label for="latitude-field">Latitude</label>
                    <input class="form-control" type="text" name="latitude" id="latitude-field" value="{{ old('latitude', $pet->latitude ) }}" />
                </div> 
                <div class="form-group">
                	<label for="describtion-field">Describtion</label>
                	<textarea name="describtion" id="describtion-field" class="form-control" rows="3">{{ old('describtion', $pet->describtion ) }}</textarea>
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('pets.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
