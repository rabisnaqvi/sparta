<?php
global $sparta;
$colorpack = '';
if(isset($sparta['single_colorpack'])) {
	$colorpack = $sparta['single_colorpack'];
}
echo "<div class='colorpack-".$colorpack."'>";
if($sparta['single_layout'] == 1): ?>
<div class='col-xs-12 col-sm-12 col-md-9 col-lg-9 pull-left colorpack-<?= $colorpack ?>'>
<?php the_content();
sparta_show('post_tags');
sparta_show('about_author');
    if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
?>
</div>
<div class="sidebar col-xs-12 col-sm-12 col-md-3 col-lg-3 pull-right colorpack-<?= $colorpack ?>">
        <?php dynamic_sidebar('default_sidebar' ); ?>
    </div>
<?php elseif($sparta['single_layout'] == 2): ?>
<div class='col-xs-12 col-sm-12 col-md-9 col-lg-9 pull-right colorpack-<?= $colorpack ?>'>
<?php the_content();
sparta_show('post_tags');
sparta_show('about_author');
    if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
?>
</div>
<div class="sidebar col-xs-12 col-sm-12 col-md-3 col-lg-3 pull-left colorpack-<?= $colorpack ?>">
        <?php dynamic_sidebar('default_sidebar' ); ?>
    </div>
<?php elseif($sparta['single_layout'] == 3): ?>
<div class='col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 colorpack-<?= $colorpack ?>'>
<?php the_content();
sparta_show('post_tags');
sparta_show('about_author');
    if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
?>
</div>
<?php elseif(!isset($sparta['single_layout']) || $sparta['single_layout'] == 4): ?>
<div class='col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 colorpack-<?= $colorpack ?>'>
<div class="post_content">
<?php the_content();
sparta_show('post_tags');
sparta_show('about_author');
    if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
?>
</div>
</div>
<?php elseif($sparta['single_layout'] == 5): ?>
<div class='col-xs-12 colorpack-<?= $colorpack ?>'>
<?php the_content();
sparta_show('post_tags');
sparta_show('about_author');
    if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
?>
</div>
<?php
endif;
echo "</div>";