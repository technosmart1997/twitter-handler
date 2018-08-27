<?php
session_start();
include_once("header.php");
if(isset($_SESSION['isloggedin']))
{
    include_once("navbar.php");
?>
<p><br></p>

<body>
<main>
<div class="Container-fluid">
    <div class="row">
        <p><br></p>
        <p><br></p>
        <div class="col-md-offset-1 col-lg-2 col-md-2">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    Admin Panel
                </div>
                <div class="panel-body radio-panel">
                    <form>
    <div class="radio">
      <label><input type="radio" name="data" value="read_tweets">Read Tweets</label>
    </div>
    <div class="radio">
      <label><input type="radio" name="data" value="write_tweets">Write Tweets</label>
    </div>
    <div class="radio">
      <label><input type="radio" name="data">Backup Tweets</label>
    </div>
                        
    <div class="radio">
      <label><input type="radio" name="data" value="my_history">History</label>
    </div>                   
  </form>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-xs-12 col-lg-8 col-sm-10">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <?= $_SESSION['name'] ?>
                </div>
                <div class="panel-body" id="panel_body">
                     <h1>read tweets</h1>
                </div>
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

?>