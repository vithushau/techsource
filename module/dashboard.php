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
			$total=$service_fee + $parts_cost;
			$paid=$_POST['paid'];
			//Change HERE
			$tax_percentage = 0.13;
			$tax = $total * $tax_percentage;
			$final_total = $total + $tax;
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
					$payment_result = $objRecord->addPayment($customer_result,$record_result,$service_fee,$parts_cost,$total,$paid,$tax,$final_total);
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
			$total=$service_fee + $parts_cost;
			//Change HERE
			$tax_percentage = 0.13;
			$tax = $total * $tax_percentage;
			$final_total = $total + $tax;
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
					$payment_result = $objRecord->updatePayment($service_fee,$parts_cost,$total,$paid,$tax,$final_total,$pay_id);

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
		$service = number_format($results['service_fee'], 2);
		$parts_cost = number_format($results['parts_cost'], 2);
		$total = number_format($results['total'], 2);
		$tax = number_format($results['tax'], 2);
		$finaltotal = number_format($results['final_total'], 2);
		$today = date("F j, Y, g:i a");   
		
		$mpdf->WriteHTML(
			'<html xmlns="http://www.w3.org/1999/xhtml" style="padding: 0px; margin: 0px;">

			<head>

				<title>TechSource PDF</title>

			

			

				<style>* {

						-ms-text-size-adjust: 100%;

						-webkit-text-size-adjust: none;

						-webkit-text-resize: 100%;

						text-resize: 100%;

					}

			

					a {

						outline: none;



					}



					a:hover {



						text-decoration: none !important;



					}



			



					.active:hover {



						opacity: 0.8;



					}



			



					.active {



						-webkit-transition: all 0.3s ease;



						-moz-transition: all 0.3s ease;



						-ms-transition: all 0.3s ease;



						transition: all 0.3s ease;



					}



			



					.ExternalClass, .ExternalClass a, .ExternalClass span, .ExternalClass b, .ExternalClass br, .ExternalClass p, .ExternalClass div {



						line-height: inherit;



					}



			



					table td {



						border-collapse: collapse !important;



					}



			



					@media only screen and (max-width: 500px) {



						table[class="wrapper"] {



							min-width: 320px !important;



						}



			



						table[class="flexible"] {



							width: 100% !important;



						}



			



						td[class="hide"],



						td[class="hide"] img,



						span[class="hide"],



						br[class="hide"],



						td[class="fix-gmail"] {



							display: none !important;



							width: 0 !important;



							height: 0 !important;



							padding: 0 !important;



							font-size: 0 !important;



							line-height: 0 !important;



						}



			



						td[class="img-flex"] img {



							width: 100% !important;



							height: auto !important;



						}



			



						td[class="aligncenter"] {



							text-align: center !important;



						}



			



						td[class="indent-01"] {



							padding: 10px 2px 0 25px !important;



						}



			



						td[class="indent-02"] {



							padding: 20px !important;



						}



			



						td[class="indent-03"] {



							padding: 20px 10px 30px !important;



						}



			



						td[class="indent-04"] {



							padding: 30px 0 !important;



						}



			



						table[class="alignleft"] {



							float: left !important;



						}

						

						img.mainlogo {

							max-width: 80% !important;

							width: 35%;

						}

						



					}</style>



				<style></style>



				<style type="text/css">.MsgHeaderTable .Object {



						cursor: pointer;



						color: #369;



						text-decoration: none;



						cursor: pointer;



						white-space: nowrap;



					}



			



					



					img.mainlogo {



		max-width: 80% !important;



		width: 45%;



	}



	



	small {



		display: block !important;



		font-size: 13px !important;



		padding-bottom: 5px !important;



	}



	



	.callh2 h2 {



		margin: 0px;



	}



	



					</style>



			</head>



			<body style="margin: 0px; padding: 0px; height: auto;" class="MsgBody MsgBody-html">



			<table class="theader" width="100%" cellspacing="0" style="margin: 0px; padding: 20px; height: auto;" cellpadding="0" bgcolor="#ffffff">



			<tbody>



						<tr>



							<td width="40%" ><img class="mainlogo" src="https://www.techsourcescarborough.com/wp-content/uploads/2021/04/techsource-logo-lg.png"> </td>

							<td width="10%"> </td>

							<td width="50%" class="callh2">



							



	<small>Got Questions ? Call us</small>



	<h2>+1 416-757-9111</h2>



	Email : support@techsourcescarborough.com



							</td>



							



							



						</tr>



			</tbody>



			</table>



			



			



			<table class="theader" width="100%" cellspacing="0" style="margin: 0px; padding: 20px; height: auto;" cellpadding="0" bgcolor="#f0f3f4">



			<tbody>



						<tr>



							<td width="35%" style="padding:0px 0 0px;" >



							 <small>Our Location</small>



							<address style="font:13px/22px Arial, Helvetica, sans-serif;" class="m-t-5 m-b-5">



					  <strong class="text-inverse">TechSource Head office</strong><br>



					  1260 Kennedy Rd, Unit 3 & 4, <br>



					  Scarborough ON  <br>



					  M1P 2L3,  <br>



					  Canada <br>



				   </address>



	



							</td>



							<td width="30%">



							



					<small>To</small>



				   <address style="font:13px/22px Arial, Helvetica, sans-serif;" class="m-t-5 m-b-5">



					  <strong class="text-inverse">'. $results['cus_name'] .'</strong><br>



					  '. $results['address_line1'] .'<br>



					  '. $results['city'] .', '. $results['postal_code'] .'<br>



					  Phone: '. $results['cus_phone1'] .', '. $results['cus_phone2'] .'<br>



					  Fax: '. $results['land_line'] .'



				   </address>



							



							</td>



							<td width="35%" style="text-align:right;">



							



					 <small style="font:13px/22px Arial, Helvetica, sans-serif;"> <b>Printed on : </b> </small>



				   <div style="font:13px/22px Arial, Helvetica, sans-serif;" class="date text-inverse m-t-5">'. $today .'</div><br>



				   <div style="font:13px/22px Arial, Helvetica, sans-serif;" class="invoice-detail">



					  <b> Record Number : </b> #'. $results['record_id'] .'<br>



					  <b> Repair Type : </b>  '. $results['type'] .'



							</td>



						</tr>



			</tbody>



			</table>



			



			



			<table class="theader" width="100%" cellspacing="0" style="margin: 0px; padding: 20px; height: auto;" cellpadding="0" bgcolor="#ffffff">



			



					<thead>



						 <tr>



							<th style="padding:30px 30px 30px;">TASK DESCRIPTION</th>



							<th class="text-center" width="10%"></th>



							<th class="text-center" width="10%"></th>



							<th class="text-right" width="20%"></th>



						 </tr>



					  </thead>



			<tbody>



						 <tr>



							<td style="font:13px/22px Arial, Helvetica, sans-serif;">



							   <span class="text-inverse"><h4>Product Details</h4></span><br>



								<b>Product Type :</b>  '. $results['pro_type_name'] .' <br>



								<b>Serial Number :</b>  '. $results['serial_no'] .'  <br>



								<b>Accessories : </b>  '. $results['accessories'] .' <br>



								<b> Product Condition :  </b>   <br>

								

								---- Scratched : '. $results['scratched'] .'  <br>

								---- Cracked : '. $results['cracked'] .'  <br>

								---- Damaged : '. $results['damaged'] .'   <br>



								  <b> Backup Details : </b> '. $results['back_type'] .'  <br>



								   <b> Repair / Parts Details : </b>'. $results['type'] .'   <br>



									



							</td>	



							<td class="text-center"></td>



							<td class="text-center"></td>



							<td class="text-right"></td>



						 </tr>



						 



						  <tr>



							<td>



							  



							  



							</td>



							<td class="text-center"></td>



							<td class="text-center"></td>



							<td class="text-right"></td>



						 </tr>



	



						 <br>



						 <br>



						 <tr>



							<td>



							   <span style="font:13px/22px Arial, Helvetica, sans-serif;" class="text-inverse"><h4>Payment Details</h4></span><br>



							   



							   <b> Service Fee :  </b> $ '. $service .'  <br>



							   <b> Parts Cost :  </b> $ '. $parts_cost .'    <br>



							   <b> Total :  </b> $ '. $total .'   <br> <br>



							   



							   



							</td>



							<td class="text-center"></td>



							<td class="text-center"></td>



							<td class="text-right"></td>



						 </tr>



						 <tr>



							<td>

								<br>

							   <span style="font:13px/22px Arial, Helvetica, sans-serif;" class="text-inverse"><h4> Payment Notes</h4></span><br>



							   <small>Standard terms & conditions apply</small> <br>



							</td>



							<td class="text-center"></td>



							<td class="text-center"></td>



							<td class="text-right"></td>



						 </tr>



					  </tbody>



			</table>



			



			



			<!-- Payments --> 



			



			<table class="theader" width="100%" cellspacing="2" style="margin: 0px; padding: 20px; height: 160px;" cellpadding="10">



			<tbody>



						<tr>



							<td width="35%"  bgcolor="#f0f3f4">



							<small>SUBTOTAL</small> <br>



							<span class="text-inverse">$ '. $total .' </span>



							</td>



							<td width="35%"  bgcolor="#f0f3f4">



							<small>TAX (13%)</small> <br>



							<span class="text-inverse">$ '. $tax .'</span>



							</td>



							<td width="30%"  bgcolor="#2d353c"> <br>



							 <small style="color:#FFFFFF;" >TOTAL</small> <span class="f-w-600" style="color:#FFFFFF;">$ '. $finaltotal .' </span>



							</td>



							



						</tr>



			</tbody>



			</table>



			



			<table class="theader" width="100%" cellspacing="0" style="margin: 0px; padding: 20px; height: 110px;" cellpadding="0">



			<tbody>



						<tr>



							<td   bgcolor="#ffffff">



							



				<h4>  TERMS & CONDITIONS  </h4>



				<br>



				<div style="font:13px/22px Arial, Helvetica, sans-serif;">



<p>							

Tech Source Terms Of Service TECH SOURCE will work on your computer with the best interest of the customers in mind. The customer will be notifies of any additional charges or problems before we proceed with repairs. <br> </p>



<p>	TECH SOURCE is not responsible for parts become defective during the modification or upgrade of computer/ components Software can only be installed with the original software. BURNT OR COPIED software will not be accepted. Defective product returned for repair, may be replaced with similar but not identical part. <br> </p>



<p>	TECH SOURCE is NOT responsible for compatibility of hardware or software purchased by the customer to be installed or outfitted to their system. There is a service fee up to $30.00 for product returned that are found not be defective when testing. This includes hardware or drivers not installed properly. <br> </p>



<p>	There is a minimum service fee of $25.00 that must be paid if fault is diagnosed or not. Any additional hardware or software such as: screws, cables, mounting brackets, disks, CD copies etc, are not provided and may result in additional charged without notice. TECH SOURCE IS NOT A STORAGE FACILITY. <br> </p>



<p>	Therefore, any product (computers, peripherals etc) that is not picked up after 7 business days (from date of work completion) will become the sole property of TECH SOURCE. TECH SOURCE is not responsible for any issues/problems that arise after the Device has left the store. Please Check your Device before you leave. I hereby waive all claims against TECH SOURCE or its Agents for damage of any sort that may occur while my Device or components were in the care of TECH SOURCE or its agents. <br>

</p>

				</div>



				<br>



				



				



				

							



							</td>



						</tr>



			</tbody>



			</table>



			



			



			<table class="theader" width="100%" cellspacing="0" style="margin: 0px; padding: 20px; height: 110px;" cellpadding="0">



			<tbody>



						<tr>



							<td width="40%"  bgcolor="#ffffff">



							Checked By : <br><br><br><br>



							................................



							</td>



							<td width="40%"   bgcolor="#ffffff">



							Customer Signature : <br><br><br><br>



							................................



							</td>



							<td   bgcolor="#ffffff"></td>

						</tr>

			

			

						</tbody>

					

						

						</table> <br><br><br><br><br>

						

						<table style="font:11px/22px Arial, Helvetica, sans-serif;">

						<tr>

						<td width="50%"><i>THANK YOU FOR YOUR BUSINESS</i></td>

						<td width="30%">T:+1 416-757-9111 </td>

						<td width="10%"></td>

						</tr>

						</table>

						

						

			</body>

			</html>'
		);
		$mpdf->Output('myfile.pdf','D');

		}
		
	}else if( $action == "customer" ) {  //vithu
		
		$page = "customer";
		$records = $objCustomer->getCustomers();	

	}else if( $action == "user" ) {  //vithu
		
		$page = "user";
	}else if( $action == "pdf_template" ) {  //vithu
		
		$page = "pdf_template";

	}else if( $action == "template" ) {  //vithu
		
		$page = "template";

	}else {
		
		$page = "404";
		
	}		