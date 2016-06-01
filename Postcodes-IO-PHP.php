<?php
	class Postcode{
		
		public function __construct(){
		}
		
		public function lookup($postcode){
			$jsonurl = "https://api.postcodes.io/postcodes/".$postcode;
			$json = file_get_contents($jsonurl);
			return json_decode($json);
		}
	}
?>