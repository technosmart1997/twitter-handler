<?php
if(isset($_REQUEST["register_submit_btn"]))
{
    $username=$_POST["register_username"];
    $password=$_POST["register_password"];
    $user_type=$_POST["user_type"];
    
if(isset($_POST["register_username"]) and isset($_POST["register_password"]) and isset($_POST["user_type"]))
    {
    if(!preg_match("/^[a-zA-Z]*$/",$username))
    {
      echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i>&nbsp;&nbsp;Invalid Username</div>'; 
    }
    else
    {
        include_once("connect.php");
        mysqli_select_db($connection,"twitter");
        $cmd="select * from registered_user where username='$username'";
        $res=mysqli_query($connection,$cmd);
        $count=mysqli_num_rows($res);
        if($count==1)
        {
        echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i>&nbsp;&nbsp;Username Already Exist</div>'; 
        }
        else
        {
        $hashed_password=password_hash($password,PASSWORD_DEFAULT);    
        $cmd="insert into registered_user (username,password,usertype) values('$username','$hashed_password','$user_type')";
        $res=mysqli_query($connection,$cmd);
        echo '<div class="alert alert-success">&nbsp;&nbsp;You Are Registered</div>'; 
        }
    }
    }
        else
        {
         echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i>&nbsp;&nbsp;You Are Registered</div>';    
        }
}
else
{
     
}
    


?>