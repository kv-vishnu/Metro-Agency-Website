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
                        <h4 class="meta-section__title">Meta Informations</h4>
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
                                  <textarea class="form-control update-table-field summernote" rows="3"
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
                                    data-uploadpath = "./uploads/about_us/">
                                    <img src="<?= base_url() ?><?= $page_details['banner_image']; ?>" alt="Banner Image" class="img-thumbnail mt-2" style="max-width: 200px;">
                                </div>


                            <div class="mb-3">
                                  <label class="form-label">Project Completed</label>
                                  <input type="text" class="form-control update-table-field"  value="<?php echo $page_details['project_completed']; ?>"
                                    data-field="project_completed"
                                    data-table="pages"
                                    data-id="<?= $page_details['page_id']; ?>">
                              </div>

                                <div class="mb-3">
                                  <label class="form-label">Year of Experience </label>
                                  <input type="text" class="form-control update-table-field"  value="<?php echo $page_details['year_experience']; ?>"
                                    data-field="year_experience"
                                    data-table="pages"
                                    data-id="<?= $page_details['page_id']; ?>">
                                </div>


                            <div class="mb-3">
                                <label class="form-label">Our Mission</label>
                                  <textarea rows="3" class="form-control summernote update-table-field" 
                                    data-field="our_mission"
                                    data-table="pages"
                                    data-id="<?= $page_details['page_id']; ?>"><?php echo $page_details['our_mission']; ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Our Vision</label>
                                  <textarea rows="3" class="form-control summernote update-table-field"  
                                    data-field="our_vision"
                                    data-table="pages"
                                    data-id="<?= $page_details['page_id']; ?>"><?php echo $page_details['our_vision']; ?></textarea>
                            </div>

                             <div class="mb-3">
                                <label class="form-label">Our Values</label>
                                  <textarea rows="3"  class="form-control summernote update-table-field"  
                                    data-field="our_values"
                                    data-table="pages"
                                    data-id="<?= $page_details['page_id']; ?>"><?php echo $page_details['our_values']; ?></textarea>
                            </div>




                          </div>
                      </div>
                  </div>

                    <div id="featuredMessage"></div>
                  <!-- banner section end -->

             </div>





         </div>
     </div>
 </div>

