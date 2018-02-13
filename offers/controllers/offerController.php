<?php

/**
 * OfferController --- controller class to call
 * the service class and pass all needed
 * deals to the template file
 * @author    Feras Abdo
 */

  class OfferController {
	
	/*
	* The default method that called
	* for getting all default deals
	* @param no param required
	* @exception Any exception
	* @return a view template
	*/
	public function retrieve(){
		$offers = Offer::getAll(); // Call the service to prepare all default deals
		return require_once('views/offers/offers.php'); // Pass all retrieved deals to the template file
	}
	
	/*
	* A custom method that called
	* for getting a specific deals
	* @param no param required
	* @exception Any exception
	* @return a view template
	*/
	public function filter(){
		$offers = Offer::getByQueryString(); // Call the service to prepare a specific deals
		return require_once('views/offers/offers.php'); // Pass all retrieved deals to the template file
	}
	
  }
?>