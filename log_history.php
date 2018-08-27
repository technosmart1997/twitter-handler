<?php
include_once("header.php");
?>


<div class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
    <ul class="nav navbar-nav navbar-left ">
        <li class="navbar-brand"><i class="fa fa-twitter"></i>&nbsp;twitter</li>
        <li>
          <form class="navbar-form ">
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" name="search_data" class="form-control"/>
              </div>
                <input type="submit" name="search_submit" class="btn btn-info"/>
            </form>
        </li>
    </ul>
           
    <ul class="nav navbar-nav navbar-right">
        <li><a href="home.php" ><i class="fa fa-home"></i>&nbsp;Home</a></li>
    </ul>
    </div>
    </div>

<p><br></p>
<p><br></p>


<div class="container-fluid">
    
    <div class="row">
        <div class="col-md-offset-3 col-md-8">
            <div class="well">
                <div class="row">
        <h2 align="center">LOG HISTORY</h2>
    </div>
                <table class="table">
                    <?php
                    include_once("connect.php");
                    mysqli_select_db($connection,"twitter");
                    $cmd="select * from log_history";
                    $res=mysqli_query($connection,$cmd);
                    if($res)
                    {   
                   echo "<th>" ;       
                       echo "<tr>";
                         echo "<td>Username</td>";
                         echo "<td>Login Date</td>";
                         echo "<td>Logout Date</td>";
                         echo "<td>Login Time</td>";
                         echo "<td>Logout Time</td>";
                      echo "</tr>";
                    echo "</th>";       
                     while($row=mysqli_fetch_assoc($res))
                     {
                         $name=$row["user_name"];
                         $login_time=$row["login_time"];
                         $login_date=$row["login_date"];
                         $logout_time=$row["logout_time"];
                         $logout_date=$row["logout_date"];
                         echo "<tr>";
                         echo "<td>$name</td>";
                         echo "<td>$login_date</td>";
                         echo "<td>$logout_date</td>";
                         echo "<td>$login_time</td>";
                         echo "<td>$logout_time</td>";
                         echo "</tr>";
                     }
                    }
                    else
                    {
                        echo "No History";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
