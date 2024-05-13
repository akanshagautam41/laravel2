<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<div class="container my-5">
    <div class="row">
        <div class="col-12 " >
            <a href="{{route('details.create')}}" class="btn btn-primary">Add New</a>
        </div>
        <div class="col-12">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($details as $dl)
    <tr>
      <th scope="row">{{++$i}}</th>
      <td>{{$dl->name}}</td>
      <td>{{$dl->email}}</td>
      <td>{{$dl->phone}}</td>
      <td>
        <a href="{{route('details.show',$dl->id)}}" class="btn btn-primary">View</a>
        <a href="{{route('details.edit',$dl->id)}}" class="btn btn-success">Edit</a>
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" >Delete</button>
        <!-- <a href="" class="btn btn-danger">Delete</a> -->
      </td>
    </tr>
   @endforeach
  </tbody>
</table>
{{$details->links()}}
        </div>
    </div>
</div>
</body>
</html>

