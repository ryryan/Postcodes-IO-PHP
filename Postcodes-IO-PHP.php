<?php
	//Put together by Ryan Hart 2016  www.ryhart.com
	//Class to use the API provided by http://postcodes.io
	
	class Postcode{
		
		public function lookup($postcode){
			$jsonurl = "https://api.postcodes.io/postcodes/".$postcode;
			$json = file_get_contents($jsonurl);
			
			$decoded = json_decode($json);
			return $decoded->result;
		}
		public function bulkLookup($postcodes){
			$data_string = json_encode(array('postcodes' => $postcodes));
			
			$ch = curl_init('https://api.postcodes.io/postcodes');
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			        'Content-Type: application/json',
			        'Content-Length: ' . strlen($data_string))
			);
			
			$result = curl_exec($ch);
			$result = json_decode($result);
			
			return $result->result;
			
		}
		public function nearestPostcodesFromLongLat($longitude, $latitude){
			$jsonurl = "https://api.postcodes.io/postcodes?lon=".$longitude."&lat=".$latitude;
			$json = file_get_contents($jsonurl);
			
			$decoded = json_decode($json);
			return $decoded->result;
		}
		public function bulkReverseGeocoding($geolocations){
			$data_string = json_encode(array('geolocations' => $geolocations));
			
			$ch = curl_init('https://api.postcodes.io/postcodes');
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			        'Content-Type: application/json',
			        'Content-Length: ' . strlen($data_string))
			);
			
			$result = curl_exec($ch);
			$result = json_decode($result);
			
			return $result->result;
			
		}
		public function random(){
			$jsonurl = "https://api.postcodes.io/random/postcodes/";
			$json = file_get_contents($jsonurl);
			
			$decoded = json_decode($json);
			return $decoded->result;
		}
		public function validate($postcode){
			$jsonurl = "https://api.postcodes.io/postcodes/".$postcode."/validate";
			$json = file_get_contents($jsonurl);
			
			$decoded = json_decode($json);
			
			if($decoded->result == 1){
				return true;	
			}
			else{
				return false;
			}
			return false;
		}
		public function nearest($postcode){
			$jsonurl = "https://api.postcodes.io/postcodes/".$postcode."/nearest";
			$json = file_get_contents($jsonurl);
			
			$decoded = json_decode($json);
			return $decoded->result;
		}
		public function partial($postcode){
			$jsonurl = "https://api.postcodes.io/postcodes/".$postcode."/autocomplete";
			$json = file_get_contents($jsonurl);
			
			$decoded = json_decode($json);
			return $decoded->result;
		}
		public function query($postcode){
			$jsonurl = "https://api.postcodes.io/postcodes?q=".$postcode;
			$json = file_get_contents($jsonurl);
			
			$decoded = json_decode($json);
			return $decoded->result;
		}
		public function lookupOutwardCode($code){
			$jsonurl = "https://api.postcodes.io/outcodes/".$code;
			$json = file_get_contents($jsonurl);
			
			$decoded = json_decode($json);
			return $decoded->result;
		}
		public function nearestOutwardCode($code){
			$jsonurl = "https://api.postcodes.io/outcodes/".$code."/nearest";
			$json = file_get_contents($jsonurl);
			
			$decoded = json_decode($json);
			return $decoded->result;
		}
		public function nearestOutwardCodeFromLongLat($longitude, $latitude){
			$jsonurl = "https://api.postcodes.io/outcodes?lon=".$longitude."&lat=".$latitude;
			$json = file_get_contents($jsonurl);
			
			$decoded = json_decode($json);
			return $decoded->result;
		}
	}
?>