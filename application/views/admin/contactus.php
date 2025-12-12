  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <div class="admin-content" id="contact_list_container">
      <div class="container-fluid">
          <?php include 'application/views/admin/template/sidebar.php' ?>
          <div class="admin-main-content">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-12">
                          <div class="page-title">
                              <h2>All Contact Us</h2>
                          </div>
                      </div>
                  </div>
                 <div class="row">
    <div class="col-8"></div>
 <div class="col-4">
    <select name="contact_status_change" id="contact_status_change" class="form-select">
        <option value="">Select status</option>
        <option value="viewed">Viewed</option>
        <option value="ordered">Ordered</option>
        <option value="communicated">Communicated</option>
        <option value="rejected">Rejected</option>
    </select>
 </div>
 </div>
                  <!-- end page title -->
                  <div class="row mt-3">
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
                                      <th>Subject</th>
                                      <th>Product Name</th>
                                      <th>Remarks</th>
                                      <th>Status</th>
                                      <th>Date</th>
                                      
                                      <th>Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php foreach ($contactus as $contact) : ?>
                                  <tr>
                                    <td><?= $contact['id']; ?></td>
                                      <td><?= $contact['name']; ?></td>
                                      <td><?= $contact['email']; ?></td>
                                      <td><?= $contact['phone_no']; ?></td>
                                      <td><?= $contact['subject']; ?></td>
                                      <td><?= $contact['productname']; ?></td>
                                      <td><?= $contact['remarks']; ?></td>
                                      <td><?= $contact['status']; ?></td>
                                      <td><?php echo date("d/m/Y", strtotime($contact['date'])) ;?></td>
                                      <td> <button class="btn btn-primary viewMessageBtn" 
            data-id="<?= $contact['id']; ?>">
        View Message
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


  <div class="modal fade" id="messageModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title">Message Details</h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
    <div class="modal-body">
         <form action=""  method="post" enctype="multipart/form-data">
         <label for="message-text" class="col-form-label"> Customer Message</label>
         <input type="text" readonly class="form-control" id="messageContent" name="messageContent">
         <input type="hidden" id="contact_id" name="contact_id" value="" >
         <!-- <p id="messageContent">Loading...</p> -->

         <div class="mb-3">
            <label for="message-text" class="col-form-label">Status</label>
            <select name="contact_status" id="contact_status" class="form-select">
                <option value="select status">select status</option>
                <option value="viewed">Viewed</option>
                <option value="ordered">Ordered</option>
                <option value="communicated">Communicated</option>
                <option value="rejected">Rejected</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="message-text" class="col-form-label">Remarks</label>
            <input type="text" class="form-control" id="contact_remarks" name="contact_remarks">
             <!-- <div class="error" id="error_contact_message" style="color:red;"></div> -->
          </div>

          <button type="submit" class=" btn btn-primary contact-update">Update</button>
        </form>
    </div>

    </div>
  </div>
</div>


<script>
    $(document).on("click",".viewMessageBtn",function(){

    let id = $(this).data("id");
    $("#contact_id").val(id);
    $("#messageContent").val("Loading...");
    $.ajax({
        url: "<?= base_url('Home/getMessage/') ?>" + id,
        type: "GET",
         dataType: "json",   // VERY IMPORTANT
        success: function(res){
             $("#messageContent").val(res.message);
             $("#contact_status").val(res.status);
             $("#contact_remarks").val(res.remarks);
        }
    });

    $("#messageModal").modal("show");
});

</script>