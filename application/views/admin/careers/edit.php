  <div class="admin-content">
      <div class="container-fluid">
          <?php include 'application/views/admin/template/sidebar.php' ?>
          <div class="admin-main-content">
              <form action="" method="post" enctype="multipart/form-data">
                 <input type="hidden" id="edit_id" class="form-control" value="<?= $careers['id']; ?>">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-12">
                          <div class="page-title">
                              <h2>Career</h2>
                          </div>
                      </div>
                  </div>
                  <!-- end page title -->
                  <div class="row">
                      <div class="col-12">
                         <h4 class="meta-section__title">Career Information</h4>
                          <div class="admin-main-content__section">

                              <div class="mb-3">
                                  <label class="form-label">Job</label>
                                  <input type="text" class="form-control" id="edit_job" name="edit_job"  value="<?= $careers['job']; ?>">
                                  <div class="error" id="error_edit_job" style="color:red;"></div>
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Description</label>
                                  <textarea type="text" class="form-control summernote" id="edit_description" name="edit_description"
                                       rows="3"><?= $careers['description']; ?></textarea>
                                  <div class="error" id="error_edit_description" style="color:red;"></div>
                              </div>

                                 <div class="mb-3">
                                  <label class="form-label">Experience</label>
                                  <input type="text" class="form-control" id="edit_experience" name="edit_experience" value="<?= $careers['experience']; ?>"
                                       />
                                  <div class="error" id="error_edit_experience" style="color:red;"></div>
                              </div>

                              <div class="mb-3">
                                  <label class="form-label">Location</label>
                                  <input type="text" class="form-control " id="edit_location" name="edit_location" value="<?= $careers['location']; ?>"
                                      />
                                  <div class="error" id="error_edit_location" style="color:red;"></div>
                              </div>
                              
                          </div>
                      </div>
                  </div>

                <div id="category_template_section" style="display:none;">
        
                </div>

              </div>
                 <div class="text-end">
                    <button type="submit" id="update_job" class="btn btn-success">Update</button>
                    <div class="me-auto" id="categorySuccessMsg" style="color: green;"></div>
                 </div>
              </form>
          </div>
      </div>
  </div>

    