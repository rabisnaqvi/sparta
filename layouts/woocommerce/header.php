<?php
global $sparta;
if(!$sparta['wc_header']) {
    return;
}
if(is_single()) {
    if(!$sparta['wc_single_header']) {
        return;
    }
}
$colorpack = '';
if(isset($sparta['wc_header_colorpack'])) {
    $colorpack = $sparta['wc_header_colorpack'];
}
?>
<div class="page-header wc-header colorpack-<?= $colorpack; ?> <?= $sparta['wc_header_classes'] ?>">
    <?php
    if (isset($sparta['wc_header_bg_img']['url'])):
?>
    <div class="background-media" style="background-image: url('<?= $sparta['wc_header_bg_img']['url'] ?>'); background-size: <?= $sparta['wc_header_img_size'] ?>; background-repeat: <?= $sparta['wc_header_img_repeat'] ?>;  background-position: 50% <?= $sparta['wc_header_img_vpos'] ?>%; background-attachment: <?= $sparta['wc_header_img_attachment'] ?>;"></div>
    <?php
    endif;
?>
    <?php
    if (isset($sparta['wc_header_overlay']['rgba'])):
?>
    <div class="background-overlay grid-overlay-<?= $sparta['wc_header_overlay_grid'] ?> " style="background-color: <?= $sparta['wc_header_overlay']['rgba'] ?>;"></div>
    <?php
    endif;
?>
    <div class="container">
        <div style="height: <?= $sparta['wc_header_margin_top'] ?>px;"></div>
        <header class="<?= $sparta['wc_header_alignment'] ?> <?php
    if ($sparta['wc_header_fadeout']) {
        echo " fade_out ";
    } //$sparta['wc_header_fadeout']
?>">
            <<?= $sparta['wc_header_type'] ?> class="section-header-title
                <?php
    if ($sparta['wc_header_underline']) {
        echo 'underlined';
    } //$sparta['wc_header_underline']
?>
                <?= $sparta['wc_header_underline_size'] ?> ">
                    <?php
    if(is_shop()):
    echo $sparta['wc_header_text'];
    else:
    echo the_title();
    endif;
?>
            </<?= $sparta['wc_header_type'] ?>>
            <?php
    if (isset($sparta['wc_subheader_text']) && $sparta['wc_subheader_text'] != ''):
        if ($sparta['wc_subheader_type'] == 'normal') {
            echo "<p class='subheader-text'>";
        } //$sparta['wc_subheader_type'] == 'normal'
        else {
            echo "<p class='lead subheader-text'>";
        }
        echo $sparta['wc_subheader_text'];
        echo "</p>";
    endif;
?>
        </header>
        <div style="height: <?= $sparta['wc_header_margin_bottom'] ?>px;"></div>
    </div>
</div>