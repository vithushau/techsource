<?php
	
	if( $action == "home" || $action == "" ) {
		
		$page = "dashboard";
		$records = $objRecord->get_all();	
		
	}else if( $action == "login" ) { 
		
		$page = "login";
		if ( isset ( $_POST["login_submit" ] ) ) {
			$userName=$_POST['user_name'];
			$password=$_POST['password'];
		
			$result = $objLogin->getLogin($userName);
				if (!empty($result)) {
					
					$check  = password_verify($password,$result['password']);
					if($check) {
						$_SESSION['admin_user_info'] = $result;
						header("Location: ".BASE_URL."home");	
						exit();
					}else{
						$error_message = "Incorrect Credentials!";
					}
				}else{
					$error_message = "Incorrect Credentials!";
				}
		}		
		
	}else if ( $action == "logout" ){
        session_destroy();
		header("Location: ".BASE_URL."login");	
		exit();
	   
    }else if( $action == "add_record" ) {  //vithu
		
		$page = "add_record";
		$pro_brands = $objRecord->get_pro_brand();	
		$pro_types = $objRecord->get_pro_types();	
		$customers = $objCustomer->getCustomers();	
		if ( isset ( $_POST["add_record" ] ) ) {
			$date=$_POST['date'];
			$returned_date=$_POST['returned_date'];
			$record_status=$_POST['record_status'];
			$cus_name=$_POST['cus_name'];
			$cus_email=$_POST['cus_email'];
			if(isset($_POST['cus_phone1'])){
				$cus_phone1=$_POST['cus_phone1'];
			}else{
				$cus_phone1 = "";
			}
			if(isset($_POST['cus_phone2'])){
				$cus_phone2=$_POST['cus_phone2'];
			}else{
				$cus_phone2 = "";
			}
			if(isset($_POST['land_line'])){
				$land_line=$_POST['land_line'];
			}else{
				$land_line = "";
			}
			if(isset($_POST['address_line1'])){
				$address_line1=$_POST['address_line1'];
			}else{
				$address_line1 = "";
			}
			if(isset($_POST['city'])){
				$city=$_POST['city'];
			}else{
				$city = "";
			}
			if(isset($_POST['postal_code'])){
				$postal_code=$_POST['postal_code'];
			}else{
				$postal_code = "";
			}
			
			
			$pro_type_id=$_POST['pro_type_id'];
			$pro_band_id=$_POST['pro_band_id'];
			$model=$_POST['model'];
			$others=$_POST['others'];
			$serial_no=$_POST['serial_no'];
			$warranty=$_POST['warranty'];
			$accessories=$_POST['accessories'];
			$general_statement=$_POST['general_statement'];
			$non_compliance=$_POST['non_compliance'];
			
			if(isset($_POST['scratch'])){
				$xscratch = $_POST['scratch'];
				$scratch=  implode(",", $xscratch);
			}else{
				$scratch = "";
			}

			if(isset($_POST['crack'])){
				$xcrack=$_POST['crack'];
				$crack=  implode(",", $xcrack);
			}else{
				$crack = "";
			}

			if(isset($_POST['damage'])){
				$xdamage=$_POST['damage'];
				$damage=  implode(",", $xdamage);
			}else{
				$damage = "";
			}

			if(isset($_POST['backup'])){
				$xbackup=$_POST['backup'];
				$backup=  implode(",", $xbackup);
			}else{
				$backup = "";
			}
			
			
			$condition_others=$_POST['condition_others'];
			$repair_type=$_POST['repair_type'];
			$repair_other=$_POST['repair_other'];
			$additional_information=$_POST['additional_information'];
			$service_fee=$_POST['service_fee'];
			$parts_cost=$_POST['parts_cost'];
			$total=$_POST['total'];
			$paid=$_POST['paid'];
			$staff_id = "1";
			if(isset($_POST['customer_id']) && $_POST['customer_id'] != ""){
				$customer_result = $_POST['customer_id'];
			}else{
				$customer_result = $objRecord->addCustomer($cus_name, $cus_email, $cus_phone1,$cus_phone2,$land_line,$address_line1,$city,$postal_code);
			}
			if($customer_result){
				$record_result = $objRecord->addRecord($staff_id,$customer_result,$date,$returned_date,$record_status);
				if($record_result) {
					$product_result = 
					$objRecord->addProduct($pro_type_id,$pro_band_id,$record_result,$model,$others,$serial_no,$accessories,$warranty,$general_statement,$non_compliance);
					$condition_result = $objRecord->addCondition($product_result,$scratch,$crack,$damage, $condition_others);
					$backup_result = $objRecord->addBackup($product_result,$backup);
					$repair_result = $objRecord->addRepair($product_result,$repair_type,$repair_other,$additional_information);
					$payment_result = $objRecord->addPayment($customer_result,$record_result,$service_fee,$parts_cost,$total,$paid);
					//die();
					$success_message = "You have successfully added the records. Record ID - 600000".$record_result;
				}else{
					$error_message = "Something went Wrong. Try Again.";
				}

			}else{
				$error_message = "Something went Wrong. Try Again.";
				// $success_message = "You have successfully added the records.";
				// $users = $objLogin->getUser($user_id);
			}
	}
		

	}else if( $action == "edit_record" ) {  //vithu
		
		$page = "edit_record";
		$recordID = $_GET['id'];
		$results = $objRecord->getRecord($recordID);
		$pro_brands = $objRecord->get_pro_brand();	
		$pro_types = $objRecord->get_pro_types();	
		if ( isset ( $_POST["edit_record" ] ) ) {
			$date=$_POST['date'];
			$returned_date=$_POST['returned_date'];
			$record_status=$_POST['record_status'];
			$cus_name=$_POST['cus_name'];
			$cus_email=$_POST['cus_email'];
			// $cus_phone1=$_POST['cus_phone1'];
			// $cus_phone2=$_POST['cus_phone2'];
			// $land_line=$_POST['land_line'];
			// $address_line1=$_POST['address_line1'];
			// $city=$_POST['city'];
			// $postal_code=$_POST['postal_code'];
			if(isset($_POST['cus_phone1'])){
				$cus_phone1=$_POST['cus_phone1'];
			}else{
				$cus_phone1 = "";
			}
			if(isset($_POST['cus_phone2'])){
				$cus_phone2=$_POST['cus_phone2'];
			}else{
				$cus_phone2 = "";
			}
			if(isset($_POST['land_line'])){
				$land_line=$_POST['land_line'];
			}else{
				$land_line = "";
			}
			if(isset($_POST['address_line1'])){
				$address_line1=$_POST['address_line1'];
			}else{
				$address_line1 = "";
			}
			if(isset($_POST['city'])){
				$city=$_POST['city'];
			}else{
				$city = "";
			}
			if(isset($_POST['postal_code'])){
				$postal_code=$_POST['postal_code'];
			}else{
				$postal_code = "";
			}
			$pro_type_id=$_POST['pro_type_id'];
			$pro_band_id=$_POST['pro_band_id'];
			$model=$_POST['model'];
			$others=$_POST['others'];
			$serial_no=$_POST['serial_no'];
			$warranty=$_POST['warranty'];
			$accessories=$_POST['accessories'];
			$general_statement=$_POST['general_statement'];
			$non_compliance=$_POST['non_compliance'];
			// $xscratch=$_POST['scratch'];
			// $scratch=  implode(",", $xscratch);
			// $xcrack=$_POST['crack'];
			// $crack=  implode(",", $xcrack);
			// $xdamage=$_POST['damage'];
			// $damage=  implode(",", $xdamage);
			if(isset($_POST['scratch'])){
				$xscratch = $_POST['scratch'];
				$scratch=  implode(",", $xscratch);
			}else{
				$scratch = "";
			}

			if(isset($_POST['crack'])){
				$xcrack=$_POST['crack'];
				$crack=  implode(",", $xcrack);
			}else{
				$crack = "";
			}

			if(isset($_POST['damage'])){
				$xdamage=$_POST['damage'];
				$damage=  implode(",", $xdamage);
			}else{
				$damage = "";
			}

			if(isset($_POST['backup'])){
				$xbackup=$_POST['backup'];
				$backup=  implode(",", $xbackup);
			}else{
				$backup = "";
			}
			
			$condition_others=$_POST['condition_others'];
			// $xbackup=$_POST['backup'];
			// $backup=  implode(",", $xbackup);
			$repair_type=$_POST['repair_type'];
			$repair_other=$_POST['repair_other'];
			$additional_information=$_POST['additional_information'];
			$service_fee=$_POST['service_fee'];
			$parts_cost=$_POST['parts_cost'];
			$total=$_POST['total'];
			$paid=$_POST['paid'];
			$staff_id = "1";

			$customerID = $results['cus_id'];
			$recordID = $results['record_id'];
			$product_id = $results['product_id'];
			$condition_id = $results['condition_id'];
			$back_id = $results['backup_id'];
			$repair_id = $results['repair_id'];
			$pay_id = $results['payment_id'];

			$customer_result = $objRecord->updateCustomer($cus_name, $cus_email, $cus_phone1,$cus_phone2,$land_line,$address_line1,$city,$postal_code,$customerID);
			if($customer_result){
				$record_result = $objRecord->updateRecord($date,$returned_date,$record_status,$recordID);
				if($record_result) {
					$product_result = 
					$objRecord->updateProduct($pro_type_id,$pro_band_id,$model,$others,$serial_no,$accessories,$warranty,$general_statement,$non_compliance,$product_id);
					$condition_result = $objRecord->updateCondition($scratch,$crack,$damage, $condition_others,$condition_id);
					$backup_result = $objRecord->updateBackup($backup,$back_id);
					$repair_result = $objRecord->updateRepair($repair_type,$repair_other,$additional_information,$repair_id);
					$payment_result = $objRecord->updatePayment($service_fee,$parts_cost,$total,$paid,$pay_id);

					$success_message = "You have successfully updated the records.";
				}else{
					$error_message = "Something went Wrong. Try Again.";
				}
				$page = "edit_record";
				$recordID = $_GET['id'];
				$results = $objRecord->getRecord($recordID);

			}else{
				$error_message = "Something went Wrong. Try Again.";
				$page = "edit_record";
				$recordID = $_GET['id'];
				$results = $objRecord->getRecord($recordID);

			}
	}
		

	}else if( $action == "tables" ) {  //vithu
		
		$page = "tables";
		$records = $objRecord->get_all();

		if ( isset ( $_POST["make_pdf"] ) ) {

		require_once __DIR__ . '/../vendor/autoload.php';
		$mpdf = new \Mpdf\Mpdf();
		$recordID = $_POST['record_id'];
		$results = $objRecord->getRecord($recordID);
		
		$data = '';
		$data .= '<h3>Customer Details</h3>';
		$data .= '<strong>Full Name </strong> '. $results['cus_name'] . '<br />';
		$data .= '<strong>Email </strong> '. $results['cus_email'] . '<br />';
		$data .= '<strong>Phone Number </strong> '. $results['cus_phone1'] . '<br />';
		$data .= '<strong>Phone Number </strong> '. $results['cus_phone2'] . '<br />';
		$data .= '<strong>City </strong> '. $results['city'] . '<br />';
		$data .= '<strong>Postal Code </strong> '. $results['postal_code'] . '<br />';

		$data .= '<h3>Product Details</h3>';
		// $data .= '<strong>Postal Code </strong> '. $results['postal_code'] . '<br />';
		// $data .= '<strong>Postal Code </strong> '. $results['postal_code'] . '<br />';
		$data .= '<strong>Model </strong> '. $results['model'] . '<br />';
		$data .= '<strong>Serial Number </strong> '. $results['serial_no'] . '<br />';
		$data .= '<strong>Warrenty </strong> '. $results['warranty'] . '<br />';
		$data .= '<strong>Accessories delivered </strong> '. $results['accessories'] . '<br />';
		$data .= '<strong>General Statement </strong> '. $results['general_statement'] . '<br />';
		$data .= '<strong>Non Complience </strong> '. $results['non_compliance'] . '<br />';
		// $data .= '<strong>Postal Code </strong> '. $results['postal_code'] . '<br />';

		//$url = __DIR__ .  '/../template/pdf_template.php';
		//$url = "https://techsource.techedg.com/dashboard/home";
		// $html = file_get_contents($url,$records);
		// $mpdf->setBasePath($url);


		$mpdf->WriteHTML($data);
		$mpdf->Output('myfile.pdf','D');

		}
		
	}else if( $action == "customer" ) {  //vithu
		
		$page = "customer";
		$records = $objCustomer->getCustomers();	

	}else if( $action == "user" ) {  //vithu
		
		$page = "user";
	}else if( $action == "pdf_template" ) {  //vithu
		
		$page = "pdf_template";

	}else {
		
		$page = "404";
		
	}		