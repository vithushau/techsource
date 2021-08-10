<div class="content">

        <div class="container-fluid">

          <div class="row">

            <div class="col-xl-4 col-lg-12">

              <div class="card card-chart">

                <div class="card-header card-header-success">

                

                </div>

                <div class="card-body">

                  <h4 class="card-title">Daily Records</h4>

                  <p class="card-category">

                    <span class="text-success"><i class="fa fa-long-arrow-up"></i> 12 </span> New repair records.</p>

                </div>

                <div class="card-footer">

                  <div class="stats">

                    <i class="material-icons">access_time</i> updated 4 minutes ago

                  </div>

                </div>

              </div>

            </div>

            <div class="col-xl-4 col-lg-12">

              <div class="card card-chart">

                <div class="card-header card-header-warning">

                 

                </div>

                <div class="card-body">

                  <h4 class="card-title">Pending Works</h4>

                  <p class="card-category">Pending Repair Status</p>

                </div>

                <div class="card-footer">

                  <div class="stats">

                    <i class="material-icons">access_time</i> campaign sent 2 days ago

                  </div>

                </div>

              </div>

            </div>

            <div class="col-xl-4 col-lg-12">

              <div class="card card-chart">

                <div class="card-header card-header-danger">

                  

                </div>

                <div class="card-body">

                  <h4 class="card-title">Completed Tasks</h4>

                  <p class="card-category">Closed Records</p>

                </div>

                <div class="card-footer">

                  <div class="stats">

                    <i class="material-icons">access_time</i> campaign sent 2 days ago

                  </div>

                </div>

              </div>

            </div>

          </div>

          <!-- <div class="row">

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

              <div class="card card-stats">

                <div class="card-header card-header-warning card-header-icon">

                  <div class="card-icon">

                    <i class="material-icons">content_copy</i>

                  </div>

                  <p class="card-category">Used Space</p>

                  <h3 class="card-title">49/50

                    <small>GB</small>

                  </h3>

                </div>

                <div class="card-footer">

                  <div class="stats">

                    <i class="material-icons text-warning">warning</i>

                    <a href="#pablo" class="warning-link">Get More Space...</a>

                  </div>

                </div>

              </div>

            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

              <div class="card card-stats">

                <div class="card-header card-header-success card-header-icon">

                  <div class="card-icon">

                    <i class="material-icons">store</i>

                  </div>

                  <p class="card-category">Revenue</p>

                  <h3 class="card-title">$34,245</h3>

                </div>

                <div class="card-footer">

                  <div class="stats">

                    <i class="material-icons">date_range</i> Last 24 Hours

                  </div>

                </div>

              </div>

            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

              <div class="card card-stats">

                <div class="card-header card-header-danger card-header-icon">

                  <div class="card-icon">

                    <i class="material-icons">info_outline</i>

                  </div>

                  <p class="card-category">Fixed Issues</p>

                  <h3 class="card-title">75</h3>

                </div>

                <div class="card-footer">

                  <div class="stats">

                    <i class="material-icons">local_offer</i> Tracked from Github

                  </div>

                </div>

              </div>

            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

              <div class="card card-stats">

                <div class="card-header card-header-info card-header-icon">

                  <div class="card-icon">

                    <i class="fa fa-twitter"></i>

                  </div>

                  <p class="card-category">Followers</p>

                  <h3 class="card-title">+245</h3>

                </div>

                <div class="card-footer">

                  <div class="stats">

                    <i class="material-icons">update</i> Just Updated

                  </div>

                </div>

              </div>

            </div>

          </div> -->

          <div class="row">

            <div class="col-lg-12 col-md-12">

              <div class="card">

                <div class="card-header card-header-primary">

                  <h4 class="card-title">Recent Records</h4>

                  <p class="card-category"></p>

                </div>

                <div class="card-body table-responsive">

                  <table class="table table-hover">

                    <thead class="text-warning">

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

                            <td style="text-align: center;">

                                    <!-- <a href="#"><button type="button" class="btn btn-prmary">Edit</button></a> -->

                                    <!-- <a href="#"><button onclick="return confirm('Do you really want to delete?')" type="button" class="btn btn-prmary">Delete</button></a> -->

                                    <!-- <a href="#"><button type="button" class="btn btn-primary">Print PDF</button></a> -->
                                    <a href="<?php echo BASE_URL . 'edit_record?id='; ?><?php echo $row['record_id'] ?>"><button style="display: inline-block;" type="button" class="btn btn-outline-secondary">Edit</button></a>
                                
                                  </form>

                            </td>

                          </tr>

                      <?php } ?>

                    </tbody>

                  </table>

                </div>

              </div>

            </div>

            <!-- <div class="col-lg-6 col-md-12">

              <div class="card">

                <div class="card-header card-header-tabs card-header-warning">

                  <div class="nav-tabs-navigation">

                    <div class="nav-tabs-wrapper">

                      <span class="nav-tabs-title">Tasks:</span>

                      <ul class="nav nav-tabs" data-tabs="tabs">

                        <li class="nav-item">

                          <a class="nav-link active" href="#profile" data-toggle="tab">

                            <i class="material-icons">bug_report</i> Bugs

                            <div class="ripple-container"></div>

                          </a>

                        </li>

                        <li class="nav-item">

                          <a class="nav-link" href="#messages" data-toggle="tab">

                            <i class="material-icons">code</i> Website

                            <div class="ripple-container"></div>

                          </a>

                        </li>

                        <li class="nav-item">

                          <a class="nav-link" href="#settings" data-toggle="tab">

                            <i class="material-icons">cloud</i> Server

                            <div class="ripple-container"></div>

                          </a>

                        </li>

                      </ul>

                    </div>

                  </div>

                </div>

                <div class="card-body">

                  <div class="tab-content">

                    <div class="tab-pane active" id="profile">

                      <table class="table">

                        <tbody>

                          <tr>

                            <td>

                              <div class="form-check">

                                <label class="form-check-label">

                                  <input class="form-check-input" type="checkbox" value="" checked>

                                  <span class="form-check-sign">

                                    <span class="check"></span>

                                  </span>

                                </label>

                              </div>

                            </td>

                            <td>Sign contract for "What are conference organizers afraid of?"</td>

                            <td class="td-actions text-right">

                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-white btn-link btn-sm">

                                <i class="material-icons">edit</i>

                              </button>

                              <button type="button" rel="tooltip" title="Remove" class="btn btn-white btn-link btn-sm">

                                <i class="material-icons">close</i>

                              </button>

                            </td>

                          </tr>

                          <tr>

                            <td>

                              <div class="form-check">

                                <label class="form-check-label">

                                  <input class="form-check-input" type="checkbox" value="">

                                  <span class="form-check-sign">

                                    <span class="check"></span>

                                  </span>

                                </label>

                              </div>

                            </td>

                            <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>

                            <td class="td-actions text-right">

                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-white btn-link btn-sm">

                                <i class="material-icons">edit</i>

                              </button>

                              <button type="button" rel="tooltip" title="Remove" class="btn btn-white btn-link btn-sm">

                                <i class="material-icons">close</i>

                              </button>

                            </td>

                          </tr>

                          <tr>

                            <td>

                              <div class="form-check">

                                <label class="form-check-label">

                                  <input class="form-check-input" type="checkbox" value="">

                                  <span class="form-check-sign">

                                    <span class="check"></span>

                                  </span>

                                </label>

                              </div>

                            </td>

                            <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit

                            </td>

                            <td class="td-actions text-right">

                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-white btn-link btn-sm">

                                <i class="material-icons">edit</i>

                              </button>

                              <button type="button" rel="tooltip" title="Remove" class="btn btn-white btn-link btn-sm">

                                <i class="material-icons">close</i>

                              </button>

                            </td>

                          </tr>

                          <tr>

                            <td>

                              <div class="form-check">

                                <label class="form-check-label">

                                  <input class="form-check-input" type="checkbox" value="" checked>

                                  <span class="form-check-sign">

                                    <span class="check"></span>

                                  </span>

                                </label>

                              </div>

                            </td>

                            <td>Create 4 Invisible User Experiences you Never Knew About</td>

                            <td class="td-actions text-right">

                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-white btn-link btn-sm">

                                <i class="material-icons">edit</i>

                              </button>

                              <button type="button" rel="tooltip" title="Remove" class="btn btn-white btn-link btn-sm">

                                <i class="material-icons">close</i>

                              </button>

                            </td>

                          </tr>

                        </tbody>

                      </table>

                    </div>

                    <div class="tab-pane" id="messages">

                      <table class="table">

                        <tbody>

                          <tr>

                            <td>

                              <div class="form-check">

                                <label class="form-check-label">

                                  <input class="form-check-input" type="checkbox" value="" checked>

                                  <span class="form-check-sign">

                                    <span class="check"></span>

                                  </span>

                                </label>

                              </div>

                            </td>

                            <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit

                            </td>

                            <td class="td-actions text-right">

                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-white btn-link btn-sm">

                                <i class="material-icons">edit</i>

                              </button>

                              <button type="button" rel="tooltip" title="Remove" class="btn btn-white btn-link btn-sm">

                                <i class="material-icons">close</i>

                              </button>

                            </td>

                          </tr>

                          <tr>

                            <td>

                              <div class="form-check">

                                <label class="form-check-label">

                                  <input class="form-check-input" type="checkbox" value="">

                                  <span class="form-check-sign">

                                    <span class="check"></span>

                                  </span>

                                </label>

                              </div>

                            </td>

                            <td>Sign contract for "What are conference organizers afraid of?"</td>

                            <td class="td-actions text-right">

                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-white btn-link btn-sm">

                                <i class="material-icons">edit</i>

                              </button>

                              <button type="button" rel="tooltip" title="Remove" class="btn btn-white btn-link btn-sm">

                                <i class="material-icons">close</i>

                              </button>

                            </td>

                          </tr>

                        </tbody>

                      </table>

                    </div>

                    <div class="tab-pane" id="settings">

                      <table class="table">

                        <tbody>

                          <tr>

                            <td>

                              <div class="form-check">

                                <label class="form-check-label">

                                  <input class="form-check-input" type="checkbox" value="">

                                  <span class="form-check-sign">

                                    <span class="check"></span>

                                  </span>

                                </label>

                              </div>

                            </td>

                            <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>

                            <td class="td-actions text-right">

                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-white btn-link btn-sm">

                                <i class="material-icons">edit</i>

                              </button>

                              <button type="button" rel="tooltip" title="Remove" class="btn btn-white btn-link btn-sm">

                                <i class="material-icons">close</i>

                              </button>

                            </td>

                          </tr>

                          <tr>

                            <td>

                              <div class="form-check">

                                <label class="form-check-label">

                                  <input class="form-check-input" type="checkbox" value="" checked>

                                  <span class="form-check-sign">

                                    <span class="check"></span>

                                  </span>

                                </label>

                              </div>

                            </td>

                            <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit

                            </td>

                            <td class="td-actions text-right">

                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-white btn-link btn-sm">

                                <i class="material-icons">edit</i>

                              </button>

                              <button type="button" rel="tooltip" title="Remove" class="btn btn-white btn-link btn-sm">

                                <i class="material-icons">close</i>

                              </button>

                            </td>

                          </tr>

                          <tr>

                            <td>

                              <div class="form-check">

                                <label class="form-check-label">

                                  <input class="form-check-input" type="checkbox" value="" checked>

                                  <span class="form-check-sign">

                                    <span class="check"></span>

                                  </span>

                                </label>

                              </div>

                            </td>

                            <td>Sign contract for "What are conference organizers afraid of?"</td>

                            <td class="td-actions text-right">

                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-white btn-link btn-sm">

                                <i class="material-icons">edit</i>

                              </button>

                              <button type="button" rel="tooltip" title="Remove" class="btn btn-white btn-link btn-sm">

                                <i class="material-icons">close</i>

                              </button>

                            </td>

                          </tr>

                        </tbody>

                      </table>

                    </div>

                  </div>

                </div>

              </div>

            </div> -->

          </div>

        </div>

      </div>