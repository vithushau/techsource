<div class="content">
        <div class="container-fluid">
          <div class="row">
		  <?php if( ! empty ( $error_message ) || ! empty ( $success_message ) ) { ?>
				<div class="soulmateads-alert  alert alert-<?php echo ( ! empty ( $success_message ) )? 'success' : 'danger'; ?>  alert-dismissible fade show">
				<strong><?php echo ( ! empty ( $success_message ) )? 'Success!' : 'Warning'; ?> </strong> <?php echo $success_message .  $error_message; ?> </div>
			<?php } ?>
            <div class="col-md-12">
              <div class="card">	
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Record</h4>
                  <p class="card-category">Customer Product Details</p>
                </div>
                <div class="card-body">
                  <form method="post">
				  
				  <div class="row">
            <div class="col-md-3"><p>Record ID </p><input disabled type="text" class="form-control" value="<?php echo $results['record_id']; ?>"> </div>
			<div class="col-md-3"><p>Date : </p><input type="date"  class="datepicker" value="<?php echo $results['date']; ?>" required name="date" data-date-format="mm/dd/yyyy"> </div>
			<div class="col-md-3"><p>Returned Date : </p><input type="date" class="datepicker"  value="<?php echo $results['returned_date']; ?>" required name="returned_date" data-date-format="mm/dd/yyyy"></div>
			<div class="col-md-3"><p>Product Status : </p>   
				<select required name="record_status" id="record_status">
  						<option value="">-- Select a Status -- </option>
  						<option value="Outforrepair"  <?php if($results['record_status'] == "Outforrepair") { ?> selected <?php } ?>>Out for repair</option>
  						<option value="Waitingforparts" <?php if($results['record_status'] == "Waitingforparts") { ?> selected <?php } ?>>Waiting for parts</option>
  						<option value="Readyforpickup" <?php if($results['record_status'] == "Readyforpickup") { ?> selected <?php } ?>>Ready for pick up </option>
   						<option value="Completed" <?php if($results['record_status'] == "Completed") { ?> selected <?php } ?>>Completed </option>
					</select>
				</div>
					</div>
				  
				  <div class="row-title"><h2>Customer Details</h2></div>
				  
                    <div class="row">
					
					
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Customer Name</label>
                          <input type="text" value="<?php echo $results['cus_name']; ?>" required name="cus_name" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" value="<?php echo $results['cus_email']; ?>" required name="cus_email" class="form-control">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone Number</label>
                          <input type="text" value="<?php echo $results['cus_phone1']; ?>" required name="cus_phone1" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone Number 2</label>
                          <input type="text" value="<?php echo $results['cus_phone2']; ?>" name="cus_phone2" class="form-control">
                        </div>
                      </div>
					  <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Landline</label>
                          <input type="text" value="<?php echo $results['land_line']; ?>" name="land_line" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adress</label>
                          <input type="text" value="<?php echo $results['address_line1']; ?>" name="address_line1" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" value="<?php echo $results['city']; ?>" name="city" class="form-control">
                        </div>
                      </div>
                     
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Postal Code</label>
                          <input type="text" value="<?php echo $results['postal_code']; ?>" name="postal_code" class="form-control">
                        </div>
                      </div>
                    </div>
					
					<div class="row-title"><h2>Product Details</h2></div>

					 <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Product Type</label>
                          <select required name="pro_type_id" id="pro_type_id">
							  <option value="">-- Select a Type -- </option>
							  <?php foreach($pro_types as $row) {  ?>
							  <option value="<?php echo $row['protype_id'] ?>" <?php if($results['pro_type_id'] ==  $row['protype_id']) { ?> selected <?php } ?>><?php echo $row['name'] ?></option>
							  <?php } ?>
							</select>
						</div>
					 </div>
					  <div class="col-md-3">
						 <div class="form-group">
							 <label class="bmd-label-floating">Brand</label>
							 <select required name="pro_band_id" id="pro_band_id">
							  	<option value="">-- Select a Brand -- </option>
								  <?php foreach($pro_brands as $row) {  ?>
							  	<option value="<?php echo $row['proband_id'] ?>" <?php if($results['pro_band_id'] ==$row['proband_id']) { ?> selected <?php } ?>><?php echo $row['name'] ?></option>	
								  <?php } ?>			  
							</select>
                        </div>
                      </div>
					  <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Model</label>
                          <input required value="<?php echo $results['model']; ?>" type="text" name="model" class="form-control">
                        </div>
                      </div>
                    </div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							  <label class="bmd-label-floating">Others</label>
							  <input  value="<?php echo $results['others']; ?>" type="text" name="others" class="form-control">
							</div>
						 </div>
						
					</div>
					
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							  <label class="bmd-label-floating">Serial / IMEI No.</label>
							  <input  type="text" value="<?php echo $results['serial_no']; ?>" name="serial_no" class="form-control">
							</div>
						 </div>
						 <div class="col-md-6">
							<div class="form-group">
							  <label class="bmd-label-floating">Warranty Details</label>
							  <input  type="text" value="<?php echo $results['warranty']; ?>" name="warranty" class="form-control">
							</div>
						 </div>
					</div>
					
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							  <label class="bmd-label-floating">Accessories delivered</label>
							  <textarea  id="accessories" name="accessories" rows="4" cols="50"><?php echo $results['accessories']; ?></textarea>
							</div>
						 </div>
						 <div class="col-md-6">
							<div class="form-group">
							  <label class="bmd-label-floating">General Statement </label>
							  <textarea  id="general_statement" name="general_statement" rows="4" cols="50"><?php echo $results['general_statement']; ?></textarea>
							</div>
						 </div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							  <label class="bmd-label-floating">Non Compliance</label>

							  <textarea  id="non_compliance" name="non_compliance" rows="4" cols="50"><?php echo $results['non_compliance']; ?></textarea>
							</div>
						 </div>
						
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="row-title"><h2>Product Condition</h2></div>
								<div class="form-group">
							  		<h4>Scratched</h4>
							  		<div class="row">
                                          <?php 
                                            $scratched = explode(',', $results['scratched']);
                                          ?>
								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" <?php if(in_array("topover", $scratched)) { ?> checked <?php } ?> value="topover" name="scratch[]">Top Cover</label>
								  </div>
								  
								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" <?php if(in_array("bottomcover", $scratched)) { ?> checked <?php } ?> value="bottomcover" name="scratch[]">Bottom cover</label>
								  </div>
								  
								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" <?php if(in_array("screen", $scratched)) { ?> checked <?php } ?> value="screen" name="scratch[]">Screen</label>
								  </div>
								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" <?php if(in_array("keyboardandbody", $scratched)) { ?> checked <?php } ?> value="keyboardandbody" name="scratch[]"> Keyboard & Body</label>
								  </div>
								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" <?php if(in_array("ports", $scratched)) { ?> checked <?php } ?> value="ports" name="scratch[]"> Ports</label>
								  </div>
								  
								</div>
								
								
								
								
								  <h4>Cracked</h4>
								
								 <div class="row">
                                 <?php 
                                            $cracked = explode(',', $results['cracked']);
                                          ?>
							

								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" <?php if(in_array("topover", $cracked)) { ?> checked <?php } ?> value="topover" name="crack[]">Top Cover</label>
								  </div>
								  
								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" <?php if(in_array("bottomcover", $cracked)) { ?> checked <?php } ?> value="bottomcover" name="crack[]">Bottom cover</label>
								  </div>
								  
								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" <?php if(in_array("screen", $cracked)) { ?> checked <?php } ?> value="screen" name="crack[]">Screen</label>
								  </div>
								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" <?php if(in_array("keyboardandbody", $cracked)) { ?> checked <?php } ?> value="keyboardandbody" name="crack[]"> Keyboard & Body</label>
								  </div>
								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" <?php if(in_array("ports", $cracked)) { ?> checked <?php } ?> value="ports" name="crack[]"> Ports</label>
								  </div>
								  
								</div>
								
								<h4>Damaged</h4>
								
								 <div class="row">
							  
                                 <?php 
                                            $damaged = explode(',', $results['damaged']);
                                          ?>

								 <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" <?php if(in_array("topover", $damaged)) { ?> checked <?php } ?> value="topover" name="damage[]">Top Cover</label>
								  </div>
								  
								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" <?php if(in_array("bottomcover", $damaged)) { ?> checked <?php } ?> value="bottomcover" name="damage[]">Bottom cover</label>
								  </div>
								  
								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" <?php if(in_array("screen", $damaged)) { ?> checked <?php } ?> value="screen" name="damage[]">Screen</label>
								  </div>
								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" <?php if(in_array("keyboardandbody", $damaged)) { ?> checked <?php } ?> value="keyboardandbody" name="damage[]"> Keyboard & Body</label>
								  </div>
								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" <?php if(in_array("ports", $damaged)) { ?> checked <?php } ?> value="ports" name="damage[]"> Ports</label>
								  </div>
								  
								</div>
								
								<h4>Others</h4>
								
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
											  <label class="bmd-label-floating">Other Notes</label>
											  <input type="text" class="form-control">
											  <textarea id="condition_others" name="condition_others" rows="4" cols="50"><?php echo $results['condition_others']; ?></textarea>
											</div>
										 </div>
										
									</div>
								
							  
							</div>
						 </div>
						
					</div>
					
					<div class="row-title"><h2>Backup Details</h2></div>
					<?php 
                                            $backup = explode(',', $results['back_type']);
                                          ?>
					<div class="row">

								  <div class="col-sm-3">
									<label class="checkbox-inline">
									  <input type="checkbox" <?php if(in_array("images", $backup)) { ?> checked <?php } ?> value="images" name="backup[]">Images</label>
								  </div>
								  
								  <div class="col-sm-3">
									<label class="checkbox-inline">
									  <input type="checkbox" <?php if(in_array("files", $backup)) { ?> checked <?php } ?> value="files" name="backup[]">Files / Documents </label>
								  </div>
								  
								  <div class="col-sm-3">
									<label class="checkbox-inline">
									  <input type="checkbox" <?php if(in_array("media", $backup)) { ?> checked <?php } ?> value="media" name="backup[]">Media</label>
								  </div>

								  
					</div>
					

					<div class="row-title"><h2>Repair / Parts Details</h2></div>
					
					
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
							  <label class="bmd-label-floating">Repair Type</label>
							  <select required name="repair_type" id="repair_type">
							  <option value="">-- Select a Type -- </option>
							  <option value="Motherboard" <?php if($results['type'] == "Motherboard") { ?> selected <?php } ?>>Motherboard</option>
							  <option value="ChargingPort" <?php if($results['type'] == "ChargingPort") { ?> selected <?php } ?>>Charging Port</option>
							  <option value="Screen" <?php if($results['type'] == "Screen") { ?> selected <?php } ?>>Screen </option>
							   <option value="Hinge" <?php if($results['type'] == "Hinge") { ?> selected <?php } ?>>Hinge </option>
							   <option value="Software" <?php if($results['type'] == "Software") { ?> selected <?php } ?>>Software </option>
							   <option value="PowerSupply" <?php if($results['type'] == "PowerSupply") { ?> selected <?php } ?>>Power Supply </option>
							   <option value="Other" <?php if($results['type'] == "Other") { ?> selected <?php } ?>>Other </option>
							</select>
							</div>
						 </div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							  <label class="bmd-label-floating">Other</label>
							  <input type="text" value="<?php echo $results['repair_other']; ?>" name="repair_other" class="form-control">
							</div>
						 </div>
						
					</div>
					
					
						
					<div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Addional Information / Parts</label>
 <textarea id="additional_information" name="additional_information" rows="4" cols="50"><?php echo $results['additional_information']; ?></textarea>
                        </div>
                      </div>
                    </div>
						
					<div class="row-title"><h2>Payment Details</h2></div>
					
					<div class="row">
					<div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Service Fee</label>
                          <input required type="text" id="service_fee" value="<?php echo $results['service_fee']; ?>" name="service_fee" class="form-control">
                        </div>
                      </div>
					  <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Parts Cost</label>
                          <input required type="text" id="parts_cost" value="<?php echo $results['parts_cost']; ?>" name="parts_cost" class="form-control">
                        </div>
                      </div>
					  
					 
					  
					  
					  
					</div>
					
					<div class="row">
					<div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Total</label>
                          <input disabled type="text" value="<?php echo $results['total']; ?>" name="total" id="total" class="form-control">
                        </div>
                      </div>
					  <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Paid</label>
                          <input required type="text" value="<?php echo $results['paid']; ?>" name="paid" id="paid" class="form-control">
                        </div>
                      </div>
					  <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Balance Need to Pay</label>
                          <input disabled type="text" name="balance" id="balance" class="form-control">
                        </div>
                      </div>
					  <div class="col-md-1">
                        <div class="form-group">
						<input type="button" name="clickbtn" value="Calculate" onclick="add_number()">
                        </div>
                      </div>
					  
					  
					  
					  
					</div>
					
					
					 					
                   
                    <button type="submit" name="edit_record" class="btn btn-primary pull-right">Edit Record</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>


	  <script>
		  function add_number() {
			var first_number = parseInt(document.getElementById("service_fee").value);
            var second_number = parseInt(document.getElementById("parts_cost").value);
			var paid = parseInt(document.getElementById("paid").value);
            var result = first_number + second_number;
			var balance = result - paid;

            document.getElementById("total").value = result;
			document.getElementById("balance").value = balance;
		}
		  </script>
