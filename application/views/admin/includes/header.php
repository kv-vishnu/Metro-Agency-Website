<!DOCTYPE html>
<html lang="en">

<!-- test -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= !empty($metatitle) ? $metatitle : ""; ?></title>

<meta name="keywords" content="<?= !empty($metakeywords) ? $metakeywords : 'keywords'; ?>">
<meta name="description" content="<?= !empty($metadescription) ? $metadescription : 'description'; ?>">

<meta property="og:title" content="<?= !empty($page_title) ? $page_title : "Metro Agencies"; ?>">
<meta property="og:description" content="<?= !empty($metadescription) ? $metadescription : 'description'; ?>">

<link rel="canonical" href="<?= !empty($canonical) ? $canonical : base_url(uri_string()); ?>">

     <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
    <?php
    $host = $_SERVER['HTTP_HOST'];
    $uri  = $_SERVER['REQUEST_URI'];
    
   //Home
   if ($host == 'localhost' 
    && strpos($uri, '/codeigniter/metro-website') !== false
    && $current_page_slug === 'home') 
   {  
   echo '<link href="' . base_url('website/css/home.css') . '" rel="stylesheet"/>';
   }

       if($host == 'metroagencies.in' && $current_page_slug==='home')
{
    echo '<link href="' . base_url('website/css/home.css') . '" rel="stylesheet"/>';
}


    // Career
       if ($host == 'localhost' 
    && strpos($uri, '/codeigniter/metro-website') !== false
    && $current_page_slug === 'careers') 
   {  
   echo '<link href="' . base_url('website/css/career.css') . '" rel="stylesheet"/>';
   }

         if($host == 'metroagencies.in' && $current_page_slug==='careers'){
    echo '<link href="' . base_url('website/css/career.css') . '" rel="stylesheet"/>';
}


// contact
    if ($host == 'localhost' 
    && strpos($uri, '/codeigniter/metro-website') !== false
    && $current_page_slug === 'contact') 
   {  
   echo '<link href="' . base_url('website/css/contact.css') . '" rel="stylesheet"/>';
   }

  if($host == 'metroagencies.in' && $current_page_slug==='contact'){
    echo '<link href="' . base_url('website/css/contact.css') . '" rel="stylesheet"/>';
}



// about us
if ($host == 'localhost' 
    && strpos($uri, '/codeigniter/metro-website') !== false
    && $current_page_slug === 'aboutus') 
   {  
   echo '<link href="' . base_url('website/css/about-us.css') . '" rel="stylesheet"/>';
   }

   


if($host == 'metroagencies.in' && $current_page_slug==='aboutus'){
    echo '<link href="' . base_url('website/css/about-us.css') . '" rel="stylesheet"/>';
}

// Industries

if ($host == 'localhost' 
    && strpos($uri, '/codeigniter/metro-website') !== false
    && $current_page_slug === 'Industries') 
   {  
   echo '<link href="' . base_url('website/css/about-us.css') . '" rel="stylesheet"/>';
   }

if($host == 'metroagencies.in' && $current_page_slug==='Industries'){
    echo '<link href="' . base_url('website/css/about-us.css') . '" rel="stylesheet"/>';
}



     if ($host == 'localhost' 
    && strpos($uri, '/codeigniter/metro-website') !== false
    && $current_page_slug === 'productdetails') 
   {  
   echo '<link href="' . base_url('website/css/home.css') . '" rel="stylesheet"/>';
   }

   if($host == 'metroagencies.in' && $current_page_slug==='productdetails')
{
    echo '<link href="' . base_url('website/css/home.css') . '" rel="stylesheet"/>';
}

    if ($host == 'localhost' 
    && strpos($uri, '/codeigniter/metro-website') !== false
    && $current_page_slug === 'productdetails') 
   {  
   echo '<link href="' . base_url('website/css/productdetail.css') . '" rel="stylesheet"/>';
   }
  
   
if($host == 'metroagencies.in' && $current_page_slug==='productdetails')
{
    echo '<link href="' . base_url('website/css/productdetail.css') . '" rel="stylesheet"/>';
}


      if ($host == 'localhost' 
    && strpos($uri, '/codeigniter/metro-website') !== false
    && $current_page_slug === 'manfacturingunits') 
   {  
   echo '<link href="' . base_url('website/css/manufacture.css') . '" rel="stylesheet"/>';
   }

   if($host == 'metroagencies.in' && $current_page_slug==='manfacturingunits')
{
    echo '<link href="' . base_url('website/css/manufacture.css') . '" rel="stylesheet"/>';
}





        if ($host == 'localhost' 
    && strpos($uri, '/codeigniter/metro-website') !== false
    && $current_page_slug === 'infrastructure') 
   {  
   echo '<link href="' . base_url('website/css/infrastructure.css') . '" rel="stylesheet"/>';
   }

if($host == 'metroagencies.in' && $current_page_slug==='infrastructure')
{
    echo '<link href="' . base_url('website/css/infrastructure.css') . '" rel="stylesheet"/>';
}




if ($host == 'localhost' 
    && strpos($uri, '/codeigniter/metro-website') !== false
    && $current_page_slug === 'product') 
   {  
   echo '<link href="' . base_url('website/css/product.css') . '" rel="stylesheet"/>';
   }

   if($host == 'metroagencies.in' && $current_page_slug==='product')
{
    echo '<link href="' . base_url('website/css/product.css') . '" rel="stylesheet"/>';
}
 
 

    ?>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<div class="top-bar">
        <div class="container">
            <div>📞 +91 9645 00 00 96</div>
            <div>📧 info@metroagencies.com</div>
        </div>
    </div>

    <!-- Header -->
   <header>
  <nav class="navbar">
    <div class="logo">
      <img src="<?php echo base_url('website/images/metro-logo.png'); ?>"  alt="">
    </div>

    <button class="menu-toggle" id="mobile-menu">
      ☰
    </button>

    <ul class="nav-links" id="nav-links">

    <?php foreach ($pages as $p): ?>
        <li>
            <a href="<?= base_url($p['slug']); ?>">
                <?= $p['title']; ?>
            </a>
        </li>
    <?php endforeach; ?>

</ul>
  </nav>
</header>

<body>

