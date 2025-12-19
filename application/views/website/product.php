<input type="hidden" id="manfacture_ids" value="<?php echo $manfacture_ids; ?>">
<div class="page-header">
    <img src="<?php echo base_url(''); ?><?php echo $productheader[0]['banner_image']; ?>" 
         class="header-img">

    <div class="page-header-content">
        <h1><?php echo $productheader[0]['title']; ?></h1>
    </div>
</div>

 <!-- Filter Section -->
    <div class="container">
        <div class="filter-section">
            <div class="">
                <h5 class="mb-3">Filter by Category</h5>
                 <?php foreach ($categories as $category): ?>
                <button class="filter-btn" data-category="<?php echo $category['id']; ?>"><?php echo $category['category_title']; ?></button>
                     <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Filter Section end -->


        <!-- Products Grid -->
    <div class="products-container">
        <div class="container">
            <div class="row g-4">
                <!-- Product 1 -->
                  <?php foreach ($products as $product): ?>
                <div class="col-lg-4 col-md-6 product-item" data-category="<?php echo $product['product_category']; ?>">
                    

                    <div class="product-card">
                    
                        <div class="product-image">
                            <a href="<?= base_url('product/'.$product['slug']); ?>">
                                 <img src="<?php echo base_url(''); ?>uploads/product/<?php echo $product['product_image']; ?>" alt="Steel Structures">
                           
                            </a>
                           
                        </div>
                        <div class="product-content">
                            <h3 class="product-title"><?php echo $product['product_name']; ?></h3>
                            <!-- <p class="product-description"><?php echo $product['product_description']; ?></p> -->
                            <!-- <ul class="product-features">
                                <li><i class="fas fa-check-circle"></i> High tensile strength</li>
                                <li><i class="fas fa-check-circle"></i> Corrosion resistant coating</li>
                                <li><i class="fas fa-check-circle"></i> Custom designs available</li>
                            </ul> -->
                            <div class="product-footer">
                                <a href="<?= base_url('product/'.$product['slug']); ?>" class="read-more">View More</a>
                            </div>
                        </div>
                   
                    </div>
                      
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

