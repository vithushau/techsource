<?php
	/* 
		Class by KAVI.C 
		Version 2.0
	*/
	Class Connection {
		
		//Function to connect DB
		public static function db_connection ( $servername, $username, $password, $database_name ) {
			
			$conn = new mysqli( $servername, $username, $password, $database_name );
			if ( $conn->connect_error ) {
			  die( "Connection failed: " . $conn->connect_error );
			}else{ 
				return $conn;
			}
			
		}	
		
	}