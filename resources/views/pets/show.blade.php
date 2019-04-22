@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Pet / Show #{{ $pet->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('pets.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('pets.edit', $pet->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Name</label>
<p>
	{{ $pet->name }}
</p> <label>Longittude</label>
<p>
	{{ $pet->longittude }}
</p> <label>Latitude</label>
<p>
	{{ $pet->latitude }}
</p> <label>Describtion</label>
<p>
	{{ $pet->describtion }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
