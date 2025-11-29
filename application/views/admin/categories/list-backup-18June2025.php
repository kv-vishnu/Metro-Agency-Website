  <div class="admin-content">
      <div class="container-fluid">
          <?php include 'application/views/admin/template/sidebar.php' ?>
          <div class="admin-main-content">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-12">
                          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                              <h4 class="mb-3 font-size-18">Categories</h4>
                              <div class="page-title-right">
                                  <!-- <ol class="breadcrumb m-0">
                                      <li class="breadcrumb-item"><a
                                              href="<?php echo base_url();?>admin/dashboard">Home</a>
                                      </li>
                                      <i class="fa-solid fa-chevron-right "
                                          style="font-size: 9px;margin: 6px 5px 0px 5px;"></i>
                                      <li class="breadcrumb-item active">Pages</li>
                                  </ol> -->
                              </div>

                          </div>
                      </div>
                  </div>
                  <!-- end page title -->
                  <div class="row">
                      <div class="col-12">
                          <!-- page_list.php -->
                          <table class="table table-bordered">
                              <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>Category Name</th>
                                      <th>Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php foreach ($categories as $category) : ?>
                                  <tr>
                                      <td><?= $category['id']; ?></td>
                                      <td><?= $category['name']; ?></td>
                                      <td>
                                          <!-- <a target="_blank" href="#" class="btn">View</a> -->
                                          <a href="<?php echo base_url();?>admin/categories/edit/<?= $category['id']; ?>"
                                              class="btn">Edit</a>

                                      </td>
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