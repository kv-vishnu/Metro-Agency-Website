  <div class="admin-content">
      <div class="container-fluid">
          <?php include 'application/views/admin/template/sidebar.php' ?>
          <div class="admin-main-content">
              <form action="" method="post" enctype="multipart/form-data">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-12">
                          <div class="page-title">
                              <h2>Create Careers</h2>
                          </div>
                      </div>
                  </div>
                  <!-- end page title -->
                  <div class="row">
                      <div class="col-12">
                         <h4 class="meta-section__title">Career Information</h4>
                          <div class="admin-main-content__section">
                            
                              <div class="mb-3">
                                  <label class="form-label">Job Title</label>
                                  <input type="text" class="form-control" id="job" name="job">
                                  <div class="error" id="error_job" style="color:red;"></div>
                              </div>

                              <div class="mb-3">
                                  <label class="form-label">Experience</label>
                                  <input type="text" class="form-control" id="experience" name="experience">
                                  <div class="error" id="error_experience" style="color:red;"></div>
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Location</label>
                                  <input type="text" class="form-control" id="location" name="location">
                                  <div class="error" id="error_location" style="color:red;"></div>
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Description</label>
                                  <textarea type="text" class="form-control summernote" id="description" name="description"
                                      rows="3"></textarea>
                                  <div class="error" id="error_description" style="color:red;"></div>
                              </div>
                              
                          </div>
                      </div>
                  </div>
                <div id="category_template_section" style="display:none;">
                </div>
              </div>
                 <div class="text-end">
                    <button type="submit" id="save_job" class="btn btn-success">Save</button>
                    <div class="me-auto" id="categorySuccessMsg" style="color: green;"></div>
                 </div>
              </form>
          </div>
      </div>
  </div>

    