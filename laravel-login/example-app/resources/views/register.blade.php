@extends('master')
@section('content')

<div class="container bg-dark text-white my-5 p-5">
    <div class="row">
        <div class="col-6 md-6 mx-auto">
        <form class="row g-3" method="post" enctype="multipart/form-data" action="{{URL::to('registerUser')}}">
          @csrf
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">Fullname</label>
    <input type="text" name="fullname" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">Password</label>
    <input type="text" name="password" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">Upload & Images</label>
    <input type="file" name="file" class="form-control" id="inputEmail4">
  </div>
  
  <div class="col-12">
    <button type="submit" class="btn btn-dark border border-3 border-white">Sign up</button>
  </div>
</form>
        </div>
    </div>
</div>

@endsection