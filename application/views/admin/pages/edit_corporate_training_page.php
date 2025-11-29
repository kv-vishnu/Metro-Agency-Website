 <div class="admin-content">
     <div class="container-fluid">
         <?php include 'application/views/admin/template/sidebar.php' ?>
         <div class="admin-main-content">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-12">
                         <div class="page-title">
                             <h2>Page: <?php echo $page_details['title']; ?></h2>
                         </div>
                     </div>
                 </div>

                 <div class="row">
                    <div id="featuredMessage"></div>
                     <div class="col-12">
                         <div class="page-url-and-view">
                             <div class="page-url-and-view__page-url">
                                 <div class="page-url-and-view__page-url-label">Page URL</div>
                                 <div class="page-url-and-view__page-url-value"><?= base_url($slug); ?></div>
                             </div>
                             <div class="page-url-and-view__view"><a target="_blank" href="<?= base_url($slug); ?>"
                                     class="btn btn-primary">View</a></div>
                         </div>
                     </div>
                 </div>
                 <!-- meta section -->
                 <div class="row meta-section">
                    <div class="col-12">
                        <h4 class="meta-section__title">Meta Information</h4>
                        <div class="meta-section__content">
                            <div class="meta-section__content-item">
                                <label class="form-label">Meta Title</label>
                                <input type="text" class="form-control update-table-field" id="metatitle"
                                data-field="metatitle"
                                data-table="pages"
                                data-id="<?= $page_details['page_id']; ?>"
                                value="<?= $page_details['metatitle']; ?>" value="<?php echo $page_details['metatitle']; ?>">
                            </div>
                            <div class="meta-section__content-item">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control update-table-field" id="title"
                                data-field="title"
                                data-table="pages"
                                data-id="<?= $page_details['page_id']; ?>"
                                value="<?= $page_details['title']; ?>" value="<?php echo $page_details['title']; ?>">
                            </div>
                            <div class="meta-section__content-item">
                                <label class="form-label">Rel Canonical</label>
                                <input type="text" class="form-control update-table-field" id="canonical"
                                data-field="canonical"
                                data-table="pages"
                                data-id="<?= $page_details['page_id']; ?>"
                                value="<?= $page_details['canonical']; ?>" value="<?php echo $page_details['canonical']; ?>">
                            </div>
                            <div class="meta-section__content-item">
                                <label class="form-label">Slug</label>
                                <input type="text" class="form-control update-table-field" id="slug" value="<?php echo $page_details['slug']; ?>"
                                data-field="title"
                                data-table="pages"
                                data-id="<?= $page_details['page_id']; ?>">
                            </div>
                            <div class="meta-section__content-item">
                                <label class="form-label">Meta Keywords</label>
                                <input type="text" class="form-control update-table-field" value="<?php echo $page_details['metakeywords']; ?>"
                                data-field="metakeywords"
                                data-table="pages"
                                data-id="<?= $page_details['page_id']; ?>" >
                            </div>
                            <div class="meta-section__content-item meta-section__content-item--meta-description">
                                <label class="form-label">Meta Description</label>
                                <textarea class="form-control update-table-field"  rows="4"
                                data-field="metadescription"
                                data-table="pages"
                                data-id="<?= $page_details['page_id']; ?>" ><?php echo $page_details['metadescription']; ?></textarea>
                            </div>
                            <div class="meta-section__content-item meta-section__content-item--meta-description">
                                <label class="form-label">Schema Integration</label>
                                <textarea class="form-control update-table-field"  rows="4"
                                data-field="page_schema"
                                data-table="pages"
                                data-id="<?= $page_details['page_id']; ?>" ><?php echo $page_details['page_schema']; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- meta section end -->
                <!-- banner section start -->
                <div class="row">
                      <div class="col-12">
                          <div class="admin-main-content__section">
                              <h4 class="admin-main-content__section-title">Banner Section</h4>
                              <div class="mb-3">
                                  <label class="form-label">Title</label>
                                  <input type="text" class="form-control update-table-field"  value="<?php echo $page_details['banner_title']; ?>"
                                    data-field="banner_title"
                                    data-table="pages"
                                    data-id="<?= $page_details['page_id']; ?>">
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Text</label>
                                  <textarea class="form-control update-table-field" rows="3"
                                    data-field="banner_description"
                                    data-table="pages"
                                    data-id="<?= $page_details['page_id']; ?>"><?php echo $page_details['banner_description']; ?></textarea>
                              </div>
                              <div class="mb-3">
                                <label class="form-label">Banner Image</label>
                                <input type="file" class="form-control update-table-image"
                                    data-field="banner_image"
                                    data-table="pages"
                                    data-id="<?= $page_details['page_id']; ?>"
                                    data-oldimg="<?= $page_details['banner_image']; ?>"
                                    data-uploadpath = "./uploads/page_images/">
                                    <img src="<?= base_url() ?><?= $page_details['banner_image']; ?>" alt="Banner Image" class="img-thumbnail mt-2" style="max-width: 200px;">
                            </div>
                            <div class="mb-3">
                                  <label class="form-label">Alt</label>
                                  <input type="text" class="form-control update-table-field"  value="<?php echo $page_details['banner_img_alt']; ?>"
                                    data-field="banner_img_alt"
                                    data-table="pages"
                                    data-id="<?= $page_details['page_id']; ?>">
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- banner section end -->
                <!-- Section 1 section start -->
                <div class="row">
                      <div class="col-12">
                          <div class="admin-main-content__section">
                              <h4 class="admin-main-content__section-title">Section 1</h4>
                              <div class="mb-3">
                                  <label class="form-label">Title</label>
                                  <input type="text" class="form-control update-table-field" value="<?php echo $contents['section1_title']; ?>"
                                    data-field="section1_title"
                                    data-table="page_corporate_training"
                                    data-id="1">
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Content</label>
                                  <textarea class="form-control update-table-field" rows="3"
                                    data-field="section1_content"
                                    data-table="page_corporate_training"
                                    data-id="1"><?php echo $contents['section1_content']; ?></textarea>
                              </div>
                          </div>
                      </div>
                </div>

                <!-- loop items section1 modules -->
                        <div class="row">
                          <div class="col-md-12">
                            <div class="admin-main-content__section">
                                <h2 class="admin-main-content__section-title">Modules</h2>
                                <div class="row">
                                <?php foreach ($corporate_training_section1 as $item) { ?>
                                    <div class="col-md-3">
                                        <div class="hero-slider-item p-2">
                                            <input type="text" class="form-control mb-2 update-field"
                                                data-id="<?= $item['id']; ?>"
                                                data-field="title"
                                                value="<?= $item['title']; ?>">
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            </div>
                        </div>
                <!-- loop items section 1 modules -->
                <!-- Section 1 end -->
                 <!-- Section 2 section start -->
                <div class="row">
                      <div class="col-12">
                          <div class="admin-main-content__section">
                              <h4 class="admin-main-content__section-title">Section 2</h4>
                              <div class="mb-3">
                                  <label class="form-label">Title</label>
                                  <input type="text" class="form-control update-table-field" value="<?php echo $contents['section2_title']; ?>"
                                    data-field="section2_title"
                                    data-table="page_corporate_training"
                                    data-id="1">
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Content</label>
                                  <textarea class="form-control update-table-field" rows="3"
                                    data-field="section2_content"
                                    data-table="page_corporate_training"
                                    data-id="1"><?php echo $contents['section2_content']; ?></textarea>
                              </div>
                              <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control update-table-image"
                                    data-field="section2_image"
                                    data-table="page_corporate_training"
                                    data-id="1"
                                    data-oldimg="<?= $contents['section2_image']; ?>"
                                    data-uploadpath = "./uploads/page_images/">
                                    <img src="<?= base_url() ?><?= $contents['section2_image']; ?>" alt="Banner Image" class="img-thumbnail mt-2" style="max-width: 200px;">
                            </div>
                            <div class="mb-3">
                                  <label class="form-label">Alt</label>
                                  <input type="text" class="form-control update-table-field"  value="<?php echo $contents['section2_img_alt']; ?>"
                                    data-field="section2_img_alt"
                                    data-table="page_corporate_training"
                                    data-id="1">
                              </div>
                          </div>
                      </div>
                </div>
                <!-- Section 1 end -->
                <!-- Section 3 section start -->
                <div class="row">
                      <div class="col-12">
                          <div class="admin-main-content__section">
                              <h4 class="admin-main-content__section-title">Section 3</h4>
                              <div class="mb-3">
                                  <label class="form-label">Title</label>
                                  <input type="text" class="form-control update-table-field" value="<?php echo $contents['section3_title']; ?>"
                                    data-field="section3_title"
                                    data-table="page_corporate_training"
                                    data-id="1">
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Content</label>
                                  <textarea class="form-control update-table-field" rows="3"
                                    data-field="section3_content"
                                    data-table="page_corporate_training"
                                    data-id="1"><?php echo $contents['section3_content']; ?></textarea>
                              </div>
                              <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control update-table-image"
                                    data-field="section3_image"
                                    data-table="page_corporate_training"
                                    data-id="1"
                                    data-oldimg="<?= $contents['section3_image']; ?>"
                                    data-uploadpath = "./uploads/page_images/">
                                    <img src="<?= base_url() ?><?= $contents['section3_image']; ?>" alt="Banner Image" class="img-thumbnail mt-2" style="max-width: 200px;">
                            </div>
                            <div class="mb-3">
                                  <label class="form-label">Alt</label>
                                  <input type="text" class="form-control update-table-field"  value="<?php echo $contents['section3_img_alt']; ?>"
                                    data-field="section3_img_alt"
                                    data-table="page_corporate_training"
                                    data-id="1">
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Link</label>
                                  <input type="text" class="form-control update-table-field" value="<?php echo $contents['section3_link']; ?>"
                                    data-field="section3_link"
                                    data-table="page_corporate_training"
                                    data-id="1">
                              </div>
                          </div>
                      </div>
                </div>
                <!-- Section 3 end -->
                <!-- Section 4 section start -->
                <div class="row">
                      <div class="col-12">
                          <div class="admin-main-content__section">
                              <h4 class="admin-main-content__section-title">Section 4</h4>
                              <div class="mb-3">
                                  <label class="form-label">Title</label>
                                  <input type="text" class="form-control update-table-field" value="<?php echo $contents['section4_title']; ?>"
                                    data-field="section4_title"
                                    data-table="page_corporate_training"
                                    data-id="1">
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Content</label>
                                  <textarea class="form-control update-table-field" rows="3"
                                    data-field="section4_content"
                                    data-table="page_corporate_training"
                                    data-id="1"><?php echo $contents['section4_content']; ?></textarea>
                              </div>
                          </div>
                      </div>
                </div>
                <!-- Section 4 end -->
                 <!-- loop items section1 modules -->
                        <div class="row">
                          <div class="col-md-12">
                            <div class="admin-main-content__section">
                                <h2 class="admin-main-content__section-title">Modules</h2>
                                <div class="row">
                                <?php foreach ($corporate_training_section3 as $item) { ?>
                                    <div class="col-md-3">
                                        <div class="hero-slider-item p-2">
                                            <input type="text" class="form-control mb-2 update-field"
                                                data-id="<?= $item['id']; ?>"
                                                data-field="title"
                                                value="<?= $item['title']; ?>">

                                            <textarea class="form-control update-field"
                                                    data-id="<?= $item['id']; ?>"
                                                    data-field="content"><?= $item['content']; ?></textarea>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            </div>
                        </div>
                <!-- loop items section 1 modules -->
                 <!-- Section 5 section start -->
                <div class="row">
                      <div class="col-12">
                          <div class="admin-main-content__section">
                              <h4 class="admin-main-content__section-title">Section 5</h4>
                              <div class="mb-3">
                                  <label class="form-label">Title</label>
                                  <input type="text" class="form-control update-table-field" value="<?php echo $contents['section5_title']; ?>"
                                    data-field="section5_title"
                                    data-table="page_corporate_training"
                                    data-id="1">
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Content</label>
                                  <textarea class="form-control update-table-field" rows="3"
                                    data-field="section5_content"
                                    data-table="page_corporate_training"
                                    data-id="1"><?php echo $contents['section5_content']; ?></textarea>
                              </div>
                          </div>
                      </div>
                </div>
                <!-- Section 4 end -->
             </div>





         </div>
     </div>
 </div>

