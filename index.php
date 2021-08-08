<?php
	include_once( "config.php" );
	
	include_once( CLASS_PATH . "connection.php" );
	$objConnection = NEW Connection();
	$mysqli = $objConnection->db_connection( SCF_DB_HOST, SCF_DB_USER, SCF_DB_PASSWORD, SCF_DB_NAME );
	
	if( $module == "dashboard" ) { //Dashboard class objects
		
		//include_once( CLASS_PATH . "user.php" );
		//$objUser = NEW User();
		
		include_once( CLASS_PATH . "record.php" );
		$objRecord = NEW Record();
		
		include_once( CLASS_PATH . "customer.php" );
		$objCustomer = NEW Customer();
		
		include_once( CLASS_PATH . "login.php" );
		$objLogin = NEW Login();

		// include_once( CLASS_PATH . "ads.php" );
		// $objAd = NEW Ads();
		

		
	}
	
	// include_once( CLASS_PATH . "ads.php" );
	// $objAds = NEW Ads();
	
	//Include Module
	$module = ( file_exists( MODULES_PATH . $module . ".php" ) ) ? $module : "404";
	include_once( MODULES_PATH . $module . ".php" );
	
	//Include Template
	// if( $module == "dashboard" ) {
	// 	include_once( TEMPLATE_PATH . "dashboard/index.php" );
	// }else {
		include_once( TEMPLATE_PATH . "index.php" );
	// }
	
