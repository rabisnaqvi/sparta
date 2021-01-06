<?php
global $sparta;
if(have_posts()):
echo "<div class=''masonry_layout>";
if($sparta['blog_layout'] == 1 || !isset($sparta['blog_layout'])): ?>
    <div class='col-xs-12 col-sm-12 col-md-9 col-lg-9 pull-left colorpack-<?= $sparta['blog_colorpack'] ?>'>
        <section class='post_masonry'><div class="masonry_sizer"></div>
            <?php while(have_posts()): the_post();
         echo "<div class='masonry_item'>";
                    sparta_show('blogpost_on_archive');
         echo "</div>";
            endwhile;
         echo "</section>";
            sparta_show('blog_pagination'); ?>
    </div>
    <div class="sidebar col-xs-12 col-sm-12 col-md-3 col-lg-3 pull-right colorpack-<?= $sparta['blog_colorpack'] ?>">
        <?php dynamic_sidebar('default_sidebar' ); ?>
    </div>
<?php
elseif($sparta['blog_layout'] == 2): ?>
    <div class='col-xs-12 col-sm-12 col-md-9 col-lg-9 pull-right colorpack-<?= $sparta['blog_colorpack'] ?>'>
        <section class='post_masonry'><div class="masonry_sizer"></div>
            <?php while(have_posts()): the_post();
         echo "<div class='masonry_item'>";
                    sparta_show('blogpost_on_archive');
         echo "</div>";
            endwhile;
         echo "</section>";
            sparta_show('blog_pagination'); ?>
    </div>
    <div class="sidebar col-xs-12 col-sm-12 col-md-3 col-lg-3 pull-left colorpack-<?= $sparta['blog_colorpack'] ?>">
        <?php dynamic_sidebar('default_sidebar' ); ?>
    </div>
<?php
elseif($sparta['blog_layout'] == 3): ?>
<div class='col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 colorpack-<?= $sparta['blog_colorpack'] ?>'>
        <section class='post_masonry'><div class="masonry_sizer"></div>
            <?php while(have_posts()): the_post();
         echo "<div class='masonry_item'>";
                    sparta_show('blogpost_on_archive');
         echo "</div>";
            endwhile;
         echo "</section>";
            sparta_show('blog_pagination'); ?>
    </div>
<?php
elseif($sparta['blog_layout'] == 4): ?>
<div class='col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 colorpack-<?= $sparta['blog_colorpack'] ?>'>
        <section class='post_masonry'><div class="masonry_sizer"></div>
            <?php while(have_posts()): the_post();
         echo "<div class='masonry_item'>";
                    sparta_show('blogpost_on_archive');
         echo "</div>";
            endwhile;
         echo "</section>";
            sparta_show('blog_pagination'); ?>
    </div>
<?php elseif($sparta['blog_layout'] == 5): ?>
<div class='col-xs-12 colorpack-<?= $sparta['blog_colorpack'] ?>'>
        <section class='post_masonry'><div class="masonry_sizer"></div>
            <?php while(have_posts()): the_post();
         echo "<div class='masonry_item'>";
                    sparta_show('blogpost_on_archive');
         echo "</div>";
            endwhile;
         echo "</section>";
            sparta_show('blog_pagination'); ?>
    </div>
<?php endif;
echo "</div>";
else:
echo "<h3 class='tall-m-top tall-m-bottom text-center'>";
_e('Nothing Found.', 'sparta');
echo "</h3>";
endif;