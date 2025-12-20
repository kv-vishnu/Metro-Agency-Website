<div class="page-header">
    <img src="<?php echo base_url(''); ?><?php echo $manfacturingheader[0]['banner_image']; ?>" 
         class="header-img">

    <div class="page-header-content">
        <h1><?php echo $manfacturingheader[0]['banner_title']; ?></h1>
        <!-- <p class="lead"><?php echo $manufacturingheader[0]['banner_description']; ?></p> -->
    </div>
</div>


    <!-- Facilities Section -->
    <section class="facilities-section">
        <div class="container">

       
            <h2 class="section-title">Our Manufacturing Facilities</h2>
            <p class="section-subtitle">Equipped with the latest technology and machinery for superior production</p>
                         <div class="row g-4">
                <!-- Product 1 -->
                  <?php foreach ($manufacturing as $manufacture): ?>
                <div class="col-lg-4 col-md-6 product-item" >
                    <div class="product-card">
                        <div class="product-image">
                            <img src="<?php echo base_url(''); ?>uploads/manufacture/<?php echo $manufacture['manufacture_image']; ?>" alt="Steel Structures">
                            
                        </div>
                        <div class="product-content">
                            <h3 class="product-title"><?php echo $manufacture['manufacture_title']; ?></h3>
                            <p class="product-description"><?php echo $manufacture['manufacture_address']; ?></p>
                            <p class="product-phone"><i class="fas fa-phone me-2"></i><?php echo $manufacture['manufacture_phone']; ?></p>
                           
                            <div class="product-footer">
                               <form action="<?= base_url('product/') ?>" method="post">
                                    <input type="hidden" 
                                        name="manfacture_category_id" 
                                        value="<?= $manufacture['manufacture_category_id']; ?>">
                                            <input type="hidden" 
                                        name="manfacture_id" 
                                        value="<?= $manufacture['id']; ?>">
                                    <button type="submit" class="read-more">View More</button>
                                </form>
                            </div>
                        </div>
                   
                    </div>
                      
                </div>
                <?php endforeach; ?>
            </div>
           
        </div>
    </section>

     <!-- Facilities Section end -->

