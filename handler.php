<?php

	$saSwaps = array(
		"google" => array(
			"target" => "http://www.google.com"
		), 
		"samt.st" => array(
			"target" => "http://samt.st"
			), 
		"testsearch" => array(
			"target" => "http://media-dump.samt.st/api/search/?q=directory%3Dglasgow_bowman_autumn&m=search-mode&page=1&_=1420322454966",
			"filter" => "jsontoxml")
		);

	$sSwapRequest = trim($_SERVER["REQUEST_URI"], "/" );;


	if(is_array(($saSwaps[$sSwapRequest]))){
		//echo "retrieve ".$saSwaps[$sSwapRequest];
		$aSwap = $saSwaps[$sSwapRequest];
		$sContent = file_get_contents($aSwap["target"]);


		if(isset($aSwap["filter"])){
			switch($aSwap["filter"]){
				case "jsontoxml":
					$sContent = array2xml(json_decode($sContent, true), false);
					break;
			}
		}
		echo $sContent;
	}


	function array2xml($array, $xml = false){

    if($xml === false){
        $xml = new SimpleXMLElement('<jsontoxml/>');
    }

    //print_r($array);exit();

    foreach($array as $key => $value){
        if(is_array($value)){
            array2xml($value, $xml->addChild($key));
        } else {
            $xml->addChild($key, $value);
        }
    }

    return $xml->asXML();
}

?>