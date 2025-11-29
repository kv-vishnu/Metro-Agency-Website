  <div class="admin-content">
      <div class="container-fluid">
          <?php include 'application/views/admin/template/sidebar.php' ?>
          <div class="admin-main-content">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-12">
                          <div class="page-title">
                              <h2>All Slider</h2>
                          </div>
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
                                      <th>Slider Name</th>
                                      <th>Slider Description</th>
                                      <th>Status</th>
                                      <th>Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php foreach ($slider as $sliders) : ?>
                                  <tr>
                                    <td><?= $sliders['id']; ?></td>
                                      <td><?= $sliders['title']; ?></td>
                                      <td><?= $sliders['description']; ?></td>
                                      <td>
                                          <input type="checkbox" name="featured" class="is-active-checkbox"
                                            data-id="<?= $sliders['id']; ?>"
                                            <?=  $sliders['is_active'] ? 'checked' : '' ?>>
                                      </td>
                                      <td>
                                          
                                          <a href="<?php echo base_url();?>admin/slider/edit/<?=  $sliders['id']; ?>"
                                              class="btn">Edit</a>
                                            <!-- <a target="_blank"
                                              href="<?php echo base_url();?>admin/categories/edit/<?=  $sliders['id']; ?>"
                                              class="btn">Delete</a> -->

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