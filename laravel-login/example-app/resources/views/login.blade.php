@extends('master')
@section('content')

<div class="container bg-dark text-white my-5 p-5">
    <div class="row">
        <div class="col-6 md-6 mx-auto">
        <form class="row g-3" method="post" enctype="multipart/form-data" action="{{URL::to('loginUser')}}">
          @csrf
        @if(session()->has('success'))
<div class="alert alert-success">
{{session()->get('success')}}
</div>
@endif

@if(session()->has('error'))
<div class="alert alert-danger">
{{session()->get('error')}}
</div>

        @endif
  
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">Password</label>
    <input type="text" name="password" class="form-control" id="inputEmail4">
  </div>
  
  
  <div class="col-12">
    <button type="submit" class="btn btn-dark border border-3 border-white">Sign In</button>
  </div>
</form>
        </div>
    </div>
</div>

@endsection