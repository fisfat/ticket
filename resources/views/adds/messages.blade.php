@if($errors != '[]')
    {{-- @foreach($errors->all() as $error) --}}
        <div class="alert alert-dismissable text-center alert-danger">
            {!!$errors!!}
        </div>
    {{-- @endforeach --}}
@endif

@if(session('error'))
    <div class="alert alert-dismissable text-center alert-danger">
        {!!session('error')!!}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-dismissable text-center alert-success">
        {{session('success')}}
    </div>
@endif