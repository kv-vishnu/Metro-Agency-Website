<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Careers</title>
    

</head>
<body>

<div class="page-header">
    
    <img src="<?php echo base_url(''); ?><?php echo $careerheader[0]['banner_image']; ?>" 
         class="header-img">

    <div class="page-header-content">
        <h1><?php echo $careerheader[0]['banner_title']; ?></h1>
    </div>
</div>


    <!-- Job Openings Section -->
    <section class="job-openings-section">
        <div class="container">
            <h2 class="section-title">Current Openings</h2>
            <!-- Job 1 -->
             <?php if (!empty($careers)): ?>
            <?php foreach ($careers as $job): ?>
            <div class="job-card">
                <div class="job-header">
                    <div>
                        <h3 class="job-title"><?php echo $job['job']; ?></h3>
                        <div class="job-meta">
                            <div class="job-meta-item">
                                <i class="fas fa-briefcase"></i>
                                <span><?php echo $job['experience']; ?></span>
                            </div>
                            <div class="job-meta-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span><?php echo $job['location']; ?></span>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
                    <div class="random-content">
                         <?php echo $job['description']; ?>
                    </div>
                <button type="button" data-value="<?php echo htmlspecialchars($job['job'], ENT_QUOTES); ?>" class="btn-apply" data-bs-toggle="modal" data-bs-target="#exampleModal">Apply Now</button>
            </div>
            <?php endforeach; ?>
              <?php else: ?>
            <!-- No careers available -->
            <p class="text-center">There are currently no job openings. Please check back later.</p>
        <?php endif; ?>

        </div>
    </section>
</body>

<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Apply Now</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="careerform" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Name</label>
             <input type="hidden" class="form-control" id="hidden_career_name" name="hidden_career_name">
            <input type="text" class="form-control" id="career_name" name="career_name">
            <div class="error" id="error_career_name" style="color:red;"></div>
          </div>

          <div class="mb-3">
            <label for="message-text" class="col-form-label">Email</label>
            <input type="text" class="form-control" id="career_email" name="career_email">
             <div class="error" id="error_career_email" style="color:red;"></div>
          </div>

           <div class="mb-3">
            <label for="message-text" class="col-form-label">Address</label>
            <input type="text" class="form-control" id="career_address" name="career_address">
             <div class="error" id="error_career_address" style="color:red;"></div>
          </div>
           <div class="mb-3">
            <label for="message-text" class="col-form-label">Phone No</label>
            <input type="text" class="form-control" id="career_phone" name="career_phone">
             <div class="error" id="error_career_phone" style="color:red;"></div>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">File</label>
            <input type="file" class="form-control" id="career_file" name="career_file" accept=".pdf">
             <div class="error" id="error_career_file" style="color:red;"></div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-apply send-career">Apply Now</button>
      </div>
    </div>
  </div>
</div>
</html>

<script>
    var exampleModal = document.getElementById('exampleModal');

exampleModal.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    var button = event.relatedTarget;

    // Get the data-value attribute
    var careerValue = button.getAttribute('data-value');

    console.log("Career Value:", careerValue); // should log "software developer"

    // Fill the input inside modal
    var input = exampleModal.querySelector('#hidden_career_name');
    input.value = careerValue;
});

</script>