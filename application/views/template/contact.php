<div class="site-content">
    <div class="content-section content-section-p-t-n subpage-banner">
        <div class="subpage-banner__container container" data-animate="fadeup">
            <div class="subpage-banner__wrapper">
                <img src="<?php echo base_url() ?><?php echo $page_details['banner_image']; ?>"
                    alt="sub-category-page-banner" width="1170" height="390" class="subpage-banner__image">
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
    <div class="content-section contact-section">
        <div class="contact-section__container container">
            <div class="contact-section__col1">
                <div class="contact-section__address-call-email">
                    <div class="contact-section__address-call-email-item">
                        <h3 class="contact-section__address-call-email-item-heading">
                            <img src="website/images/map-icon.svg" alt="map-icon"
                                class="contact-section__address-call-email-item-heading-icon">
                            Location
                        </h3>
                        <h4 class="contact-section__address-call-email-item-sub-heading">Emigo Network Experts Pvt Ltd.
                        </h4>
                        <p class="contact-section__address-call-email-item-text">
                            2nd Floor, Chakos Chembers,<br>
                            Civil Line Road, Palarivattom,<br>
                            Kochi, Kerala, India -682025
                        </p>

                    </div>
                    <div class="contact-section__address-call-email-item">
                        <h3 class="contact-section__address-call-email-item-heading">
                            <img src="website/images/phone-icon.svg" alt="phone-icon"
                                class="contact-section__address-call-email-item-heading-icon" loading="lazy">
                            Call
                        </h3>
                        <p class="contact-section__address-call-email-item-text">
                            <a href="tel:+914844061611" class="contact-section__address-call-email-item-text-link">+91
                                484
                                4061611</a>
                        </p>
                        <p class="contact-section__address-call-email-item-text">
                            <a href="tel:918606061612" class="contact-section__address-call-email-item-text-link">+91
                                860 6061612 </a>
                        </p>
                    </div>
                    <div class="contact-section__address-call-email-item">
                        <h3 class="contact-section__address-call-email-item-heading">
                            <img src="website/images/email-icon.svg" alt="email-icon"
                                class="contact-section__address-call-email-item-heading-icon" loading="lazy">
                            E-mail
                        </h3>
                        <p class="contact-section__address-call-email-item-text">
                            <a href="mailto:mail@emigonetworks.com"
                                class="contact-section__address-call-email-item-text-link">mail@emigonetworks.com</a>
                        </p>

                    </div>
                </div>
            </div>
            <div class="contact-section__col2">

                <?php echo $contact_us_page_enquiry; ?>

            </div>
        </div>

    </div>


</div>