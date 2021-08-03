<?php 
	Class DBI {
		
		//function to insert
		function insert( $data1, $data2, $data3 ) {
			
			global $mysqli;
			
			$sql = $mysqli->query( "INSERT INTO `table` ( `col1`, `col2`, `col3` ) VALUES ( '$data1', '$data2', '$data3' )" );
			return $sql;
			
		}
		
		//function to update by {$id}
		function update( $data1, $data2, $data3, $id ) {
			
			global $mysqli;
			
			$sql = $mysqli->query( "UPDATE `table` SET `col1` = '$data1', `col2` = '$data2', `col3` = '$data3'  WHERE id = $id" );
			return $sql;
			
		}
		
		//function to return only one row by {$id}
		function get( $id ) {
			
			global $mysqli;
			
			$sql = $mysqli->query( "SELECT * FROM `table` where id = $id" );
			if( $sql ) {
				return $sql->fetch_array( MYSQLI_ASSOC );
			}else {
				return false;
			}
			
			
		}
		
		//function to return many rows
		function get_all() {
			
			global $mysqli;
			
			$sql = $mysqli->query( "SELECT * FROM `table`" );
			if( $sql ) {
				return $sql->fetch_all( MYSQLI_ASSOC );
			}else {
				return false;
			}
			
		}
		
		
		
	}