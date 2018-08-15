@extends('layouts.app')

@section('content')

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header text-center">
            Edit Your Event
          </div>
          <div class="card-body">
            <form class="" action="{{route('events.update', [$event->id])}}" enctype="multipart/form-data" method="post">
              {{ csrf_field()}}
              <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                  <input type="text" class="form-control" name="title" value="{{$event->title}}">
                  <br>
                  <textarea name="desc" id="article-ckeditor" rows="8" cols="80" class="form-control">{{$event->description}}</textarea>

                  <input type="file" name="cover" id="" class="form-control mt-2">

                  <input type="submit" name="submit" class="btn btn-sm btn-primary mt-2" value="submit">

                </div>

            </form>
          </div>

        </div>

      </div>

    </div>

  </div>

@endsection
