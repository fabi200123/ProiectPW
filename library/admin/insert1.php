<?php
include('db1.php');
include('function1.php');
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Edit")
 {
  $statement = $connection->prepare(
   "UPDATE issue_game 
   SET username = :username, nume = :nume, approve = :approve, issue = :issue, returnal = :returnal 
   WHERE id = :id
   "
  );
  $result = $statement->execute(
   array(
    ':username' => $_POST["username"],
    ':nume' => $_POST["nume"],
    ':approve' => $_POST["approve"],
    ':issue' => $_POST["issue"],
    ':returnal' => $_POST["returnal"],
    ':id'   => $_POST["user_id"]
   )
  );
  if(!empty($result))
  {
   echo 'Data Updated';
  }
 }
}

?>