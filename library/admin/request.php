<?php
    include "navbar.php";
    ?>

<html>
 <head>
  <title>JOCURI</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
   body
   {
    margin:0;
    padding:0;
    background-color:#f1f1f1;
   }
   .box
   {
    width:1270px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:25px;
   }
   .sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
	margin-left: 20px;
}
  </style>
 </head>
 <body>
     <!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">

                <?php
                    if(isset($_SESSION['login_user']))
					{
						echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
						echo "</br></br>";
	
						echo "Welcome ".$_SESSION['login_user']; 
					} 
                ?>
            </div>

	<div class="h"> <a href="profile.php">Profil</a></div>
  	<div class="h"> <a href="request.php">Vanzare de Jocuri</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
  <div class="container box">
   <h1 align="center">Lista de Vanzari</h1>
   <br />
   <div class="table-responsive">
    <br />
    <br /><br />
    <table id="req_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th width="35%">Username</th>
       <th width="35%">Nume</th>
       <th width="35%">Approval</th>
       <th width="35%">Data Acceptare</th>
       <th width="35%">Data Expediere</th>
       <th width="20%">Edit</th>
       <th width="20%">Delete</th>
      </tr>
     </thead>
    </table>
    
   </div>
  </div>
 </body>
</html>

<div id="gameModal" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="req_form" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Add Game</h4>
    </div>
    <div class="modal-body">
	<label>Enter username</label>
	<input type="text" name="username" id="username" class="form-control" />
	<br />
     <label>Enter Nume</label>
     <input type="text" name="nume" id="nume" class="form-control" />
     <br />
     <label>Enter approve</label>
     <input type="text" name="approve" id="approve" class="form-control" />
     <br />
     <label>Enter issue</label>
     <input type="text" name="issue" id="issue" class="form-control" />
     <br />
     <label>Enter returnal</label>
     <input type="text" name="returnal" id="returnal" class="form-control" />
     <br />
    </div>
    <div class="modal-footer">
     <input type="" name="user_id" id="user_id" />
     <input type="hidden" name="operation" id="operation" />
     <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </div>
  </form>
 </div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 $('#add_button').click(function(){
  $('#req_form')[0].reset();
  $('.modal-title').text("Add Game");
  $('#action').val("Add");
  $('#operation').val("Add");
 });
 
 var dataTable = $('#req_data').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"fetch1.php",
   type:"POST"
  },
  "columnDefs":[
   {
    "targets":[0, 3, 4],
    "orderable":false,
   },
  ],

 });

 $(document).on('submit', '#req_form', function(event){
  event.preventDefault();
  var username = $('#username').val();
  var nume = $('#nume').val();
  var approve = $('#approve').val();
  var issue = $('#issue').val();
  var returnal = $('#returnal').val();
  if(nume != '')
  {
   $.ajax({
    url:"insert1.php",
    method:'POST',
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
     alert(data);
     $('#req_form')[0].reset();
     $('#gameModal').modal('hide');
     dataTable.ajax.reload();
    }
   });
  }
  else
  {
   alert("All Fields are Required");
  }
 });
 
 $(document).on('click', '.update', function(){
  var user_id = $(this).attr("id");
  $.ajax({
   url:"fetch_single1.php",
   method:"POST",
   data:{user_id:user_id},
   dataType:"json",
   success:function(data)
   {
    $('#gameModal').modal('show');
    $('#username').val(data.username);
    $('#nume').val(data.nume);
    $('#approve').val(data.approve);
    $('#issue').val(data.issue);
    $('#returnal').val(data.returnal);
    $('.modal-title').text("Edit Request");
    $('#user_id').val(user_id);
    $('#action').val("Edit");
    $('#operation').val("Edit");
   }
  })
 });
 
 $(document).on('click', '.delete', function(){
  var user_id = $(this).attr("id");
  if(confirm("Are you sure you want to delete this?"))
  {
   $.ajax({
    url:"delete1.php",
    method:"POST",
    data:{user_id:user_id},
    success:function(data)
    {
     alert(data);
     dataTable.ajax.reload();
    }
   });
  }
  else
  {
   return false; 
  }
 });
 
 
});
</script>