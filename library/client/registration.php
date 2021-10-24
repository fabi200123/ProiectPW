<?php
    include "navbar.php";
    include "connect.php";
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

    <title>Client registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <section>
        <div class="reg_img">
            <br><br><br>
            <div class="box2">
                <h1 style="text-align: center; color: #FEF4F2; font-size: 35px; font-family: Lucida Console;">
                JOCURI MOCA ROMANIA</h1><br>
                <h1 style="text-align: center; color: #FEF4F2; font-size: 25px;">User Registration Form</h1>
                <form name="login" action="" method="post">
                    <div class="login">
                    <input class=" form-control" type="text" name="first" placeholder="Prenume" required=""> <br>
                    <input class=" form-control" type="text" name="last" placeholder="Nume de familie" required=""> <br>
                    <input class=" form-control" type="text" name="username" placeholder="Username" required=""> <br>
                    <input class=" form-control" type="password" name="password" placeholder="Password" required=""> <br>
                    <input class=" form-control" type="text" name="email" placeholder="Email" required=""> <br>
                    <input class=" form-control" type="text" name="contact" placeholder="Telefon" required=""> <br>
                    <input class="btn btn-default" type="submit" name="submit" value="REGISTER" style="color: black; width: 100px; height: 30px"> 
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php

      if(isset($_POST['submit']))
      {
        $count=0;
        $sql="SELECT username from `client`";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['username']==$_POST['username'])
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
          mysqli_query($db,"INSERT INTO `client` VALUES('$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[password]', '$_POST[email]', '$_POST[contact]', 'pic.jpg');");
        ?>
          <script type="text/javascript">
           alert("Registration successful");
          </script>
        <?php
        }
        else
        {

          ?>
            <script type="text/javascript">
              alert("The username already exist.");
            </script>
          <?php

        }

      }

    ?>

</body>
</html>