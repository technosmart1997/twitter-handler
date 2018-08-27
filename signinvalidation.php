<?php
if(isset($_REQUEST["login_go_btn"]))
{
    if(isset($_POST["login_username"]) and ($_POST["login_password"]))
    {
    $log_username=$_POST["login_username"];
    $log_password=$_POST["login_password"];
        
    include_once("connect.php");
    mysqli_select_db($connection,"twitter");
    $log_username= mysqli_real_escape_string($connection,$log_username);    
    $cmd="select * from registered_user where username='$log_username'";
    $res=mysqli_query($connection,$cmd);
    $count=mysqli_num_rows($res);
    $rows=mysqli_fetch_assoc($res); 
    if(!strcmp($log_username,$rows['username']))
    {  
    $user_type=$rows["usertype"];
    if($count==1)
    {
        $hashedpassword=password_verify($log_password,$rows["password"]);   
        if($hashedpassword)
        {  
            $_SESSION['name']=$log_username;
            $_SESSION['user_type']=$user_type;
            $_SESSION['isloggedin']=true;
            $date = date("j:n:Y");
            $timezone=date_default_timezone_get();
            $timezone=date_default_timezone_set("asia/Kolkata");
            $time= date("G:i:s");
            $_SESSION['logindate']=$date;
            $_SESSION['logintime']=$time;
            $cmd="insert into log_history (user_name,login_date,login_time,status) values('$log_username','$date','$time','Logged In')";
            $res=mysqli_query($connection,$cmd);
            
            if($user_type=="Admin")
            {
            header("location:admin_profile.php?admin=admin");
            }
            else if($user_type=="Operator")
            {
            header("location:operator_profile.php?operator=operate");
            }
            else
            {
            header("location:others_profile.php?others=oth");
            }
        }
        else
        {
            echo "<div class='alert alert-danger'><i class='fa fa-exclamation-triangle'></i>&nbsp; Wrong Password</div>";
        }
    }
    
    else
    {
        echo "<div class='alert alert-danger'><i class='fa fa-exclamation-triangle'></i>&nbsp; You are not Registered</div>";
    }
    }
        else
        {
         echo "<div class='alert alert-danger'><i class='fa fa-exclamation-triangle'></i>&nbsp;Invalid Username</div>";   
        }
}
    else
    {
       echo "values are not set"; 
    }
}
else
{
    
}
?>