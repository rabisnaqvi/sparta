<?php global $sparta;
sparta_end_wrapper();
sparta_show('footer');
if($sparta['page_loader']):
    if($sparta['loader'] == 'gears'): ?>
   <div id="loader-wrapper">
    <div id="loader"></div>
    </div>
<?php
endif;
endif;
wp_footer();
?>
<script type="text/javascript">
// Theme Custom Javascript
    // Social Sharing
    jQuery("#post_sharing").jsSocials({
            shares: [<?php foreach($sparta['sharing_options'] as $value){echo '"'.$value.'", ';} ?>],
            shareIn: "popup"
    });
    // Transparent Navbar
    var navbar_position = jQuery('#masthead .navbar:first').position().top;
    var height = jQuery('#masthead .navbar:first').height();
    jQuery(document).ready(function($){
        if ($('#masthead nav').hasClass('navbar-transparent')) {
            $('#masthead nav:first').addClass('navbar-transparented');
            $('#masthead').css('margin-bottom', '-'+height+'px');
        $('#masthead nav.navbar-transparented .navbar-brand img.logo').attr('src', '<?= $sparta['logo_transparent']['url']; ?>');
        $(window).on('scroll', function () {
                if ($('#masthead nav').hasClass('navbar-changed')) {
                    $('#masthead nav').removeClass('navbar-transparented');
                    $('#masthead nav.navbar-transparent .navbar-brand img.logo').attr('src', '<?= $sparta['logo_normal']['url']; ?>');
                } else {
                    $('#masthead nav').addClass('navbar-transparented');
                    $('#masthead nav.navbar-transparented .navbar-brand img.logo').attr('src', '<?= $sparta['logo_transparent']['url']; ?>');
                }
            });
        }
        <?php if($sparta['scroll']) { ?>
        // Nice Scroll
        nice = $("html").niceScroll({scrollspeed: <?= $sparta['scroll_speed'] ?>});
    <?php } ?>
    });
    <?= $sparta['custom_js']; ?>
</script>
</body>
</html>