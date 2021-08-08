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
                  <h4 class="card-title ">Customers</h4>
                  <p class="card-category"> </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                         Customer Name
                        </th>
                        <th>
                          Customer Email
                        </th>
                        <th>
                          Phone Number
                        </th>
                        <th>
                          City
                        </th>
                      </thead>
                      <tbody>
                      <?php foreach($records as $row) {  ?>
                        <tr>
                            <td><?php echo $row['cus_name'] ?></td>
                            <td><?php echo $row['cus_email'] ?></td>
                            <td><?php echo $row['cus_phone1'] ?></td>
                            <td><?php echo $row['city'] ?></td>
                          </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>