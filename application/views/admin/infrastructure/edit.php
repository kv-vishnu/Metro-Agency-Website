  <div class="admin-content">
      <div class="container-fluid">
          <?php include 'application/views/admin/template/sidebar.php' ?>
          <div class="admin-main-content">
              <form action="" method="post" enctype="multipart/form-data">
                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-12">
                              <div class="page-title">
                                  <h2>Edit Category - <?= $infrastructure['name']; ?></h2>
                              </div>
                              <div class="page-url-and-view d-none">
                                  <div class="page-url-and-view__page-url">
                                      <div class="page-url-and-view__page-url-label">Page URL:</div>
                                      <div class="page-url-and-view__page-url-value">
                                          <?= base_url('certification-training/'.$infrastructure['slug']); ?></div>
                                  </div>
                                  <div class="page-url-and-view__view"><a target="_blank"
                                          href="<?= base_url('certification-training/'.$infrastructure['slug']); ?>"
                                          class="btn btn-primary">View</a></div>
                              </div>
                          </div>
                      </div>
                      <!-- end page title -->

   

                      <div class="row meta-section">
                          <div class="col-12">
                              <h4 class="meta-section__title">Meta Infrastructure</h4>
                              <div class="meta-section__content">
                                  <input type="hidden" id="infrastructure_id" class="form-control"
                                      value="<?= $infrastructure['id']; ?>">
                                  <div class="meta-section__content-item">
                                      <label class="form-label">Meta Title</label>
                                      <div class="meta-section__value-and-validation">
                                          <input type="text" class="form-control" id="metatitle"
                                              value="<?= $infrastructure['metatitle']; ?>" name="metatitle">
                                          <div class="error" id="error_edit_title" style="color:red;"></div>
                                      </div>

                                  </div>
                                  
                                
                                  <div class="meta-section__content-item">
                                      <label class="form-label">Slug</label>
                                      <div class="meta-section__value-and-validation">
                                          <input type="text" class="form-control" id="slug"
                                              value="<?= $infrastructure['slug']; ?>" name="slug">
                                          <div class="error" id="error_edit_slug" style="color:red;"></div>
                                      </div>
                                  </div>
                                  <!-- Meta Section -->

                                  <div class="meta-section__content-item">
                                      <label class="form-label">Meta Keywords</label>
                                      <div class="meta-section__value-and-validation">
                                          <input type="text" class="form-control" id="meta_keywords"
                                              value="<?= $infrastructure['metakeyword']; ?>" name="meta_keywords">
                                          <div class="error" id="error_edit_keywords" style="color:red;"></div>
                                      </div>
                                  </div>

                                  <div class="meta-section__content-item meta-section__content-item--meta-description">
                                      <label class="form-label">Meta Description</label>
                                      <div class="meta-section__value-and-validation">
                                          <textarea class="form-control" id="meta_description" name="meta_description"
                                              rows="3"><?= $infrastructure['metadescription']; ?></textarea>
                                          <div class="error" id="error_description" style="color:red;"></div>
                                      </div>
                                  </div>
                                  <div class="meta-section__content-item meta-section__content-item--meta-description">
                                      <label class="form-label">Schema Integration</label>
                                      <div class="meta-section__value-and-validation">
                                          <textarea class="form-control" id="page_schema" name="page_schema"
                                              rows="3"><?= $infrastructure['page_schema']; ?></textarea>
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
                                      <input type="text" class="form-control" id="infrastructure_edit_title" name="infrastructure_edit_title"
                                          value="<?= $infrastructure['infrastructure_title']; ?>">
                                      <div class="error" id="error_infrastructure_edit_title" style="color:red;"></div>
                                  </div>
                                  <div class="mb-3">
                                      <label class="form-label">Description</label>
                                      <textarea class="form-control summernote" id="infrastructure_edit_description" name="infrastructure_edit_description"
                                          rows="3"><?= $infrastructure['infrastructure_description']; ?></textarea>
                                      <div class="error" id="error_infrastructure_edit_description" style="color:red;"></div>
                                  </div>
                                  <div class="mb-3">
                                      <label class="form-label">Image</label>
                                      <input type="file" class="form-control" id="infrastructure_edit_image" name="infrastructure_edit_image">
                                      <img src="<?php echo base_url() ?>/uploads/infrastructure/<?php echo $infrastructure['infrastructure_image'] ?>"
                                          alt="current-image" class="img-fluid mt-2" style="max-height: 100px;">
                                      <input type="hidden" id="old_infrastructure_image" class="form-control" name="old_infrastructure_image"
                                          value="<?= $infrastructure['infrastructure_image']; ?>">
                                      <div class="error" id="error_infrastructure_edit_image" style="color:red;"></div>
                                  </div>
                                   <div class="text-end">
                                                <button type="submit" id="update_infrastructure" class="btn btn-success">Update Infrastructure</button>
                                                <div class="me-auto" id="categorySuccessMsg" style="color: green;"></div>
                                            </div>
                            </form>
                              </div>
                          </div>
                      </div>







                  



                      <!-- Subcategories and course listing end -->













