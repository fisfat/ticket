@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header text-center">
          Add An Event
        </div>
        <div class="card-body">
          <form class="" action="{{route('events.store')}}" enctype="multipart/form-data" method="POST">
            {{csrf_field()}}
            <input type="text" class="form-control" name="title" placeholder="Input Event Title" value="">
            <br>
            <select class="form-control" name="category">
              <option value="">Choose Event Category</option>
              @foreach($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
            <br>
            <textarea name="desc" rows="8" id="article-ckeditor" cols="80" placeholder="Input Event Description" class="form-control"></textarea>

            <input type="file" name="cover" class="form-control mt-2">

            <input type="submit" name="submit" class="btn btn-sm btn-primary mt-2" value="submit">

          </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
