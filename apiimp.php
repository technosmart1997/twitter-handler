<?php
 ini_set('display_errors', 1);
 require_once('TwitterAPIExchange.php'); 
$settings = array(
  'oauth_access_token' => "3320046564-gseyl7hvsUxP6vREiw5yJlCW2tN9qBQXF5tG5ML",
	'oauth_access_token_secret' => "jpVk3EIl3q7tuMNDTFK9BE2FyN1d7fCGxZOVCFuwLtZlq",
	'consumer_key' => "o9lqzPerxoMa0pkfOZaO8wYRQ",
	'consumer_secret' => "NrMxDnuR5rH8y1J6BRn7OtkhOErIx92qgMEt4lNkjm5c7B7dqX"
);
  $url =  "https://api.twitter.com/1.1/statuses/mentions_timeline.json";
  $getfield = '?screen_name=gmncr1&count=100';
  $requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest(),$assoc = TRUE);

echo "<h3>Mensajer directos</h3>";          
foreach($string as $items)
 {
            $url = 'https://api.twitter.com/1.1/direct_messages/show.json?';
            $requestMethod = 'GET';
            $getfields = array('id' => $items['id']);
            $twitter = new TwitterAPIExchange($settings);           
            $do = $twitter->setGetfield($getfield)
                          ->buildOauth($url, $requestMethod)                         
                          ->performRequest();
            echo "<strong>Tweet:</strong> ".$items['text']."<br />";
    
            //var_dump(json_encode($items, true));
        }
?>