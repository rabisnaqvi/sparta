<?php
global $sparta;
?>
<div id="masthead">
<nav class="navbar navbar-default navbar-brand-top bootsnav <?php if(( is_single() || is_page() ) && get_field('transparent_menu')) { echo 'navbar-transparent'; } ?>">
    <div class="container">
        <!-- Start Header Navigation -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="<?php echo home_url(); ?>">
            <?php if(isset($sparta['logo_normal']['url'])){
          if($sparta['logo_normal']['url']){?>
               <img src="<?= $sparta['logo_normal']['url'] ?>" alt="<?php bloginfo('Name');  ?>" class="logo img-responsive">
               <?php } } ?>
                <span class="logo-text"><?= $sparta['logo_text']; ?></span>
            </a>
        </div>
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
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
        <!-- /.navbar-collapse -->
    </div>   
</nav>
</div>