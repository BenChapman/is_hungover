<?php

require 'vendor/autoload.php';
$user = ""; // Untappd user name
$access_token = ""; // Put access_token here

$client = new GuzzleHttp\Client();
$res = $client->get('https://api.untappd.com/v4/user/info/'.$user, [
	'access_token' =>  $access_token
]);
$data = $res->json();

$last_check_in = new DateTime($data['response']['user']['checkins'][0]['created_at']);
$yesterday = new DateTime("24 hours ago");

if($last_check_in > $yesterday) {
	$is_hungover = "Yes";
} else {
	$is_hungover = "No";
}

echo $is_hungover;

?>