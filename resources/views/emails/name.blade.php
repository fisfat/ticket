<div class="">
  <form class="" action="{{route('HomeController.email')}}" method="post">
    @method('PUT')
      {{csrf_field}}
      <input type="text" name="name" value="">
      <input type="submit" name="submit" value="send">
  </form>
</div>
