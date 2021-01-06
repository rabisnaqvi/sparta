<?php global $sparta; ?>
   <div class="single_post_archieve">
    <div class="row">
        <div class="col-xs-offset-1 col-xs-10 details">
           <?php sparta_show('single_archive_image'); ?>
            <div class="post-title">
                <<?= $sparta['blog_post_title_type'] ?>><a href="<?= the_permalink(); ?>" title="<?= the_title(); ?>"><?= the_title(); ?></a></<?= $sparta['blog_post_title_type'] ?>>
            </div>
            <div class="post-meta">
                <small class="post-meta"><?php if($sparta['blog_meta_category']):?> <span class="category"><?php _e('In', 'sparta'); ?> <?php
        $categories = get_the_category();
        $sep        = ', ';
        $output     = '';
        if ($categories) {
            foreach ($categories as $category) {
                $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $sep;
            }
            echo trim($output, $sep);
        }
        ?></span><?php endif; if($sparta['blog_meta_time']): ?> <span class="time"><?php _e('On', 'sparta'); ?> <?php the_time('F jS, Y g:i a');?></span><?php endif; if($sparta['blog_meta_author']): ?> <span class="author"><?php _e('By', 'sparta'); ?> <a href="<?=get_author_posts_url(get_the_author_meta('ID'));?>"><?php the_author();?></a></span><?php endif; if($sparta['blog_meta_comments']): ?> <span class="comments"><?= get_comments_number(); ?> <?php _e('Comments', 'sparta') ?></span><?php endif; ?></small>
            </div>
            <div class="excerpt">
                <span><?= the_excerpt(); ?></span>
            </div>
            <?php if($sparta['blog_readmore']): ?>
            <div class="readmore">
                <a href="<?= the_permalink(); ?>" <?php if(!isset($sparta['blog_readmore_style']) || $sparta['blog_readmore_style'] == 'button'){?> class="btn btn-primary" <?php } ?>><?php if(isset($sparta['blog_readmore_text'])){ echo $sparta['blog_readmore_text'];} else {_e('read more', 'sparta');} ?></a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>