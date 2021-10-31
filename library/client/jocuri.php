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
   <h1 align="center">Lista de Jocuri</h1>
   <br />
   <div class="table-responsive">
    <br />
    <div align="right">
     <button type="button" id="add_button" data-toggle="modal" data-target="#gameModal" class="btn btn-info btn-lg">Add</button>
    </div>
    <br /><br />
    <table id="game_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th width="35%">Nume</th>
       <th width="35%">Pret</th>
       <th width="35%">Producator</th>
       <th width="35%">Varsta</th>
       <th width="35%">Platforma</th>
       <th width="20%">Request</th>
      </tr>
     </thead>
    </table>
    
   </div>
  </div>
 </body>
</html>

<div id="gameModal" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="game_form" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Add Game</h4>
    </div>
    <div class="modal-body">
     <label>Enter Nume</label>
     <input type="text" name="nume" id="nume" class="form-control" />
     <br />
     <label>Enter Pret</label>
     <input type="text" name="pret" id="pret" class="form-control" />
     <br />
     <label>Enter Producator</label>
     <input type="text" name="producator" id="producator" class="form-control" />
     <br />
     <label>Enter Varsta</label>
     <input type="text" name="varsta" id="varsta" class="form-control" />
     <br />
     <label>Enter Platforma</label>
     <input type="text" name="platforma" id="platforma" class="form-control" />
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
  $('#game_form')[0].reset();
  $('.modal-title').text("Add Game");
  $('#action').val("Add");
  $('#operation').val("Add");
 });
 
 var dataTable = $('#game_data').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"fetch.php",
   type:"POST"
  },
  "columnDefs":[
   {
    "targets":[0, 3, 4],
    "orderable":false,
   },
  ],

 });

 $(document).on('submit', '#game_form', function(event){
  event.preventDefault();
  var nume = $('#nume').val();
  var pret = $('#pret').val();
  var producator = $('#producator').val();
  var varsta = $('#varsta').val();
  var platforma = $('#platforma').val();
  if(nume != '' && pret != '' && producator != '' && varsta != '' && platforma != '')
  {
   $.ajax({
    url:"insert.php",
    method:'POST',
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
     alert(data);
     $('#game_form')[0].reset();
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
   url:"fetch_single.php",
   method:"POST",
   data:{user_id:user_id},
   dataType:"json",
   success:function(data)
   {
    $('#gameModal').modal('show');
    $('#nume').val(data.nume);
    $('#pret').val(data.pret);
    $('#producator').val(data.producator);
    $('#varsta').val(data.varsta);
    $('#platforma').val(data.platforma);
    $('.modal-title').text("Edit Game");
    $('#user_id').val(user_id);
    $('#action').val("Edit");
    $('#operation').val("Edit");
   }
  })
 });
 
 $(document).on('click', '.request', function(){
  var user_id = $(this).attr("id");
  if(confirm("Are you sure you want to request this?"))
  {
   $.ajax({
    url:"request1.php",
    method:"POST",
    data:{user_id:user_id},
    success:function(data)
    {
     alert("Request Succesful");
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