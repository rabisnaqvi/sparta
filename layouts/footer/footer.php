<?php
global $sparta;
echo "<footer>";
get_template_part('layouts/footer/upper/upper');
get_template_part('layouts/footer/lower/lower');
if($sparta['back_to_top']):
?>
<a href="#0" class="cd-top animated"><i class="fa fa-angle-up fa-lg" aria-hidden="true"></i>
</a>
<?php endif; echo "</footer>";