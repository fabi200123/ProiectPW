<?php
  include "connect.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Jocuri</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}
		
		body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
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
	
	<!--___________________search bar________________________-->

	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="Cauta Jocuri" required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
	</div>

	<h2>Lista de Jocuri</h2>
	<?php

		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT * from jocuri where nume like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "Niciun joc gasit. Cauta din nou!";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
			    echo "<th>"; echo "Nume";  echo "</th>";
				echo "<th>"; echo "Pret";	echo "</th>";
			    echo "<th>"; echo "Producator";  echo "</th>";
			    echo "<th>"; echo "Varsta";  echo "</th>";
			    echo "<th>"; echo "Platforma";  echo "</th>";
						
			    echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
                echo "<td>"; echo $row['nume']; echo "</td>";
                echo "<td>"; echo $row['pret']; echo "</td>";
                echo "<td>"; echo $row['producator']; echo "</td>";
                echo "<td>"; echo $row['varsta']; echo "</td>";
                echo "<td>"; echo $row['platforma']; echo "</td>";
                
				echo "</tr>";
			}
		echo "</table>";
			}
		}
			/*if button is not pressed.*/
		else
		{
			$res=mysqli_query($db,"SELECT * FROM `jocuri` ORDER BY `jocuri`.`nume` ASC;");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
			    echo "<th>"; echo "Nume";  echo "</th>";
				echo "<th>"; echo "Pret";	echo "</th>";
			    echo "<th>"; echo "Producator";  echo "</th>";
			    echo "<th>"; echo "Varsta";  echo "</th>";
			    echo "<th>"; echo "Platforma";  echo "</th>";
						
			    echo "</tr>";

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
                echo "<td>"; echo $row['nume']; echo "</td>";
                echo "<td>"; echo $row['pret']; echo "</td>";
                echo "<td>"; echo $row['producator']; echo "</td>";
                echo "<td>"; echo $row['varsta']; echo "</td>";
                echo "<td>"; echo $row['platforma']; echo "</td>";
                
				echo "</tr>";
			}
		echo "</table>";
		}

	?>
</div>
</body>
</html>