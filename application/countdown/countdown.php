<?php include_once APP . 'countdown/countdown_logic.php';

if ($terminated) { // countdown is terminated

?>

	<h2 class="subtitle">- Il conto alla rovescia è terminato! -</h2>

<?php } else { // countdown is active ?>

	<!-- Countdown dashboard start -->
	<div id="countdown">
	
		<div class="dash weeks_dash">
			<span class="dash_title">weeks</span>
			<div class="digit"><?=$date['weeks'][0]?></div>
			<div class="digit"><?=$date['weeks'][1]?></div>
		</div>

		<div class="dash days_dash">
			<span class="dash_title">days</span>
			<div class="digit"><?=$date['days'][0]?></div>
			<div class="digit"><?=$date['days'][1]?></div>
		</div>

		<div class="dash hours_dash">
			<span class="dash_title">hours</span>
			<div class="digit"><?=$date['hours'][0]?></div>
			<div class="digit"><?=$date['hours'][1]?></div>
		</div>

		<div class="dash minutes_dash">
			<span class="dash_title">minutes</span>
			<div class="digit"><?=$date['mins'][0]?></div>
			<div class="digit"><?=$date['mins'][1]?></div>
		</div>

		<div class="dash seconds_dash">
			<span class="dash_title">seconds</span>
			<div class="digit"><?=$date['secs'][0]?></div>
			<div class="digit"><?=$date['secs'][1]?></div>
		</div>
		
	</div>
	<!-- Countdown dashboard end -->	

<?php } ?>