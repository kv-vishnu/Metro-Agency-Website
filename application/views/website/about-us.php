<div class="page-header">
    <img src="<?php echo base_url(''); ?><?php echo $aboutheader[0]['banner_image']; ?>" 
         class="header-img">

    <div class="page-header-content">
        <h1><?php echo $aboutheader[0]['title']; ?></h1>
       
    </div>
</div>


<section id="about" class="section">
    <div class="container">

        <h2 class="section-title">
            <?= $aboutus [0]['title'] ?? '' ?>
        </h2>

        <div class="about-content">

            <div class="about-image slide-in"
                 style="background-image:url('<?= base_url($aboutus [0]['banner_image']) ?>')">
            </div>

            <div class="about-text">
               <h3> <?= $aboutus[0]['banner_title'] ?? '' ?></h3>
               <p> <?= $aboutus[0]['banner_description'] ?? '' ?></p>
                           <div class="stats">
                        <div class="stat-item">
                            <div class="stat-number"><?= $aboutus[0]['project_completed'] ?? '' ?></div>
                            <div class="stat-label">Projects Completed</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number"><?= $aboutus[0]['year_experience'] ?? '' ?></div>
                            <div class="stat-label">Years Experience</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">100%</div>
                            <div class="stat-label">Client Satisfaction</div>
                        </div>
            </div>
            </div>



        </div>

    </div>
</section>


<!-- management section -->

    <section class="products section" id="products">
        <div class="container">
            <h2 class="section-title">Our Management</h2>
            <!-- <p class="section-description">
            At Metro Agencies, we supply a wide variety of steel products, ensuring that our customers receive the exact material required for their operations
            </p> -->
            <div class="row g-4">
              <?php foreach ($management as $manage): ?>
            <div class="col-lg-4 col-md-6 ">
               
                <div class="product-card">
                    <div class="products-image">
                        <img src="<?php echo base_url(''); ?>uploads/management/<?php echo $manage['management_image']; ?>" alt="CR (Cold Rolled) Coils">
                    </div>
                    <div class="product-content">
                        <h3><?php echo $manage['name']; ?></h3>
                        <p><?php echo $manage['designation']; ?></p>
                        <p><?php echo $manage['short_bio']; ?></p>
                        <!-- <a href="#" class="read-more">Read More</a> -->
                    </div>
                </div>
               
            </div>
             <?php endforeach; ?>
             </div>
        </div>
    </section>