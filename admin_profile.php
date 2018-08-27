<?php
session_start();
include_once("header.php");
include_once("connect.php");


mysqli_select_db($connection,'twitter');
if(isset($_SESSION['isloggedin']))
{ 
if(isset($_REQUEST['admin']))
{
    include_once("apitest.php");
    include_once("navbar.php");
?>

<br>
<body>
<main>
<div class="Container-fluid">
    <div class="row">
<nav class="navmenu navmenu-default navmenu-fixed-left" role="navigation">
  <a class="navmenu-brand" href="#">Admin Profile</a>

                  <hr>
    <form method="post" action="option_filter.php">
    <div class="radio">
      <label><input id="rad_1" type="radio" name="data" value="todays_tweets" checked="checked">Todays Tweets</label>
    </div>
    <div class="radio">
      <label><input type="radio" name="data" value="last_one_week_tweets">Last One Week Tweets</label>
    </div>
    <div class="radio">
      <label><input type="radio" name="data" value="pending_tweets">All Pending Tweets</label>
    </div>
                        
    <div class="radio">
      <label><input type="radio" name="data" value="seen_tweets">All Seen Tweets</label>
    </div>  
                        <div class="radio">
      <label><input type="radio" name="data" value="all_tweets">All Tweets</label>
    </div>
                        <div class="radio">
      <label><input type="radio" name="data" value="my_history">Your History</label>
    </div>
  </form>
            </nav>
        </div>
        <div class="col-md-offset-2 col-md-10 col-xs-12 col-lg-10 col-sm-10" style="margin-top:10px">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <?= $_SESSION['name'] ?>
                </div>
                <div class="panel-body" id="panel_body">
    <?php
    $d=date("d-m-Y");
    $cmd="select * from tests  where tdate='$d' and tstatus='unseen'";
    $query_res=mysqli_query($connection,$cmd);

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
            <th>STATUS</th>
            
            
         </tr>
    </thead>
<?php    
    while($row=mysqli_fetch_row($query_res))
    {
        $tid=$row[0];
                         $tdate=$row[2];
                         $ttime=$row[3];
                         $name=$row[1];
                         $sc_name=$row[4];
                         $t_follower=$row[6];
                         $t_friends=$row[7];
                         $msg=$row[8];
                         $status=$row[9];
        
                         echo "<tr>";
                         echo "<td style='width:100px'>$tdate</td>";
                         echo "<td>$ttime</td>";
                         echo "<td>$name</td>";
                         echo "<td>$sc_name</td>";
                         echo "<td style='width:350px'>$msg</td>";
                         echo "<td>$t_follower</td>";
                         echo "<td>$t_friends</td>";
                         echo "<td><button  id='$tid' class='btn btn-success edit'>$status</button></td>";
                         echo "</tr>";
    }
    ?>
</table>    
            </div>
            </div>
        </div>
    </div>
</main>
<?php include_once("scripts.php"); ?>    
</body>
<?php
}
else
{
    header("location:home.php");
}
}
else
{
    header("location:home.php");
}

?>