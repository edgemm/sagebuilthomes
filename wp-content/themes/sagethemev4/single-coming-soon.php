<?php
/*
Template Name Posts: Coming Soon
*/
?>

<?php get_header(); ?>
<?php the_post(); ?>






<div id="midwrap">




	<div id="topcontent"></div>

	
	
	
	<div id="content">
		
		<div id="leftnav">
		<?php get_sidebar(); ?>
		</div>
		
		
				
				<div id="contentright">
				
				<h1 id="title"><?php the_title(); ?></h1>
				<p style="font-weight:bold; font-size:15px;"><?php the_date(); ?></p>
				
				<?php the_content(); ?>
				


				</div>
		
	
		
		
	
<div id="line"><img src="/wp-content/themes/sagethemev2/images/abovefooterline.png"><div style="margin-top:18px;"></div>	
	<!-- close content -->
	
		</div>
	
</div>
<!-- close midwrap -->	
<div id="bottomcontent"></div>
</div>



<?php get_footer(); ?>







