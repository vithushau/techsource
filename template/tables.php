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
                  <h4 class="card-title ">Records</h4>
                  <p class="card-category"> </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Record ID
                        </th>
                        <th>
                          Customer Name
                        </th>
                        <th>
                          Date
                        </th>
                        <th>
                          Returned Date
                        </th>
                        <th>
                          Actions
                        </th>
                      </thead>
                      <tbody>
                      <?php foreach($records as $row) {  ?>
                        <tr>
                            <td><?php echo $row['record_id'] ?></td>
                            <td><?php echo $row['cus_name'] ?></td>
                            <td><?php echo $row['date'] ?></td>
                            <td><?php echo $row['returned_date'] ?></td>
                            <td style="white-space: nowrap;">
                                    <a href="<?php echo BASE_URL . 'edit_record?id='; ?><?php echo $row['record_id'] ?>"><button style="display: inline;float: left;" type="button" class="btn btn-outline-secondary">Edit</button></a>
                                    <!-- <a href="<?php echo BASE_URL . 'delete_record?id='; ?><?php echo $row['record_id'] ?>"><button onclick="return confirm('Do you really want to delete?')" type="button" class="btn btn-outline-danger">Delete</button></a> -->
                                    <form method="post">
                                    <input type="hidden" value="<?php echo $row['record_id'] ?>" name="record_id">  
                                    <button type="submit" style="display: inline; background: red !important;" name="make_pdf" class="btn btn-outline-danger">Print PDF</button>
                                  </form>
                            </td>
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