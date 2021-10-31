<?php
include('db1.php');
include('function1.php');
if(isset($_POST["user_id"]))
{
 $output = array();
 $statement = $connection->prepare(
  "SELECT * FROM issue_game 
  WHERE id = '".$_POST["user_id"]."' 
  LIMIT 1"
 );
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output["username"] = $row["username"];
  $output["nume"] = $row["nume"];
  $output["approve"] = $row["approve"];
  $output["issue"] = $row["issue"];
  $output["returnal"] = $row["returnal"];
 }
 echo json_encode($output);
}
?>