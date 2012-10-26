<?php
/*
	$countdown_db = $db->query("SELECT * FROM settings WHERE `group`='countdown'");
	
	$countdown = new stdClass;

	while ( $row = $countdown_db->fetchObject() ) { // building the countdown object

		$countdown->{$row->name} = $row->value;
	}
*/

	$target = mktime( // returns the target timestamp
		$settings['countdown']['hours'], 
		$settings['countdown']['minutes'],
		$settings['countdown']['seconds'],
		$settings['countdown']['month'],
		$settings['countdown']['day'],
		$settings['countdown']['year']
	);

	$now = time(); // current timestamp	
	
	$diffSecs = $target - $now;

	$date = array();
	$date['secs'] 	= $diffSecs % 60;
	$date['mins'] 	= floor($diffSecs/60)%60;
	$date['hours'] 	= floor($diffSecs/60/60)%24;
	$date['days'] 	= floor($diffSecs/60/60/24)%7;
	$date['weeks']	= floor($diffSecs/60/60/24/7);
	
	foreach ($date as $i => $d) {
		$d1 = $d%10;
		$d2 = ($d-$d1) / 10;
		$date[$i] = array(
			(int)$d2,
			(int)$d1,
			(int)$d
		);
	}
	
	$terminated = false;
	if (
	 $date['secs'][2]		<= 0 &&
	 $date['mins'][2]		<= 0 &&
	 $date['hours'][2]	<= 0 &&
	 $date['days'][2]		<= 0 &&
	 $date['weeks'][2]	<= 0 ){
		$terminated = true;
	 }
?>