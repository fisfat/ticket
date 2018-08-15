@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Your Purchase History
                </div>
                <div class="card-body">
                    @if(count($events) > 0)
                    <ul class="list-group">
                    
                        @foreach($events as $event)
                    <li class="list-group-item"> <a href="/events/{{$event->id}}"> {{$event->title}} </a> <p class="float-right p-0 m-0" style="color:darkgrey;font-weight:light;font-size:0.8rem;;">Purchased at: {{$event->date}}</p> </li>
                        @endforeach
                        
                    </ul>
                    @else
                        <p class="text-center">You havent made a purchase yet!</p>
                    @endif

                </div>
            </div>
            
        </div>
    </div>
@endsection