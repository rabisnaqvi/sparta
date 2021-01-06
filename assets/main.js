jQuery(document).ready(function ($) {
    setTimeout(function () {
        $('#loader-wrapper').fadeOut('slow');
        $('body').addClass('loaded');
    }, 1000);
    //    Return False when dropdown trigger clicked
    $('#masthead ul#menu-main li ul.dropdown-menu li.menu-item-has-children > a').on('click', function () {
        return false;
    });
    // Fade out when leaving Page
    $(window).scroll(function () {
    $('.fade_out').each(function () {
        if (($(this).offset().top - $(window).scrollTop()) < 80) {
            var opacity = $(this).css('opacity')-0.1;
            $(this).stop().animate({opacity: 0}, 1000);
        } else {
            var opacity = $(this).css('opacity');
            $(this).stop().animate({opacity: 1}, 1000);
        }
    });
});
    // Back To Top
    
    
    //browser window scroll (in pixels) after which the "back to top" link is shown
    var offset = 300,
	//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
	offset_opacity = 1200,
	//duration of the top scrolling animation (in ms)
	scroll_top_duration = 700;
    
    $(window).scroll(function(){
        if($(window).scrollTop() >= scroll_top_duration){
            $('.cd-top').css('visibility', 'visible');
            $('.cd-top').removeClass('fadeOutRight');
            $('.cd-top').addClass('fadeInRight');
        } else {
            $('.cd-top').removeClass('fadeInRight');
            $('.cd-top').addClass('fadeOutRight');
            $('.cd-top').css('visibility', 'hidden');
        }
    });
    $('.cd-top').on('click', function(event) {
      event.preventDefault();
      $('body,html').animate({
        scrollTop: 0,
      }, scroll_top_duration);
    });
    // Initialize WOW.JS
    new WOW().init();
    
    // Animate Number
    var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',');
    $('.counter').each(function(){
    var pos = $(this).offset().top;
    var to = $(this).attr('data-to');
    var path = $(this).getPath();
    $(window).scroll(function(){
//    var winTop = $(window).scrollTop();
    if($(window).scrollTop() >= pos-500) {
    $(path).animateNumber(
      {
        number: to,
        numberStep: comma_separator_number_step,
        easing: 'easeInQuad',
      }, 2000
    );
    }
    });
    });
    
    // Color Packs
    var selector = $('[class*=colorpack-]');
    $(selector).each(function(){
        var bg = $(this).css('background-color');
        $(this).find('.jumbotron').each(function(){
        $(this).css('background', ColorLuminance(rgb2hex(bg), 0.9));
        });
    });
    
    // Post Masonry
    $('.post_masonry').masonry({
      // optionn
        itemSelector: '.masonry_item',
        columnWidth: '.masonry_sizer',
        percentPosition: true,
    });
    
    
    // WooCommerce Add to cart Icon
    $('.btn-add-to-cart').append('<i class="fa fa-cart-plus" style="margin-left: 5px;"></i>');
    // WooCommerce Add Bootstrap Class to pagination
    $('.woocommerce-pagination ul').addClass('pagination');
    $('.woocommerce-pagination ul li span.current').parent('li').addClass('active');
    
    // WooCommerce My Account Navigation Current Item Fix
    $('ul.nav.nav-pills.nav-stacked li.is-active').addClass('active');
    
    // WooCmmerce add form-control class to every input, textarea on myaccount page
    $('.woocommerce-MyAccount-content form input').addClass('form-control');
    
    // Tooltips
    $('[data-toggle="tooltip"]').tooltip();
    
    // Wc
    $('.select2-container').removeClass('form-control');
    $('.select2-container').find('select').addClass('form-control');
    //
    $('.woocommerce.columns-1 ul > li').removeClass('col-md-3');
    $('.woocommerce.columns-1 ul > li').removeClass('col-md-4');
    $('.woocommerce.columns-1 ul > li').removeClass('col-md-6');
    $('.woocommerce.columns-1 ul > li').addClass('col-md-12');
    //
    $('.woocommerce.columns-2 ul > li').removeClass('col-md-3');
    $('.woocommerce.columns-2 ul > li').removeClass('col-md-4');
    $('.woocommerce.columns-2 ul > li').addClass('col-md-6');
    //
    $('.woocommerce.columns-3 ul > li').removeClass('col-md-3');
    $('.woocommerce.columns-3 ul > li').removeClass('col-md-6');
    $('.woocommerce.columns-3 ul > li').addClass('col-md-4');
    //
    $('.woocommerce.columns-4 ul > li').removeClass('col-md-4');
    $('.woocommerce.columns-4 ul > li').removeClass('col-md-6');
    $('.woocommerce.columns-4 ul > li').addClass('col-md-3');
    //
    $('.woocommerce.columns-5 ul > li').addClass('col-md-3');
    //
    $('.woocommerce.columns-6 ul > li').addClass('col-md-2');
    
    ///
    /// Info Box Icon Effect
    $('.sparta_infobox').each(function(){
        var a = $(this).children('.icon');
        // Ready data
        var color = a.attr('data-color');
        var bg = a.attr('data-bg');
        var border = a.attr('data-border');
        var color_hover = a.attr('data-color-hover');
        var bg_hover = a.attr('data-bg-hover');
        var border_hover = a.attr('data-border-hover');
        $(this).hover(function(){
            a.css({color: color_hover, background: bg_hover, border: '1px solid '+border_hover});
        }, function(){
            a.css({color: color, background: bg, border: '1px solid '+border});
        });
    });
    
    
    // Contact Form 7 classes
    $('.wpcf7-form-control:not(.wpcf7-submit)').addClass('form-control');
    $('.wpcf7-submit').addClass('btn btn-primary');

    // Add img-responsive class to images inside img-responsive class elemens
    $('.img-responsive img').addClass('img-responsive');

    // add table class to all tables for styling
    $('table').addClass('table');
});


// Navbar Search
function toggle_search_nav(event) {
    jQuery('.navbar_search_toggle').toggleClass('hidden');
    jQuery('#navbar_search_wrap').toggleClass('hidden');
    jQuery('.hide_on_search').toggleClass('hidden');
    jQuery('.cart_menu').toggleClass('hidden');
    jQuery('#navbar_search_wrap #input_field').focus();
    return false;
}

jQuery('#search_close').click(function(){
    jQuery('.navbar_search_toggle').toggleClass('hidden');
    jQuery('#navbar_search_wrap').toggleClass('hidden');
    jQuery('.hide_on_search').toggleClass('hidden');
    jQuery('.cart_menu').toggleClass('hidden');
    return false;
});

// Get Unqiue path of a element

jQuery.fn.getPath = function () {
    if (this.length != 1) throw 'Requires one element.';

    var path, node = this;
    while (node.length) {
        var realNode = node[0], name = realNode.localName;
        if (!name) break;
        name = name.toLowerCase();

        var parent = node.parent();

        var siblings = parent.children(name);
        if (siblings.length > 1) { 
            name += ':eq(' + siblings.index(realNode) + ')';
        }

        path = name + (path ? '>' + path : '');
        node = parent;
    }

    return path;
};

// Get ligher or darker colors
function ColorLuminance(hex, lum) {

	// validate hex string
	hex = String(hex).replace(/[^0-9a-f]/gi, '');
	if (hex.length < 6) {
		hex = hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2];
	}
	lum = lum || 0;

	// convert to decimal and change luminosity
	var rgb = "#", c, i;
	for (i = 0; i < 3; i++) {
		c = parseInt(hex.substr(i*2,2), 16);
		c = Math.round(Math.min(Math.max(0, c + (c * lum)), 255)).toString(16);
		rgb += ("00"+c).substr(c.length);
	}

	return rgb;
}

// Convert rgb to hex
var hexDigits = new Array
        ("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f"); 

//Function to convert hex format to a rgb color
function rgb2hex(rgb) {
 rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
 return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
}

function hex(x) {
  return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
 }