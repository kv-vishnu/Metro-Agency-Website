  <div class="admin-content">
      <div class="container-fluid">
          <?php include 'application/views/admin/template/sidebar.php' ?>
          <div class="admin-main-content">
              <form action="" method="post" enctype="multipart/form-data">
                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-12">
                              <div class="page-title">
                                  <h2>Edit Category - <?= $category['name']; ?></h2>
                              </div>
                              <div class="page-url-and-view d-none">
                                  <div class="page-url-and-view__page-url">
                                      <div class="page-url-and-view__page-url-label">Page URL:</div>
                                      <div class="page-url-and-view__page-url-value">
                                          <?= base_url('certification-training/'.$category['slug']); ?></div>
                                  </div>
                                  <div class="page-url-and-view__view"><a target="_blank"
                                          href="<?= base_url('certification-training/'.$category['slug']); ?>"
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
                                      value="<?= $category['id']; ?>">
                                  <div class="meta-section__content-item">
                                      <label class="form-label">Meta Title</label>
                                      <div class="meta-section__value-and-validation">
                                          <input type="text" class="form-control" id="metatitle"
                                              value="<?= $category['metatitle']; ?>" name="metatitle">
                                          <div class="error" id="error_edit_title" style="color:red;"></div>
                                      </div>

                                  </div>
                                  
                                  <div class="meta-section__content-item">
                                      <label class="form-label">Rel Canonical</label>
                                      <div class="meta-section__value-and-validation">
                                          <input type="text" class="form-control" id="canonical"
                                              value="<?= $category['canonical']; ?>" name="canonical">
                                          <div class="error" id="error_edit_title" style="color:red;"></div>
                                      </div>

                                  </div>
                                  <div class="meta-section__content-item">
                                      <label class="form-label">Slug</label>
                                      <div class="meta-section__value-and-validation">
                                          <input type="text" class="form-control" id="slug"
                                              value="<?= $category['slug']; ?>" name="slug">
                                          <div class="error" id="error_edit_slug" style="color:red;"></div>
                                      </div>
                                  </div>
                                  <!-- Meta Section -->

                                  <div class="meta-section__content-item">
                                      <label class="form-label">Meta Keywords</label>
                                      <div class="meta-section__value-and-validation">
                                          <input type="text" class="form-control" id="meta_keywords"
                                              value="<?= $category['metakeywords']; ?>" name="meta_keywords">
                                          <div class="error" id="error_edit_keywords" style="color:red;"></div>
                                      </div>
                                  </div>

                                  <div class="meta-section__content-item meta-section__content-item--meta-description">
                                      <label class="form-label">Meta Description</label>
                                      <div class="meta-section__value-and-validation">
                                          <textarea class="form-control" id="meta_description" name="meta_description"
                                              rows="3"><?= $category['metadescription']; ?></textarea>
                                          <div class="error" id="error_description" style="color:red;"></div>
                                      </div>
                                  </div>
                                  <div class="meta-section__content-item meta-section__content-item--meta-description">
                                      <label class="form-label">Schema Integration</label>
                                      <div class="meta-section__value-and-validation">
                                          <textarea class="form-control" id="page_schema" name="page_schema"
                                              rows="3"><?= $category['page_schema']; ?></textarea>
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
                                  <h5 class="admin-main-content__section-title">Banner Section</h5>
                                  <div class="mb-3">
                                      <label class="form-label">Title</label>
                                      <input type="text" class="form-control" id="category_edit_title" name="category_edit_title"
                                          value="<?= $category['category_title']; ?>">
                                      <div class="error" id="error_category_edit_title" style="color:red;"></div>
                                  </div>
                                  <div class="mb-3">
                                      <label class="form-label">Description</label>
                                      <textarea class="form-control" id="category_edit_text" name="category_edit_text"
                                          rows="3"><?= $category['category_description']; ?></textarea>
                                      <div class="error" id="error_category_edit_text" style="color:red;"></div>
                                  </div>
                                  <div class="mb-3">
                                      <label class="form-label">Image</label>
                                      <input type="file" class="form-control" id="category_edit_image" name="category_edit_image">
                                      <img src="<?php echo base_url() ?>/uploads/category/<?php echo $category['category_image'] ?>"
                                          alt="current-image" class="img-fluid mt-2" style="max-height: 100px;">
                                      <input type="hidden" id="old_category_image" class="form-control" name="old_category_image"
                                          value="<?= $category['category_image']; ?>">
                                      <div class="error" id="error_category_edit_image" style="color:red;"></div>
                                  </div>
                                   <div class="text-end">
                                                <button type="submit" id="update_category" class="btn btn-success">Update Category</button>
                                                <div class="me-auto" id="categorySuccessMsg" style="color: green;"></div>
                                            </div>
                            </form>
                              </div>
                          </div>
                      </div>







                  



                      <!-- Subcategories and course listing end -->













