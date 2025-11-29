  <div class="admin-content">
      <div class="container-fluid">
          <?php include 'application/views/admin/template/sidebar.php' ?>
          <div class="admin-main-content">
              <form action="<?= base_url('admin/Slider/save') ?>" method="post" enctype="multipart/form-data">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-12">
                          <div class="page-title">
                              <h2>Create Slider</h2>
                          </div>
                      </div>
                  </div>
                  <!-- end page title -->

            




                  <div class="row">
                      <div class="col-12">
                         <h4 class="meta-section__title">Category Information</h4>
                          <div class="admin-main-content__section">
                            
                              <div class="mb-3">
                                  <label class="form-label">Name</label>
                                  <input type="text" class="form-control" id="slider_title" name="slider_title">
                                  <div class="error" id="error_slider_title" style="color:red;"></div>
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Description</label>
                                  <textarea class="form-control" id="slider_text" name="slider_text"
                                      rows="3"></textarea>
                                  <div class="error" id="error_slider_text" style="color:red;"></div>
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Image</label>
                                  <input type="file" class="form-control" id="slider_image" name="slider_image">
                                  <div class="error" id="error_slider_image" style="color:red;"></div>
                              </div>
                          </div>
                      </div>
                  </div>



                  

                 


                <div id="category_template_section" style="display:none;">
                  
                  

                </div>




              </div>
                 <div class="text-end">
                    <button type="submit" id="save_slider" class="btn btn-success">Save Slider</button>
                    <div class="me-auto" id="categorySuccessMsg" style="color: green;"></div>
                 </div>
              </form>
          </div>
      </div>
  </div>

    