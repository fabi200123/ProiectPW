<?php
    session_start();
    if(isset($_SESSION['login_user'])){
        unset($_SESSION['login_user']);
    }
    header("location:http://localhost/library/index.php");
?>