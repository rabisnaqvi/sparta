<?php
global $sparta;
if($sparta['single_about_author']):
?>
<div class="about-author">
    <div class="row">
        <div class="col-xs-12 avatar">
           <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" title="<?php the_author(); ?>">
            <?php echo get_avatar( get_the_author_meta( 'ID' ) , 200); ?>
            </a>
        </div>
        <div class="col-xs-12 details">
           <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" title="<?php the_author(); ?>">
            <div class="name">
                <?php the_author(); ?>
            </div>
            </a>
            <div class="bio">
                <?= get_the_author_meta('description'); ?>
            </div>
        </div>
    </div>
</div>
<?php endif;