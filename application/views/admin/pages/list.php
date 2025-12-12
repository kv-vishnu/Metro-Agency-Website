  <div class="admin-content">
      <div class="container-fluid">
          <?php include 'application/views/admin/template/sidebar.php' ?>
          <div class="admin-main-content">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-12">
                          <div class="page-title">
                              <h2>All Pages</h2>
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
                  <div class="row mb-3">
                      <div class="col-12 d-none">
                          <form class="d-flex" action="<?= base_url('admin/search') ?>" method="post">
                            <input type="hidden" name="search_type" value="page">
                              <input class="form-control me-2" type="search" name="search_term" placeholder="Search Page"
                                  aria-label="Search">
                              <button class="btn btn-outline-success" type="submit">Search</button>
                          </form>
                      </div>
                  </div>
                  <!-- end page title -->
                  <div class="row">
                      <div class="col-12">
                        <div id="featuredMessage"></div>
                          <!-- page_list.php -->
                          <table class="table table-bordered">
                              <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>Page Name</th>
                                      <th>Page Type</th>
                                      <th>Status</th>
                                      <th>Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php $count = 1; ?>
                                  <?php foreach ($pages as $page) : ?>
                                  <tr>
                                      <td><?= $count++; ?></td>
                                      <td><?= $page['title']; ?></td>
                                      <td>Page</td>
                                      <td>
                                          <input type="checkbox" name="featured" class="is-active-page-checkbox"
                                            data-id="<?= $page['page_id']; ?>"
                                            <?= $page['is_active'] ? 'checked' : '' ?>>
                                      </td>
                                      <td>
                                          <a target="_blank" href="<?= base_url($page['slug']); ?>" class="btn">View</a>
                                           <?php if ($page['page_id'] != 1): ?>
            <a href="<?= base_url('admin/PageBuilder/edit/' . $page['page_id']); ?>" class="btn">Edit</a>
        <?php endif; ?>
                                          <!-- <a href="<?= base_url('admin/PageBuilder/edit/' . $page['page_id']); ?>"
                                              class="btn">Edit</a> -->
                                          <!-- <a href="<?= base_url('admin/PageBuilder/delete/' . $page['page_id']); ?>"
                                              class="btn">Delete</a> -->
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