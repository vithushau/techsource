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
                  <h4 class="card-title">Add New Record</h4>
                  <p class="card-category">Customer Product Details</p>
                </div>
                <div class="card-body">
                  <form method="post">
				  
				  <div class="row">
            <!-- <div class="col-md-3"><p>Record ID </p><input type="text" class="form-control" value=""> </div> -->
			<div class="col-md-3"><p>Date : </p><input type="date"  class="datepicker" required name="date" data-date-format="mm/dd/yyyy"> </div>
			<div class="col-md-3"><p>Returned Date : </p><input type="date" class="datepicker" required name="returned_date" data-date-format="mm/dd/yyyy"></div>
			<div class="col-md-3"><p>Product Status : </p>   
				<select required name="record_status" id="record_status">
  						<option value="">-- Select a Status -- </option>
  						<option value="Outforrepair">Out for repair</option>
  						<option value="Waitingforparts">Waiting for parts</option>
  						<option value="Readyforpickup">Ready for pick up </option>
   						<option value="Completed">Completed </option>
					</select>
				</div>
					</div>
				  
				  <div class="row-title"><h2>Customer Details</h2></div>
				  	<div class="row">
						<div class="col-sm-6">
						<label class="checkbox-inline">
						<input type="radio" id="existing" value="existing" name="check_status" >Select Existing Customer
						</label>
						</div>

						<div class="col-sm-6">
						<label class="checkbox-inline">
						<input type="radio" id="addNew" value="addNew" checked name="check_status" >Add New Customer
						</label>
						</div>
				  	</div>
				  
				  	<div id="show_add_new">
				  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Customer Name</label>
                          <input type="text" name="cus_name" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" name="cus_email" class="form-control">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone Number</label>
                          <input type="text" name="cus_phone1" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone Number 2</label>
                          <input type="text" name="cus_phone2" class="form-control">
                        </div>
                      </div>
					  <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Landline</label>
                          <input type="text" name="land_line" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adress</label>
                          <input type="text" name="address_line1" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" name="city" class="form-control">
                        </div>
                      </div>
                     
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Postal Code</label>
                          <input type="text" name="postal_code" class="form-control">
                        </div>
                      </div>
                    </div>
				  </div>

				  <div id="show_existing" style="display: none;">
				  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <select name="customer_id" id="customer_id">
							  <option value="">-- Select a Type -- </option>
							  <?php foreach($customers as $row) {  ?>
							  <option value="<?php echo $row['cus_id'] ?>"><?php echo $row['cus_name'] ?></option>
							  <?php } ?>
							</select>
						</div>
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
							  <option value="<?php echo $row['protype_id'] ?>"><?php echo $row['name'] ?></option>
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
							  	<option value="<?php echo $row['proband_id'] ?>"><?php echo $row['name'] ?></option>	
								  <?php } ?>			  
							</select>
                        </div>
                      </div>
					  <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Model</label>
                          <input required type="text" name="model" class="form-control">
                        </div>
                      </div>
                    </div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							  <label class="bmd-label-floating">Others</label>
							  <input type="text" name="others" class="form-control">
							</div>
						 </div>
						
					</div>
					
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							  <label class="bmd-label-floating">Serial / IMEI No.</label>
							  <input type="text" name="serial_no" class="form-control">
							</div>
						 </div>
						 <div class="col-md-6">
							<div class="form-group">
							  <label class="bmd-label-floating">Warranty Details</label>
							  <input type="text" name="warranty" class="form-control">
							</div>
						 </div>
					</div>
					
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							  <label class="bmd-label-floating">Accessories delivered</label>
							  <textarea id="accessories" name="accessories" rows="4" cols="50"></textarea>
							</div>
						 </div>
						 <div class="col-md-6">
							<div class="form-group">
							  <label class="bmd-label-floating">General Statement </label>
							  <textarea id="general_statement" name="general_statement" rows="4" cols="50"></textarea>
							</div>
						 </div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							  <label class="bmd-label-floating">Non Compliance</label>

							  <textarea id="non_compliance" name="non_compliance" rows="4" cols="50"></textarea>
							</div>
						 </div>
						
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="row-title"><h2>Product Condition</h2></div>
								<div class="form-group">
							  		<h4>Scratched</h4>
							  		<div class="row checkbox-group required">
								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" value="topover" name="scratch[]">Top Cover</label>
								  </div>
								  
								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" value="bottomcover" name="scratch[]">Bottom cover</label>
								  </div>
								  
								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" value="screen" name="scratch[]">Screen</label>
								  </div>
								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" value="keyboardandbody" name="scratch[]"> Keyboard & Body</label>
								  </div>
								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" value="ports" name="scratch[]"> Ports</label>
								  </div>
								  
								</div>
								
								
								
								
								  <h4>Cracked</h4>
								
								 <div class="row checkbox-group required">
							  
							

								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" value="topover" name="crack[]">Top Cover</label>
								  </div>
								  
								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" value="bottomcover" name="crack[]">Bottom cover</label>
								  </div>
								  
								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" value="screen" name="crack[]">Screen</label>
								  </div>
								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" value="keyboardandbody" name="crack[]"> Keyboard & Body</label>
								  </div>
								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" value="ports" name="crack[]"> Ports</label>
								  </div>
								  
								</div>
								
								<h4>Damaged</h4>
								
								 <div class="row checkbox-group required">
							  
							

								 <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" value="topover" name="damage[]">Top Cover</label>
								  </div>
								  
								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" value="bottomcover" name="damage[]">Bottom cover</label>
								  </div>
								  
								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" value="screen" name="damage[]">Screen</label>
								  </div>
								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" value="keyboardandbody" name="damage[]"> Keyboard & Body</label>
								  </div>
								  <div class="col-sm-2">
									<label class="checkbox-inline">
									  <input type="checkbox" value="ports" name="damage[]"> Ports</label>
								  </div>
								  
								</div>
								
								<h4>Others</h4>
								
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
											  <label class="bmd-label-floating">Other Notes</label>
											  <input type="text" class="form-control">
											  <textarea id="condition_others" name="condition_others" rows="4" cols="50"></textarea>
											</div>
										 </div>
										
									</div>
								
							  
							</div>
						 </div>
						
					</div>
					
					<div class="row-title"><h2>Backup Details</h2></div>
					
					<div class="row checkbox-group required">

								  <div class="col-sm-3">
									<label class="checkbox-inline">
									  <input type="checkbox" value="images" name="backup[]">Images</label>
								  </div>
								  
								  <div class="col-sm-3">
									<label class="checkbox-inline">
									  <input type="checkbox" value="files" name="backup[]">Files / Documents </label>
								  </div>
								  
								  <div class="col-sm-3">
									<label class="checkbox-inline">
									  <input type="checkbox" value="media" name="backup[]">Media</label>
								  </div>

								  
					</div>
					

					<div class="row-title"><h2>Repair / Parts Details</h2></div>
					
					
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
							  <label class="bmd-label-floating">Repair Type</label>
							  <select required name="repair_type" id="repair_type">
							  <option value="">-- Select a Type -- </option>
							  <option value="Motherboard">Motherboard</option>
							  <option value="ChargingPort">Charging Port</option>
							  <option value="Screen">Screen </option>
							   <option value="Hinge">Hinge </option>
							   <option value="Software">Software </option>
							   <option value="Power Supply">Power Supply </option>
							   <option value="Other">Other </option>
							</select>
							</div>
						 </div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							  <label class="bmd-label-floating">Other</label>
							  <input type="text" name="repair_other" class="form-control">
							</div>
						 </div>
						
					</div>
					
					
						
					<div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Addional Information / Parts</label>
 <textarea id="additional_information" name="additional_information" rows="4" cols="50"></textarea>
                        </div>
                      </div>
                    </div>
						
					<div class="row-title"><h2>Payment Details</h2></div>
					
					<div class="row">
					<div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Service Fee</label>
                          <input required type="text" name="service_fee" class="form-control">
                        </div>
                      </div>
					  <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Parts Cost</label>
                          <input required type="text" name="parts_cost" class="form-control">
                        </div>
                      </div>
					  
					 
					  
					  
					  
					</div>
					
					<div class="row">
					<div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Total</label>
                          <input required type="text" name="total" class="form-control">
                        </div>
                      </div>
					  <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Paid</label>
                          <input required type="text" name="paid" class="form-control">
                        </div>
                      </div>
					  
					  
					  
					  
					  
					</div>
					
					
					 					
                   
                    <button type="submit" name="add_record" id="add_record" class="btn btn-primary pull-right">Add Record</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>

	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	  <script>
        $(function() {

            $('#existing').on('change', function(){

                if ($(this).val() === 'existing' ) {
                    $("#show_add_new").css("display",'none');
					$("#show_existing").css("display",'');
                    //alert(this)
                }
            });
            $('#addNew').on('change', function(){

                if ($(this).val() === 'addNew' ) {
                    $("#show_existing").css("display",'none');
					$("#show_add_new").css("display",'');
                    //alert(this)
                }
            })

        });

		
		function validate() {
		if($('div.checkbox-group.required :checkbox:checked').length > 0){
			//alert('Select Checkbox');
		}else{
			//alert('Select Checkbox');
		}
		}

		// $("#add_record").click(function() {
    	// 	//validate();
		// });
    </script>
