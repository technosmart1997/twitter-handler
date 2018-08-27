<?php
if(isset($_POST["check_data"]))
{
    $entered_username=$_POST["check_data"];
   include_once("connect.php");
    mysqli_select_db($connection,"twitter");
    $log_username= mysqli_real_escape_string($connection,$entered_username);
    $cmd="select * from registered_user where username='$entered_username'";
    $res=mysqli_query($connection,$cmd);
    $count=mysqli_num_rows($res);
if($count)
{
    echo "user name already exist";
}
else
    {
        
    }
}
?>
