<?php

  /*
  * A method that loads all needed controllers
  * and services before redirecting the request
  * to the requested controller
  * @param controller, action
  * @return redirect to controller method
  */
  function call($controller, $action) {
	
  // Start session
	session_start();
	
  // Load the needed services
	require_once('services/common.php');
	require_once('services/offer.php');
  require_once('controllers/' . $controller . 'Controller.php'); // Load the requested controller
	
  // Create object of the requested controller
    switch($controller) {
      case 'common':
        $controller = new CommonController();
      break;
      case 'offer':
        $controller = new OfferController();
      break;
    }

    // Use the created object to access the needed method/action
    $controller->{$action}();
  }

  // Set all available controller's functions
  $controllers = array('offer' => ['retrieve','filter']);

	if(array_key_exists($controller, $controllers)){
		if (in_array($action, $controllers[$controller])) {
			//Correct controller and action
			call($controller, $action);
		}
	}

?>