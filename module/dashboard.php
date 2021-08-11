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

		// $url = 'pdf_template.php';
		// $html = file_get_contents($url,$data);
		// $mpdf->setBasePath($url);
		// $mpdf->WriteHTML($html);
		// $mpdf->Output('myfile.pdf','D');

		//$url = 'pdf_template.php';
		//$html = file_get_contents($url,$data);
		//$mpdf->setBasePath($url);
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
					}</style>
				<style></style>
				<style type="text/css">.MsgHeaderTable .Object {
						cursor: pointer;
						color: #369;
						text-decoration: none;
						cursor: pointer;
						white-space: nowrap;
					}
			
					.MsgHeaderTable .Object-hover {
						cursor: pointer;
						color: #369;
						text-decoration: underline;
						white-space: nowrap;
					}
			
					.MsgBody {
						background-color: #fdfdfd;
					}
			
					.MsgBody-text {
						color: #333;
						font-family: monospace;
						word-wrap: break-word;
					}
			
					.MsgBody-text, .MsgBody-html {
						padding: 10px;
					}
			
					div.MsgBody, div.MsgBody * {
						font-size: 10pt;
					}
			
					body.MsgBody {
						font-size: 10pt;
					}
			
					.MsgBody .SignatureText {
						color: gray;
					}
			
					.MsgBody .QuotedText0 {
						color: purple;
					}
			
					.MsgBody .QuotedText1 {
						color: green;
					}
			
					.MsgBody .QuotedText2 {
						color: red;
					}
			
					.MsgBody .Object {
						color: #369;
						text-decoration: none;
						cursor: pointer;
					}
			
					.MsgBody .Object-hover {
						color: #369;
						text-decoration: underline;
					}
			
					.MsgBody .Object-active {
						color: darkgreen;
						text-decoration: underline;
					}
			
					.MsgBody .FakeAnchor, .MsgBody a:link, .MsgBody a:visited {
						color: #369;
						text-decoration: none;
						cursor: pointer;
					}
			
					.MsgBody a:hover {
						color: #369;
						text-decoration: underline;
					}
			
					.MsgBody a:active {
						color: darkgreen;
						text-decoration: underline;
					}
			
					.MsgBody .POObject {
						color: blue;
					}
			
					.MsgBody .POObjectApproved {
						color: green;
					}
			
					.MsgBody .POObjectRejected {
						color: red;
					}
			
					.MsgBody .zimbraHide {
						display: none;
					}
			
					.MsgBody-html pre, .MsgBody-html pre * {
						white-space: pre-wrap;
						word-wrap: break-word !important;
						white-space: pre-wrap;
						white-space: pre-line;
					}
			
					.MsgBody-html tt, .MsgBody-html tt * {
						font-family: monospace;
						white-space: pre-wrap;
						word-wrap: break-word !important;
						white-space: pre-wrap;
						white-space: pre-line;
					}
			
					.MsgBody .ZmSearchResult {
						background-color: #FFFEC4;
					}
					img.mainlogo {
		max-width: 80% !important;
		width: 50%;
	}
	
	small {
		display: block;
		font-size: 13px;
		padding-bottom: 5px;
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
							<td width="30%" ><img class="mainlogo" src="logo.png"> </td>
							<td width="50%" class="callh2">
							
	<small>Got Questions ? Call us</small>
	<h2>+1 416-757-9111</h2>
	Email : support@techsourcescarborough.com
							</td>
							<td width="10%"></td>
							<td width="10%"></td>
						</tr>
			</tbody>
			</table>
			
			
			<table class="theader" width="100%" cellspacing="0" style="margin: 0px; padding: 20px; height: auto;" cellpadding="0" bgcolor="#f0f3f4">
			<tbody>
						<tr>
							<td width="30%" style="padding:0px 0 0px;" >
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
							
					<small>to</small>
				   <address style="font:13px/22px Arial, Helvetica, sans-serif;" class="m-t-5 m-b-5">
					  <strong class="text-inverse">'. $results['cus_name'] .'</strong><br>
					  '. $results['address_line1'] .'<br>
					  '. $results['city'] .', '. $results['postal_code'] .'<br>
					  Phone: '. $results['cus_phone1'] .', '. $results['cus_phone2'] .'<br>
					  Fax: '. $results['land_line'] .'
				   </address>
							
							</td>
							<td width="40%" style="text-align:right;">
							
					 <small style="font:13px/22px Arial, Helvetica, sans-serif;">Printed on : </small>
				   <div style="font:13px/22px Arial, Helvetica, sans-serif;" class="date text-inverse m-t-5">August 3,2012</div><br>
				   <div style="font:13px/22px Arial, Helvetica, sans-serif;" class="invoice-detail">
					  Record Number : #'. $results['record_id'] .'<br>
					  Services Type :  '. $results['type'] .'
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
								<b> Product Condition :  </b> '. $results['scratched'] .'   <br>
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
							   
							   Service Fee : '. $results['service_fee'] .'  <br>
							   Parts Cost : '. $results['parts_cost'] .'    <br>
							   Total :'. $results['total'] .'   <br> <br>
							   
							   
							</td>
							<td class="text-center"></td>
							<td class="text-center"></td>
							<td class="text-right"></td>
						 </tr>
						 <tr>
							<td>
							   <span class="text-inverse">Payment Notes</span><br>
							   <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id sagittis arcu.</small> <br>
							</td>
							<td class="text-center"></td>
							<td class="text-center"></td>
							<td class="text-right"></td>
						 </tr>
					  </tbody>
			</table>
			
			
			<!-- Payments --> 
			
			<table class="theader" width="100%" cellspacing="0" style="margin: 0px; padding: 20px; height: 110px;" cellpadding="0">
			<tbody>
						<tr>
							<td width="35%"  bgcolor="#f0f3f4">
							<small>SUBTOTAL</small>
							<span class="text-inverse">'. $results['total'] .' </span>
							</td>
							<td width="35%"  bgcolor="#f0f3f4">
							<small>TAX (13%)</small>
							<span class="text-inverse">$10.5</span>
							</td>
							<td width="30%"  bgcolor="#2d353c">
							 <small style="color:#FFFFFF;" >TOTAL</small> <span class="f-w-600" style="color:#FFFFFF;">'. $results['total'] .' </span>
							</td>
							
						</tr>
			</tbody>
			</table>
			
			<table class="theader" width="100%" cellspacing="0" style="margin: 0px; padding: 20px; height: 110px;" cellpadding="0">
			<tbody>
						<tr>
							<td   bgcolor="#ffffff">
							
				<h4> NOTES  </h4>
				<br>
				<div style="font:13px/22px Arial, Helvetica, sans-serif;">
							
							* Make all cheques payable to [Your Company Name]<br>
				* Payment is due within 30 days<br>
				* If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
				</div>
				<br>
				<br>
				
				<h4> TERMS & CONDITIONS  </h4>
				<br>
				<div style="font:13px/22px Arial, Helvetica, sans-serif;">
				<p>
				O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro. Este texto não só sobreviveu 5 séculos, mas também o salto para a tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 60 com a disponibilização das folhas de Letraset, que continham passagens com Lorem Ipsum, e mais recentemente com os programas de publicação como o 
				Aldus PageMaker que incluem versões do Lorem Ipsum.
				</p>
				<br>
				
				<p>
				O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro. Este texto não só sobreviveu 5 séculos, mas também o salto para a tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 60 com a disponibilização das folhas de Letraset, que continham passagens com Lorem Ipsum, e mais recentemente com os programas de publicação como o 
				Aldus PageMaker que incluem versões do Lorem Ipsum.
				</p>
				<br>
				<br>

				
				<h4> TERMS & CONDITIONS  </h4>
				<br>
				
				<p>
				O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro. Este texto não só sobreviveu 5 séculos, mas também o salto para a tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 60 com a disponibilização das folhas de Letraset, que continham passagens com Lorem Ipsum, e mais recentemente com os programas de publicação como o 
				Aldus PageMaker que incluem versões do Lorem Ipsum.
				</p>
				<br>
				
				<p>
				O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro. Este texto não só sobreviveu 5 séculos, mas também o salto para a tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 60 com a disponibilização das folhas de Letraset, que continham passagens com Lorem Ipsum, e mais recentemente com os programas de publicação como o 
				Aldus PageMaker que incluem versões do Lorem Ipsum.
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