<?php 
	Class Customer {

        function getCustomers() {
            global $mysqli;
			
			$sql = $mysqli->query( "SELECT * FROM `customer`" );
			if( $sql ) {
				return $sql;
			}else {
				return false;
			}
    
        }
    }