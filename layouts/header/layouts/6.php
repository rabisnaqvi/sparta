<?php
global $sparta;
if(function_exists('is_woocommerce')) {
    if($sparta['wc_header_cart']){
        ob_start();
        $count = WC()->cart->cart_contents_count;
        ob_get_clean();
    }
}
?>
<div id="masthead">
<nav class="navbar navbar-default brand-center bootsnav <?php if($sparta['navbar_fixed']){echo "navbar-sticky";} ?> <?php if(( is_single() || is_page() ) && get_field('transparent_menu')) { echo 'navbar-transparent'; } ?>">
    <div class="container">
        <!-- Start Header Navigation -->
        <div class="navbar-header">
           <?php if(has_nav_menu( 'primary' )): ?>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <?php endif; ?>
            <a class="navbar-brand" href="<?php echo home_url(); ?>">
            <?php if(isset($sparta['logo_normal']['url'])){
          if($sparta['logo_normal']['url']){?>
               <img src="<?= $sparta['logo_normal']['url'] ?>" alt="<?php bloginfo('Name');  ?>" class="logo img-responsive">
               <?php } } ?>
                <span class="logo-text"><?= $sparta['logo_text']; ?></span>
            </a>
        </div>
        <!-- End Header Navigation -->

    <?php if(has_nav_menu( 'primary' )): ?>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <?php
        wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 5,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
        'container_id'      => 'navbar-menu',
                'menu_class'        => 'nav navbar-nav hide_on_search',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
        <!-- /.navbar-collapse -->
        <?php endif; ?>
    </div>
</nav>
</div>