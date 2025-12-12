  <div class="admin-content">
      <div class="container-fluid">
          <?php include 'application/views/admin/template/sidebar.php' ?>
          <div class="admin-main-content">
              <form  method="post" enctype="multipart/form-data">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-12">
                          <div class="page-title">
                              <h2>Create Manufacture</h2>
                          </div>
                      </div>
                  </div>
                  <!-- end page title -->

            

                  <div class="row meta-section">
                      <div class="col-12">
                          <h4 class="meta-section__title">Manufacture Meta Information</h4>
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
                         <h4 class="meta-section__title">Manufacture Information</h4>
                          <div class="admin-main-content__section">
                            
                              <div class="mb-3">
                                  <label class="form-label">Name</label>
                                  <input type="text" class="form-control" id="manufacture_title" name="manufacture_title">
                                  <div class="error" id="error_manufacture_title" style="color:red;"></div>
                              </div>

                                <div class="mb-3">
                                  <label class="form-label">Select Category</label>
                                  <div class="category-checkboxes">

        <?php foreach ($categories as $category): ?>
            <div class="form-check">
                <input class="form-check-input"
                       type="checkbox"
                       name="manufacture_category_id[]"
                       value="<?= $category['id']; ?>"
                       id="manufacture_category_id">

                <label class="form-check-label" for="cat_<?= $category['id']; ?>">
                    <?= $category['category_title']; ?>
                </label>
            </div>
        <?php endforeach; ?>

    </div>

                                  <!-- <select class="form-control" id="manufacture_category_id" name="manufacture_category_id" >
                                      <option value="">Select Category</option>
                                      <?php foreach ($categories as $category): ?>
                                          <option value="<?php echo $category['id']; ?>"><?php echo $category['category_title']; ?></option>
                                      <?php endforeach; ?>
                                  </select> -->
                                  <div class="error" id="error_manufacture_category_id" style="color:red;"></div>
                              </div>


                              <div class="mb-3">
                                  <label class="form-label">Email</label>
                                 <input type="text" class="form-control" id="manufacture_email" name="manufacture_email"
                                     />
                                  <div class="error" id="error_manufacture_email" style="color:red;"></div>
                              </div>

                               <div class="mb-3">
                                  <label class="form-label">Phone No</label>
                                  <input type="text" class="form-control" id="manufacture_phone" name="manufacture_phone"
                                     />
                                  <div class="error" id="error_manufacture_phone" style="color:red;"></div>
                              </div>

                              <div class="mb-3">
                                  <label class="form-label">Address</label>
                                  <input type="text" class="form-control" id="manufacture_address" name="manufacture_address">
                                  <div class="error" id="error_manufacture_address" style="color:red;"></div>
                              </div>


                               <div class="mb-3">
                                  <label class="form-label">Image</label>
                                  <input type="file" class="form-control" id="manufacture_image" name="manufacture_image">
                                  <div class="error" id="error_manufacture_image" style="color:red;"></div>
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
                <button type="submit" id="save_manufacture" class="btn btn-success">Save Manufacture</button>
                <div class="me-auto" id="categorySuccessMsg" style="color: green;"></div>
                </div>
              </form>
          </div>
      </div>
  </div>

    