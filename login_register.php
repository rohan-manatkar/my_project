<?php

require('connection.php');
session_start();

 #for login
if(isset($_POST['login']))
{
$query = "SELECT * FROM `register_user` WHERE `email`='$_POST[email_username]' or`username`='$_POST[email_username]'";
$result=mysqli_query($con,$query);
if($result)
{
if(mysqli_num_rows($result)==1)
{
 $result_fetch=mysqli_fetch_assoc($result);
  if(password_verify($_POST['password'],$result_fetch['password']))
  {
$_SESSION['logged_in']=true;
$_SESSION['username']=$result_fetch['username'];
header("location: index.php");
  }
  else
  {
    echo"
    <script>
    alert('incurrect password');
    window.location.href='index.php';
    </script>
    ";
  }
}
else
{
    echo"
    <script>
    alert('email or username not register');
    window.location.href='index.php';
    </script>
    ";
}
}
else
{ echo"
    <script>
    alert('Cannot Run Query');
    window.location.href='index.php';
    </script>
    ";
}

}









# for registration
if(isset($_POST['register']))
{
  $user_exist_query="SELECT * FROM `register_user` WHERE `username` = '$_POST[username]' or `email` = '$_POST[email]' ";
   $result=mysqli_query($con,$user_exist_query);
if($result)
{
 if(mysqli_num_rows($result)>0)
 {
   $result_fetch=mysqli_fetch_assoc($result);
   if($result_fetch['username']==$_POST['username'])
   {
    echo"
    <script>
    alert('$result_fetch[username]-User Name already taken');
    window.location.href='index.php';
    </script>
    ";
   }
   else
   {
    echo"
    <script>
    alert('$result_fetch[email]-email already taken');
    window.location.href='index.php';
    </script>
    ";
   }
 }
 else #it will be ececutedifn  no on has take user name or email
 {
    $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
    $query="INSERT INTO `register_user`(`full_name`, `username`, `email`, `password`) VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]','$password')";
    if(mysqli_query($con,$query))
    {
      #if data inserted succesfully
      echo"
        <script>
        alert('Registration succesfull');
        window.location.href='index.php';
        </script>
        "; 
    }
    else{
        #if data canot be inserted
        echo"
        <script>
        alert('Cannot Run Query');
        window.location.href='index.php';
        </script>
        "; 
    }
}
}
else
{
    echo"
    <script>
    alert('Cannot Run Query');
    window.location.href='index.php';
    </script>
    ";
}
   
}

?>