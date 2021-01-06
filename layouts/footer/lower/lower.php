<?php global $sparta;
$colorpack = '';
if (isset($sparta['footer_colorpack'])) {
	$colorpack = $sparta['footer_colorpack'];
}
?>
<div class="clearfix"></div>
<div class="colorpack-<?= $colorpack ?> lower-footer">
<?php get_template_part('layouts/footer/lower/'.$sparta['footer_columns']); ?>
</div>