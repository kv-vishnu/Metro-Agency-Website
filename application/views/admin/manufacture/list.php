  <div class="admin-content">
      <div class="container-fluid">
          <?php include 'application/views/admin/template/sidebar.php' ?>
          <div class="admin-main-content">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-12">
                          <div class="page-title">
                              <h2>All Manufacture</h2>
                          </div>
                      </div>
                  </div>
                  <div class="row mb-3">
                      <div class="col-12">
                          <form class="d-flex" action="<?= base_url('admin/search/search_manufacture') ?>" method="post">
                              <input type="hidden" name="search_type" value="category">
                              <input class="form-control me-2" type="search" name="search_term"
                                  placeholder="Search Manufacture" aria-label="Search">
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
                                      <th> Name</th>
                                      <th>Email</th>
                                      <th>Phone No</th>
                                      <th>Address</th>
                                      <th>Status</th>
                                      <th>Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php foreach ($manufacture as $man) : ?>
                                  <tr>
                                      <td><?= $man['id']; ?></td>
                                      <td><?= $man['manufacture_title']; ?></td>
                                      <td><?= $man['manufacture_email']; ?></td>
                                      <td><?= $man['manufacture_phone']; ?></td>
                                    <td><?= $man['manufacture_address']; ?></td>
                                      <td>
                                          <input type="checkbox" name="featured" class="is-active-manufacture-checkbox"
                                            data-id="<?= $man['id']; ?>"
                                            <?= $man['is_active'] ? 'checked' : '' ?>>
                                      </td>
                                      <td>
                                          <!-- <a target="_blank"
                                              href="<?= base_url('certification-training/'.$man['slug']); ?>"
                                              class="btn">View</a> -->
                                          <a href="<?php echo base_url();?>admin/manufacture/edit/<?= $man['id']; ?>"
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