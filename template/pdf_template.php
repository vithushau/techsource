<html>
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


                    </thead>

                    <tbody>

                    <?php foreach($records as $row) {  ?>

                        <tr>

                            <td><?php echo $row['record_id'] ?></td>

                            <td><?php echo $row['cus_name'] ?></td>

                            <td><?php echo $row['date'] ?></td>

                            <td><?php echo $row['returned_date'] ?></td>


                          </tr>

                      <?php } ?>

                    </tbody>

                  </table>

</html>
