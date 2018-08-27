<?php


session_start();
include_once("header.php");
include_once("connect.php");
$res=mysqli_select_db($connection,"twitter");
if(isset($_POST["admindata"]))
{
    if($_POST["admindata"]=="todays_tweets")
    {
    $d=date("d-m-Y");
    $cmd="select * from twitter_twit where date='$d' order by time Desc ";
    $query_res=mysqli_query($connection,$cmd);
    $count=mysqli_num_rows($query_res);
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th class="col-md-1">DATE</th>
            <th>TIME</th>
            <th>NAME</th>
            <th>SCREEN NAME</th>
            <th>TWEET MESSAGE</th>
            <th>FRIENDS</th>
            <th>FOLLOWERS</th>
        </tr>
    </thead>
<?php    
    while($row=mysqli_fetch_row($query_res))
    {
                         $date=$row[0];
                         $time=$row[1];
                         $follower=$row[3];
                         $friends=$row[4];
                         $name=$row[2];
                         $screen=$row[6];
                         $msg=$row[5];
                        
                         echo "<tr>";
                         echo "<td class='col-md-1'>$date</td>";
                         echo "<td>$time</td>";
                         echo "<td>$name</td>";
                         echo "<td>$screen</td>";
                         echo "<td>$msg</td>";
                         echo "<td>$friends</td>";
                         echo "<td>$follower</td>";
                         echo "</tr>";
    }
echo "</table>";        
    }
    
    if($_POST["admindata"]=="last_one_week_tweets")
    {
       $d1=date("d-m-Y");
        
    $query="";
    $query_res=mysqli_query($connection,$query);
    $error=mysqli_error($connection);
        var_dump($error);
    $count=mysqli_num_rows($query_res);
        var_dump($count);
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>DATE</th>
            <th>TIME</th>
            <th>NAME</th>
            <th>SCREEN NAME</th>
            <th>TWEET MESSAGE</th>
            <th>FRIENDS</th>
            <th>FOLLOWERS</th>
        </tr>
    </thead>
<?php    
    while($row=mysqli_fetch_row($query_res))
    {
                         $date=$row[0];
                         $time=$row[1];
                         $follower=$row[3];
                         $friends=$row[4];
                         $name=$row[2];
                         $screen=$row[6];
                         $msg=$row[5];
                         echo "<tr>";
                         echo "<td style='width:100px'>$date</td>";
                         echo "<td>$time</td>";
                         echo "<td>$name</td>";
                         echo "<td>$screen</td>";
                         echo "<td>$msg</td>";
                         echo "<td>$friends</td>";
                         echo "<td>$follower</td>";
                         echo "</tr>";
    }
echo "</table>";        
        
}
    if($_POST["admindata"]=="seen_tweets")
    {
        
        include_once("connect.php");
        mysqli_select_db($connection,"twitter");
        $sql="select * from twitter_twit where screen='MangeshMujumda1'";
        $res=mysqli_query($connection,$sql);
        $count=mysqli_num_rows($res);
        var_dump($count);
        while($row=mysqli_fetch_assoc($res))
        {
            $msg=$row['message'];
           
        }
        
    }
    
    
    if($_POST["admindata"]=="my_history")
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
    
    if($_POST["admindata"]=="all_tweets")
    {
    $query="select * from twitter_twit order by date desc";
    $query_res=mysqli_query($connection,$query);
    $error=mysqli_error($connection);
    $count=mysqli_num_rows($query_res);
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>DATE</th>
            <th>TIME</th>
            <th>NAME</th>
            <th>SCREEN NAME</th>
            <th>TWEET MESSAGE</th>
            <th>FRIENDS</th>
            <th>FOLLOWERS</th>
        </tr>
    </thead>
<?php    
    while($row=mysqli_fetch_row($query_res))
    {
                         $date=$row[0];
                         $time=$row[1];
                         $follower=$row[3];
                         $friends=$row[4];
                         $name=$row[2];
                         $screen=$row[6];
                         $msg=$row[5];
                         echo "<tr>";
                         echo "<td style='width:100px'>$date</td>";
                         echo "<td>$time</td>";
                         echo "<td>$name</td>";
                         echo "<td>$screen</td>";
                         echo "<td>$msg</td>";
                         echo "<td>$friends</td>";
                         echo "<td>$follower</td>";
                         echo "</tr>";
    }
echo "</table>";        
    }
}


?>