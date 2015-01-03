<?php

	$saSwaps = array("google" => array("target" => "http://www.google.com"), "samt.st" => array("target" => "http://samt.st"));

	$sSwapRequest = trim($_SERVER["REQUEST_URI"], "/" );;


	if(is_array(($saSwaps[$sSwapRequest]))){
		//echo "retrieve ".$saSwaps[$sSwapRequest];
		$aSwap = $saSwaps[$sSwapRequest];
		$sContent = file_get_contents($aSwap["target"]);

		echo $sContent;
	}
?>