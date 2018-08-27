<?php
session_start();
   
$name=$_SESSION['name'];
$logintime=$_SESSION['logintime'];
$logindate=$_SESSION['logindate'];
$date = date("j:n:Y");
$timezone=date_default_timezone_get();
$timezone=date_default_timezone_set("asia/Kolkata");
$time= date("G:i:s");
include_once("connect.php");
session_unset();
session_destroy();

mysqli_select_db($connection,"twitter");
$cmd="update log_history set status='Logged Out',logout_date='$date',logout_time='$time' where user_name='$name' and login_time='$logintime' and login_date='$logindate'";
$res=mysqli_query($connection,$cmd);
header("location:home.php?signout=true");
?>