 <div class="admin-content">
     <div class="container-fluid">
         <?php include 'application/views/admin/template/sidebar.php' ?>
         <div class="admin-main-content">
             <div id="page_content">
                <div class="d-flex justify-content-between align-items-center my-3">
                    <h2 class="mb-0">Page: <?php echo $page_details['title']; ?></h2>
                    <h6>Page Url : <?= base_url($slug); ?></h6>
                    <a target="_blank" href="<?= base_url($slug); ?>" class="btn btn-primary">View</a>
                </div>
                 <?php echo $section_html;  ?>
             </div>

             

             <div id="loadingSpinner" style="display: none; text-align: center;">
                 <div class="spinner-border text-primary" role="status">
                     <span class="visually-hidden">Loading...</span>
                 </div>
             </div>

         </div>
     </div>
 </div>

 <!-- Add Element Modal -->
 <div class="modal fade" id="addElementModal" tabindex="-1" aria-labelledby="addElementModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Add Element</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <input type="text" id="selected_section_id">
                 <input type="text" id="selected_row_id">
                 <input type="text" id="selected_colomn_id">
                 <label for="elementType">Select Element:</label>
                 <select id="elementType" class="form-select">
                     <option value="select">Select</option>
                     <!-- <option value="header">Header</option>
                        <option value="footer">Footer</option> -->
                     <option value="slider">Slider</option>
                     <option value="widgets">Widgets</option>
                     <option value="certifications">Certifications List</option>
                     <option value="gallery">Gallery</option>
                     <option value="video">Video</option>
                     <option value="text">Text</option>
                     <option value="textarea">Paragraph</option>
                     <option value="image">Image</option>
                     <option value="link">Link Button</option>
                     <option value="loop">Loop</option>
                     <option value="loop_with_image">Loop with Image</option>
                 </select>
                 <div id="elementContent" class="mt-3">
                     <input type="text" id="textInput" class="form-control d-none" placeholder="Enter text">
                     <textarea id="textareaInput" class="form-control d-none"
                         placeholder="Enter description"></textarea>
                     <input type="file" id="imageInput" class="form-control d-none">

                     <!-- Button Fields -->
                     <input type="text" id="buttonText" class="form-control d-none mt-2" placeholder="Button Text">
                     <input type="text" id="buttonLink" class="form-control d-none mt-2" placeholder="Button Link">

                     <input type="number" id="loopCount" class="form-control d-none mt-2"
                         placeholder="Enter Loop Count">

                     <input type="number" id="loop_with_image_Count" class="form-control d-none mt-2"
                         placeholder="Enter Loop with image count">

                     <select id="sliderSelect" class="form-select d-none mt-2">
                         <option value="home_page_slider">Home Page Slider</option>
                         <option value="associates">Associates Slider</option>
                         <option value="featured_courses">Featured Courses</option>
                         <option value="tutor">Trainers</option>
                         <option value="upcoming_batches">Upcoming Batches</option>
                         <option value="testimonials">Testimonials</option>
                         <option value="blog">Blog</option>
                         <option value="course_categories">Course Categories</option>
                     </select>

                     <select id="widgetsSelect" class="form-select d-none mt-2">
                         <?php foreach ($widgets as $widget): ?>
                         <option value="<?= $widget['slug'] ?>">
                             <?= $widget['name'] ?>
                         </option>
                         <?php endforeach; ?>
                         <option value="video">Video</option>
                         <option value="seo-content">SEO Content</option>
                     </select>


                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-primary" id="saveElement"
                     data-page="<?= $page_id; ?>">Save</button>
             </div>
         </div>
     </div>
 </div>





 <!-- Change width modal -->
 <div class="modal fade" id="changeWidthModal" tabindex="-1" aria-labelledby="changeWidthModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Change Column Width</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <input type="hidden" id="targetColumnId">
                 <label for="columnWidthSelect">Select Width (1 - 12):</label>
                 <select class="form-select" id="columnWidthSelect">
                     <?php for ($i = 1; $i <= 12; $i++) { ?>
                     <option value="<?= $i; ?>">col-md-<?= $i; ?></option>
                     <?php } ?>
                 </select>
             </div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                 <button class="btn btn-primary" id="saveColumnWidth">Update Width</button>
             </div>
         </div>
     </div>
 </div>

 <!-- Change Section class name popup Section -->
 <div class="modal fade" id="changeClassModal" tabindex="-1" aria-labelledby="changeWidthModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Change Class</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <input type="text" id="selected_section_id_class">
                 <input type="text" id="selected_class">
                 <label class="mt-3" for="customCssClass">Custom CSS Class:</label>
                 <input type="text" class="form-control" id="customCssClass" placeholder="e.g., my-custom-style">
             </div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                 <button class="btn btn-primary" id="updateClass">Update Class</button>
             </div>
         </div>
     </div>
 </div>

 <!-- Change Container class name popup Section -->
 <div class="modal fade" id="changeClassContainerModal" tabindex="-1" aria-labelledby="changeWidthModalLabel"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Change Container Class</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <input type="text" id="selected_container_id_class">
                 <input type="text" id="selected_container_class">
                 <label class="mt-3" for="customCssContainerClass">Custom CSS Class:</label>
                 <input type="text" class="form-control" id="customCssContainerClass"
                     placeholder="e.g., my-custom-style">
             </div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                 <button class="btn btn-primary" id="updateContainerClass">Update Class</button>
             </div>
         </div>
     </div>
 </div>

 <!-- Change Coloumn class name popup Section -->
 <div class="modal fade" id="changeColoumnClassModal" tabindex="-1" aria-labelledby="changeWidthModalLabel"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Change Coloumn Class</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <input type="text" id="selected_coloumn_id_class">
                 <input type="text" id="selected_coloumn_class">
                 <label class="mt-3" for="customCssClass">Custom CSS Class:</label>
                 <input type="text" class="form-control" id="customColoumnCssClass" placeholder="e.g., my-custom-style">
             </div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                 <button class="btn btn-primary" id="updateColoumnClass">Update Class</button>
             </div>
         </div>
     </div>
 </div>