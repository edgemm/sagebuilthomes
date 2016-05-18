<?php /* Template Name: Default Page */ ?>
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
				
				<?php the_content(); ?>
				
				<?php // Outputs plans/homes.
$wpQuery = new WP_Query('post_type=plans&meta_key=bedrooms&orderby=meta_value&order=ASC&showposts=100');			
if ($wpQuery->have_posts()) {
	while ($wpQuery->have_posts()) {
		$wpQuery->the_post();
		echo "<div class='homebox'>";
		echo "<div class='homeboxtitle'>";
		echo "<p>". get_the_title()."</p>";
		echo "</div>";
		echo "<p><a href='".get_permalink()."'>".the_post_thumbnail('medium')."</a></p>";
		if(get_post_meta($post->ID,price, true))
        echo get_post_meta($post->ID, price, true);  
		echo "<p><a href='".get_permalink()."'>VIEW THIS FLOOR PLAN</a></p>";
		echo "<div id='planbottom'></div>";
		echo "</div>";
	}
}

?>

				</div>
		
	
		
		
	
<div id="line"><img src="/wp-content/themes/sagethemev2/images/abovefooterline.png"><div style="margin-top:18px;"></div>	
	<!-- close content -->
	
		</div>
	
</div>
<!-- close midwrap -->	
<div id="bottomcontent"></div>
</div>



<?php get_footer(); ?>







