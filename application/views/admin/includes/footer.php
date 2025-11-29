    <!-- Footer -->
    <footer>
        <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
        <div class="footer-content">
            <div class="footer-section">
                <h3>About Metro Agencies</h3>
                <p>Leading provider of steel and aluminium construction solutions with over 20 years of excellence in the industry. Building quality structures that last generations.</p>
                <div class="social-links">
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <a href="<?php echo base_url(); ?>">Home</a>
                <a href="<?php echo base_url(''); ?>about-us">About</a>
                <a href="<?php echo base_url(''); ?>product">Products</a>
                <a href="#gallery">Manufacturing Units</a>
                <a href="#gallery">Infrastructure & Logistics</a>
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
            <h5 class="modal-title">Message Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
         </div>
         <div class="modal-body"></div>
      </div>
   </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>website/js/footer.js" type="module"></script>

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

   if($host == 'emigonetworks.com' && $current_page_slug==='home'){
    echo '<script type="module" src="' . base_url('website/js/home.js') . '"></script>';
}

// Career
   if ($host == 'localhost' 
    && strpos($uri, '/codeigniter/metro-website') !== false
    && $current_page_slug === 'careers') 
   {  
   echo '<script type="module" src="' . base_url('website/js/career.js') . '"></script>';
   }


// Contact
   if ($host == 'localhost' 
    && strpos($uri, '/codeigniter/metro-website') !== false
    && $current_page_slug === 'contact') 
   {  
   echo '<script type="module" src="' . base_url('website/js/contact.js') . '"></script>';
   }

   // productdetail

     if ($host == 'localhost' 
    && strpos($uri, '/codeigniter/metro-website') !== false
    && $current_page_slug === 'productdetails') 
   {  
   echo '<script type="module" src="' . base_url('website/js/productdetail.js') . '"></script>';
   }





if($host == 'emigonetworks.com' && $current_page_slug==='about-us'){
    echo '<script type="module" src="' . base_url('website/js/about-us.js') . '"></script>';
}

if($host == 'emigonetworks.com' && $current_page_slug==='gallery'){
    echo '<script type="module" src="' . base_url('website/js/gallery.js') . '"></script>';
}
?>







</body>

</html>