<?php
session_start();
include_once("header.php");
if(isset($_POST["operatordata"]))
{
    if($_POST["operatordata"]=="operator_read_tweets")
    {
    echo "read tweets
    Twitter (/ˈtwɪtər/) is an online news and social networking service where users post and interact with messages, restricted to 140 characters. Registered users can post tweets, but those who are unregistered can only read them.";
    }
    
    if($_POST["operatordata"]=="by_name")
    {
        echo "by name";
    }
    if($_POST["operatordata"]=="operator_history")
    {
        $name=$_SESSION['name'];
        include_once("connect.php");
        mysqli_select_db($connection,"twitter");
        $sql="select * from log_history where user_name='$name'";
        $res=mysqli_query($connection,$sql);
        $count=mysqli_num_rows($res);
        if($count>0)
        {
        echo "<div class='table-responsive'>";    
            echo "<table class='table table-bordered table-striped'>";
             echo "<thead>" ;       
                    echo "<tr>";
                         echo "<th>Login Date</th>";
                         echo "<th>Logout Date</th>";
                         echo "<th>Login Time</th>";
                         echo "<th>Logout Time</th>";
                    echo "</tr>";
                echo "</thead>";   
            while($row=mysqli_fetch_assoc($res))
            {
                         $name=$row["user_name"];
                         $login_time=$row["login_time"];
                         $login_date=$row["login_date"];
                         $logout_time=$row["logout_time"];
                         $logout_date=$row["logout_date"];
                         echo "<tr>";
                         echo "<td>$login_date</td>";
                         echo "<td>$logout_date</td>";
                         echo "<td>$login_time</td>";
                         echo "<td>$logout_time</td>";
                         echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
         }
        else
        { 
            echo '<div class="alert alert-info"><i></i>Sorry, No Log History</div>';
        }
    }
}