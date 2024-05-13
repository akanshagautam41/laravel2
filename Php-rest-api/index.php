<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing: border-box;
        }
        body{
            background:grey;
        }
        .main{
            width: 90%;
            margin:20px auto;
            

        }
        .text{
            background:purple;
            font-size:20px;
            color: white;
            padding:20px;
            text-align:center;
        }
        .frm{
            background:sandybrown;
            padding: 20px;
            
        }
        .frm form{
            width: 90%;
            display:flex;
            justify-content:space-evenly;
        }
        .frm label{
            color:black;
           font-size:20px;
        }

        .frm input{
           
        padding:10px;
            
        }

        .frm button{
            border:none;
            background:grey;
            padding: 10px 20px;
            color:white;
           
        }
        .box{
            width: 90%;
background-color: #fff;
margin:20px auto;

        }
        .box table{
            border:2px solid grey;
        }
         #modal{
          width: 30%;
            height: 30%;  
          background: white;
            position: fixed;
            border-radius:10px;
            right:10%;
            top:-5%;
             z-index: 10; 
             display: none;
             margin:50px;
             padding:10px;
             text-align:center;
        } 
        #modal-form{
            background:sandybrown;
  width: 100%;
  position: relative;
  top: 0;
  left: 0;
  padding: 15px;
  border-radius: 4px;
        }

        .btn{
            
 color:black;
  width: 50px;
  height: 30px;
  line-height: 30px;
  text-align: center;
  border-radius: 10%;
  position: absolute;
  top: -3px;
  right: -2px;
  font-size:20px;
        } 

        tbody{
            width: 100%;
            font-size:20px;
            text-align:center;
            
        }
        .edit-btn{
            padding:5px 10px;
            background: lightgreen;
            border:none;
            border-radius:5px;
        }
        .delete-btn{
            padding:5px 10px;
            background: red;
            border:none;
            border-radius:5px;
        }
    #success{
      background:lightgreen ;
  color: green;
  font-size: 30px;
  padding: 10px;
  margin: 10px;
  display: none;
  position: fixed;
  right: 10%;
  top: 15px;
  z-index: 20;
    }
    #error{
      background:red ;
  color: white;
  font-size: 30px;
  padding: 10px;
  margin: 10px;
  display: none;
  position: fixed;
  right: 15px;
  top: 15px;
  z-index: 20;
    }
    </style>
</head>
<body>
    <div class="main">
<div class="text">
    <h1>API CRUD</h1>
</div>
<div class="frm">
    <form action="" id="addForm">
        <label for="">Name:</label>
        <input type="text" name="sname" id="sname">
        <label for="">Age:</label>
        <input type="text" name="sage" id="sage">
        <label for="">city:</label>
        <input type="text" name="scity" id="scity">
        <button type="submit" id="save-button">Submit</button>
    </form>

   
</div>
    </div>
  <div class="box">
  <tr>
      <td id="table-data" width="100%" >
        <table width="100%" cellpadding="10px" >
          <tr style="background:orange;" >
            <th width="10%" >Id</th>
            <th width="25%">Name</th>
            <th width="10%">Age</th>
            <th width="25%">City</th>
            <th width="15%">Edit</th>
            <th width="15%">Delete</th>
          </tr>
          <tbody id="load-table"></tbody>
        </table>

        
  </div>
  <div id="success" class="messages"></div>
        <div id="error" class="messages"></div>

 <div id="modal" >
    <div id="modal-form">
        <h2>Edit Form</h2>
        <form action="" id="edit-form">
        <table cellpadding="20px" width="100%">
        <tr>
          <td width="90px">Name</td>
          <td><input type="text" name="sname" id="edit-name">
              <input type="text" name="sid" id="edit-id" hidden="">
          </td>
        </tr>
        <tr>
          <td>Age</td>
          <td><input type="text" name="sage" id="edit-age"></td>
        </tr>
        <tr>
          <td>City</td>
          <td><input type="text" name="scity" id="edit-city"></td>
        </tr>
        <tr>
          <td></td>
          <td><button id="edit-submit">Update</button></td>
        </tr>
      </table>
        </form>
        <div class="btn"><i class="fa-solid fa-x"></i></div>
    </div>
 </div>
 <script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript">
   $(document).ready(function(){
 function message(message, status){
    if(status == true){
      $("#success").html(message).slideDown();
      $("#error").slideUp();
      setTimeout(function(){
        $("#success").slideUp();
      },4000);

    }else if(status == false){
      $("#success").html(message).slideDown();
      $("#error").slideUp();
      setTimeout(function(){
        $("#success").slideUp();
      },4000);
    }
  }

  function jsonData(targetForm){
  
      var arr = $(targetForm).serializeArray();
    
      var obj = {};
      for(var a= 0; a < arr.length; a++){
        if(arr[a].value == ""){
          return false;
        }
        obj[arr[a].name] = arr[a].value;
      }
      
      var json_string = JSON.stringify(obj);

      return json_string;
      
  }

  // insert new data
  $("#save-button").on("click",function(e){
    e.preventDefault();

    var jsonObj = jsonData("#addForm");

    if( jsonObj == false){
      message("All Fields are required.",false);
    }else{
      $.ajax({ 
      url : 'http://localhost/php-rest-api/insert.php',
      type : "POST",
      data : jsonObj,
      success : function(data){
        message(data.message, data.status);

        if(data.status == true){
          loadTable();
          $("#addForm").trigger("reset");
          window.location.reload(true);
          
        }
      }
    });
  }
  });

  // fetch all the data
  function loadTable(){ 
    $("#load-table").html("");
    $.ajax({ 
      url : 'http://localhost/php-rest-api/fetch.php',
      type : "GET",
      success : function(data){
        if(data.status == false){
          $("#load-table").append("<tr><td colspan='6'><h2>"+ data.message +"</h2></td></tr>");
        }else{
          $.each(data, function(key, value){ 
            $("#load-table").append(`<tr>
            <td>${value.id}</td>
            <td>${value.student_name}</td>
            <td>${value.age}</td>
            <td>${value.city}</td>
            <td><button class='edit-btn' data-eid='${value.id}'>Edit</button></td>
            <td><button  class='delete-btn' data-id='${value.id}'>Delete</button></td>
            </tr>`);
          });
        }
      }
    });
  }

  loadTable();

  $(document).on("click",".edit-btn",function(){
    $("#modal").show();
    var studentId = $(this).data("eid");
    var obj = {sid : studentId};
    var myJSON = JSON.stringify(obj);

    $.ajax({
      url : 'http://localhost/php-rest-api/single-fetch.php',
      type : "POST",
      data : myJSON,
      success : function(data){
        $("#edit-id").val(data[0].id);
        $("#edit-name").val(data[0].student_name);
        $("#edit-age").val(data[0].age);
        $("#edit-city").val(data[0].city);
      }
    });
  });
  

  // delete data record
  $(document).on("click",".delete-btn",function(){
    if(confirm("Do you really want to delete this record ? ")){
      var studentId = $(this).data("id");
      var obj = {sid : studentId};
      var myJSON = JSON.stringify(obj);

      var row = this;

      $.ajax({
      url : 'http://localhost/php-rest-api/delete.php',
      type : "POST",
      data : myJSON,
      success : function(data){
        message(data.message, data.status);

        if(data.status == true){
          $(row).closest("tr").fadeOut();
        }
      }
    });
    }
  });

 

  //Hide button 
  $(".btn").on("click",function(){
    $("#modal").hide();
  });

  // update record data
  $("#edit-submit").on("click",function(e){
    e.preventDefault();

    var jsonObj = jsonData("#edit-form");

    if( jsonObj == false){
      message("All Fields are required.",false);
    }else{
      $.ajax({ 
      url : 'http://localhost/php-rest-api/update.php',
      type : "POST",
      data : jsonObj,
      success : function(data){
        message(data.message, data.status);

        if(data.status == true){
          $("#modal").hide();
          loadTable();
        }
      }
    });
  }
  });

 
 });
  
 </script>
</body>
</html>