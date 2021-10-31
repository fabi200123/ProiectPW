<?php
include('db1.php');
include('function.php');
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Add")
 {
  $statement = $connection->prepare(
   "INSERT INTO jocuri (nume, pret, producator, varsta, platforma) 
   VALUES (:nume, :pret, :producator, :varsta, :platforma)
  ");
  $result = $statement->execute(
   array(
    ':nume' => $_POST["nume"],
    ':pret' => $_POST["pret"],
    ':producator' => $_POST["producator"],
    ':varsta' => $_POST["varsta"],
    ':platforma' => $_POST["platforma"]
   )
  );
  if(!empty($result))
  {
   echo 'Data Inserted';
  }
 }
 if($_POST["operation"] == "Edit")
 {
  $statement = $connection->prepare(
   "UPDATE jocuri 
   SET nume = :nume, pret = :pret, producator = :producator, varsta = :varsta, platforma = :platforma  
   WHERE id = :id
   "
  );
  $result = $statement->execute(
   array(
    ':nume' => $_POST["nume"],
    ':pret' => $_POST["pret"],
    ':producator' => $_POST["producator"],
    ':varsta' => $_POST["varsta"],
    ':platforma' => $_POST["platforma"],
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