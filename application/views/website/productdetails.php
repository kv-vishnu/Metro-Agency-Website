
<div class="container">
            <div class="product-details-section">
            <div class="product-details-container">

              <?php foreach ($productdetails as $product): ?>
                <!-- Left Side - Image Gallery -->
                <div class="product-images">
                    <div class="main-image-container">
                        <img src="<?php echo base_url('uploads/product/' . $product['product_image']); ?>" alt="<?php echo $product['product_name']; ?>" class="main-image" id="mainImage">
                        
                    </div>
                    <!-- <div class="thumbnail-images">
                        <img src="https://images.unsplash.com/photo-1513467535987-fd81bc7d62f8?w=300&h=200&fit=crop" alt="Thumbnail 1" class="thumbnail active" onclick="changeImage(this, 'https://images.unsplash.com/photo-1513467535987-fd81bc7d62f8?w=1200&h=800&fit=crop')">
                        <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=300&h=200&fit=crop" alt="Thumbnail 2" class="thumbnail" onclick="changeImage(this, 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1200&h=800&fit=crop')">
                        <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=300&h=200&fit=crop" alt="Thumbnail 3" class="thumbnail" onclick="changeImage(this, 'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=1200&h=800&fit=crop')">
                        <img src="https://images.unsplash.com/photo-1487958449943-2429e8be8625?w=300&h=200&fit=crop" alt="Thumbnail 4" class="thumbnail" onclick="changeImage(this, 'https://images.unsplash.com/photo-1487958449943-2429e8be8625?w=1200&h=800&fit=crop')">
                    </div> -->
                </div>

                <!-- Right Side - Product Info -->
                <div class="product-info">
                    <h1 class="product-title"><?php echo $product['product_name']; ?></h1>
                    
                    <!-- <div class="product-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="rating-text">4.5/5 (124 Reviews)</span>
                    </div> -->
                    
                    <!-- <div class="product-price">
                        ₹2,50,000 - ₹15,00,000
                        <div class="price-note">*Price varies based on specifications</div>
                    </div> -->


                    <div class="productdetails">
                     <?php echo $product['product_description']; ?>
                    </div>
                    
                   
                    <!-- <div class="product-features">
                        <h3 class="features-title">Key Features</h3>
                        <ul class="features-list">
                            <li><i class="fas fa-check-circle"></i> High tensile strength steel (IS 2062 Grade)</li>
                            <li><i class="fas fa-check-circle"></i> Corrosion-resistant coating with 20+ years warranty</li>
                            <li><i class="fas fa-check-circle"></i> Custom designs available as per requirements</li>
                            <li><i class="fas fa-check-circle"></i> Seismic zone compliant structures</li>
                            <li><i class="fas fa-check-circle"></i> Pre-engineered and pre-fabricated options</li>
                            <li><i class="fas fa-check-circle"></i> Quick installation with minimal downtime</li>
                        </ul>
                    </div> -->
                    
                    <!-- <div class="product-specs">
                        <h3 class="specs-title">Specifications</h3>
                        <div class="specs-grid">
                            <div class="spec-item">
                                <span class="spec-label">Material Grade:</span>
                                <span class="spec-value">IS 2062 E250</span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Coating:</span>
                                <span class="spec-value">Hot Dip Galvanized</span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Span Capacity:</span>
                                <span class="spec-value">Up to 60m</span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Load Capacity:</span>
                                <span class="spec-value">As per design</span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Delivery Time:</span>
                                <span class="spec-value">15-30 days</span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Warranty:</span>
                                <span class="spec-value">20 years</span>
                            </div>
                        </div>
                    </div> -->  
                    
                    <div class="product-actions">
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal" data-product-name="<?= $product['product_name']; ?>"  class="btn-secondary-action"><i class="fas fa-phone"></i> Contact Us</button>
                    <a  href="<?= base_url('uploads/productbrodhure/' . $product['product_brodhure']); ?>" class="btn-secondary-action" download><i class="fas fa-file-download mx-1"></i>Download Brochure</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
             
        </div>
</div>



<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Enquiry</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="careerform" method="post" enctype="multipart/form-data">
          <div class="mb-3">

           <div class="mb-3">
            <label for="message-text" class="col-form-label">Product Name</label>
            <input  type="text"  readonly class="form-control" id="product_name" name="product_name" >
             <div class="error" id="error_career_file" style="color:red;"></div>
          </div>

            <label for="recipient-name" class="col-form-label">Name</label>
            <input type="text" class="form-control" id="contact_name" name="contact_name">
            <div class="error" id="error_contact_name" style="color:red;"></div>
          </div>

          <div class="mb-3">
            <label for="message-text" class="col-form-label">Email</label>
            <input type="text" class="form-control" id="contact_email" name="contact_email">
             <div class="error" id="error_contact_email" style="color:red;"></div>
          </div>

           <div class="mb-3">
            <label for="message-text" class="col-form-label">Message</label>
            <input type="text" class="form-control" id="contact_message" name="contact_message">
             <div class="error" id="error_contact_message" style="color:red;"></div>
          </div>
           <div class="mb-3">
            <label for="message-text" class="col-form-label">Phone No</label>
            <input type="text" class="form-control" id="contact_phone" name="contact_phone">
             <div class="error" id="error_contact_phone" style="color:red;"></div>
          </div>
         
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-secondary-action send-contact">Apply Now</button>
      </div>
    </div>
  </div>
</div>

<script>
    var exampleModal = document.getElementById('exampleModal');

exampleModal.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    var button = event.relatedTarget;

    // Get the data-value attribute
    var careerValue = button.getAttribute('data-product-name');

    console.log("Career Value:", careerValue); // should log "software developer"

    // Fill the input inside modal
    var input = exampleModal.querySelector('#product_name');
    input.value = careerValue;
});

</script>
