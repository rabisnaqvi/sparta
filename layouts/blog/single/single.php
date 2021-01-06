<?php global $sparta;
sparta_show('blogpost_single');
    $post_prev = get_adjacent_post( false, '', true );
	$post_next = get_adjacent_post( false, '', false );
    $post              = $post_prev;
    if($post):
    setup_postdata($post);?>
    <div class="link">
<div class="previous_product">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><i class="fa fa-angle-left"></i>
        <span class="show_on_hover">
            <?php the_post_thumbnail('thumbnail'); ?>
        </span>
        </a>
    </div>
</div>
    <?php
    wp_reset_postdata();
    endif;
    $post              = $post_next;
    if($post):
    setup_postdata($post);
?> 
        <div class="link">
<div class="next_product">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><i class="fa fa-angle-right"></i>
        <span class="show_on_hover">
            <?php the_post_thumbnail('thumbnail'); ?>
        </span>
        </a>
    </div>
</div>
		<?php wp_reset_postdata(); endif; ?>