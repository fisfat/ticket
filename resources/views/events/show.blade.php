@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="jumbotron text-center">
        <img style="width:100%;height:300px;" class="img-responsive" src="/storage/images/{{$event->cover}}" alt="">
        </div>
        <h1>{{$event->title}}</h1>
        <br>
        {{$event->description}}
      </div>
    </div>

  </div>

  <div class="col-md-3">
    
    <div class="card">
      <ul class="list-unstyled p-3">
          @if(Auth::user() && Auth::user()->id == $event->user_id)
        <li class="">
            <form class="" id="form" action="{{ route('events.destroy', [$event->id]) }}" method="post">
              <input type="hidden" name="_method" value="DELETE">
              {{csrf_field()}}
            </form>
           <a href="#"
          onclick=" var x = confirm('Are you sure you want to delete this event?');
                      if(x){
                        event.preventDefault();
                        document.getElementById('form').submit();
                      }
          "
          >Delete This Event</a> </li>
        <li class=""> <a href="/events/{{$event->id}}/edit">Edit This Event</a> </li>
        <hr>
        <li class=""> <a href="/events/create">Add New Event</a> </li>
        @endif
        @if(Auth::user() && Auth::user()->role_id == 1)
                    <li > <a href="/purchase/event/{{$event->id}}">Purchase Ticket</a> </li>
        @endif
      </ul>
    </div>
    
  </div>
</div>

@endsection
