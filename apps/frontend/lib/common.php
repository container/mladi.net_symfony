<?php
/**
 * spit readable 
 *
 */
function dump($dumpMe = '', $kill = false, $nocutoff = false){
	$preparedOutput = print_r($dumpMe, true);
	 if($nocutoff) $preparedOutput= substr($preparedOutput, 0, 10000);
	// $preparedOutput2 = str_replace(' ','&nbsp;',$preparedOutput);
	echo '<div style="border: 2px solid red; margin 10px; padding 10px; font-size:12px; font-family:courier; display:block; top: 20px;" >'
			.'<div style="padding:10px;">'
			.nl2br($preparedOutput)
			.'</div>'
			.'</div>';
			
	if($kill)die;
	
}
?>