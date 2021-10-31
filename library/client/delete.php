<?php
include('db.php');
include('function.php');
if(isset($_POST["action"]))
{
    $data = array(
        ':nume' => $_POST['user_id'],
    );
    $query = "INSERT INTO issue_game (username, nume) VALUES ('a', :nume)";
    $statement = $connection->prepare($query);
    $result = $statement->execute($data);
}
?>