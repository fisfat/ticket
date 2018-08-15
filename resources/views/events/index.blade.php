@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-3">

  </div>
  <div class="col-md-6">
    <div class="card card-primary">
      <div class="card-header text-center">
      My  Events
      </div>
    @foreach($events as $event)
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <img src="/storage/images/{{$event->cover}}" style="width:100%;height:100px;" class="img-responsive" alt="">
          </div>
          <div class="col-md-8">
            
            <div class="text-center">
              <h4>{{$event->title}}</h4>
            </div>
    
            <div class="">
              {{$event->description}}
    
              <div class="float-right">
                <ul class="list-inline list-unstyled">
                  <li class="list-inline-item"><a href="/events/{{$event->id}}" class="btn btn-info btn-sm">View</a></li>
                </ul>
              </div>
    
    
            </div>
          </div>
          </div>
        
        <hr>
      </div>
      @endforeach
    </div>
    <div>

    {{$events->links()}}      
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <a href="/events/create">Create new Event</a>
      </div>
    </div>
  </div>
</div>


@endsection
