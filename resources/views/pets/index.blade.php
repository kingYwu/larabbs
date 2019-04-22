@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          Pet
          <a class="btn btn-success float-xs-right" href="{{ route('pets.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($pets->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Name</th> <th>Longittude</th> <th>Latitude</th> <th>Describtion</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($pets as $pet)
              <tr>
                <td class="text-xs-center"><strong>{{$pet->id}}</strong></td>

                <td>{{$pet->name}}</td> <td>{{$pet->longittude}}</td> <td>{{$pet->latitude}}</td> <td>{{$pet->describtion}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('pets.show', $pet->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('pets.edit', $pet->id) }}">
                    E
                  </a>

                  <form action="{{ route('pets.destroy', $pet->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $pets->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
