<div class="site-content">
    <div class="content-section content-section-p-t-n subpage-banner">
        <div class="subpage-banner__container container">
            <div class="subpage-banner__wrapper">
                <img src="<?php echo base_url() ?><?php echo $page_details['banner_image']; ?>"
                    alt="<?php echo $page_details['banner_img_alt']; ?>" width="1170" height="390" class="subpage-banner__image">
                <div class="subpage-banner__content">
                    <div class="subpage-banner__content-heading-and-description">
                        <h1 class="subpage-banner__heading"><?php echo $page_details['banner_title']; ?>
                        </h1>
                        <p class="subpage-banner__description"><?php echo $page_details['banner_description']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-section-p-t-b-n">
        <div class="container">
            <div class="breadcrumb">
                <div class="container breadcrumb__container">
                    <ul class="breadcrumb__ul">
                        <li class="breadcrumb__li">
                            <a href="<?php echo base_url(); ?>" class="breadcrumb__link">Home</a>
                        </li>
                        <li class="breadcrumb__li"><?php echo $page_details['title']; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="content-section content-section-p-b-n about-us-section">
        <div class="container about-us-section__container">
            <h2 class="about-us-section__heading"><?= $contents['title'] ?></h2>
            <div class="about-us-section__main">
                <div class="about-us-section__main-col1">
                    <img src="<?php echo base_url() ?><?php echo $contents['image']; ?>" alt="<?php echo $contents['about_img_alt']; ?>"
                        class="about-us-section__main-col-image" loading="lazy">
                </div>
                <div class="about-us-section__main-col2">
                    <p class="about-us-section__description"><?= $contents['content'] ?></p>
                </div>
            </div>



        </div>
    </div>

    <div class="content-section">
        <div class="container">
            <h2><?= $contents['title2'] ?></h2>
            <p><?= $contents['content2'] ?></p>
            <div class="emigo-service-provider__section">
                <a href="<?php echo base_url(); ?>certification-training" class="emigo-service-provider__section-item">
                    <h3 class="emigo-service-provider__section-item-heading">Certifications</h3>
                    <img src="website/images/emigo-home-certifications-thumb.webp" alt="emigo-home-certifications-thumb"
                        class="emigo-service-provider__section-item-image" loading="lazy">
                    <p class="emigo-service-provider__section-item-description">Elevate your skills and career with
                        our comprehensive, expert-led training programs.</p>
                    <span class="btn2 emigo-service-provider__section-item-btn">Learn More</span>
                </a>
                <a href="<?php echo base_url(); ?>corporate-training" class="emigo-service-provider__section-item">
                    <h3 class="emigo-service-provider__section-item-heading">Corporate Training</h3>
                    <img src="website/images/emigo-home-corporate-training-thumb.webp"
                        alt="emigo-home-corporate-training-thumb" class="emigo-service-provider__section-item-image"
                        loading="lazy">
                    <p class="emigo-service-provider__section-item-description">Empower your team with tailored
                        programs for enhanced skills and organizational growth.</p>
                    <span class="btn2 emigo-service-provider__section-item-btn">Learn More</span>
                </a>
                <a href="#" class="emigo-service-provider__section-item">
                    <h3 class="emigo-service-provider__section-item-heading">IT Outsourcing</h3>
                    <img src="website/images/emigo-home-it-outsourcing-thumb.webp" alt="emigo-home-it-outsourcing-thumb"
                        class="emigo-service-provider__section-item-image" loading="lazy">
                    <p class="emigo-service-provider__section-item-description">Leverage our expertise to streamline
                        operations, and boost business efficiency.</p>
                    <span class="btn2 emigo-service-provider__section-item-btn">Learn More</span>
                </a>
                <a href="#" class="emigo-service-provider__section-item">
                    <h3 class="emigo-service-provider__section-item-heading">IT Solutions</h3>
                    <img src="website/images/emigo-home-it-solutions-thumb.webp" alt="emigo-home-it-solutions-thumb"
                        class="emigo-service-provider__section-item-image" loading="lazy">
                    <p class="emigo-service-provider__section-item-description">Discover cutting-edge products
                        designed to optimize your digital success.</p>
                    <span class="btn2 emigo-service-provider__section-item-btn">Learn More</span>
                </a>
            </div>
        </div>
    </div>



</div>