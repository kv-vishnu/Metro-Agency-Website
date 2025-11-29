  <div class="admin-content">
      <div class="container-fluid">
          <?php include 'application/views/admin/template/sidebar.php' ?>
          <div class="admin-main-content">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-12">
                          <div class="page-title">
                              <h2>All Career</h2>
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
                                      <th>Job</th>
                                      <th>Description</th>
                                      <th>Status</th>
                                      <th>Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php foreach ($careers as $career) : ?>
                                  <tr>
                                      <td><?= $career['id']; ?></td>
                                      <td><?= $career['job']; ?></td>
                                      <td><?= $career['description']; ?></td>
                                       <td>
                                          <input type="checkbox" name="featured" class="is-active-checkbox"
                                            data-id="<?= $career['id']; ?>"
                                            <?= $career['is_active'] ? 'checked' : '' ?>>
                                      </td>
                                    
                                    
                                      <td>
                                          <!-- <a target="_blank"
                                              href="<?= base_url('certification-training/'.$category['slug']); ?>"
                                              class="btn">View</a> -->
                                          <a href="<?php echo base_url();?>admin/Careers/edit/<?= $career['id']; ?>"
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