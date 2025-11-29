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
                            
                              <div class="mb-3">
                                  <label class="form-label">Name</label>
                                  <input type="text" class="form-control" id="management_name" name="management_name">
                                  <div class="error" id="error_management_name" style="color:red;"></div>
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Description</label>
                                  <textarea class="form-control" id="management_description" name="management_description"
                                      rows="3"></textarea>
                                  <div class="error" id="error_management_description" style="color:red;"></div>
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Image</label>
                                  <input type="file" class="form-control" id="management_image" name="management_image">
                                  <div class="error" id="error_management_image" style="color:red;"></div>
                              </div>

                              <div class="mb-3">
                                  <label class="form-label">Short Bio</label>
                                  <input type="text" class="form-control" id="short_bio" name="short_bio">
                                   <div class="error" id="error_short_bio" style="color:red;"></div>
                              </div>
                          </div>
                      </div>
                  </div>

                <div id="category_template_section" style="display:none;">
                  
                </div>

              </div>
                 <div class="text-end">
                    <button type="submit" id="save_management" class="btn btn-success">Save Management</button>
                    <div class="me-auto" id="categorySuccessMsg" style="color: green;"></div>
              </div>
              </form>
          </div>
      </div>
  </div>

    