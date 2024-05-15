<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<div class="container-fluid bg-primary text-end p-3 px-5">

<!-- Example single danger button -->
<div class="btn-group  ">
  <button type="button"  class="btn btn-info dropdown-toggle w-25" data-bs-toggle="dropdown" aria-expanded="true">
  <i class="fa-solid fa-cart-shopping"></i>
  Cart <span class="badge bg-secondary">{{count((array)session('cart'))}}</span>
  </button>
  <ul class="dropdown-menu w-100">

  @php
$total = 0
  @endphp

  @foreach ((array) session('cart') as $id=>$details)
  @php
    $total = $total +  $details['price']*$details['quantity']
    @endphp
<div class="col-3">
<!-- <img src="{{asset('img')}}/{{$details['picture']}}" alt="" height="50px"> -->
</div>
<div class="col-3">
{{$details['price']}}
</div>
<div class="col-3">
{{$details['quantity']}}
</div>
    
    <div class="row">

   <!-- <div class="col-6">
            
        </div>
        <div class="col-6"></div> -->
        @endforeach
    </div>
    <p>Total:{{$total}} </p>
  </ul>
</div>


</div>

    @yield('content')
</body>
</html>