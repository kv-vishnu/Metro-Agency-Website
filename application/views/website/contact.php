
<div class="page-header">
    <img src="<?php echo base_url(''); ?><?php echo $contactheader[0]['banner_image']; ?>" 
         class="header-img">

    <div class="page-header-content">
        <h1><?php echo $contactheader[0]['banner_title']; ?></h1>
        <!-- <p class="lead"><?php echo $contactheader[0]['banner_description']; ?></p> -->
    </div>
</div>


<section id="about" class="section">
    <div class="container">

        <h2 class="section-title">
            <?= $contactheader [0]['banner_title'] ?? '' ?>
        </h2>

        <div class="contact-contents">

            <div class="contact-text">
             
              <?= $contactheader[0]['banner_summary'] ?? '' ?>
                        
            </div>


            <div class="">
        <form class="contact-form" id="contactForm">
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



    </div>
</section>

    <!-- Contact Section -->
    <section class="contact section d-none" id="contact">
        <div class="container">
            <!-- <h2 class="section-title">Contact Form</h2> -->
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
                <form class="contact-form" id="contactForm">
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




