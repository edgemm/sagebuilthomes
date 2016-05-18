<?php /* Template Name: Listing Page */ ?>
<?php get_header(); ?>
<?php the_post(); ?>






<div id="midwrap">




	<div id="topcontent"></div>

	
	
	
	<div id="content">
		
		<div id="leftnav">
		
		<?php get_sidebar(); ?>
		
		
		<?php 
//list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

$taxonomy     = 'homes_community';
$orderby      = 'name'; 
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no
$title        = '';

$args = array(
  'taxonomy'     => $taxonomy,
  'orderby'      => $orderby,
  'show_count'   => $show_count,
  'pad_counts'   => $pad_counts,
  'hierarchical' => $hierarchical,
  'title_li'     => $title
);
?>

<ul>
<?php wp_list_categories( $args ); ?>
</ul>
		
		
		
		</div>
		
		
				
				<div id="contentright">
				
				<h1 id="title"><?php the_title(); ?></h1>
				
				<?php the_content(); ?>
				<div style="height:15px;"></div>

<?php
  query_posts( array( 'post_type' => 'homes') );
  if ( have_posts() ) : while ( have_posts() ) : the_post();
?>

  <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
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
  
  
  
  
    
  
  
  
  
  

<?php endwhile; ?>

<?php else : ?>

<div style="height:200px;">
<p>No Sage Built Homes available at this time in this area. Please check back Later.</p> 
<div style="height: 10px;"></div>
<p>Thank You.</p>
</div>
<?php endif; wp_reset_query(); ?>





				</div>
		
	
		
		
	
<div id="line"><img src="/wp-content/themes/sagethemev2/images/abovefooterline.png"><div style="margin-top:18px;"></div>	
	<!-- close content -->
	
		</div>
	
</div>
<!-- close midwrap -->	
<div id="bottomcontent"></div>
</div>



<?php get_footer(); ?>







