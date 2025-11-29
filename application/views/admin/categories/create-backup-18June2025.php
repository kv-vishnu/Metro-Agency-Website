  <div class="admin-content">
      <div class="container-fluid">
          <?php include 'application/views/admin/template/sidebar.php' ?>
          <div class="admin-main-content">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-12">
                          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                              <h4 class="mb-3 font-size-18">New Category</h4>
                              <div class="page-title-right">
                                  <!-- <ol class="breadcrumb m-0">
                                      <li class="breadcrumb-item"><a
                                              href="<?php echo base_url();?>admin/dashboard">Home</a>
                                      </li>
                                      <i class="fa-solid fa-chevron-right "
                                          style="font-size: 9px;margin: 6px 5px 0px 5px;"></i>
                                      <li class="breadcrumb-item active">Pages</li>
                                  </ol> -->
                              </div>

                          </div>
                      </div>
                  </div>
                  <!-- end page title -->
                  <div class="row">
                      
                          <!-- Add Admin Page Form -->
                            <div class="col-12 mt-2">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="<?= base_url('adminpage/save') ?>" method="post" enctype="multipart/form-data">

                                            <!-- Meta Section -->
                                            <h5 class="text-dark">Meta Section</h5>
                                            <div class="mb-3">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" id="title" name="title">
                                                <div class="error" id="error_title" style="color:red;"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Slug</label>
                                                <input type="text" class="form-control" id="slug" name="slug">
                                                <div class="error" id="error_slug" style="color:red;"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Meta Keywords</label>
                                                <input type="text" class="form-control" id="keywords" name="meta_keywords">
                                                <div class="error" id="error_keywords" style="color:red;"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Meta Description</label>
                                                <textarea class="form-control" id="description" name="meta_description" rows="3"></textarea>
                                                <div class="error" id="error_description" style="color:red;"></div>
                                            </div>

                                            <!-- Banner Section -->
                                            <h5 class="text-dark mt-4">Banner Section</h5>
                                            <div class="mb-3">
                                                <label class="form-label">Banner Title</label>
                                                <input type="text" class="form-control" id="banner_title" name="banner_title">
                                                <div class="error" id="error_banner_title" style="color:red;"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Banner Text</label>
                                                <textarea class="form-control" id="banner_text" name="banner_text" rows="3"></textarea>
                                                <div class="error" id="error_banner_text" style="color:red;"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Banner Image</label>
                                                <input type="file" class="form-control" id="banner_image" name="banner_image">
                                                <div class="error" id="error_banner_image" style="color:red;"></div>
                                            </div>

                                            <!-- Introduction Section -->
                                            <h5 class="text-dark mt-4">Introduction Section</h5>
                                            <div class="mb-3">
                                                <label class="form-label">Home page Description(Trimmed content)</label>
                                                <textarea class="form-control" name="home_desc" id="home_desc" rows="3"></textarea>
                                                <div class="error" id="error_home_desc" style="color:red;"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Introduction Title</label>
                                                <input type="text" class="form-control" id="intro_title" name="intro_title">
                                                <div class="error" id="error_intro_title" style="color:red;"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Introduction Text</label>
                                                <textarea class="form-control" name="intro_text" id="intro_text" rows="3"></textarea>
                                                <div class="error" id="error_intro_text" style="color:red;"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Introduction Image (Logo)</label>
                                                <input type="file" class="form-control" id="intro_image" name="intro_image">
                                                <div class="error" id="error_intro_image" style="color:red;"></div>
                                            </div>

                                                <h5 class="text-dark mt-4">Contents Section</h5>
                                                 <div class="mb-3">
                                                    <label class="form-label">Certification Levels Description</label>
                                                    <textarea class="form-control summernote" id="levels_content" rows="1"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Benefits Content</label>
                                                    <textarea class="form-control summernote" id="benefits_content" rows="2"></textarea>
                                                    <div class="error" id="error_benefits_content" style="color:red;"></div>
                                                </div>

                                                <!-- Job Opportunities Section -->
                                                <div class="mb-3">
                                                    <label class="form-label">Job Opportunities Content</label>
                                                    <textarea class="form-control summernote" id="job_opportunities_content" rows="2"></textarea>
                                                </div>

                                                <!-- FAQ Section -->
                                                <div class="mb-3">
                                                    <label class="form-label">FAQ Content</label>
                                                    <textarea class="form-control summernote" id="faq_content" rows="2"></textarea>
                                                </div>

                                            <div class="text-end">
                                                <button type="submit" id="save_category" class="btn btn-success">Save Category</button>
                                                <div class="me-auto" id="categorySuccessMsg" style="color: green;"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                      


                  </div><!-- end col -->
              </div>
          </div>
      </div>
  </div>