@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-3">
    <div class="card card-primary">
      <div class="card-header text-center">
        Categories
      </div>
      <div class="card-body">
        <ul class="list-unstyled list-group">
          @foreach($categories as $category)
          <li class="list-group-item"> <a href="#">{{$category->name}}</a> </li>
          @endforeach
        </ul>


      </div>

    </div>
  </div>
  <div class="col-md-6">
    <div class="card card-primary">
      <div class="card-header text-center">
        Events
      </div>
      @foreach($events as $event)
      <div class="card-body">
        <div class="text-center">
          <h4>{{$event->title}}</h4>
        </div>

        <div class="">
          {{$event->description}}
        </div>
        <hr>
      </div>
      @endforeach
    </div>
  </div>
</div>


@endsection
