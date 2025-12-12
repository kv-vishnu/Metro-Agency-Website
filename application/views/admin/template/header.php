<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Metro Agencies</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-lite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin/css/bootstrap-custom-styles.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin/css/admin.css">
    <script>
        const base_url = "<?= base_url(); ?>";
    </script>

    <base href="<?= base_url(); ?>">

</head>

<body>
    <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">

    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <header class="admin-header">
        <div class="container-fluid">
            <a href="<?php echo base_url(); ?>admin/dashboard">
                <img src="<?php echo base_url(); ?>website/images/metro-logo.png" alt="" class="admin-header__logo">
            </a>
            <div class="admin-header-links">
                <a href="<?php echo base_url(); ?>admin/dashboard" class="admin-header-links__a">Dashboard</a>
                <a href="<?php echo base_url(); ?>admin/settings" class="admin-header-links__a">Settings</a>
                <a href="<?php echo base_url(); ?>admin/login" class="admin-header-links__a">Logout</a>
            </div>
        </div>

    </header>