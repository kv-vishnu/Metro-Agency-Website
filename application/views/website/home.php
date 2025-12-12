
    <!-- Hero Section with Slider -->
    <div class="hero " id="home" style="display:none;">
        <div class="slider">
            <div class="slide slide1 active"></div>
            <div class="slide slide2"></div>
        </div>
        <div class="hero-content">
            <h1 class="slide-in">Kerala’s Trusted Name in Steel Since 1976</h1>
            <!-- <p>Innovative aluminium fabrication for modern architectural spaces</p> -->
        </div>
        <div class="slider-controls">
            <div class="slider-dot active" data-slide="0"></div>
            <div class="slider-dot" data-slide="1"></div>
            <div class="slider-dot" data-slide="2"></div>
        </div>
    </div>





<div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-ride="carousel">
    <div class="carousel-inner">

        <?php $i = 0; foreach($slider as $slide): ?>
            <div class="carousel-item <?= ($i==0 ? 'active' : '') ?>">
                <img src="<?= base_url('uploads/slider/'.$slide['image']) ?>" class="d-block w-100" alt="">
                
                <div class="carousel-caption carousel-captions d-block">
                    <h5 class="text-center d-none d-md-block"><?= $slide['title'] ?></h5>
                </div>
            </div>
        <?php $i++; endforeach; ?>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>





    

    <!-- About Section -->

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
               <?= $aboutus[0]['banner_description'] ?? '' ?>
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






    <section class="products section" id="products">
    <div class="container">

        <h2 class="section-title">Our Categories</h2>

        <p class="section-description d-none">
            At Metro Agencies, we supply a wide variety of steel products..
        </p>

        <div class="products-grid">

            <?php foreach($categories as $cat): ?>

                <div class="product-card product-item" data-category="<?= $cat['id'] ?>">

                    <div class="product-image">
                        <img src="<?= base_url("uploads/category/".$cat['category_image']) ?>" 
                             alt="<?= $cat['category_title'] ?>">
                    </div>

                    <div class="product-content">
                        <h3><?= $cat['category_title'] ?></h3>

                        <p><?= $cat['category_description'] ?></p>

                        <a href="<?= base_url('product'); ?>" class="read-more">
                            View More
                        </a>
                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>
</section>



    <!-- Contact Section -->
    <section class="contact section" id="contact">
        <div class="container">
            <h2 class="section-title">Contact Us</h2>
            <div class="contact-content">
                <div class="contact-info">
                    <h3>Get In Touch</h3>
                    <div class="info-item">
                        <div class="info-icon">📍</div>
                        <div>
                            <strong>Address</strong><br>
                            <?= $settings[0]['address'] ?? ''; ?>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">📞</div>
                        <div>
                            <strong>Phone</strong><br>
                           <?= $settings[0]['phone_no'] ?? ''; ?>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">📧</div>
                        <div>
                            <strong>Email</strong><br>
                           <?= $settings[0]['email'] ?? ''; ?>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">🕒</div>
                        <div>
                            <strong>Working Hours</strong><br>
                            <?= $settings[0]['working_hours'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <form class="contact-form">
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" id="name" name="name" placeholder="Your Name" required>
                             <div class="error" id="error_name" style="color:red;"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" id="email" name="email" type="email" placeholder="Your Email" required>
                             <div class="error" id="error_email" style="color:red;"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <input id="phone_no" name="phone_no" type="tel" placeholder="Phone Number">
                             <div class="error" id="error_phone_no" style="color:red;"></div>
                        </div>
                        <div class="form-group">
                            <input id="subject" name="subject" type="text" placeholder="Subject">
                             <div class="error" id="error_subject" style="color:red;"></div>
                        </div>
                        <div class="form-group">
                          <select name="product_name" class="form-select" id="product_name">
                            <option value="">select product</option>
                            <?php foreach($products as $product):?>
                            <option value="<?php echo $product['product_name']; ?>"><?php echo $product['product_name']; ?></option>
                                <?php endforeach; ?>
                          </select>
                             <div class="error" id="error_product_name" style="color:red;"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea id="message" name="message" placeholder="Your Message" required></textarea>
                         <div class="error" id="error_message" style="color:red;"></div>
                    </div>
                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>
        </div>
    </section>




