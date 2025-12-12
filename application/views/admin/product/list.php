  <div class="admin-content">
      <div class="container-fluid">
          <?php include 'application/views/admin/template/sidebar.php' ?>
          <div class="admin-main-content">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-12">
                          <div class="page-title">
                              <h2>All Product</h2>
                          </div>
                      </div>
                  </div>
                  <div class="row mb-3">
                      <div class="col-12">
                          <form class="d-flex" action="<?= base_url('admin/search/search_product') ?>" method="post">
                              <input type="hidden" name="search_type" value="product">
                              <input class="form-control me-2" type="search" name="search_term"
                                  placeholder="Search Product" aria-label="Search">
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
                                      <th>Product Name</th>
                                      <!-- <th>Category Description</th> -->
                                      <th>Status</th>
                                      <th>Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php foreach ($products as $product) : ?>
                                  <tr>
                                      <td><?= $product['id']; ?></td>
                                      <td><?= $product['product_name']; ?></td>
                                      <!-- <td><?= $product['product_description']; ?></td> -->
                                      <td>
                                          <input type="checkbox" name="featured" class="is-active-product-checkbox"
                                            data-id="<?= $product['id']; ?>"
                                            <?= $product['is_active'] ? 'checked' : '' ?>>
                                      </td>
                                      <td>
                                         
                                          <a href="<?php echo base_url();?>admin/product/edit/<?= $product['id']; ?>"
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