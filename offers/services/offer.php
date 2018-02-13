<?php

/**
 * Offer --- service class to retrieve and deals.
 * @author    Feras Abdo
 */

  class Offer {
	
	/*
	* Get all available deals before
	* any filters
	* @param no param required
	* @exception Any exception
	* @return a string array of deals details
	*/
	public static function getAll() {

	  $url = DEFAULT_API_URL; // Read API url from config file
	  $result = Common::doCurlRequest($url); // Call a common function to do a curl request
      return $result;
    }
	
	/*
	* Prepare and get deals after doing
	* a filter using some criteria
	* @param no param required
	* @exception Any exception
	* @return a string array of deals details
	*/
	public static function getByQueryString() {
		
		$url = DEFAULT_API_URL; // Read API url from config file
		 
	   // Prepare the query string to be concatenated to the default API url
       if(isset($_POST['postQueryString'])){
		   if(!empty($_POST['postQueryString'])){
			    $url .= $_POST['postQueryString'];
		   }
	   }
	  
	  $result = Common::doCurlRequest($url); // Call a common function to do a curl request
      return $result;
    }
	
  }
?>