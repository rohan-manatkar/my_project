<?php 
require('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="logoweb.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Typing Speed Tester</title>
   <link rel="stylesheet" href="stylelog.css">
</head>
<body>
 <header>
    <h2>typing speed test<h2>
    <?php
  if(isset($_SESSION['logged_in'])&&$_SESSION['logged_in']==true)
  {
    echo"
    <div class='user'>
    $_SESSION[username] - <a href='logout.php'>logout</a>
    </div>
    ";
  }
  else{
    echo"
    <div class='sign-in-up'>
    <button type='button' onClick = \"popup('login-popup')\">LOGIN</button>
    <button type='button'  onClick = \"popup('register-popup')\">REGISTER</button>
</div>
    ";
  }

 ?>

       <!-- <div class="sign-in-up">
            <button type="button" onClick = "popup('login-popup')">LOGIN</button>
            <button type="button"  onClick = "popup('register-popup')">REGISTER</button>

        </div>--->
 </header>   
 <div class = "popup-container" id = "login-popup">
    <div class="popup">
        <form method="POST" action= "login_register.php">
            <h2>
                <span>user login</span>
                <button type="reset" onClick="popup('login-popup')">x</button>
            </h2>
            <input type="text" placeholder ="E-mail or username" name="email_username">
            <input type="password" placeholder ="password" name="password"> 
            <button type ="submit" class="login-btn" name="login">login</button>   
        </form>

    </div>

 </div>
 <div class = "popup-container" id = "register-popup">
    <div class="popup">
        <form method="POST" action= "login_register.php">
            <h2>
                <span>user register</span>
                <button type="reset" onClick="popup('register-popup')">x</button>
            </h2>
            <input type="text" placeholder ="full name" name="fullname">
            <input type="text" placeholder ="user name" name="username">
            <input type="email" placeholder ="E-mail" name="email">
            <input type="password" placeholder ="password" name="password"> 
            <button type ="submit" class="register-btn" name="register">login</button>   
        </form>

    </div>

 </div>

 <?php
  if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
  {
    echo"<h1 style='text-align:center; margine-top:200px; padding-top:200px; font-size:50px;'> welcome - $_SESSION[username]<h1>
<br>
  <a  href='home.html' style=' background: #30475e; margin-left:750px;margin-top:500px;
  color: white; padding:10px; border: 2px solid black; border-radius:12px; 
'>start</a>
    ";
  }

 ?>
 <script>
    function popup(popup_name)
    {
      get_popup=document.getElementById(popup_name);
      if(get_popup.style.display=="flex")
      {
        get_popup.style.display="none";
      }
      else{
        get_popup.style.display="flex";

      }

    }
 </script>
</body>
</html>