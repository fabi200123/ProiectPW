<?php

include('db1.php');
include("function1.php");

if(isset($_POST["user_id"]))
{
 $statement = $connection->prepare(
  "DELETE FROM issue_game WHERE id = :id"
 );
 $result = $statement->execute(
  array(
   ':id' => $_POST["user_id"]
  )
 );
 
 if(!empty($result))
 {
  echo 'Data Deleted';
 }
}



?>