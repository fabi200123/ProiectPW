<?php
include('db.php');
include('function.php');
if(isset($_POST["action"]))
{
    if($_POST["action"] == 'request'){
        $data = array(
            ':username' => $_POST['username'],
            ':nume' => $_POST['user_id'],
        );
    $query = 
    "INSERT INTO issue_game (username, nume)
        VALUES (:username, :nume)";
    $statement = $connect->prepare($query);
    $statement->execute($data);
    }
}
?>