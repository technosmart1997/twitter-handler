<?php
include_once("connect.php");
mysqli_select_db($connection,"twitter");

$cmd="delete from twitter_twit where time='21:22:4'";

$res=mysqli_query($connection,$cmd);
$error=mysqli_error($connection);

?>