<?php global $sparta; ?>
<!DOCTYPE html>
<html <?= language_attributes(); ?>>
<head>
  <meta charset="<?= bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php if(isset($sparta['site_fav']['url']) && $sparta['site_fav']['url'] !== ''){ ?>
  <!-- Opera Speed Dial Favicon -->
  <link rel="icon" type="image/png" href="<?= $sparta['site_fav']['url'] ?>" />

<!-- Standard Favicon -->
  <link rel="icon" type="image/x-icon" href="<?= $sparta['site_fav']['url'] ?>" />
<?php } ?>
<?php if(isset($sparta['icon_57n57']['url']) && $sparta['icon_57n57']['url'] !== '') { ?>
<link href="<?= $sparta['icon_57n57']['url']; ?>" rel="apple-touch-icon" />
<?php } ?>
<?php if(isset($sparta['icon_76n76']['url']) && $sparta['icon_76n76']['url'] !== '') { ?>
<link href="<?= $sparta['icon_76n76']['url']; ?>" rel="apple-touch-icon" sizes="76x76" />
<?php } ?>
<?php if(isset($sparta['icon_120n120']['url']) && $sparta['icon_120n120']['url'] !== '') { ?>
<link href="<?= $sparta['icon_120n120']['url']; ?>" rel="apple-touch-icon" sizes="120x120" />
<?php } ?>
<?php if(isset($sparta['icon_152n152']['url']) && $sparta['icon_152n152']['url'] !== '') { ?>
<link href="<?= $sparta['icon_152n152']['url']; ?>" rel="apple-touch-icon" sizes="152x152" />
<?php } ?>
<?php if(isset($sparta['icon_180n180']['url']) && $sparta['icon_180n180']['url'] !== '') { ?>
<link href="<?= $sparta['icon_180n180']['url']; ?>" rel="apple-touch-icon" sizes="180x180" />
<?php } ?>
<?php if(isset($sparta['icon_128n128']['url']) && $sparta['icon_128n128']['url'] !== '') { ?>
<link href="<?= $sparta['icon_128n128']['url']; ?>" rel="icon" sizes="128x128" />
<?php } ?>
<?php if(isset($sparta['icon_192n192']['url']) && $sparta['icon_192n192']['url'] !== '') { ?>
<link href="<?= $sparta['icon_192n192']['url']; ?>" rel="icon" sizes="192x192" />
<?php } ?>
<?php if(isset($sparta['google_analy_id']) && $sparta['google_analy_id'] != 'UA-XXXXX-X') { ?>
<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', '<?php $sparta["google_analy_id"] ?>', 'auto');
ga('send', 'pageview');
</script>
<!-- End Google Analytics -->
<?php } ?>
  <?php wp_head(); ?>
<!--/*    sparta Custom CSS*/-->
        <?php sparta_css(); ?>
</head>
<body <?= body_class(); ?>>
<?php // Start container ?>
<div class="container-fluid">
<?php // Get Topbar if necessary
sparta_show('topbar'); ?>
   </div>
    <?php //end container
//Get Navbar if necessary
sparta_show('nav_primary');
    // Show Page Header
    sparta_show('wc_header');
    //start container
    sparta_start_wrapper();