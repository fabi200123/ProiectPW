<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Jocuri MOCA Romania
    </title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <style type="text/css">
        nav {
            float: right;
            word-spacing: 30px;
            padding: 20px;
        }

        nav li {
            display: inline-block;
            line-height: 80px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
            
        <header>
            <div class="logo">
                <img src="images/1.png">
                <br><hl style="color: white;">Jocuri MOCA Romania</hl></br>
                
            </div>
            <?php
                if(isset($_SESSION['login_user'])){       //if someone has logged in
                ?>
                    <nav>
                        <ul>
                            <li><a href="index.php">HOME</a></li>
                            <li><a href="jocuri.php">JOCURI</a></li>
                            <li><a href="logout.php">LOGOUT</a></li>
                            <li><a href="feedback.php">FEEDBACK!</a></li>
                        </ul>
                    </nav>
                <?php
                }
                else{
                ?>
                    <nav>
                        <ul>
                            <li><a href="index.php">HOME</a></li>
                            <li><a href="jocuri.php">JOCURI</a></li>
                            <li><a href="admin_login.php">LOGIN</a></li>
                            <li><a href="feedback.php">FEEDBACK!</a></li>
                        </ul>
                    </nav>
                <?php
                }
                ?>
        </header>

        <section>
        <div class="sec_img">
            <br><br><br>
            <div class="box">
                <br><br><br><br>
                <p style="text-align: center; font-size: 35px; color: whitesmoke;">Bine ati venit!</p><br>
                <p style="text-align: center; font-size: 20px; color: whitesmoke;">Deschidem la: 09:00</p><br>
                <p style="text-align: center; font-size: 20px; color: whitesmoke;">Inchidem la: 22:00</p><br>
            </div>
        </div>
        </section>
        <?php
        include "footer.php"
        ?>
    </div>
</body>
</html>