<div class="page-header">
    <img src="<?php echo base_url(''); ?><?php echo $industriesheader[0]['banner_image']; ?>" 
         class="header-img">

    <div class="page-header-content">
        <h1><?php echo $industriesheader[0]['title']; ?></h1>
       
    </div>
</div>


<section id="about" class="section">
    <div class="container">

        <h2 class="section-title">
            <?= $industries [0]['banner_title'] ?? '' ?>
        </h2>

        <div class="industries-contents">

            <div class="about-text">
             
              <?= $industries[0]['banner_description'] ?? '' ?>
                        
            </div>



        </div>

    </div>
</section>


    


