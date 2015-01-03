<?php

	$saSwaps = array("google" => "http://www.google.com", "samt.st" => "http://samt.st");

	$sSwapRequest = trim($_SERVER["REQUEST_URI"], "/" );;

	//print_r($saSwaps);

	if(isset($saSwaps[$sSwapRequest])){
		//echo "retrieve ".$saSwaps[$sSwapRequest];
		echo file_get_contents($saSwaps[$sSwapRequest]);
	}
?>