<?php global $sparta;
$colorpack = '';
if (isset($sparta['up_footer_colorpack'])) {
	$colorpack = $sparta['up_footer_colorpack'];
}
?>
<div class="clearfix"></div>
<div class="colorpack-<?= $colorpack ?> upper-footer">
<?php get_template_part('layouts/footer/upper/'.$sparta['up_footer_columns']); ?>
</div>