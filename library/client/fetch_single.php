<?php
include('db.php');
include('function.php');
if(isset($_POST["user_id"]))
{
 $output = array();
 $statement = $connection->prepare(
  "SELECT * FROM jocuri 
  WHERE id = '".$_POST["user_id"]."' 
  LIMIT 1"
 );
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output["nume"] = $row["nume"];
  $output["pret"] = $row["pret"];
  $output["producator"] = $row["producator"];
  $output["varsta"] = $row["varsta"];
  $output["platforma"] = $row["platforma"];
 }
 echo json_encode($output);
}
?>