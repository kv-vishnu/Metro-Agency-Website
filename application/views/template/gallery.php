<div class="site-content">
    <div class="content-section content-section-p-t-n subpage-banner">
        <div class="subpage-banner__container container">
            <div class="subpage-banner__wrapper">
                <img src="<?php echo base_url(); ?>website/images/gallery-banner.webp" alt="gallery-banner" width="1170" height="390"
                    class="subpage-banner__image" loading="lazy">
                <div class="subpage-banner__content">
                    <div class="subpage-banner__content-heading-and-description">
                        <h1 class="subpage-banner__heading">Photo Gallery</h1>
                        <p class="subpage-banner__description">Followings are the miscellanious photos from our office,
                            labs and classrooms</p>
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
                            <a href="index.php" class="breadcrumb__link">Home</a>
                        </li>
                        <li class="breadcrumb__li">Gallery</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="content-section gallery">
        <div class="container gallery__container">

            <div class="gallery__body">
            <?php if (!empty($gallery)) { ?>
                <?php foreach ($gallery as $row) { ?>  
                <div class="gallery__item">
                    <a href="<?php echo base_url('uploads/gallery/' . $row['image']); ?>" class="glightbox">
                        <img src="<?php echo base_url('uploads/gallery/' . $row['image']); ?>" alt="<?php echo $row['image']; ?>"
                            class="gallery__thumb" width="140" height="90" loading="lazy">
                    </a>
                </div>
            <?php } } ?>
            
            </div>
        </div>
    </div>
</div>