<?php
    session_start();
    if(isset($_SESSION["loged_in"]) && $_SESSION["loged_in"]=="erreur"){
        echo '<div class="message_error">The info u entred are not correct.</div>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="box">
            <div class="login_pic">
                <img class="login_img" src="../../images/1000_F_658577569_kt79nB2SJ3Y4kqF410LD3sv3PQ5z8QXk.jpg" alt="">
            </div>
            <div class="login_container">
                <h1 class="titre">Login</h1>
                <form action="../../index.php?action=login" method="post">

                    <div class="text"><label for="">Email</label></div>
                    <input type="email" name="email" required><br>

                    <div class="text"><label for="">Password</label></div>
                    <input type="password" name="password" required><br>

                    <button type="submit" name="submit">
                        login
                    </button>
                    <a href="../../../index.php" class="menu-link">menu</a>
                </form> 
            </div>
        </div>
        
    </div>
</body>
<?php session_unset("loged_in"); ?>
</html>