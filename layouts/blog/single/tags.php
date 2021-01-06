<?php
global $sparta;
if($sparta['single_post_tags']):
$tags = get_the_tags();
$html = '<div class="post_tags">';
if ($tags) {
foreach ( $tags as $tag ) {
	$tag_link = get_tag_link( $tag->term_id );
			
	$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug} btn btn-info'>";
	$html .= "{$tag->name}</a>";
}
}
$html .= '</div>';
echo $html;
endif;