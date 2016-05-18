<?php /* Template Name: Gallery Page */ ?>
<?php get_header(); ?>
<?php the_post(); ?>






<div id="midwrap">




	<div id="topcontent"></div>

	
	
	
	<div id="content">
		
		<div id="leftnav">
		<h2 style="font-family:georgia;font-size:13px;color:black;font-weight:bold;">PHOTO GALLERIES</h2>
		<div id="cityline"></div>
		<?php wp_nav_menu( array( 'menu' => 'gallery' ) ); ?>
		</div>
		
		
				
				<div id="contentright">
				
				<h1 id="title"><?php the_title(); ?></h1>
				
				<?php the_content(); ?>
				<div style="height:15px;"></div>









				</div>
		
	
		
		
	
<div id="line"><img src="/wp-content/themes/sagethemev2/images/abovefooterline.png"><div style="margin-top:18px;"></div>	
	<!-- close content -->
	
		</div>
	
</div>
<!-- close midwrap -->	
<div id="bottomcontent"></div>
</div>



<?php get_footer(); ?>







