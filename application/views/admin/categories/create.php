  <div class="admin-content">
      <div class="container-fluid">
          <?php include 'application/views/admin/template/sidebar.php' ?>
          <div class="admin-main-content">
              <form action="<?= base_url('adminpage/save') ?>" method="post" enctype="multipart/form-data">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-12">
                          <div class="page-title">
                              <h2>Create Category</h2>
                          </div>
                      </div>
                  </div>
                  <!-- end page title -->

            

                  <div class="row meta-section">
                      <div class="col-12">
                          <h4 class="meta-section__title">Category Meta Information</h4>
                          <div class="meta-section__content">

                              <div class="meta-section__content-item">
                                  <label class="form-label">Title</label>
                                  <div class="meta-section__value-and-validation">
                                      <input type="text" class="form-control" id="title" name="title">
                                      <div class="error" id="error_title" style="color:red;"></div>
                                  </div>
                              </div>

                              <div class="meta-section__content-item">
                                  <label class="form-label">Slug</label>
                                  <div class="meta-section__value-and-validation">
                                      <input type="text" class="form-control" id="slug" name="slug">
                                      <div class="error" id="error_slug" style="color:red;"></div>
                                  </div>
                              </div>

                              <div class="meta-section__content-item">
                                  <label class="form-label">Meta Keywords</label>
                                  <div class="meta-section__value-and-validation">
                                      <input type="text" class="form-control" id="keywords" name="meta_keywords">
                                      <div class="error" id="error_keywords" style="color:red;"></div>
                                  </div>
                              </div>



                              <div class="meta-section__content-item meta-section__content-item--meta-description">
                                  <label class="form-label">Meta Description</label>
                                  <div class="meta-section__value-and-validation">
                                      <textarea class="form-control" id="meta_description" name="meta_description"
                                          rows="3"></textarea>
                                      <div class="error" id="error_description" style="color:red;"></div>
                                  </div>
                              </div>

                               <div class="meta-section__content-item meta-section__content-item--meta-description">
                                      <label class="form-label">Schema Integration</label>
                                      <div class="meta-section__value-and-validation">
                                          <textarea class="form-control" id="page_schema" name="page_schema"
                                              rows="3"></textarea>
                                          <div class="error" id="error_schema" style="color:red;"></div>
                                      </div>
                                  </div>

                          </div>
                      </div>
                  </div>



                  <div class="row">
                      <div class="col-12">
                         <h4 class="meta-section__title">Product Category Information</h4>
                          <div class="admin-main-content__section">
                            
                              <div class="mb-3">
                                  <label class="form-label">Name</label>
                                  <input type="text" class="form-control" id="category_title" name="category_title">
                                  <div class="error" id="error_category_title" style="color:red;"></div>
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Description</label>
                                  <textarea class="form-control" id="category_text" name="category_text"
                                      rows="3"></textarea>
                                  <div class="error" id="error_category_text" style="color:red;"></div>
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Image</label>
                                  <input type="file" class="form-control" id="category_image" name="category_image">
                                  <div class="error" id="error_category_image" style="color:red;"></div>
                              </div>

                              <!-- <div class="mb-3">
                                  <label class="form-label">Link</label>
                                  <input type="text" class="form-control" id="category_link" name="category_link">
                                   <div class="error" id="error_category_link" style="color:red;"></div>
                              </div> -->
                          </div>
                      </div>
                  </div>



                  

                 


                <div id="category_template_section" style="display:none;">
                  
                  

                </div>




              </div>
                <div class="text-end">
                <button type="submit" id="save_category" class="btn btn-success">Save Category</button>
                <div class="me-auto" id="categorySuccessMsg" style="color: green;"></div>
                </div>
              </form>
          </div>
      </div>
  </div>

    