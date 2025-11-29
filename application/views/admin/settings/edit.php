  <div class="admin-content">
      <div class="container-fluid">
          <?php include 'application/views/admin/template/sidebar.php' ?>
          <div class="admin-main-content">
              <form action="" method="post" enctype="multipart/form-data">
                 <input type="hidden" id="edit_id" class="form-control"
                                      value="<?= $settings['id']; ?>">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-12">
                          <div class="page-title">
                              <h2>Get In Touch</h2>
                          </div>
                      </div>
                  </div>
                  <!-- end page title -->
                  <div class="row">
                      <div class="col-12">
                         <h4 class="meta-section__title">Information</h4>
                          <div class="admin-main-content__section">


                            
                              <div class="mb-3">
                                  <label class="form-label">Address</label>
                                  <input type="text" class="form-control" id="edit_address" name="edit_address"  value="<?= $settings['address']; ?>">
                                  <div class="error" id="error_address" style="color:red;"></div>
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Phone</label>
                                  <input type="text" class="form-control" id="edit_phone_no" name="edit_phone_no"
                                      value="<?= $settings['phone_no']; ?>"/>
                                  <div class="error" id="error_phone_no" style="color:red;"></div>
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Email</label>
                                  <input type="email" class="form-control" id="edit_email" name="edit_email" value="<?= $settings['email']; ?>">
                                  <div class="error" id="error_email" style="color:red;"></div>
                              </div>

                               <div class="mb-3">
                                  <label class="form-label">Working Hours</label>
                                  <input type="text" class="form-control" id="edit_working_hours" name="edit_working_hours" value="<?= $settings['working_hours']; ?>">
                                  <div class="error" id="error_working_hours" style="color:red;"></div>
                              </div>
                          </div>
                      </div>
                  </div>

                <div id="category_template_section" style="display:none;">
        
                </div>

              </div>
                 <div class="text-end">
                    <button type="submit" id="update_get_in_touch" class="btn btn-success">Update</button>
                    <div class="me-auto" id="categorySuccessMsg" style="color: green;"></div>
                 </div>
              </form>
          </div>
      </div>
  </div>

    