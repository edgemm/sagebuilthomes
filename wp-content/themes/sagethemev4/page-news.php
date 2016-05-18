<?php
/**
 * Template Name: News Template
*/
?>

<?php get_header(); ?>
<?php the_post(); ?>






<div id="midwrap">




	<div id="topcontent"></div>

	
	
	
	<div id="content">
		
		<div id="leftnav">
		
		<?php get_sidebar(); ?>
		
		<!--close leftnav-->
		</div>
		
		
				
				<div id="contentright">
				
				<h1 id="title">News and Events</h1>
				
				<?php // Outputs events posts.
$wpQuery = new WP_Query('category_name=news&orderby=date&order=DESC&showposts=100');			
if ($wpQuery->have_posts()) {
	while ($wpQuery->have_posts()) {
		$wpQuery->the_post();
		echo "<div class='events-post'>";
		echo "<h1><a style='color:#cb291d;text-decoration:none;font-size:20px;font-family:Quattrocento, serif !important;font-weight:bold;' href='".get_permalink()."'>".get_the_title()."</a></h1>";
		echo "<p style='font-weight:bold; font-size:15px;'>Posted on: ".get_the_date();"</p>";
		echo "<div class='event-thumb'>".get_the_post_thumbnail($id, 'thumbnail')."</div>";
		echo "<p class='news-excerpt'> ".get_the_excerpt()."</p>";  
		echo "</div>";
		
	}
}
else {
	echo '<div style="height: 400px;">';
    echo '<p>THERE ARE CURRENTLY NO NEWS AND EVENTS.</br> PLEASE CHECK BACK LATER.</br> THANK YOU.</p>';
    echo '</div>';
  }
?>





				
				



<div class="line"></div>


  
  
  
  
    
  
  
  
  
  







				</div>
		
	
		
		
	
<div id="line"><img src="/wp-content/themes/sagethemev2/images/abovefooterline.png"><div style="margin-top:18px;"></div>	
	
	<!-- close content -->
	</div>
	
</div>
<!-- close midwrap -->	

<div id="bottomcontent"></div>

</div>



<?php get_footer(); ?>







