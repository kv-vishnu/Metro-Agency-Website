  <div class="admin-content">
      <div class="container-fluid">
          <?php include 'application/views/admin/template/sidebar.php' ?>
          <div class="admin-main-content">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-12">
                          <div class="page-title">
                              <h2>All Settings</h2>
                          </div>
                      </div>
                  </div>
                  <div class="row mb-3 d-none">
                      <div class="col-12">
                          <form class="d-flex" action="<?= base_url('admin/search') ?>" method="post">
                              <input type="hidden" name="search_type" value="category">
                              <input class="form-control me-2" type="search" name="search_term"
                                  placeholder="Search Settings" aria-label="Search">
                              <button class="btn btn-outline-success" type="submit">Search</button>
                          </form>
                      </div>
                  </div>
                  <!-- end page title -->
                  <div class="row">
                      <div class="col-12">
                        <div id="featuredMessage"></div>
                          <!-- page_list.php -->
                          <table class="table table-bordered">
                              <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>Address</th>
                                      <th>Email</th>
                                      <th>Phone No</th>
                                      <th>Working Hours</th>
                            
                                      <th>Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php foreach ($settings as $setting) : ?>
                                  <tr>
                                      <td><?= $setting['id']; ?></td>
                                      <td><?= $setting['address']; ?></td>
                                      <td><?= $setting['email']; ?></td>
                                      <td><?= $setting['phone_no']; ?></td>
                                      <td><?= $setting['working_hours']; ?></td>
                                    
                                      <td>
                                          <!-- <a target="_blank"
                                              href="<?= base_url('certification-training/'.$category['slug']); ?>"
                                              class="btn">View</a> -->
                                          <a href="<?php echo base_url();?>admin/settings/edit/<?= $setting['id']; ?>"
                                              class="btn">Edit</a>

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