<?php
include_once("header.php");
?>
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
        
    <?php
        if(isset($_SESSION["isloggedin"]))
        {
    ?>
        <li><a href="#" ><i class="fa fa-home"></i>&nbsp;View Profile</a></li>
        <li><a href="logout.php" ><i class="fa fa-log-out"></i>&nbsp;Logout</a></li>
        
     <?php    
        }
        else
        {
        ?>   
        
        <li><a href="#" data-toggle="modal" data-target="#modal1" ><i class="fa fa-sign-in"></i>&nbsp;Sign In</a></li>
        <li><a href="#" ><i class="fa fa-mobile"></i>&nbsp;Contact</a></li>
        
        <?php
        }
        ?>
    </ul>
    </div>
    </div>
    </div>
