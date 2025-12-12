<div class="page-header">
    <img src="<?php echo base_url(''); ?><?php echo $infrastructureheader[0]['banner_image']; ?>" 
         class="header-img">
    <div class="page-header-content">
        <h1><?php echo $infrastructureheader[0]['banner_title']; ?></h1>
    </div>
</div>

    <section class="overview-section">
        <div class="container">
              <?php foreach ($infrastructure as $infra): ?>
            <div class="overview-grid">
                <div class="overview-content">
                    <h2 class="section-title"><?php echo $infra['infrastructure_title']; ?></h2>
                    <div class="infrastructure">
                       <?php echo $infra['infrastructure_description']; ?>
                    </div>
                </div>
                <div class="overview-image-container">
                    <img src="<?php echo base_url(''); ?>uploads/infrastructure/<?php echo $infra['infrastructure_image']; ?>" alt="Infrastructure" class="overview-image">
                </div>
            </div>
                <?php endforeach; ?>
        </div>
    </section>

    