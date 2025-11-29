 <div class="admin-content">
     <div class="container-fluid">
         <?php include 'application/views/admin/template/sidebar.php' ?>
         <div class="admin-main-content">
             <div class="dashboard-container container-fluid">
                 <div class="row">
                     <div class="col-12">
                         <div class="page-title">
                             <h2>Dashboard</h2>
                             <div class="page-title-right">
                                 <!-- <ol class="breadcrumb m-0">
                                     <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/dashboard">Home</a>
                                     </li>
                                     <i class="fa-solid fa-chevron-right "
                                         style="font-size: 9px;margin: 6px 5px 0px 5px;"></i>
                                     <li class="breadcrumb-item active">Dashboard</li>
                                 </ol> -->
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="row gy-4">
                     <div class="col-xl-4 col-md-6 ">
                         <!-- card -->
                         <div class="card card-h-100">
                             <!-- card body -->
                             <a href="<?php echo base_url('admin/pages'); ?>">
                                 <div class="card-body bg-b-purple">
                                     <div class="row align-items-center">
                                         <div class="col-8">
                                             <span class="text-black mb-3 d-block text-truncate">Pages</span>
                                             <h4 class="mb-3">
                                                 <span class="text-black"><?= $counts['pages'] ?></span>
                                                 <i class="fa fa-calendar-check-o"></i>
                                             </h4>
                                         </div>

                                     </div>
                                 </div><!-- end card body -->
                             </a>
                         </div><!-- end card -->
                     </div><!-- end col -->

                     <div class="col-xl-4 col-md-6">
                         <!-- card -->
                         <div class="card card-h-100">
                             <!-- card body -->
                             <a href="<?php echo base_url('admin/categories'); ?>">
                                 <div class="card-body bg-b-secondary">
                                     <div class="row align-items-center">
                                         <div class="col-8">
                                             <span class="text-black mb-3 d-block text-truncate">Categories</span>
                                             <h4 class="mb-3">
                                                 <span class="text-black"><?= $counts['categories'] ?></span>
                                             </h4>
                                         </div>

                                     </div>
                                 </div><!-- end card body -->
                             </a>
                         </div><!-- end card -->
                     </div><!-- end col -->
                     <div class="col-xl-4 col-md-6">
                         <!-- card -->
                         <div class="card card-h-100">
                             <!-- card body -->
                             <a href="<?php echo base_url('admin/subcategories'); ?>">
                                 <div class="card-body bg-b-secondary">
                                     <div class="row align-items-center">
                                         <div class="col-8">
                                             <span class="text-black mb-3 d-block text-truncate">Products</span>
                                             <h4 class="mb-3">
                                                 <span class="text-black"><?= $counts['product'] ?></span>
                                             </h4>
                                         </div>

                                     </div>
                                 </div><!-- end card body -->
                             </a>
                         </div><!-- end card -->
                     </div>
                     <div class="col-xl-4 col-md-6">
                         <!-- card -->
                         <div class="card card-h-100">
                             <!-- card body -->
                             <a href="<?php echo base_url('admin/courses'); ?>">
                                 <div class="card-body bg-b-secondary">
                                     <div class="row align-items-center">
                                         <div class="col-8">
                                             <span class="text-black mb-3 d-block text-truncate">Contact us</span>
                                             <h4 class="mb-3">
                                                 <span class="text-black"><?= $counts['contactus'] ?></span>
                                             </h4>
                                         </div>

                                     </div>
                                 </div><!-- end card body -->
                             </a>
                         </div><!-- end card -->
                     </div>

                 </div>
             </div>
             <!-- end page title -->
             <!-- end col -->
         </div>
     </div>
 </div>