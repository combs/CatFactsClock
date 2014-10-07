#!/usr/bin/php
<?php
  $json_string = file_get_contents("http://catfacts-api.appspot.com/api/facts?number=1");

  $parsed_json = json_decode($json_string);
  $fact = $parsed_json->{'facts'}[0];
	date_default_timezone_set('America/New_York');

	$sentence= "The time is now " . ltrim(date('H'),"0") . " o'clock. $fact\n";
	system('say -v Victoria "' . addslashes($sentence) . "\"");
 


?>
