<div id="footer-wide">
		<div id="footer">
			
			
				
				
				
			<div id="home-footer">
			<h3><a href="/index.php">Home</a></h3>
			
			</div>	
			
			<div id="avail-footer">
			<h3><a href="/homes/">Available Homes</a></h3>
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

<ul id="neighborhoods-footer">
<?php wp_list_categories( $args ); ?>
</ul>
			
			</div>
			
			<div id="photo-footer">
			<h3><a href="/exterior-photos/">Photo Gallery</a></h3>
			<ul id="photo">
			<li><a style="color:gray;" href="/exterior-photos/">Exterior Photos</a></li>
			<li><a style="color:gray;" href="/interior-photos/">Interior Photos</a></li>
			</ul>
			</div>
			
			<div id="care-footer">
			<h3><a href="/coming-soon/">Coming Soon</a></h3>
			
			</div>
			
			<div id="about-footer">
			<h3><a href="/care-warranty/">Care &amp; Warranty</a></h3>
			
			</div>
			
			<div id="news-footer">
			<h3><a href="/about-us/">About Us</a></h3>
			
			</div>
			
			<div id="info-footer">
			
				
				<p style="color:gray;margin-bottom:10px;"><a target="_blank" href="http://www.facebook.com/pages/Sage-Built-Homes/483004295049158"><img src="/wp-content/themes/sagethemev2/images/fb.png" width="16" height="16" alt="sage on facebook"/> Find us on Facebook</a></p>
				<p style="color:gray;margin-bottom:10px;">&#169; 2016 Sage Built Homes</p>
				<p style="color:gray;margin-bottom:10px;">1815 NW 169th Place Suite 1040</p>
				<p style="color:gray;margin-bottom:10px;">Beaverton, OR 97006</p>
				<p style="color:gray;margin-bottom:10px;">503-533-5167</p>
				<p style="color:gray;">Website by <a target="_blank" href="http://art4orm.com">Art4orm Inc.</a></p>
			
			
			</div>
			
			
						
			
			
			
			
			
			
			
			
			
			
		
		
		
		<div style="clear:both;"></div>
		
		<!-- close footer-->		
		</div>
		<!-- close footer-wide -->
		</div>

<!-- close wrapper-->		
</div>		
		
<?php wp_footer(); ?>
</body>
</html>