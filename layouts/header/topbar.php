<?php
global $sparta;
if($sparta['topbar'] && $sparta['menu_layout'] != 5):
?>
      <div class="topbar_wrapper row colorpack-<?= $sparta['topbar_color_pack'] ?>">
    <div class="container-fluid">
        <div class="social_icons_wrapper col-sm-6 col-xs-12 col-md-6 col-lg-6">
            <ul class="social_icons">
                <li class="social_icon">
                    <?php if(isset($sparta['tb_fb']) && $sparta['tb_fb'] != '') { ?>
                    <a href="<?= $sparta['tb_fb'] ?>"> <i class="fa fa-facebook topbar_social_icon" title="Facebook"></i> </a>
                    <?php } ?>
                </li>
                <li class="social_icon">
                    <?php if(isset($sparta['tb_twitter']) && $sparta['tb_twitter'] != '') { ?>
                    <a href="<?= $sparta['tb_twitter'] ?>"> <i class="fa fa-twitter topbar_social_icon" title="Twitter"></i> </a>
                    <?php } ?>
                </li>
                   <li class="social_icon">
                    <?php if(isset($sparta['tb_linkedin']) && $sparta['tb_linkedin'] != '') { ?>
                    <a href="<?= $sparta['tb_linkedin'] ?>"> <i class="fa fa-linkedin topbar_social_icon" title="Linkedin"></i> </a>
                    <?php } ?>
                </li>
                   <li class="social_icon">
                    <?php if(isset($sparta['tb_xing']) && $sparta['tb_xing'] != '') { ?>
                    <a href="<?= $sparta['tb_xing'] ?>"> <i class="fa fa-xing topbar_social_icon" title="Xing"></i> </a>
                    <?php } ?>
                </li>
                   <li class="social_icon">
                    <?php if(isset($sparta['tb_gplus']) && $sparta['tb_gplus'] != '') { ?>
                    <a href="<?= $sparta['tb_gplus'] ?>"> <i class="fa fa-google-plus topbar_social_icon" title="Google Plus"></i> </a>
                    <?php } ?>
                </li>
                   <li class="social_icon">
                    <?php if(isset($sparta['tb_tumblr']) && $sparta['tb_tumblr'] != '') { ?>
                    <a href="<?= $sparta['tb_tumblr'] ?>"> <i class="fa fa-tumblr topbar_social_icon" title="Tumblr"></i> </a>
                    <?php } ?>
                </li>
                   <li class="social_icon">
                    <?php if(isset($sparta['tb_pinterest']) && $sparta['tb_pinterest'] != '') { ?>
                    <a href="<?= $sparta['tb_pinterest'] ?>"> <i class="fa fa-pinterest-p topbar_social_icon" title="Pinterest"></i> </a>
                    <?php } ?>
                </li>
                   <li class="social_icon">
                    <?php if(isset($sparta['tb_youtube']) && $sparta['tb_youtube'] != '') { ?>
                    <a href="<?= $sparta['tb_youtube'] ?>"> <i class="fa fa-youtube-play topbar_social_icon" title="Youtube"></i> </a>
                    <?php } ?>
                </li>
                   <li class="social_icon">
                    <?php if(isset($sparta['tb_instagram']) && $sparta['tb_instagram'] != '') { ?>
                    <a href="<?= $sparta['tb_instagram'] ?>"> <i class="fa fa-instagram topbar_social_icon" title="Instagram"></i> </a>
                    <?php } ?>
                </li>
                   <li class="social_icon">
                    <?php if(isset($sparta['tb_vine']) && $sparta['tb_vine'] != '') { ?>
                    <a href="<?= $sparta['tb_vine'] ?>"> <i class="fa fa-vine topbar_social_icon" title="Vine"></i> </a>
                    <?php } ?>
                </li>
                   <li class="social_icon">
                    <?php if(isset($sparta['tb_vk']) && $sparta['tb_vk'] != '') { ?>
                    <a href="<?= $sparta['tb_vk'] ?>"> <i class="fa fa-vk topbar_social_icon" title="VK"></i> </a>
                    <?php } ?>
                </li>
            </ul>
        </div>
        <div class="topbar_menu_wrapper col-sm-6 col-xs-12 col-md-6 col-lg-6">
            <?php
		wp_nav_menu(array(
		'menu'            => 'topbar',
		'theme_location'  => 'topbar',
		'depth'           => 1,
		'container'       => 'div',
		'container_class' => 'topbar_menu',
		'container_id'    => 'topbar_menu',
		));
		?>
        </div>
    </div>
</div>
<?php endif;