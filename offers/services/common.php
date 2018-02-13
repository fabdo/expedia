<?php

/**
 * Common --- service class to handle all common functions
 * such as prepare the curl request
 * @author    Feras Abdo
 */

  class Common {
	
	/*
	* A method that called to handle a curl
	* request for getting hotels deals
	* @param API url
	* @exception Any exception
	* @return array string of deals details
	*/
	public function doCurlRequest($url) {
		
		try{			
			
			$curl = curl_init(); // Get curl resource
			// Set some options
			curl_setopt_array($curl, array(
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => $url
			));
			// Send the request & save response to $result
			$result = curl_exec($curl);
			// Close request to clear up some resources
			curl_close($curl);
			// Convert the response from json into array
			$result = json_decode($result, true);
	  }catch(Exception $e){
	  	  // Return empty array in case of failure
		  $result = Array();
	  }
	  
	  return $result;
	}
	
  }
?>