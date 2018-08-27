<?php

 


session_start();
include_once("header.php");
if(isset($_SESSION["isloggedin"]))
{
    header("location:operator_profile.php");
}
else    
{
?>
<body>
    <?php    include_once("navbar.php");
    ?>
    <p><br></p>  
<main>
<div class="container">
    <div class="row" >
        <div id="signinerror">
      <?php
               include_once("signinvalidation.php");     
      ?> 
        </div>
    </div>
    <div class="row">
        <div style="margin-top:60px;" class="col-sm-6 col-md-8 col-lg-8">
            <h3 align="center" style="color:white;font-size:40px;font-family:font-family: 'Noto Serif', serif;"><span style="font-size:50px;font-weight:bold;color:white;font-family: 'Rubik', sans-serif;">Manage</span>&nbsp;,Your Twitter Activities From Here.</h3>
        </div>
        
        <div class="col-sm-6 col-md-4 col-lg-4">
            
            <div class="form-group">
                <h2 align="center" style="color:white;font-variant: small-caps;">SIGN UP</h2>
            </div>
            <div id="signuperror">
            <?php  include_once("register_validation.php")?>
            </div>
         <form action="#" method="post">
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" id="check_username" name="register_username" class="form-control" placeholder="Enter Username" required/>
                </div>
             <div id="user_name_error"></div>
                                <br>
                <div class="form-group input-group">
                     <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="register_password" class="form-control"  placeholder="Enter Password" required/>
                </div>
                                <br>
                <div class="form-group">
                    <select id="user_select" name="user_type" class="form-control" required>
                        <?php 
                        include_once("connect.php");
                        mysqli_select_db($connection,"twitter"); 
                        $cmd="select type from user_type";
                        $res=mysqli_query($connection,$cmd);
                        $iserror=mysqli_error($connection);
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $type=$row["type"];
                            echo "<option value='$type'>$type</option>";
                        }
                         ?>
                    </select>
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg" value="Register" name="register_submit_btn">Register</button>
                <input id="resetbtn" type="reset" class="btn btn-default btn-lg"/>
                </div>
             
            </form>
        
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        </div>
    </div>
</div>    
</main>
    
    
    
    
    
    
    
    
    
    
    <div class="modal fade" id="modal1">
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
            
    
    
    
    
    
<?php
    include_once("scripts.php");
    ?>
    
</body>
<?php
}
?>
    