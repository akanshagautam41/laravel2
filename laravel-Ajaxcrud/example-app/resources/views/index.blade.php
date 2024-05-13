<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container my-5 ">
        <div class="row ">
        <div>
                    <h1>Laravel AJAX CRUD With Image</h1>
                </div>
            <div class="col-6">
              
                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
 Add New
</button>

<div id="show_all_employee"></div>
<!-- Modal -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="add_employee_form" class="row g-3" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
       
      
 <div class="row">
 <div class="col-md-6">
    <label for="inputEmail4" class="form-label">First Name</label>
    <input type="text" name="fname" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Last Name</label>
    <input type="text" name="lname" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">Avatar</label>
    <input type="file" name="avatar" class="form-control" id="inputEmail4">
  </div>
 </div>
 
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="add_employee_btn">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="edit_employee_form" class="row g-3" method="post" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="emp_avatar" id="emp_avatar">
        <input type="hidden" name="emp_id" id="emp_id">
      <div class="modal-body">
       
      
 <div class="row">
 <div class="col-md-6">
    <label for="inputEmail4" class="form-label">First Name</label>
    <input type="text" name="fname" class="form-control" id="fname">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Last Name</label>
    <input type="text" name="lname" class="form-control" id="lname">
  </div>
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="email">
  </div>
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">Avatar</label>
    <input type="file" name="avatar" class="form-control" id="inputEmail4">
  </div>
  <div id="avatar"></div>
 </div>
 
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="add_employee_btn">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
            </div>
        </div>
    </div>
    
               
            
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   

    <script>
        $('#add_employee_form').submit(function(e){
        e.preventDefault();

            formdetails =    new FormData(this)
            // console.log(formdetails)
            $.ajax({
                url:"{{route('store')}}" ,
                type: "post",
                data: formdetails,
                dataType:"json",
                contentType:false,
                processData:false,
                success:function(response){
                    // console.log(response)
                   
                    fetchAll();
                    $('#addEmployeeModal').modal('hide')
                    
                }
            })
        })

$(document).on('click','.editIcon',function(e){
   
   let id = $(this).attr('id')
//    alert(id)
$.ajax({
    url:"{{route('edit')}}",
    method:'get',
    data:{
        id:id
    },
    success:function(response)
{
    console.log(response.first_name)
    $('#fname').val(response.first_name)
    $('#lname').val(response.last_name)
    $('#email').val(response.email)
    $('#avatar').html(`<img src='storage/images/${response.avatar}' width='100px'/>`)
    $('#emp_id').val(response.id)
    $('#emp_avatar').val(response.avatar)

}
})
})

$('#edit_employee_form').submit(function(e){
        e.preventDefault();

            formdetails =    new FormData(this)
            // console.log(formdetails)
            $.ajax({
                url:"{{route('update')}}" ,
                type: "post",
                data: formdetails,
                dataType:"json",
                contentType:false,
                processData:false,
                success:function(response){
                    // console.log(response)
                    fetchAll();
                    $('#editEmployeeModal').modal('hide')
                }
            })
        })


        fetchAll();
        function fetchAll()
        {
            $.ajax({
                url:"{{route('fetchAll')}}",
                method:"get",
                success:function(response)
                {
                    // console.log(response)
                    $('#show_all_employee').html(response)
                    
                }
            })
        }
    </script>
</body>
</html>