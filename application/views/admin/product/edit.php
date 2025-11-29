  <div class="admin-content">
      <div class="container-fluid">
          <?php include 'application/views/admin/template/sidebar.php' ?>
          <div class="admin-main-content">
              <form action="" method="post" enctype="multipart/form-data">
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
                          <h4 class="meta-section__title">Category Meta Information</h4>
                          <div class="meta-section__content">
                             <input type="hidden" id="edit_id" class="form-control"
                                      value="<?= $product['id']; ?>">

                              <div class="meta-section__content-item">
                                  <label class="form-label">Title</label>
                                  <div class="meta-section__value-and-validation">
                                      <input type="text" class="form-control" id="edit_title" name="edit_title" value="<?= $product['metatitle']; ?>">
                                      <div class="error" id="error_edit_title" style="color:red;"></div>
                                  </div>
                              </div>

                              <div class="meta-section__content-item">
                                  <label class="form-label">Slug</label>
                                  <div class="meta-section__value-and-validation">
                                      <input type="text" class="form-control" id="edit_slug" name="edit_slug" value="<?= $product['slug']; ?>">
                                      <div class="error" id="error_edit_slug" style="color:red;"></div>
                                  </div>
                              </div>

                              <div class="meta-section__content-item">
                                  <label class="form-label">Meta Keywords</label>
                                  <div class="meta-section__value-and-validation">
                                      <input type="text" class="form-control" id="edit_meta_keywords" name="edit_meta_keywords" value="<?= $product['metakeyword']; ?>">
                                      <div class="error" id="error_edit_keywords" style="color:red;"></div>
                                  </div>
                              </div>



                              <div class="meta-section__content-item meta-section__content-item--meta-description">
                                  <label class="form-label">Meta Description</label>
                                  <div class="meta-section__value-and-validation">
                                      <textarea class="form-control" id="edit_meta_description" name="edit_meta_description"
                                          rows="3"><?= $product['metadescription']; ?></textarea>
                                      <div class="error" id="error_edit_meta_description" style="color:red;"></div>
                                  </div>
                              </div>

                               <div class="meta-section__content-item meta-section__content-item--meta-description">
                                      <label class="form-label">Schema Integration</label>
                                      <div class="meta-section__value-and-validation">
                                          <textarea class="form-control" id="edit_page_schema" name="edit_page_schema"
                                              rows="3"><?= $product['page_schema']; ?></textarea>
                                          <div class="error" id="error_edit_schema" style="color:red;"></div>
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
                                  <label class="form-label"> Category Name</label>
                               <select name="edit_product_category" class="form-select" id="edit_product_category">
                                    <option value="">Select Category</option>
                                    <?php foreach($categories as $cat): ?>
                                       <option value="<?= $cat['id']; ?>" 
    <?= ($cat['id'] == $product['product_category']) ? 'selected' : '' ?>>
    <?= $cat['category_title']; ?>
</option>

                                    <?php endforeach; ?>
                                </select>
                                  <div class="error" id="error_edit_product_category" style="color:red;"></div>
                              </div>
                            
                              <div class="mb-3">
                                  <label class="form-label">Name</label>
                                  <input type="text" class="form-control" id="edit_product_name" name="edit_product_name" value="<?= $product['product_name']; ?>">
                                  <div class="error" id="error_edit_product_name" style="color:red;"></div>
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Description</label>
                                  <textarea class="form-control summernote" id="edit_product_description" name="edit_product_description" 
                                      rows="3"><?= $product['product_description']; ?></textarea>
                                  <div class="error" id="error_edit_product_description" style="color:red;"></div>
                              </div>

                               
                              <div class="mb-3">
                                  <label class="form-label">Image</label>
                                  <input type="file" class="form-control" id="edit_product_image" name="edit_product_image" >
                                   <img src="<?php echo base_url() ?>/uploads/product/<?php echo $product['product_image'] ?>"
                                          alt="current-image" class="img-fluid mt-2" style="max-height: 100px;">
                                           <input type="hidden" id="old_product_image" class="form-control" name="old_product_image"
                                          value="<?= $product['product_image']; ?>">
                                  <div class="error" id="error_edit_product_image" style="color:red;"></div>
                              </div>



                             
                              <div class="mb-3">
                                  <label class="form-label">Brodhure Upload</label>
                                  <input type="file" class="form-control" id="edit_product_brodhure" name="edit_product_brodhure" accept=".pdf, .csv, .xls, .xlsx"
                                   />
                                <a class="product-brodhure" href="<?= base_url('uploads/productbrodhure/' . rawurlencode($product['product_brodhure'])) ?>" target="_blank">📄 View Brochure</a>
                                    <input type="hidden" id="old_product_brodhure" class="form-control" name="old_product_brodhure"
                                          value="<?= $product['product_brodhure']; ?>">

                                  <div class="error" id="error_edit_product_brodhure" style="color:red;"></div>
                              </div>

                              <div class="mb-3">
                                  <label class="form-label">Link</label>
                                  <input type="text" class="form-control" id="edit_product_link" name="edit_product_link" value="<?= $product['product_link']; ?>">
                                   <div class="error" id="error_edit_product_link" style="color:red;"></div>
                              </div>
                          </div>
                      </div>
                  </div>



                  

                 


                <div id="category_template_section" style="display:none;">
                  
                  

                </div>




            </div>
                 <div class="text-end">
                    <button type="submit" id="update_product" class="btn btn-success">Update Product</button>
                    <div class="me-auto" id="categorySuccessMsg" style="color: green;"></div>
            </div>
              </form>
          </div>
      </div>
  </div>

    