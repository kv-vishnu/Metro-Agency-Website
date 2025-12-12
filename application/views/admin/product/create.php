  <div class="admin-content">
      <div class="container-fluid">
          <?php include 'application/views/admin/template/sidebar.php' ?>
          <div class="admin-main-content">
              <form action="<?= base_url('adminpage/save') ?>" method="post" enctype="multipart/form-data">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-12">
                          <div class="page-title">
                              <h2>Create Product</h2>
                          </div>
                      </div>
                  </div>
                  <!-- end page title -->

            

                  <div class="row meta-section">
                      <div class="col-12">
                          <h4 class="meta-section__title">Product Meta Information</h4>
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
                         <h4 class="meta-section__title">Product Information</h4>
                          <div class="admin-main-content__section">

                          <div class="mb-3">
                                  <label class="form-label">Name</label>
                               <select name="product_category" class="form-select" id="product_category">
                                    <option value="">Select Category</option>
                                    <?php foreach($categories as $cat): ?>
                                        <option value="<?= $cat['id']; ?>">
                                            <?= $cat['category_title']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                  <div class="error" id="error_product_category" style="color:red;"></div>
                              </div>
                            
                              <div class="mb-3">
                                  <label class="form-label">Name</label>
                                  <input type="text" class="form-control" id="product_name" name="product_name">
                                  <div class="error" id="error_product_name" style="color:red;"></div>
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Description</label>
                                  <textarea class="form-control summernote" id="product_description" name="product_description"
                                      rows="3"></textarea>
                                  <div class="error" id="error_product_description" style="color:red;"></div>
                              </div>

                               
                              <div class="mb-3">
                                  <label class="form-label">Image</label>
                                  <input type="file" class="form-control" id="product_image" name="product_image">
                                  <div class="error" id="error_product_image" style="color:red;"></div>
                              </div>

                            

                              <div class="mb-3">
                                  <label class="form-label">Brochure Upload</label>
                                  <input type="file" class="form-control" id="product_brochure" name="product_brochure" accept=".pdf, .csv, .xls, .xlsx"
                                   />
                                  <div class="error" id="error_product_brochure" style="color:red;"></div>
                              </div>

                             
                          </div>
                      </div>
                  </div>



                  

                 


                <div id="category_template_section" style="display:none;">
                  
                  

                </div>




            </div>
                 <div class="text-end">
                    <button type="submit" id="save_product" class="btn btn-success">Save Product</button>
                    <div class="me-auto" id="categorySuccessMsg" style="color: green;"></div>
            </div>
              </form>
          </div>
      </div>
  </div>

    