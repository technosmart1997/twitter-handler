<?php
session_start();
include_once("header.php");
if(isset($_SESSION['isloggedin']))
{
if(isset($_REQUEST['operator']))
{
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
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Operator Panel
                </div>
                <div class="panel-body radio-panel">
                    <form>
    <div class="radio">
      <label><input type="radio" name="optradio" value="operator_read_tweets">Read Tweets</label>
    </div>
    <div class="radio">
      <label><input type="radio" name="optradio" value="by_name">By Name</label>
    </div>
    <div class="radio">
      <label><input type="radio" name="optradio" value="by_date">Date</label>
    </div>
                        
    <div class="radio">
      <label><input type="radio" name="optradio" value="by_id">I.D</label>
    </div>
                       
    <div class="radio">
      <label><input type="radio" name="optradio" value="operator_history">History</label>
    </div>                    
  </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                <?= $_SESSION['name']?>
                </div>
                <div class="panel-body" id="operator_body">
                    read tweets
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