<?php
global $sparta;
// Show Function of Theme
function sparta_show($what) {
    global $sparta;
	// What wants to show is stored in $what variable
    switch ($what) {
        case "topbar":
            return get_template_part( 'layouts/header/topbar' );
            break;
        case "nav_primary":
            return get_template_part( 'layouts/header/main_nav' );
            break;
        case "page_header":
            return get_template_part('layouts/page_header');
            break;
        case "blogposts":
            if($sparta['blog_display'] == 'list') {
                return get_template_part('layouts/blog/archive/blog');
            } else {
                return get_template_part('layouts/blog/archive/masonry');
            }
            break;
        case "blogpost_on_archive":
            return get_template_part('layouts/blog/archive/blogpost_on_archive');
            break;
        case "blog_pagination":
            return get_template_part('layouts/blog/archive/blog_pagination');
            break;
        case "single_archive_image":
            return get_template_part('layouts/blog/archive/image');
            break;
        case "single_post":
            return get_template_part('layouts/blog/single/single');
            break;
        case "blogpost_single":
            return get_template_part('layouts/blog/single/blogpost_single');
            break;
        case "post_tags":
            return get_template_part('layouts/blog/single/tags');
            break;
        case "about_author":
            return get_template_part('layouts/blog/single/about_author');
            break;
        case "footer":
            return get_template_part('layouts/footer/footer');
            break;
        case "page":
            return get_template_part('layouts/page');
            break;
        case "wc_header":
            return get_template_part('layouts/woocommerce/header');
            break;
    }
}

function sparta_start_wrapper() {
    if(!is_page()){
        echo "<div class='container-fluid' id='content_wrapper'>";
    }
}

function sparta_end_wrapper() {
    if(!is_page()){
        echo "</div>";
    }
}
function sparta_get_fontawesome_array($no_icon = true) {
    $pattern = '/\.(fa-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"\\\\(.+)";\s+}/';
    $subject =  file_get_contents(get_template_directory().'/assets/font-awesome-4.7.0/css/font-awesome.css');
    preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);
    foreach($matches as $match) {
        $icons[$match[1]] = $match[1];
    }
    if($no_icon === true){
    $icons['No Icon'] = '';
    }
    ksort($icons); 
    return $icons;
}
function sparta_generate_menu_colorpack_css($id, $changed_id) {
    $text_color = get_field('text_colour', $id );
    $link_color = get_field('link_colour', $id );
    $heading_color = get_field('heading_colour', $id );
    $link_hover_color = get_field('link_hover_colour', $id );
    $bg_color = get_field('background_colour', $id );
    $primary_button_bg_color = get_field('primary_button_colour', $id );
    // Changed Data
    $text_changed_color = get_field('text_colour', $changed_id );
    $link_changed_color = get_field('link_colour', $changed_id );
    $heading_changed_color = get_field('heading_colour', $changed_id );
    $link_changed_hover_color = get_field('link_hover_colour', $changed_id );
    $bg_changed_color = get_field('background_colour', $changed_id );
    $primary_changed_button_bg_color = get_field('primary_button_colour', $changed_id );
    $output = '';
    $output .= "#masthead .navbar-nav li a,#masthead nav:not(.navbar-changed) #search_close {color: ".$link_color.";}";
    $output .= "#masthead .navbar-nav li a:hover,#masthead .navbar-nav li a:focus,#masthead .navbar-nav li.active a{color: ".$link_hover_color.";}";
    $output .= "#masthead nav {background-color: ".$bg_color.";}";
    $output .= "#masthead .navbar-nav li .dropdown-menu {background-color: ".$bg_color.";border-top-color: ".$primary_button_bg_color.";}";
    $output .= "#masthead .navbar-nav li .dropdown-menu a {color: ".$text_color.";}";
    $output .= "#masthead .navbar .logo-text {color: ".$heading_color." !important;}";
    //Changed Css
    $output .= "#masthead .navbar-changed .navbar-nav li a,#masthead .navbar-changed #search_close {color: ".$link_changed_color.";}";
    $output .= "#masthead .navbar-changed .navbar-nav li a:hover,#masthead .navbar-changed .navbar-nav li a:focus,#masthead .navbar-changed .navbar-nav li.active a{color: ".$link_changed_hover_color.";}";
    $output .= "#masthead nav.navbar-changed {background-color: ".$bg_changed_color.";}";
    $output .= "#masthead .navbar-changed .navbar-nav li .dropdown-menu {background-color: ".$bg_changed_color.";border-top-color: ".$primary_changed_button_bg_color.";}";
    $output .= "#masthead .navbar-changed .navbar-nav li .dropdown-menu a {color: ".$text_changed_color.";}";
    $output .= "#masthead .navbar-changed .logo-text {color: ".$heading_changed_color." !important;}";
    $output .= "#masthead .navbar-toggle {color: ".$heading_color.";}";
    $output .= "#masthead .navbar_search_toggle {color: ".$heading_color.";}";
    $output .= "#masthead .navbar-changed .navbar_search_toggle {color: ".$heading_changed_color.";}";
    $output .= "#masthead .navbar-changed .navbar-toggle {color: ".$heading_changed_color.";}";
    $output .= "#masthead .navbar_cart.on_small {color: ".$heading_color.";}";
    $output .= "#masthead .navbar-changed .navbar_cart.on_small {color: ".$heading_changed_color.";}";
    return $output;
}

function sparta_generate_topbar_colorpack_css($id) {
    $text_color = get_field('text_colour', $id );
    $link_color = get_field('link_colour', $id );
    $heading_color = get_field('heading_colour', $id );
    $link_hover_color = get_field('link_hover_colour', $id );
    $bg_color = get_field('background_colour', $id );
    $primary_button_bg_color = get_field('primary_button_colour', $id );
    $output = '';
    $output = ".topbar_wrapper .social_icons_wrapper ul.social_icons li a {color: ".$link_color.";}";
    $output = ".topbar_wrapper .topbar_menu_wrapper ul li a {color: ".$link_color.";}";
    $output = ".topbar_wrapper .social_icons_wrapper ul.social_icons li a:hover,.topbar_wrapper .social_icons_wrapper ul.social_icons li a:focus{color: ".$link_hover_color.";}";
    $output = ".topbar_wrapper .topbar_menu_wrapper ul li a:hover,.topbar_wrapper .topbar_menu_wrapper ul li a:focus{color: ".$link_hover_color.";}";
    $output = ".topbar_wrapper {background-color: ".$bg_color.";}";
    return $output;
}
function sparta_css() {
    require 'theme_css.php';
}
function sparta_generate_colopack_css($id) {
    $text_color = get_field('text_colour', $id);
    $heading_color = get_field('heading_colour', $id);
    $link_color = get_field('link_colour', $id);
    $link_hover_color = get_field('link_hover_colour', $id);
    $bg_color = get_field('background_colour', $id);
    $primary_button_bg_color = get_field('primary_button_colour', $id);
    $primary_button_hover_bg_color = get_field('primary_button_hover_colour', $id);
    $primary_button_text_color = get_field('primary_button_text_colour', $id);
    $primary_button_hover_text_color = get_field('primary_button_hover_text_colour', $id);
    $primary_button_icon_color = get_field('primary_button_icon_colour', $id);
    $primary_button_hover_icon_color = get_field('primary_button_hover_icon_colour', $id);
    $icon_color = get_field('icon_colour', $id);
    $output = '';
    $output .= '.colorpack-'.$id.' {color: '.$text_color.';}';
    $output .= '.colorpack-'.$id.' h1,.colorpack-'.$id.' h2,.colorpack-'.$id.' h3,.colorpack-'.$id.' h4,.colorpack-'.$id.' h5,.colorpack-'.$id.' h6{color: '.$heading_color.';}';
    $output .= '.colorpack-'.$id.' a {color: '.$link_color.';}';
    $output .= '.colorpack-'.$id.' a:hover,.colorpack-'.$id.' a:focus{color: '.$link_hover_color.';}';
    $output .= '.colorpack-'.$id.'{background-color: '.$bg_color.';}';
    $output .= '.colorpack-'.$id.' .btn-primary {background-color: '.$primary_button_bg_color.';color: '.$primary_button_text_color.';}';
    $output .= '.colorpack-'.$id.' .btn-primary:hover,.colorpack-'.$id.' .btn-primary:focus{background-color: '.$primary_button_hover_bg_color.';color: '.$primary_button_hover_text_color.';}';
    $output .= '.colorpack-'.$id.' .btn-primary i {color: '.$primary_button_icon_color.';}';
    $output .= '.colorpack-'.$id.' .btn-primary:hover i,.colorpack-'.$id.' .btn-primary:focus i{color: '.$primary_button_hover_icon_color.';}';
    $output .= '.colorpack-'.$id.' .underlined::after {background-color: '.$heading_color.';}';
    $output .= '.colorpack-'.$id.' .pagination > .active > a, .colorpack-'.$id.'  .pagination > .active > span, .colorpack-'.$id.' .pagination > .active > a:hover, .colorpack-'.$id.' .pagination > .active > span:hover, .colorpack-'.$id.' .pagination > .active > a:focus,  .colorpack-'.$id.' .pagination > .active > span:focus {background-color: '.$primary_button_bg_color.';}';
    $output .= '.colorpack-'.$id.' .pagination > li > a:hover, .colorpack-'.$id.' .pagination > li > span:hover, .colorpack-'.$id.' .pagination > li > a:focus, .colorpack-'.$id.' .pagination > li > span:focus {color: '.$text_color.'; background-color: '.$bg_color.';}';
    $output .= '.colorpack-'.$id.' .form-control:focus {border-color: '.$primary_button_bg_color.';outline: 0;-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075),0 0 8px #'.$primary_button_bg_color.';box-shadow: inset 0 1px 1px rgba(0,0,0,0.075),0 0 8px '.$primary_button_bg_color.';}';
    $output .= '.colorpack-'.$id.', .colorpack-'.$id.' .comment-content{border-color: '.$primary_button_bg_color.' !important;}';
    $output .= '.colorpack-'.$id.' .woocommerce ul.products li.product span.onsale, .colorpack-'.$id.' .woocommerce-page ul.products li span.onsale, .colorpack-'.$id.' .product.type-product span.onsale {background: '.$primary_button_bg_color.' !important;color: '.$primary_button_text_color.';}';
    $output .= '.colorpack-'.$id.' .star-rating span, .colorpack-'.$id.' .star-rating {color: '.$heading_color.';}';
    echo $output;
}