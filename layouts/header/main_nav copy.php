<?php global $sparta;
?>
<div class="main_nav_wrapper" id="masthead">
 <nav class="navbar navbar-inverse <?php if($sparta['navbar_fixed']){echo "navbar-sticky";} ?>  <?php if(( is_single() || is_page() ) && get_field('transparent_menu')) { echo 'navbar-transparent'; } ?>" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header hide_on_search">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary-nav-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php if(!isset($sparta['navbar_search']) || $sparta['navbar_search']): ?>
      <a href="#" class="navbar_search_toggle on_small" onclick="javascript: toggle_search_nav(); return false;">
          <i class="fa fa-search"></i>
      </a>
      <?php endif; ?>
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
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="#" class="navbar_search_toggle on_large" onclick="javascript: toggle_search_nav(); return false;">
                    <i class="fa fa-search"></i>
                </a>
            </li>
        </ul>
        <?php endif; ?>
        <?php if(function_exists('is_woocommerce')) {
    if($sparta['wc_header_cart']){
      ob_start();
    $count = WC()->cart->cart_contents_count;
    ?><?php
 
    ob_get_clean();
      ?>
        <ul class="nav navbar-nav navbar-left cart_menu">
            <li>
                <a href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'sparta' ); ?>">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    <?php
    if ( $count > 0 ) {
        ?>
        <span class="cart-contents-count badge"><?php 
        if($count) { 
            echo esc_html( $count ); 
        } else { 
            echo '0';
        } ?></span>
        <?php            
    }
        ?>
                </a>
            </li>
        </ul>
        <?php } }
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 5,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
        'container_id'      => 'primary-nav-collapse',
                'menu_class'        => 'nav navbar-nav navbar-right hide_on_search',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
        
    </div>
</nav>
</div>
<div id="change_height_if_fixed"></div>
<div class="clearfix"></div>