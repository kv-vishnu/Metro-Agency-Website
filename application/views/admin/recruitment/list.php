<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
      <div class="admin-content" id="recruitment_list_container" >
      <div class="container-fluid">
          <?php include 'application/views/admin/template/sidebar.php' ?>
          <div class="admin-main-content">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-12">
                          <div class="page-title">
                              <h2>All Recruitment</h2>
                          </div>
                      </div>
                  </div>
<div class="row">
    <div class="col-8"></div>
 <div class="col-4">
    <select name="recruitment_status_change" id="recruitment_status_change" class="form-select">
        <option value="">Select status</option>
        <option value="viewed">Viewed</option>
        <option value="communicated">Communicated</option>
        <option value="rejected">Rejected</option>
    </select>
 </div>
 </div>
                 
                  <!-- end page title -->
                  <div class="row mt-3" >
                      <div class="col-12">
                        <div id="featuredMessage"></div>
                          <!-- page_list.php -->
                          <table class="table table-bordered">
                              <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Phone No</th>
                                      <th>Address</th>
                                      <th>Designation</th>
                                      <th>Remarks</th>
                                      <th>Status</th>
                                      <th>Date</th>
                                      <th>File</th>
                                      <th>Actions</th>
                                     
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php foreach ($recruitment as $recruit) : ?>
                                  <tr>
                                    <td><?= $recruit['id']; ?></td>
                                      <td><?= $recruit['name']; ?></td>
                                      <td><?= $recruit['email']; ?></td>
                                      <td><?= $recruit['phone']; ?></td>
                                      <td><?= $recruit['address']; ?></td>
                                      <td><?= $recruit['designation']; ?></td>
                                      <td><?= $recruit['remarks']; ?></td>
                                      <td><?= $recruit['status']; ?></td>
                                      <td><?php echo date("d/m/Y", strtotime($recruit['date'])) ;?></td>
                                        <td style="text-wrap-mode:nowrap;"><a target="_blank" href="<?php echo base_url(); ?>/uploads/recruitment/<?= $recruit['file']; ?>" class="product-resume">View Resume</a></td>
                                        <td><button class="btn btn-primary viewMessageBtn" 
            data-id="<?= $recruit['id']; ?>">
         view
    </button></td>

                                      
                                      
                                  </tr>
                                  <?php endforeach; ?>
                              </tbody>
                          </table>
                      </div><!-- end col -->


                  </div><!-- end col -->
              </div>
          </div>
      </div>
  </div>
</body>
</html>
    



  <!-- modal -->

   <div class="modal fade" id="messageModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Recruitment Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
    <div class="modal-body">
         <form action=""  method="post" enctype="multipart/form-data">
         <input type="hidden" id="recruitment_id" name="recruitment_id" value="" >

         <div class="mb-3">
            <label for="message-text" class="col-form-label">Status</label>
            <select name="recruitment_status" id="recruitment_status" class="form-select">
                <option value="select status">select status</option>
                <option value="viewed">Viewed</option>
                <option value="communicated">Communicated</option>
                <option value="rejected">Rejected</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="message-text" class="col-form-label">Remarks</label>
            <input type="text" class="form-control" id="recruitment_remarks" name="recruitment_remarks">
          </div>

          <button type="submit" class=" btn btn-primary recruitment-update">Update</button>
        </form>
    </div>

    </div>
  </div>
</div>

<script>
    $(document).on("click",".viewMessageBtn",function(){
    let id = $(this).data("id");
    $("#recruitment_id").val(id);
      $.ajax({
        url: "<?= base_url('admin/Recruitment/getRecruitmentDetails/') ?>" + id,
        type: "GET",
         dataType: "json",   // VERY IMPORTANT
        success: function(res){
             $("#recruitment_status").val(res.status);
             $("#recruitment_remarks").val(res.remarks);
        }
    });
    $("#messageModal").modal("show");
});

</script>

 
