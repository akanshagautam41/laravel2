<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('contact')}}" method="post" enctype="multipart/form-data" >
        @csrf
        Name : <input type="text" name="name">
        @error('name')
  <p>{{$message}}</p>
        @enderror
        <br><br>
       
        Email : <input type="text" name="email">
        @error('email')
  <p>{{$message}}</p>
        @enderror
        <br><br>
        Subject : <input type="text" name="subject">
        @error('subject')
  <p>{{$message}}</p>
        @enderror
        <br><br>
        Message : <input type="text" name="message">
        @error('message')
  <p>{{$message}}</p>
        @enderror
        <br><br>
        upload File : <input type="file" name="attachment" >
        @error('attachment')
  <p>{{$message}}</p>
        @enderror
        <br><br>
        <input type="submit" value="Send mail">
    </form>
</body>
</html>