@extends('layout')

@section('content')

@if(session('success'))
<div class="alert alert-info">
  {{session('success')}}
</div>

@endif

<div class="container-fluid  p-5 my-5">
    <div class="row justify-content-center">

        @foreach ($products as $prd )
        
        <div class=" col-3">
        <div class="card" style="width: 18rem;">
  <img src="{{asset('img')}}/{{$prd->picture}}" class="card-img-top" alt="..." height="200px">
  <div class="card-body">
    <h5 class="card-title">{{$prd->product_name}}</h5>
    <p class="card-text">{{$prd->product_desc}}</p>
    <p class="card-text">{{$prd->price}}</p>
    <a href="{{route('add-to-cart',$prd->id)}}" class="btn btn-primary">Add To Cart</a>
  </div>
</div>
        </div>

        @endforeach
   <!-- <div class="bg-secondary col-3">
        <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Add To Cart</a>
  </div>
</div>
        </div>
        <div class="bg-secondary col-3">
        <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Add To Cart</a>
  </div>
</div>
        </div>
        <div class="bg-secondary col-3">
        <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Add To Cart</a>
  </div>
</div>
        </div> -->

    </div>
</div>
@endsection