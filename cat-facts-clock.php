#!/usr/bin/php
<?php


	
	$enabled = shell_exec("defaults read org.ccombs.catfactsclock enabled 2>/dev/null");
	// echo $enabled;
	
	if ( !$enabled || $enabled==1 ) {
		$enabled = "Yes";
	}
	
	if ( trim($enabled) != "Yes" ) {
		
		exit;
	}


	$json_string = file_get_contents("http://catfacts-api.appspot.com/api/facts?number=1");
	$parsed_json = json_decode($json_string);
	$voice = shell_exec("defaults read org.ccombs.catfactsclock voice 2>/dev/null");
	
	
	if (!$voice || $voice==1) {
		$voice = "Fred";
	}	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	$signoffs = array("Thank you for subscribing to Cat Facts.","Thank you for subscribing to Cat Facts. You can unsubscribe at any time by sending STOP to C-A-T-F-A-X.","Thank you for being a Cat Facts subscriber. We value your opinion. Let us know if you like cats by sending 'Yes' or 'No' to C-A-T-F-A-X.","And that's your cat fact for the hour.","You will receive further cat facts every hour, on the hour!","","And now you know a little more about our favorite animal.","And now you know a little more about our favorite animal. It is your favorite animal, right?","And now you know a little more about our favorite animal. It is your favorite animal, right? Send your favorite animal to C-A-T-F-A-X right now or we can't be friends anymore.","Do you love cats as much as I do? Ha ha ha! Of course you do! See you in an hour.","Aren't cats great?","Aren't cats grand?","Aren't cats so wise?","Boy, cats sure are great!","Boy, cats sure are great! I wish I could get married to cats!","Cats are so great!","I love cats so much! They are holding me hostage for Iams. Send help.","So that's my favorite fact ever! Just like the last one!","Bet you didn't know that!","Did you know that?","You have been subscribed to Cat Facts, every hour, on the hour!","Hope you're looking forward to your next cat fact!","Now you know. We'll be in touch soon","You can stop receiving cat facts at any time. Just send STOP to C-A-T-F-A-X.","And that's why cats are my favorite animal.","Wow!","Gee, that sure is great.","Thanks, cats!","Wow! Who wants some Friskies?","Thank you for listening to Cat Facts.","You will receive more cat facts on the hour, every hour!","Send STOP at any time to C-A-T-F-A-X to stop receiving cat facts, but only if there is something wrong with you.","Dang! Aren't cats great?" );
	$randomsignoff=array_rand($signoffs);
	
	$fact = $parsed_json->{'facts'}[0];
	date_default_timezone_set('America/New_York');

	$sentence= "The time is now " . ltrim(date('H'),"0") . " o'clock. $fact\n";
	system('say -v ' . $voice . ' "' . addslashes($sentence) . ". " . $signoffs[$randomsignoff] . "\"");



?>
