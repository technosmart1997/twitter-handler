<?php

include_once("TwitterAPIExchange.php");

include_once('header.php');

include_once("connect.php");
	function ConvertGMTToLocalTimezone($gmttime,$timezoneRequired)
    	{
        		$system_timezone = date_default_timezone_get();
        		date_default_timezone_set("GMT");
        		$gmt = date("d-m-Y h:i:s A");
		$local_timezone = $timezoneRequired;
        		date_default_timezone_set($local_timezone);
        		$local = date("d-m-Y h:i:s A");
        		date_default_timezone_set($system_timezone);
        		$diff = (strtotime($local) - strtotime($gmt));
		$date = new DateTime($gmttime);
        		$date->modify("+$diff seconds");
        		$timestamp = $date->format("dd-m-Y H:i:s");
        		return $timestamp;
    	}


$settings = array(
  'oauth_access_token' => "3320046564-gseyl7hvsUxP6vREiw5yJlCW2tN9qBQXF5tG5ML",
	'oauth_access_token_secret' => "jpVk3EIl3q7tuMNDTFK9BE2FyN1d7fCGxZOVCFuwLtZlq",
	'consumer_key' => "o9lqzPerxoMa0pkfOZaO8wYRQ",
	'consumer_secret' => "NrMxDnuR5rH8y1J6BRn7OtkhOErIx92qgMEt4lNkjm5c7B7dqX"
);

$url = "https://api.twitter.com/1.1/statuses/mentions_timeline.json"; 



$requestMethod = "GET";
$getfield = '?screen_name=gmncr1&count=100';
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
   ->buildOauth($url, $requestMethod)
   ->performRequest(),$assoc=TRUE);



$db=mysqli_select_db($connection,'twitter');

foreach($string as $items)
	{
		$ISTtime=ConvertGMTToLocalTimezone($items['created_at'],'Asia/Calcutta');
		$dd=substr($ISTtime,2,11);
		$tt=substr($ISTtime,12,8);
		$u_name=$items['user']['name'];
		$sc_name=$items['user']['screen_name'];
		$fc=$items['user']['followers_count'];
		$fs=$items['user']['friends_count'];
		$msg=$items['text'];
        $t_id=$items['id_str'];
        $p_image=$items['user']['profile_image_url'];
    
    $cmd="insert into tests (name,tdate,ttime,tweetby,tweetid,tfollower,tfollowing,tmsg,tstatus,pimg) values('$u_name','$dd','$tt','$sc_name','$t_id','$fc','$fs','$msg','Unseen','$p_image')";
    
    $res=mysqli_query($connection,$cmd);
    
      
	 }




?>