<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<!-- Yahoo CSS Reset -->
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.3.0/build/cssreset/reset-min.css" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<?php wp_head(); ?>

<script src="/wp-content/themes/sagethemev2/js/css_browser_selector.js" type="text/javascript"></script>

<?php if (is_front_page() ) { ?>
<script type="text/javascript" src="/wp-content/themes/sagethemev2/js/jquery-1.2.6.min.js"></script>

<script type="text/javascript">


/*** 
    Simple jQuery Slideshow Script
    Released by Jon Raasch (jonraasch.com) under FreeBSD license: free to use or modify, not responsible for anything, etc.  Please link out to me if you like it :)
***/

function slideSwitch() {
    var $active = $('#slideshow IMG.active');

    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

    // use this to pull the images in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');

    // uncomment the 3 lines below to pull the images in random order
    
    // var $sibs  = $active.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );


    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 5000 );
});

</script>
<?php } ?>


<!--[if !IE]><!--><script>
if (/*@cc_on!@*/false) {
    document.documentElement.className+=' ie10';
}
</script><!--<![endif]-->


</head>

<body <?php body_class(); ?>>

<div id="header">	
	
	
	<div id="topnav">
		<div id="navleft">
		<ul id="l_nav">
		<li><a href="/home/">Home</a></li>
		<li><a href="/homes/">Available Homes</a></li>
		<li><a href="/photo-gallery/">Photo Gallery</a></li>
		</ul>
		</div>
		<div id="logo">
		<a href="<?php bloginfo('url'); ?>"><img src="/wp-content/themes/sagethemev2/images/sage_logo.png" alt="sage built homes logo"/></a>
		<!-- close logo -->
		</div>
		<div id="navright">
		<ul id="rightnav">
		<li><a href="/coming-soon/">Coming Soon</a></li>
		<li><a href="/care-warranty/">Care &amp; Warranty</a></li>
		<li><a href="/about-us/">About Us</a></li>
		</ul>
		</div>
	<!-- close topnav -->
	</div>



<!-- close header -->
</div>
