<?php
    include "connect.php";
    include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

    <title>Client Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <section>
        <div class="login_img">
            <br><br><br>
            <div class="box1">
                <h1 style="text-align: center; color: #FEF4F2; font-size: 35px; font-family: Lucida Console;">
                JOCURI MOCA ROMANIA</h1><br>
                <h1 style="text-align: center; color: #FEF4F2; font-size: 25px;">Admin Login Form</h1><br>
                <form name="login" action="" method="post">
                    <div class="login">
                    <input class=" form-control" type="text" name="username" placeholder="Username" required=""> <br>
                    <input class=" form-control" type="password" name="password" placeholder="Password" required=""> <br>
                    <input class="btn btn-default" type="submit" name="submit" value="LOGIN" style="color: black; width: 70px; height: 30px"> 
                    </div>
                </form>
                <p style="color: #FEF4F2;">
                    <br><br>
                    <a style="color: #FEF4F2;" href="update_password.php">Forgot Password?</a> <br><br>
                    Esti nou? <a style="color: #FEF4F2;" href="registration.php">Apasa aici!</a>
                </p>
            </div>
        </div>
    </section>

    <?php

        if(isset($_POST['submit']))
        {
            $count=0;
            $res = mysqli_query($db, "SELECT * FROM `admin` WHERE username='$_POST[username]' AND password='$_POST[password]' ;");

            $row = mysqli_fetch_assoc($res);

            $count=mysqli_num_rows($res);

            if($count==0){
                ?>
                    <script type="text/javascript">
                    alert("Username and password don't match!");
                    </script> 
                
                   <!-- <div class="alrt alert-warning">
                        <strong>Username and password doesn't match!    </strong>
                    </div>-->
                
                <?php
            }
            else{
                /*------------------if username and pass matches-------------------*/
                $_SESSION['login_user'] = $_POST['username'];
                $_SESSION['pic'] = $row['pic'];
                ?>
                    <script type="text/javascript">
                    window.location="index.php";
                    </script>
                <?php
            }

        }

    ?>

</body>
</html>