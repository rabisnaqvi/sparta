<?php
global $sparta;
get_header();
echo "<div class='page_content'>";
if($sparta['404_page']):
echo apply_filters('the_content', get_post_field('post_content', $sparta['404_page']));

else:?>
<h1 class="text-center"><?php _e('Are You Lost?', 'sparta'); ?></h1>
<p class="lead text-center"><?php _e('It\'s a 404 Error :(', 'sparta'); ?></p>
<center><small class="text-center"><?php printf( __('Try Going Back To <a href="%s">Homepage</a>', 'sparta'), home_url()); ?></small></center>
<?php endif;
echo "</div>";
get_footer();