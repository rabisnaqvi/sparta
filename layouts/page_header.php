<?php
global $sparta;
/*
|========================
|   Blog Header
|========================
*/
if (is_home() && $sparta['blog_header']):
?>
<div class="page-header colorpack-<?= $sparta['blog_header_colorpack']; ?> <?= $sparta['blog_header_classes'] ?>">
    <?php
    if (isset($sparta['blog_header_bg_img']['url'])):
?>
    <div class="background-media" style="background-image: url('<?= $sparta['blog_header_bg_img']['url'] ?>'); background-size: <?= $sparta['blog_header_img_size'] ?>; background-repeat: <?= $sparta['blog_header_img_repeat'] ?>;  background-position: 50% <?= $sparta['blog_header_img_vpos'] ?>%; background-attachment: <?= $sparta['blog_header_img_attachment'] ?>;"></div>
    <?php
    endif;
?>
    <?php
    if (isset($sparta['blog_header_overlay']['rgba'])):
?>
    <div class="background-overlay grid-overlay-<?= $sparta['blog_header_overlay_grid'] ?> " style="background-color: <?= $sparta['blog_header_overlay']['rgba'] ?>;"></div>
    <?php
    endif;
?>
    <div class="container">
        <div style="height: <?= $sparta['blog_header_margin_top'] ?>px;"></div>
        <header class="<?= $sparta['blog_header_alignment'] ?> <?php
    if ($sparta['blog_header_fadeout']) {
        echo " fade_out ";
    } //$sparta['blog_header_fadeout']
?>">
            <<?= $sparta['blog_header_type'] ?> class="section-header-title
                <?php
    if ($sparta['blog_header_underline']) {
        echo 'underlined';
    } //$sparta['blog_header_underline']
?>
                <?= $sparta['blog_header_underline_size'] ?>">
                    <?php
    echo $sparta['blog_header_text'];
?>
            </<?= $sparta['blog_header_type'] ?>>
            <?php
    if (isset($sparta['blog_subheader_text']) && $sparta['blog_subheader_text'] != ''):
        if ($sparta['blog_subheader_type'] == 'normal') {
            echo "<p class='subheader-text'>";
        } //$sparta['blog_subheader_type'] == 'normal'
        else {
            echo "<p class='lead subheader-text'>";
        }
        echo $sparta['blog_subheader_text'];
        echo "</p>";
    endif;
?>
        </header>
        <div style="height: <?= $sparta['blog_header_margin_bottom'] ?>px;"></div>
    </div>
</div>
<?php /*
|========================
|   Single Post Header
|========================
*/ 
elseif (is_single()):
?>

<div class="page-header row">
    <?php
    if (has_post_thumbnail()) {
?>
    <div class="page-header colorpack-<?php
        if (get_field('override_colorpack')) {
            $colorpack_objects = get_field('header_color_pack');
            $post              = $colorpack_objects;
            setup_postdata($post);
            the_ID();
            wp_reset_postdata();
        } //get_field('override_colorpack')
        else {
            echo $sparta['blog_header_colorpack'];
        }
?> <?= $sparta['single_header_classes'] ?>" style="margin-top: 0px;">
        <div class="background-overlay grid-overlay-<?= $sparta['single_header_overlay_grid'] ?> " style="background-color: <?= $sparta['single_header_overlay']['rgba'] ?>; z-index: 3px;"></div>
        <div class="background-media" style="background-image: url('<?= the_post_thumbnail_url('full'); ?>'); background-size: <?= $sparta['single_header_img_size'] ?>; background-repeat: <?= $sparta['single_header_img_repeat'] ?>;  background-position: 50% <?= $sparta['single_header_img_vpos'] ?>%; background-attachment: <?= $sparta['single_header_img_attachment'] ?>;"></div>
        <?php
        if (isset($sparta['single_header_overlay']['rgba'])):
?>
        <?php
        endif;
?>
        <div class="container">
            <div style="height: <?= $sparta['single_header_margin_top'] ?>px;"></div>
            <header class="<?= $sparta['single_header_alignment'] ?> <?php
        if ($sparta['single_header_fadeout']) {
            echo " fade_out ";
        } //$sparta['single_header_fadeout']
?>">
                <?php
        if ($sparta['single_post_categories']) {
?>
                   <div class="categories">
                    <span class="category"><?php
            $categories = get_the_category();
            $sep        = ', ';
            $output     = '';
            if ($categories) {
                foreach ($categories as $category) {
                    $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $sep;
                } //$categories as $category
                echo trim($output, $sep);
            } //$categories
?></span>
                </div>
                <?php
        } //$sparta['single_post_categories']
?>
                <<?= $sparta['single_header_type'] ?> class="section-header-title
                    <?php
        if ($sparta['single_header_underline']) {
            echo 'underlined';
        } //$sparta['single_header_underline']
?>
                    <?= $sparta['single_header_underline_size'] ?>">
                        <?php
        the_title();
?>
                </<?= $sparta['single_header_type'] ?>>
            </header>
            <div style="height: <?= $sparta['single_header_margin_bottom'] ?>px;"></div>
        </div>
    </div>
    <div class="author_pic colorpack-<?= $sparta['single_colorpack'] ?>">
        <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" title="<?php
        the_author();
?>">
            <?php
        echo get_avatar(get_the_author_meta('ID'), 100);
?>
            <div class="clearfix"></div>
            <span class="author_name"><?php
        the_author();
?></span>
        </a>
        <?php
        if ($sparta['single_post_writes_on']) {
?> <div class="writes_on">Writes On
            <?php
            the_time('F jS, Y');
?>
        </div> <?php
        } //$sparta['single_post_writes_on']
?>
    </div>
    <div id="post_sharing" class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 text-center"></div>
    <?php
        // If don't have post thumbnail
    } //has_post_thumbnail()
    else {
?>
    <div class="page-header colorpack-<?php
        if (get_field('override_colorpack')) {
            $colorpack_objects = get_field('header_color_pack');
            $post              = $colorpack_objects;
            setup_postdata($post);
            the_ID();
            wp_reset_postdata();
        } //get_field('override_colorpack')
        else {
            echo $sparta['blog_header_colorpack'];
        }
?> <?= $sparta['single_header_classes'] ?>" style="margin-top: 0px;">
        <div class="background-overlay grid-overlay-<?= $sparta['single_header_overlay_grid'] ?> " style="background-color: <?= $sparta['single_header_overlay']['rgba'] ?>; z-index: 3px;"></div>
        <?php
        if (isset($sparta['single_header_overlay']['rgba'])):
?>
        <?php
        endif;
?>
        <div class="container">
            <div style="height: <?= $sparta['single_header_margin_top'] ?>px;"></div>
            <header class="<?= $sparta['single_header_alignment'] ?> <?php
        if ($sparta['single_header_fadeout']) {
            echo " fade_out ";
        } //$sparta['single_header_fadeout']
?>">
                <?php
        if ($sparta['single_post_categories']) {
?>
                   <div class="categories">
                    <span class="category"><?php
            $categories = get_the_category();
            $sep        = ', ';
            $output     = '';
            if ($categories) {
                foreach ($categories as $category) {
                    $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $sep;
                } //$categories as $category
                echo trim($output, $sep);
            } //$categories
?></span>
                </div>
                <?php
        } //$sparta['single_post_categories']
?>
                <<?= $sparta['single_header_type'] ?> class="section-header-title
                    <?php
        if ($sparta['single_header_underline']) {
            echo 'underlined';
        } //$sparta['single_header_underline']
?>
                    <?= $sparta['single_header_underline_size'] ?>">
                        <?php
        the_title();
?>
                </<?= $sparta['single_header_type'] ?>>
            </header>
            <div style="height: <?= $sparta['single_header_margin_bottom'] ?>px;"></div>
        </div>
    </div>
    <div class="author_pic colorpack-<?= $sparta['single_colorpack'] ?>">
        <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" title="<?php
        the_author();
?>">
            <?php
        echo get_avatar(get_the_author_meta('ID'), 100);
?>
            <div class="clearfix"></div>
            <span class="author_name"><?php
        the_author();
?></span>
        </a>
        <?php
        if ($sparta['single_post_writes_on']) {
?> <div class="writes_on"><?php _e('Writes On', 'sparta'); ?>
            <?php
            the_time('F jS, Y');
?>
        </div> <?php
        } //$sparta['single_post_writes_on']
?>
    </div>
    <div id="post_sharing" class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 text-center"></div>
    <?php
    }
?>
</div>
<?php /*
    |=================
    | Page Header
    |=================
    */ 
elseif (is_page() && get_field('show_header')):
?>
<div class="clearfix"></div>
<div class="page-header colorpack-<?php
    if (get_field('header_color_pack')) {
        $colorpack_objects = get_field('header_color_pack');
        $post              = $colorpack_objects;
        setup_postdata($post);
        the_ID();
        wp_reset_postdata();
    } //get_field('header_color_pack')
?> <?php
    the_field('extra_classes');
?>">
    <?php
    if (get_field('background_image')):
?>
    <div class="background-media" style="background-image: url('<?php
        the_field('background_image');
?>'); background-size: <?php
        the_field('background_image_size');
?>; background-repeat: <?php
        the_field('background_image_repeat');
?>;  background-position: 50% <?php
        the_field('background_image_vertical_position');
?>%; background-attachment: <?php
        the_field('background_image_attachment');
?>;"></div>
    <?php
    endif;
?>
    <?php
    if (get_field('overlay_color') || get_field('overlay_grid')):
?>
    <div class="background-overlay grid-overlay-<?php
        the_field('overlay_grid');
?> " style="background-color: <?php
        the_field('overlay_color');
?>;"></div>
    <?php
    endif;
?>
    <div class="container">
       <div class="clearfix"></div>
        <div style="height: <?php
    the_field('margin_top');
?>px;"></div>
        <header class="page_header_text <?php
    the_field('header_font_alignment');
?> <?php
    if (get_field('fade_out_when_leaving_page')) {
        echo " fade_out ";
    } //get_field('fade_out_when_leaving_page')
?>">
            <<?php
    the_field('header_type');
?> class="section-header-title
                <?php
    if (get_field('header_underline')) {
        echo 'underlined';
    } //get_field('header_underline')
?>
                <?php
    the_field('header_underline_size');
?>">
                    <?php
    if (get_field('header_text') && get_field('header_text') != ''):
?>
                    <?php
        the_field('header_text');
?>
                    <?php
    else:
?>
                    <?php
        the_title();
?>
                    <?php
    endif;
?>
            </<?php
    the_field('header_type');
?>>
            <?php
    if (get_field('sub_header_text') && get_field('sub_header_text') != ''):
        if (get_field('sub_header_type') == 'normal') {
            echo "<p class='subheader-text'>";
        } //get_field('sub_header_type') == 'normal'
        else {
            echo "<p class='lead subheader-text'>";
        }
        if (get_field('sub_header_text') && get_field('sub_header_text') != ''):
            the_field('sub_header_text');
        endif;
        echo "</p>";
    endif;
?>
        </header>
        <div style="height: <?php
    the_field('margin_bottom');
?>px;"></div>
    </div>
</div>
<?php
    /*
    |=======================
    |=======================
    |   Archive Header
    |=======================
    |=======================
    */
    elseif(is_archive() || is_search()): ?>
<div class="clearfix"></div>
<div class="page-header colorpack-<?= $sparta['blog_header_colorpack']; ?> <?= $sparta['blog_header_classes'] ?>">
    <?php
    if (isset($sparta['blog_header_bg_img']['url'])):
?>
    <div class="background-media" style="background-image: url('<?= $sparta['blog_header_bg_img']['url'] ?>'); background-size: <?= $sparta['blog_header_img_size'] ?>; background-repeat: <?= $sparta['blog_header_img_repeat'] ?>;  background-position: 50% <?= $sparta['blog_header_img_vpos'] ?>%; background-attachment: <?= $sparta['blog_header_img_attachment'] ?>;"></div>
    <?php
    endif;
?>
    <?php
    if (isset($sparta['blog_header_overlay']['rgba'])):
?>
    <div class="background-overlay grid-overlay-<?= $sparta['blog_header_overlay_grid'] ?> " style="background-color: <?= $sparta['blog_header_overlay']['rgba'] ?>;"></div>
    <?php
    endif;
?>
    <div class="container">
        <div style="height: <?= $sparta['blog_header_margin_top'] ?>px;"></div>
        <header class="<?= $sparta['blog_header_alignment'] ?> <?php
    if ($sparta['blog_header_fadeout']) {
        echo " fade_out ";
    } //$sparta['blog_header_fadeout']
?>">
            <<?= $sparta['blog_header_type'] ?> class="section-header-title
                <?php
    if ($sparta['blog_header_underline']) {
        echo 'underlined';
    } //$sparta['blog_header_underline']
?>
                <?= $sparta['blog_header_underline_size'] ?>">
<?php
    if(is_archive()){
    if(is_category()) {
        single_cat_title();
    } elseif(is_tag()) {
        single_tag_title();
    } elseif(is_author()) {
        the_post();
        echo get_the_author();
        rewind_posts();
    } elseif(is_day()){
        echo get_the_date();
    } elseif(is_month()){
        echo get_the_date('F Y');
    } elseif(is_year()){
        echo get_the_date('Y');
    }
    } elseif(is_search()){
    echo '"'.get_search_query().'" Posts';
}
?>
            </<?= $sparta['blog_header_type'] ?>>
        </header>
        <div style="height: <?= $sparta['blog_header_margin_bottom'] ?>px;"></div>
    </div>
</div>
<?php
endif;
?>