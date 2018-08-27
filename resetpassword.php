<?php
include_once("header.php");
include_once("connect.php");
?>
<body>

<div class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><i class="fa fa-twitter"></i>&nbsp;Twitter</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar"> 
    <ul class="nav navbar-nav navbar-left">
        <li>
          <form class="navbar-form">
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" name="search_data" class="form-control" placeholder="Search"/>
              </div>
                <input type="submit" name="search_submit" class="btn btn-info"/>
            </form>
        </li>
            </ul>
        <ul class="nav navbar-nav navbar-right">
               <li><a href="home.php" ><i class="fa fa-home"></i>&nbsp;Home</a></li>
        <li><a href="info.php" ><i class="fa fa-log-out"></i>&nbsp;Info</a></li>
        </ul>
            </div>
    </div>
</div>
<p><br></p>
<main>
    <div class="container">
        <div id="signinerror">
      <?php
               include_once("signinvalidation.php");     
      ?> 
        </div>
        <div class="row">
           <div class="col-md-offset-3 col-md-6">
               <div align="center" style="margin-top:30px;color:white;font-size:40px;font-family:font-family: 'Bree Serif', serif;">Create Your New Password</div>
            </div>
        </div>
        <div class="row" style="margin-top:40px">
            <div class="col-md-offset-4 col-md-4">
                    <form action="#" method="post">
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" id="change_username" name="register_username" class="form-control" placeholder="Enter Username" required/>
                </div>
             <div id="user_name_error"></div>
                                <br>
                <div class="form-group input-group">
                     <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="new_password" class="form-control"  placeholder="Enter New Password" required/>
                </div>
                                <br>
                        
              <div class="form-group input-group">
                     <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="renew_password" class="form-control"  placeholder="Re-Enter New Password" required/>
                </div>
                        <br>
                        
                <div class="form-group">
                    <input type="submit" value="Change Password" name="change_password" class="btn btn-primary btn-lg"/>
                     <input type="reset" value="Reset"  id="change_reset" class="pull-right btn btn-success btn-lg"/>
                </div>
                        <div class="form-group">
                 <button class="btn btn-danger btn-block btn-lg"  data-toggle="modal" data-target="#modal2">SIGN IN</button> 
             </div>
                        
                </form>
            </div>
        </div>
    </div>
    
    <?php
    if(isset($_POST["change_password"]))
    {
        $change_username= $_POST["register_username"];
        $change_password= $_POST["new_password"];
        $repassword=$_POST["renew_password"];
    
        if($change_password==$repassword)
        {
            mysqli_select_db($connection,"twitter");
            $cmd="select * from registered_user where username='$change_username'";
            $res=mysqli_query($connection,$cmd); 
            if($res)
            {
                $count=mysqli_num_rows($res);
                if($count==1)
                {
                    $rec=mysqli_fetch_assoc($res);
                    $previous_password=$rec["password"];
                    $previous_password=password_hash($change_password,PASSWORD_DEFAULT);
                    $cmd="update registered_user  set password='$previous_password' where username='$change_username'";
                    $res=mysqli_query($connection,$cmd);
                    echo '<div class="container">';
                    echo "<div class='alert alert-success'><i class='fa fa-exclamation-triangle'></i>&nbsp;Password Changed Successfully!!</div>"; 
                    echo '</div>';
                }
            }
            else
            {
                echo "<div class='alert alert-danger'><i class='fa fa-exclamation-triangle'></i>&nbsp;Username Does Not Exist!!!</div>"; 
            }
        }
        else
        {
        echo "Fault";
        }
    }
 ?>
    
      <div class="modal fade" id="modal2">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title">SIGNIN HERE</h2>
                    </div>
                    <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">
                             <form method="post" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="login_username" class="form-control" placeholder="Enter Username"/>
            </div>
            
             <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="login_password" class="form-control" placeholder="Enter Password"/>
            </div>
            
            <div class="form-group">
                <button name="login_go_btn" class="btn btn-success btn-lg">GO</button>
                  <input type="reset"  class="btn btn-default btn-lg"/>
            </div>
        </form>
       
                         </div>
                        <div class="col-md-offset-1 col-md-4">
                            <img width="250px;" src="images/image_logo.png">
                        </div>
                    </div>
                          
                    </div>
                    
                    <div class="modal-footer">
<button class="btn btn-primary" data-dismiss="modal" data-target="#modal1">Close</button>
                        <a style="float:left" href="resetpassword.php">Forgot Password?</a>
                    </div>
                </div>
            </div>
            </div>
            
    
</main>
    
    
    <?php  include_once("scripts.php"); ?>
</body>