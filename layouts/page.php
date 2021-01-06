<?php
if(function_exists('is_woocommerce')){
    if(is_woocommerce()) {
        return;
    }
}
global $sparta;
if(get_field('page_layout') == 'Right Sidebar' || !get_field('page_layout')) { ?>
    <div class='col-xs-12 col-sm-12 col-md-9 col-lg-9 pull-left page_content'>
        <?php the_content(); ?>
    </div>
    <div class="sidebar col-xs-12 col-sm-12 col-md-3 col-lg-3 pull-right page_content page_content">
        <?php dynamic_sidebar(get_field('sidebar')); ?>
    </div>
<?php }
elseif(get_field('page_layout') == 'Left Sidebar') { ?>
    <div class='col-xs-12 col-sm-12 col-md-9 col-lg-9 pull-right page_content'>
        <?php the_content(); ?>
    </div>
    <div class="sidebar col-xs-12 col-sm-12 col-md-3 col-lg-3 pull-left page_content">
        <?php dynamic_sidebar(get_field('sidebar')); ?>
    </div>
<?php }
elseif(get_field('page_layout') == 'No Sidebar') { ?>
    <div class='col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 page_content'>
        <?php the_content(); ?>
    </div>
<?php }
elseif(get_field('page_layout') == 'No Sidebar Narrow') { ?>
    <div class='col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 page_content'>
        <?php the_content(); ?>
    </div>
<?php }
elseif(get_field('page_layout') == 'No Sidebar Wide') { ?>
    <div class='col-xs-12 page_content'>
        <?php the_content(); ?>
    </div>
<?php }