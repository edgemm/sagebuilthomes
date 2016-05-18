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
				
				
<div class="listings">

<div class="listingimage"><img src="<?php echo get_post_meta($post->ID, 'wpcf-home-image', true); ?>"/>

<div class="noplan"><?php $floor_plan = get_post_meta($post->ID, 'wpcf-floor-plan', true);

  if ( $floor_plan ) {
    echo do_shortcode("[nggallery id='$floor_plan' template=two]");
   }
  else {
    echo 'No Floorplan Available';
  } ?></div>
  
  
  
<div class="noplan"><?php $photos = get_post_meta($post->ID, 'wpcf-photos', true);

  if ( $photos ) {
    echo do_shortcode("[nggallery id='$photos' template=one]");
   }
  else {
    echo 'No Photos Available';
  } ?></div>  
  
</div>

<div class="listinginfo"><span style="font-style: italic; font-weight: bold;">Price: </span><?php echo get_post_meta($post->ID, 'wpcf-price', true); ?>

<div style="height: 10px;"></div>

<span style="font-style: italic; color: #848d16; font-weight: bold;">Square Feet:</span> <span style="color: #848d16;"><?php echo get_post_meta($post->ID, 'wpcf-square-feet', true); ?></span>
</br>
<span style="font-style: italic; color: #848d16; font-weight: bold;">Bed:</span> <span style="color: #848d16;"><?php echo get_post_meta($post->ID, 'wpcf-bedrooms', true); ?></span>
</br>
<span style="font-style: italic; color: #848d16; font-weight: bold;">Bath:</span> <span style="color: #848d16;"><?php echo get_post_meta($post->ID, 'wpcf-bathrooms', true); ?></span>
</br>
<div style="height: 10px;"></div>

<span style="font-style: italic; font-weight: bold;">Neighborhood:</span> <?php echo get_post_meta($post->ID, 'wpcf-neighborhood', true); ?>
</br>
<span style="font-style: italic; font-weight: bold;">Status:</span> <?php echo get_post_meta($post->ID, 'wpcf-status', true); ?>
<div style="height: 10px;"></div>
<span style="font-style: italic;"><?php echo get_post_meta($post->ID, 'wpcf-features', true); ?></span>

<div style="height: 10px;"></div>
<a style="color: black;" href="<?php echo get_post_meta($post->ID, 'wpcf-tour', true); ?>" target="blank">Virtual Tour</a>
<div style="height: 10px;"></div>
<a style="color: black;" href="<?php echo get_post_meta($post->ID, 'wpcf-map', true); ?>" target="blank">Map It</a>

</div>

<div class="line"></div>

</div>
  
  
  
  
    
  
  
  
  
  

	

				</div>
		
	
		
		
	
<div id="line"><img src="/wp-content/themes/sagethemev2/images/abovefooterline.png"><div style="margin-top:18px;"></div>	
	<!-- close content -->
	
		</div>
	
</div>
<div id="bottomcontent"></div>

<!-- close midwrap -->	
</div>




<?php get_footer(); ?>







