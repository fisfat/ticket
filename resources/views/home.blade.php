@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
      <div class="col-md-3">
        <div class="card">
          <div class="card-header text-center">
            Categories
          </div>
          <div class="card-body">
            <ul class="list-unstyled list-group">
              @foreach($categories as $category)
              <li class="list-group-item"> <a href="/categories/{{$category->id}}">{{$category->name}}</a> </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">Dashboard</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    @if(count($events) > 0)
                      @foreach($events as $event)

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

                      @endforeach
                    @else
                        <p class="text-center">No post found!</p>
                    @endif


                </div>
                       
                
            </div>
            <div class="float-right mt-3">
              {{$events->links()}}
            </div>
            
        </div>
        
  </div>
</div>

@endsection
