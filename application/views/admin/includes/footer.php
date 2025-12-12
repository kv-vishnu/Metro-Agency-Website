    <!-- Footer -->
    <footer>
        <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
        <div class="footer-content">
            <div class="footer-section">
                <h3>About Metro Agencies</h3>
                <p>Metro Agencies, founded in 2006, has established itself as a trusted leader in Kerala's steel industry. As authorized dealers of JSW Steel and JSW coated products, the company offers a comprehensive range of high-quality steel products, including HR/MS coils and sheets, CR coils and sheets, and GP/GI coils and sheets</p>
                <div class="social-links">
                    <a href="https://www.facebook.com/profile.php?id=61566410651395" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://www.instagram.com/metro___agencies/?hl=en" class="social-icon"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <a href="<?php echo base_url(); ?>">Home</a>
                <a href="<?php echo base_url(''); ?>aboutus">About</a>
                <a href="<?php echo base_url(''); ?>product">Products</a>
                <a href="<?php echo base_url(''); ?>manufacturing-units">Manufacturing Units</a>
                <a href="<?php echo base_url(''); ?>infrastructure">Infrastructure & Logistics</a>
                <!-- <a href="#gallery">Track Order</a> -->
                <a href="<?php echo base_url('');?>contact">Contact</a>
                <a href="<?php echo base_url('');?>careers">Careers</a>
            </div>
            <div class="footer-section">
                <h3>Contact Info</h3>
                <p>Metro Agencies
                    Kottakkal, Kerala</p>
                <p>📞 +91 9645 00 00 96</p>
                <p>📧 info@metroagencies.com</p>
                <p>🕒 Mon-Sat: 9AM - 6PM</p>
            </div>
            <div class="footer-section">
                <h3>Location</h3>
                <div class="embed-map-responsive"><div class="embed-map-container"><iframe class="embed-map-frame" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&height=400&hl=en&q=Metro%20Agencies%20Kottakkal%2C%20Kerala&t=&z=14&ie=UTF8&iwloc=B&output=embed"></iframe><a href="https://sprunkiretake.net" style="font-size:2px!important;color:gray!important;position:absolute;bottom:0;left:0;z-index:1;max-height:1px;overflow:hidden">sprunki retake</a></div><style>.embed-map-responsive{position:relative;text-align:right;width:100%;height:0;padding-bottom:66.66666666666666%;}.embed-map-container{overflow:hidden;background:none!important;width:100%;height:100%;position:absolute;top:0;left:0;}.embed-map-frame{width:100%!important;height:100%!important;position:absolute;top:0;left:0;}</style></div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2025 Metro Agencies. All Rights Reserved.</p>
        </div>
    </footer>

<!-- modal -->
    <div class="modal fade" id="messageModal" tabindex="-1">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <!-- <h5 class="modal-title">Message Details</h5> -->
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
         </div>
         <div class="modal-body"></div>
      </div>
   </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>website/js/footer.js" type="module"></script>
 <a href="https://wa.me/9645000096" class="whatsapp-float" target="_blank">
     <img src="https://img.icons8.com/color/48/000000/whatsapp--v1.png" alt="WhatsApp Chat">
 </a>

<?php
$host = $_SERVER['HTTP_HOST'];
$uri = $_SERVER['REQUEST_URI'];


// Home

if ($host == 'localhost' 
    && strpos($uri, '/codeigniter/metro-website') !== false
    && $current_page_slug === 'home') 
   {  
   echo '<script type="module" src="' . base_url('website/js/contact.js') . '"></script>';
   }

   if($host == 'metroagencies.in' && $current_page_slug==='home'){
    echo '<script type="module" src="' . base_url('website/js/contact.js') . '"></script>';
}

// Career
   if ($host == 'localhost' 
    && strpos($uri, '/codeigniter/metro-website') !== false
    && $current_page_slug === 'careers') 
   {  
   echo '<script type="module" src="' . base_url('website/js/career.js') . '"></script>';
   }

      if($host == 'metroagencies.in' && $current_page_slug==='careers'){
    echo '<script type="module" src="' . base_url('website/js/career.js') . '"></script>';
}



// Contact
   if ($host == 'localhost' 
    && strpos($uri, '/codeigniter/metro-website') !== false
    && $current_page_slug === 'contact') 
   {  
   echo '<script type="module" src="' . base_url('website/js/contact.js') . '"></script>';
   }

     if($host == 'metroagencies.in' && $current_page_slug==='contact'){
    echo '<script type="module" src="' . base_url('website/js/contact.js') . '"></script>';
}

   // productdetail

     if ($host == 'localhost' 
    && strpos($uri, '/codeigniter/metro-website') !== false
    && $current_page_slug === 'productdetails') 
   {  
   echo '<script type="module" src="' . base_url('website/js/productdetail.js') . '"></script>';
   }

    if($host == 'metroagencies.in' && $current_page_slug==='productdetails'){
    echo '<script type="module" src="' . base_url('website/js/productdetail.js') . '"></script>';
}





// if($host == 'emigonetworks.com' && $current_page_slug==='about-us'){
//     echo '<script type="module" src="' . base_url('website/js/about-us.js') . '"></script>';
// }

// if($host == 'emigonetworks.com' && $current_page_slug==='gallery'){
//     echo '<script type="module" src="' . base_url('website/js/gallery.js') . '"></script>';
// }
?>







</body>

</html>