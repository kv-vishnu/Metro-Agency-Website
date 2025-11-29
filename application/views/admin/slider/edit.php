  <div class="admin-content">
      <div class="container-fluid">
          <?php include 'application/views/admin/template/sidebar.php' ?>
          <div class="admin-main-content">
              <form action="" method="post" enctype="multipart/form-data">
                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-12">
                              <div class="page-title">
                                  <h2>Edit Slider - <?= $slider['title']; ?></h2>
                              </div>
                           
                          </div>
                      </div>
                      <!-- end page title -->







                      <div class="row">
                          <div class="col-12">
                              <div class="admin-main-content__section">
                                  <!-- Banner Section -->
                                  <h5 class="admin-main-content__section-title"> Edit Slider Section</h5>
                                   <input type="hidden" id="edit_id" class="form-control"
                                      value="<?= $slider['id']; ?>">
                                  <div class="mb-3">
                                      <label class="form-label">Title</label>
                                      <input type="text" class="form-control" id="slider_title" name="slider_title"
                                          value="<?=$slider['title']; ?>">
                                      <div class="error" id="error_slider_title" style="color:red;"></div>
                                  </div>
                                  <div class="mb-3">
                                      <label class="form-label">Description</label>
                                      <textarea class="form-control" id="slider_text" name="slider_text"
                                          rows="3"><?= $slider['description']; ?></textarea>
                                      <div class="error" id="error_slider_text" style="color:red;"></div>
                                  </div>
                                  <div class="mb-3">
                                      <label class="form-label">Image</label>
                                      <input type="file" class="form-control" id="slider_image" name="slider_image">
                                      <img src="<?php echo base_url() ?>/uploads/slider/<?php echo $slider['image'] ?>"
                                          alt="current-image" class="img-fluid mt-2" style="max-height: 100px;">
                                      <input type="hidden" id="old_slider_image" class="form-control"
                                          value="<?= $slider['image']; ?>">
                                      <div class="error" id="error_slider_image" style="color:red;"></div>
                                  </div>
                                 
                              </div>
                          </div>
                      </div>


                       <div class="text-end">
                                                <button type="submit" id="update_slider" class="btn btn-success">Update Category</button>
                                                <div class="me-auto" id="categorySuccessMsg" style="color: green;"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                      <!-- Subcategories and course listing end -->













