<?php 
	Class Record {
        function addCustomer( $data1, $data2, $data3, $data4, $data5, $data6, $data7, $data8 ) {
			
			global $mysqli;
			
			$sql = $mysqli->query( "INSERT INTO `customer` ( `cus_name`, `cus_email`, `cus_phone1`, `cus_phone2`, `land_line`, `address_line1`, `city`,`postal_code` ) VALUES ( '$data1', '$data2', '$data3','$data4', '$data5', '$data6','$data7', '$data8' )" );
            $last_id = $mysqli->insert_id;
			return $last_id;
            //return $sql;
			
		}

        function addRecord( $data1, $data2, $data3, $data4, $data5 ) {
			
			global $mysqli;
			
			$sql = $mysqli->query( "INSERT INTO `record` ( `staff_id`, `cusfk_id`, `date`, `returned_date`, `record_status` ) VALUES ( '$data1', '$data2', '$data3','$data4', '$data5')" );
            $last_id = $mysqli->insert_id;
			return $last_id;
            //return $sql;
			
		}

        function addProduct( $data1, $data2, $data3, $data4, $data5,  $data6, $data7, $data8, $data9, $data10 ) {
			
			global $mysqli;
			
			$sql = $mysqli->query( "INSERT INTO `product` ( `pro_type_id`, `pro_band_id`, `recordfk_id`, `model`, `others`,`serial_no`, `accessories`, `warranty`, `general_statement`, `non_compliance` ) VALUES ( '$data1', '$data2', '$data3','$data4', '$data5','$data6', '$data7', '$data8','$data9', '$data10')" );
            $last_id = $mysqli->insert_id;
			return $last_id;
			
		}

        function addCondition( $data1, $data2, $data3, $data4, $data5 ) {
			
			global $mysqli;
			
			$sql = $mysqli->query( "INSERT INTO `conditi_details` ( `product_id`, `scratched`, `cracked`, `damaged`, `condition_others` ) VALUES ( '$data1', '$data2', '$data3','$data4', '$data5')" );
            $last_id = $mysqli->insert_id;
			//return $last_id;
            return $sql;
			
		}

        function addBackup( $data1, $data2 ) {
			
			global $mysqli;
			
			$sql = $mysqli->query( "INSERT INTO `backup` ( `product_id`, `type` ) VALUES ( '$data1', '$data2')" );
            $last_id = $mysqli->insert_id;
			//return $last_id;
            return $sql;
			
		}

        function addRepair( $data1, $data2, $data3, $data4 ) {
			
			global $mysqli;
			
			$sql = $mysqli->query( "INSERT INTO `repair` ( `product_id`, `type`, `repair_other`, `additional_information` ) VALUES ( '$data1', '$data2', '$data3','$data4')" );
            $last_id = $mysqli->insert_id;
			//return $last_id;
            return $sql;
			
		}

        function addPayment( $data1, $data2, $data3, $data4, $data5, $data6 ) {
			
			global $mysqli;
			
			$sql = $mysqli->query( "INSERT INTO `payment` ( `customer_id`, `recordfk_id`, `service_fee`, `parts_cost`, `total`,`paid` ) VALUES ( '$data1', '$data2', '$data3','$data4', '$data5','$data6')" );
            $last_id = $mysqli->insert_id;
			//return $last_id;
            return $sql;
			
		}

		function get_pro_types() {
			
			global $mysqli;
			
			$sql = $mysqli->query( "SELECT * FROM `pro_type`" );
			if( $sql ) {
				return $sql;
			}else {
				return false;
			}
			
		}

		function get_pro_brand() {
			
			global $mysqli;
			
			$sql = $mysqli->query( "SELECT * FROM `pro_brand`" );
			if( $sql ) {
				return $sql;
			}else {
				return false;
			}
			
		}

		function get_all() {
			
			global $mysqli;
			
			$sql = $mysqli->query( "SELECT * FROM `record` INNER JOIN `customer` ON customer.cus_id = record.cusfk_id" );
			if( $sql ) {
				return $sql;
			}else {
				return false;
			}
			
		}

    }