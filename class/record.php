<?php 
	Class Record {
        function addCustomer( $data1, $data2, $data3, $data4, $data5, $data6, $data7, $data8 ) {
			
			global $mysqli;
			
			$sql = $mysqli->query( "INSERT INTO `customer` ( `cus_name`, `cus_email`, `cus_phone1`, `cus_phone2`, `land_line`, `address_line1`, `city`,`postal_code` ) VALUES ( '$data1', '$data2', '$data3','$data4', '$data5', '$data6','$data7', '$data8' )" );
            $last_id = $mysqli->insert_id;
			return $last_id;
            //return $sql;
			
		}

		function updateCustomer( $data1, $data2, $data3, $data4, $data5, $data6, $data7, $data8, $id ) {
			
			global $mysqli;
			
			$sql = $mysqli->query( "UPDATE `customer` SET `cus_name` = '$data1', `cus_email` = '$data2', `cus_phone1` = '$data3', `cus_phone2` = '$data4', `land_line` = '$data5', `address_line1` = '$data6',`city` = '$data7', `postal_code` = '$data8'  WHERE cus_id = $id" );
			return $sql;
			
		}

        function addRecord( $data1, $data2, $data3, $data4, $data5 ) {
			
			global $mysqli;
			
			$sql = $mysqli->query( "INSERT INTO `record` ( `staff_id`, `cusfk_id`, `date`, `returned_date`, `record_status` ) VALUES ( '$data1', '$data2', '$data3','$data4', '$data5')" );
            $last_id = $mysqli->insert_id;
			return $last_id;
            //return $sql;
			
		}
		function updateRecord( $data2, $data3, $data4, $id ) {
			
			global $mysqli;
			
			$sql = $mysqli->query( "UPDATE `record` SET `date` = '$data2', `returned_date` = '$data3', `record_status` = '$data4'  WHERE record_id = $id" );
			return $sql;
			
		}

        function addProduct( $data1, $data2, $data3, $data4, $data5,  $data6, $data7, $data8, $data9, $data10 ) {
			
			global $mysqli;
			
			$sql = $mysqli->query( "INSERT INTO `product` ( `pro_type_id`, `pro_band_id`, `recordfk_id`, `model`, `others`,`serial_no`, `accessories`, `warranty`, `general_statement`, `non_compliance` ) VALUES ( '$data1', '$data2', '$data3','$data4', '$data5','$data6', '$data7', '$data8','$data9', '$data10')" );
            $last_id = $mysqli->insert_id;
			return $last_id;
			
		}

		function updateProduct( $data1, $data2, $data3, $data4, $data5, $data6, $data7, $data8, $data9, $id ) {
			
			global $mysqli;
			
			$sql = $mysqli->query( "UPDATE `product` SET `pro_type_id` = '$data1', `pro_band_id` = '$data2', `model` = '$data3', `others` = '$data4', `serial_no` = '$data5', `accessories` = '$data6',`warranty` = '$data7', `general_statement` = '$data8',`non_compliance` = '$data9'  WHERE product_id = $id" );
			return $sql;
			
		}

        function addCondition( $data1, $data2, $data3, $data4, $data5 ) {
			
			global $mysqli;
			
			$sql = $mysqli->query( "INSERT INTO `conditi_details` ( `product_id`, `scratched`, `cracked`, `damaged`, `condition_others` ) VALUES ( '$data1', '$data2', '$data3','$data4', '$data5')" );
            $last_id = $mysqli->insert_id;
			//return $last_id;
            return $sql;
			
		}

		function updateCondition($data1, $data2, $data3, $data4, $id ) {
			
			global $mysqli;
			
			$sql = $mysqli->query( "UPDATE `conditi_details` SET `scratched` = '$data1', `cracked` = '$data2', `damaged` = '$data3',`condition_others` = '$data4'  WHERE condition_id = $id" );
			return $sql;
			
		}

        function addBackup( $data1, $data2 ) {
			
			global $mysqli;
			
			$sql = $mysqli->query( "INSERT INTO `backup` ( `product_id`, `type` ) VALUES ( '$data1', '$data2')" );
            $last_id = $mysqli->insert_id;
			//return $last_id;
            return $sql;
			
		}

		function updateBackup( $data1, $id ) {
			
			global $mysqli;
			
			$sql = $mysqli->query( "UPDATE `backup` SET `type` = '$data1'  WHERE backup_id = $id" );
			return $sql;
			
		}

        function addRepair( $data1, $data2, $data3, $data4 ) {
			
			global $mysqli;
			
			$sql = $mysqli->query( "INSERT INTO `repair` ( `product_id`, `type`, `repair_other`, `additional_information` ) VALUES ( '$data1', '$data2', '$data3','$data4')" );
            $last_id = $mysqli->insert_id;
			//return $last_id;
            return $sql;
			
		}

		function updateRepair( $data1,$data2, $data3, $id ) {
			
			global $mysqli;
			
			$sql = $mysqli->query( "UPDATE `repair` SET `type` = '$data1', `repair_other` = '$data2', `additional_information` = '$data3'  WHERE repair_id = $id" );
			return $sql;
			
		}

        function addPayment( $data1, $data2, $data3, $data4, $data5, $data6 ) {
			
			global $mysqli;
			
			$sql = $mysqli->query( "INSERT INTO `payment` ( `customer_id`, `recordfk_id`, `service_fee`, `parts_cost`, `total`,`paid` ) VALUES ( '$data1', '$data2', '$data3','$data4', '$data5','$data6')" );
            $last_id = $mysqli->insert_id;
			//return $last_id;
            return $sql;
			
		}

		function updatePayment( $data1,$data2, $data3,$data4, $id ) {
			
			global $mysqli;
			
			$sql = $mysqli->query( "UPDATE `payment` SET `service_fee` = '$data1', `parts_cost` = '$data2', `total` = '$data3',`paid` = '$data4'  WHERE payment_id = $id" );
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

		function getRecord( $id ) {
			
			global $mysqli;
			
			$sql = $mysqli->query( "SELECT *, backup.type as back_type FROM `customer` inner join record on record.cusfk_id = customer.cus_id 
			INNER JOIN product on product.recordfk_id = record.record_id
			INNER JOIN pro_brand on pro_brand.proband_id = product.pro_band_id
			INNER JOIN pro_type on pro_type.protype_id = product.pro_type_id
			INNER JOIN conditi_details on conditi_details.product_id = product.product_id
			INNER JOIN backup on backup.product_id = product.product_id
			INNER JOIN repair on repair.product_id = product.product_id
			INNER JOIN payment on payment.recordfk_id = record.record_id and payment.customer_id = customer.cus_id WHERE record.record_id = $id" );
			if( $sql ) {
				return $sql->fetch_array( MYSQLI_ASSOC );
			}else {
				return false;
			}
			
			
		}

    }