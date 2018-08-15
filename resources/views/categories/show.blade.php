@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-3">

  </div>
  <div class="col-md-6">
    <div class="card card-primary">
      <div class="card-header text-center">
        Events
      </div>
      @foreach($category as $cat)
      <div class="card-body">
        <div class="text-center">
          <h4>{{$cat->title}}</h4>
        </div>

        <div class="">
          {{$cat->description}}
        </div>
        <hr>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
