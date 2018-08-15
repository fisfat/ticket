@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <div class="text-center">REVIEW THE EVENT YOU ARE ABOUT TO PAY FOR</div>
      <div class="card">
        <div class="card-body">
          <div class="jumbotron text-center">
          <img style="width:100%;height:300px;" class="img-responsive" src="/storage/images/{{$event->cover}}" alt="">
          </div>
          <h1>{{$event->title}}</h1>
          <br>
          {{$event->description}}

          <hr>
            <div class="">
            <form action="{{route('purchases.store')}}" id="form" method="POST">
                    {{csrf_field()}}
                <input type="hidden" name="event_id" id="" value="{{$event->id}}">
            </form>
                <a href=""  onclick=" alert('You will be redirected to a payment page shortly!');
                                        event.preventDefault();
                                        document.getElementById('form').submit();
                " class="btn btn-success btn-sm">Purchase Now</a>
            </div>
          </div>
        </div>
      </div>
  
    </div>
  
    
  </div>
@endsection