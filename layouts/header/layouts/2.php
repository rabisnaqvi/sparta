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
<nav class="navbar navbar-default bootsnav <?php if($sparta['navbar_fixed']){echo "navbar-sticky";} ?> <?php if(( is_single() || is_page() ) && get_field('transparent_menu')) { echo 'navbar-transparent'; } ?>">
  <?php if(!isset($sparta['navbar_search']) || $sparta['navbar_search']): ?>
   <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <form action="<?php echo home_url( '/' ); ?>" role="search" class="form-group" method="get">
                    <input type="search" class="form-control" id="input_field" placeholder="<?php _e('Search Here', 'placeholder'); ?>" value="<?php echo get_search_query() ?>" name="s">
                    <button class="hidden" role="submit"></button>
                </form>
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->
    <?php endif; ?>
    <div class="container">
    <?php if( (!isset($sparta['navbar_search']) || $sparta['navbar_search']) || (function_exists('is_woocommerce') && $sparta['wc_header_cart']) ): ?>
       <!-- Start Atribute Navigation -->
        <div class="attr-nav">
            <ul>
               <?php if(!isset($sparta['navbar_search']) || $sparta['navbar_search']): ?>
                <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                <?php endif; if(function_exists('is_woocommerce') && $sparta['wc_header_cart']): ?>
                <li>
                    <a href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'sparta' ); ?>"  >
                        <i class="fa fa-shopping-bag"></i>
                        <span class="badge"><?php 
                    if($count) { 
                        echo esc_html( $count ); 
                    } else { 
                        echo '0';
                    } ?></span>
                    </a>
                </li>
                <?php endif; if(has_nav_menu( 'slide' )):?>
                <li class="side-menu"><a href="#"><i class="fa fa-bars"></i></a></li>
                <?php endif; ?>
            </ul>
        </div>        
        <!-- End Atribute Navigation -->  
    <?php endif; ?>
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
                'menu_class'        => 'nav navbar-nav navbar-center hide_on_search',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
        <!-- /.navbar-collapse -->
        <?php endif; ?>
    </div>
    <?php if(has_nav_menu( 'slide' )): ?>
        <!-- Start Side Menu -->
    <div class="side">
        <a href="#" class="close-side"><i class="fa fa-times"></i></a>
            <?php
        wp_nav_menu( array(
                'menu'              => 'slide',
                'theme_location'    => 'slide',
                'depth'             => 1,
                'container'         => 'div',
                'container_class'   => 'widget',
                'menu_class'        => 'link')
            );
        ?>
    </div>
    <!-- End Side Menu -->
    <?php endif; ?>
</nav>
</div>