  <div class="admin-content">
      <div class="container-fluid">
          <?php include 'application/views/admin/template/sidebar.php' ?>
          <div class="admin-main-content">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-12">
                          <div class="page-title">
                              <h2>All Enquiries</h2>
                          </div>
                      </div>
                  </div>
                  <div class="row mb-3">
                      <div class="col-12">
                          <form class="d-flex" action="<?= base_url('admin/search/search_enquiry') ?>" method="post">
                              <input type="date" class="form-control" id="enquiryDate" name="enquiryDate" required="">
                              <button class="btn btn-outline-success" type="submit">Search</button>
                          </form>
                      </div>
                  </div>
                  <!-- end page title -->
                  <div class="row">
                      <div class="col-12">
                          <!-- page_list.php -->
                          <table class="table table-bordered">
                              <thead>
                                  <tr>
                                      <th colspan="2">Name</th>
                                      <th>email</th>
                                      <th>Phone</th>
                                      <th>Whatsapp</th>
                                      <th>Course</th>
                                      <th>Type</th>
                                      <th>Date</th>
                                      <th>Status</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php foreach ($enquiries as $item) : ?>
                                  <tr>
                                      <td colspan="2"><?= $item['full_name']; ?></td>
                                      <td><?= $item['email']; ?></td>
                                      <td><?= $item['country_code'].$item['mobile']; ?></td>
                                      <td><?= $item['country_code'].$item['whatsapp']; ?></td>
                                      <td><?= ($item['course'] != '0') ? $item['course'] : ''; ?></td>

                                       <td><?= $item['enq_type']; ?></td>
                                       <td><?= $item['enq_date']; ?></td>
                                      <td>
                                          <?php if ($item['status'] == 'completed'): ?>
                                          <span class="badge bg-success"></span>
                                          <?php else: ?>
                                          <span class="badge bg-danger">Pending</span>
                                          <?php endif; ?>
                                      </td>

                                  </tr>
                                  <?php endforeach; ?>
                              </tbody>
                          </table>
                      </div><!-- end col -->


                  </div><!-- end col -->
              </div>
          </div>
      </div>
  </div>