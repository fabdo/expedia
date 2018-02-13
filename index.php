<?php

// Set the default controller and action
$controller =  "offer";
$action 	= "retrieve";

// Check if the filter is applied
if(isset($_GET['action'])){
	$action = $_GET['action'];
}

// Set all possible pages and actions
$pages   = Array("offer","common");
$actions = Array("retrieve", "filter");

//P age not found scenario
if($controller == '' && $action == ''){
	
	if(isset($_SESSION)){
		//Delete all session values
		session_unset();
		//Terminate the session
		session_destroy();
	}
	
	die("Page not found!");
}

// Redirect to requested page 
require_once('config.php');
require_once('routes.php');
?>