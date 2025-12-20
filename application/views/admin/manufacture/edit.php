  <div class="admin-content">
      <div class="container-fluid">
          <?php include 'application/views/admin/template/sidebar.php' ?>
          <div class="admin-main-content">
              <form action="" method="post" enctype="multipart/form-data">
                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-12">
                              <div class="page-title">
                                  <h2>Edit Manufacture - <?= $manufacture['manufacture_title']; ?></h2>
                              </div>
                              <div class="page-url-and-view d-none">
                                  <div class="page-url-and-view__page-url">
                                      <div class="page-url-and-view__page-url-label">Page URL:</div>
                                      <div class="page-url-and-view__page-url-value">
                                          <?= base_url('certification-training/'.$manufacture['slug']); ?></div>
                                  </div>
                                  <div class="page-url-and-view__view"><a target="_blank"
                                          href="<?= base_url('certification-training/'.$manufacture['slug']); ?>"
                                          class="btn btn-primary">View</a></div>
                              </div>
                          </div>
                      </div>
                      <!-- end page title -->

   

                   

                      <div class="row meta-section">
                          <div class="col-12">
                              <h4 class="meta-section__title">Meta Information</h4>
                              <div class="meta-section__content">
                                  <input type="hidden" id="edit_id" class="form-control"
                                      value="<?= $manufacture['id']; ?>">
                                  <div class="meta-section__content-item">
                                      <label class="form-label">Meta Title</label>
                                      <div class="meta-section__value-and-validation">
                                          <input type="text" class="form-control" id="metatitle"
                                              value="<?= $manufacture['metatitle']; ?>" name="metatitle">
                                          <div class="error" id="error_edit_title" style="color:red;"></div>
                                      </div>

                                  </div>
                                  
                                 
                                  <div class="meta-section__content-item">
                                      <label class="form-label">Slug</label>
                                      <div class="meta-section__value-and-validation">
                                          <input type="text" class="form-control" id="slug"
                                              value="<?= $manufacture['slug']; ?>" name="slug">
                                          <div class="error" id="error_edit_slug" style="color:red;"></div>
                                      </div>
                                  </div>
                                  <!-- Meta Section -->

                                  <div class="meta-section__content-item">
                                      <label class="form-label">Meta Keywords</label>
                                      <div class="meta-section__value-and-validation">
                                          <input type="text" class="form-control" id="meta_keywords"
                                              value="<?= $manufacture['metakeywords']; ?>" name="meta_keywords">
                                          <div class="error" id="error_edit_keywords" style="color:red;"></div>
                                      </div>
                                  </div>

                                  <div class="meta-section__content-item meta-section__content-item--meta-description">
                                      <label class="form-label">Meta Description</label>
                                      <div class="meta-section__value-and-validation">
                                          <textarea class="form-control" id="meta_description" name="meta_description"
                                              rows="3"><?= $manufacture['metadescription']; ?></textarea>
                                          <div class="error" id="error_description" style="color:red;"></div>
                                      </div>
                                  </div>
                                  <div class="meta-section__content-item meta-section__content-item--meta-description">
                                      <label class="form-label">Schema Integration</label>
                                      <div class="meta-section__value-and-validation">
                                          <textarea class="form-control" id="page_schema" name="page_schema"
                                              rows="3"><?= $manufacture['page_schema']; ?></textarea>
                                          <div class="error" id="error_description" style="color:red;"></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>


                      <div class="row">
                          <div class="col-12">
                              <div class="admin-main-content__section">
                                  <!-- Banner Section -->
                                  <h5 class="admin-main-content__section-title">Manufacture Section</h5>
                                  <div class="mb-3">
                                      <label class="form-label">Name</label>
                                      <input type="text" class="form-control" id="manufacture_edit_title" name="manufacture_edit_title"
                                          value="<?= $manufacture['manufacture_title']; ?>">
                                      <div class="error" id="error_manufacture_edit_title" style="color:red;"></div>
                                  </div>
                                  <div class="mb-3">
                                      <label class="form-label">Email</label>
                                      <input type="text" class="form-control" id="manufacture_edit_email" name="manufacture_edit_email"
                                          value="<?= $manufacture['manufacture_email']; ?>">
                                      <div class="error" id="error_manufacture_edit_email" style="color:red;"></div>
                                  </div>


                                   <div class="mb-3">
                                 <label class="form-label">Select Category</label>

<div class="category-checkboxes">

    <?php 
        // `$manufacture_category_id` may come from DB as "2,5,7"
        // convert to array
        $selected = !empty($manufacture['manufacture_category_id']) 
                    ? explode(",", $manufacture['manufacture_category_id']) 
                    : [];
    ?>

    <?php foreach ($categories as $category): ?>
        <div class="form-check">

            <input class="form-check-input"
                   type="checkbox"
                   name="manufacture_edit_category_id[]"
                   value="<?= $category['id']; ?>"
                   id="manufacture_edit_category_id"
                   <?= in_array($category['id'], $selected) ? 'checked' : '' ?>>
            
            <label class="form-check-label" for="cat_<?= $category['id']; ?>">
                <?= $category['category_title']; ?>
            </label>

        </div>
    <?php endforeach; ?>

</div>


    </div>

                                   <div class="mb-3">
                                      <label class="form-label">Phone</label>
                                      <input type="text" class="form-control" id="manufacture_edit_phone" name="manufacture_edit_phone"
                                          value="<?= $manufacture['manufacture_phone']; ?>">
                                      <div class="error" id="error_manufacture_edit_phone" style="color:red;"></div>
                                  </div>

                                   <div class="mb-3">
                                      <label class="form-label">Address</label>
                                      <input type="text" class="form-control" id="manufacture_edit_address" name="manufacture_edit_address"
                                          value="<?= $manufacture['manufacture_address']; ?>">
                                      <div class="error" id="error_manufacture_edit_address" style="color:red;"></div>
                                  </div>

                                    <div class="mb-3">
                                  <label class="form-label">Description</label>
                                  <textarea class="form-control summernote" id="manufacture_edit_description" name="manufacture_edit_description"
                                      rows="3"><?= $manufacture['manufacture_description']; ?></textarea>
                                  <div class="error" id="error_manufacture_edit_description" style="color:red;"></div>
                                </div>
                                  <div class="mb-3">
                                      <label class="form-label">Image</label>
                                      <input type="file" class="form-control" id="manufacture_edit_image" name="manufacture_edit_image">
                                      <img src="<?php echo base_url() ?>/uploads/manufacture/<?php echo $manufacture['manufacture_image'] ?>"
                                          alt="current-image" class="img-fluid mt-2" style="max-height: 100px;">
                                      <input type="hidden" id="old_manufacture_image" class="form-control" name="old_manufacture_image"
                                          value="<?= $manufacture['manufacture_image']; ?>">
                                      <div class="error" id="error_manufacture_edit_image" style="color:red;"></div>
                                  </div>
                                   <div class="text-end">
                                                <button type="submit" id="update_manufacture" class="btn btn-success">Update Manufacture</button>
                                                <div class="me-auto" id="categorySuccessMsg" style="color: green;"></div>
                                            </div>
                            </form>
                              </div>
                          </div>
                      </div>







                  



                      <!-- Subcategories and course listing end -->













