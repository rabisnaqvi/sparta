<?php
if(has_post_thumbnail()) { ?>
   <div class="loop_image position-relative">
   <a href="<?php the_permalink(); ?>">
   <?php the_post_thumbnail( 'medium_large', array('class' => 'img-responsive')); ?>
   </a>
   </div>
<?php }