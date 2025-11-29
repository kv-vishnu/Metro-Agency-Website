  <div class="admin-content">
      <div class="container-fluid">
          <?php include 'application/views/admin/template/sidebar.php' ?>
          <div class="admin-main-content">
              <form action="" method="post" enctype="multipart/form-data">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-12">
                          <div class="page-title">
                              <h2>Create Management</h2>
                          </div>
                      </div>
                  </div>
                  <!-- end page title -->

        
                  <div class="row">
                      <div class="col-12">
                         <h4 class="meta-section__title">Management Information</h4>
                          <div class="admin-main-content__section">
                               <input type="hidden" id="edit_id" class="form-control"
                                      value="<?= $management['id']; ?>">
                              <div class="mb-3">
                                  <label class="form-label">Name</label>
                                  <input type="text" class="form-control" id="edit_management_name" name="edit_management_name" value="<?= $management['name']; ?>">
                                  <div class="error" id="error_edit_management_name" style="color:red;"></div>
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Designation</label>
                                  <input class="form-control" id="edit_management_description" name="edit_management_description"
                                     value="<?= $management['designation']; ?>"/>
                                  <div class="error" id="error_edit_management_description" style="color:red;"></div>
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Image</label>
                                  <input type="file" class="form-control" id="edit_management_image" name="edit_management_image" value="<?= $management['management_image']; ?>">
                                <img src="<?php echo base_url() ?>/uploads/management/<?php echo $management['management_image'] ?>"
                                          alt="current-image" class="img-fluid mt-2" style="max-height: 100px;">
                                      <input type="hidden" id="old_management_image" class="form-control" name="old_management_image"
                                          value="<?= $management['management_image']; ?>">
                                  <div class="error" id="error_edit_management_image" style="color:red;"></div>
                              </div>

                              <div class="mb-3">
                                  <label class="form-label">Short Bio</label>
                                  <input type="text" class="form-control" id="edit_short_bio" name="edit_short_bio" value="<?= $management['short_bio']; ?>">
                                   <div class="error" id="error_edit_short_bio" style="color:red;"></div>
                              </div>
                          </div>
                      </div>
                  </div>

                <div id="category_template_section" style="display:none;">
                  
                </div>

              </div>
                 <div class="text-end">
                    <button type="submit" id="update_management" class="btn btn-success">Update Management</button>
                    <div class="me-auto" id="categorySuccessMsg" style="color: green;"></div>
              </div>
              </form>
          </div>
      </div>
  </div>

    