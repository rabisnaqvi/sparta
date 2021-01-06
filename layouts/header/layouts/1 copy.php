<?php global $sparta;
if(function_exists('is_woocommerce')) {
    if($sparta['wc_header_cart']){
        ob_start();
        $count = WC()->cart->cart_contents_count;
        ob_get_clean();
    }
}?>
<div class="main_nav_wrapper" id="masthead">
<nav class="navbar navbar-default bootsnav <?php if($sparta['navbar_fixed']){echo "navbar-sticky";} ?>  <?php if(( is_single() || is_page() ) && get_field('transparent_menu')) { echo 'navbar-transparent'; } ?>">
    <div class="container">    
        <!-- Start Header Navigation -->
        <div class="navbar-header hide_on_search">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <?php if(!isset($sparta['navbar_search']) || $sparta['navbar_search']): ?>
              <a href="#" class="navbar_search_toggle on_small" onclick="javascript: toggle_search_nav(); return false;">
                  <i class="fa fa-search"></i>
              </a>
              <?php endif; ?>
              <?php if(function_exists('is_woocommerce')) { if($sparta['wc_header_cart']){ ?>
              <a href="<?php echo WC()->cart->get_cart_url(); ?>" class="navbar_cart on_small">
                  <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    <span class="cart-contents-count badge"><?php 
                    if($count) { 
                        echo esc_html( $count ); 
                    } else { 
                        echo '0';
                    } ?></span>
                    <?php            
                    ?>
              </a>
              <?php } } ?>
            <a class="navbar-brand" href="<?php echo home_url(); ?>">
            <?php if(isset($sparta['logo_normal']['url'])){
          if($sparta['logo_normal']['url']){?>
               <img src="<?= $sparta['logo_normal']['url'] ?>" alt="<?php bloginfo('Name');  ?>" class="logo">
               <?php } } ?>
                <span class="logo-text"><?= $sparta['logo_text']; ?></span>
            </a>
        </div>
        <?php if(!isset($sparta['navbar_search']) || $sparta['navbar_search']): ?>
        <div class="col-xs-12 hidden" id="navbar_search_wrap">
        <form action="<?php echo home_url( '/' ); ?>" role="search" class="form-group" method="get">
            <input type="search" id="input_field" class="form-control" placeholder="<?php _e('Search Here', 'placeholder'); ?>" value="<?php echo get_search_query() ?>" name="s">
            <i class="fa fa-times" id="search_close"></i>
            <button class="hidden" role="submit"></button>
        </form>
        </div>
        <?php endif; ?>
        <ul class="nav navbar-nav navbar-right hide_on_search">
           <?php if(!isset($sparta['navbar_search']) || $sparta['navbar_search']): ?>
            <li>
                <a href="#" class="navbar_search_toggle on_large" onclick="javascript: toggle_search_nav(); return false;">
                    <i class="fa fa-search"></i>
                </a>
            </li>
           <?php endif; if(function_exists('is_woocommerce')) {
    if($sparta['wc_header_cart']){ ?>
            <li>
                <a href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'sparta' ); ?>" class="navbar_cart on_large">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    <?php
        ?>
        <span class="cart-contents-count badge"><?php 
        if($count) { 
            echo esc_html( $count ); 
        } else { 
            echo '0';
        } ?></span>
        <?php            
        ?>
                </a>
            </li>
            <?php } } ?>
        </ul>
        <!-- End Header Navigation -->
        <!-- Collect the nav links, forms, and other content for toggling -->
        <?php
        wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 5,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
        'container_id'      => 'navbar-menu',
                'menu_class'        => 'nav navbar-nav navbar-right hide_on_search',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
        <!-- /.navbar-collapse -->
    </div>   
</nav>
</div>
<div id="change_height_if_fixed"></div>
<div class="clearfix"></div>