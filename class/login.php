<?php 
	Class Login {

        function getLogin($userName) {
            global $mysqli;
    
            $sql = $mysqli->query( "SELECT * FROM admin_users WHERE user_name='$userName' and status = 'Active' "  );
            if( $sql ) {
                return $sql->fetch_all( MYSQLI_ASSOC );
            }else {
                return false;
            }
    
        }
    }