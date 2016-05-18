<?php /* Template Name: Home Page */ ?>
<?php get_header(); ?>
<?php the_post(); ?>






<div id="midwrap">


	

	<div id="content">
	
	
		<div id="frontpageshowcase">
			
				
			<div style="height:526px;padding-top:10px;">	
			<?php if(1 == 2):?>
				<div id="slideshow">
    			<img src="<?php bloginfo('template_url'); ?>/images/sage_family_room_slider.png" alt="Sage family room" />
    			<img src="<?php bloginfo('template_url'); ?>/images/living_room1.png" alt="Sage Family Room" />
    			<img src="<?php bloginfo('template_url'); ?>/images/kitchen.png" alt="Sage Kitchen" />
    			<img src="<?php bloginfo('template_url'); ?>/images/sage_kitchen_2.png" alt="Sage Kitchen" />
				<img src="<?php bloginfo('template_url'); ?>/images/sage_great_room.png" alt="Sage Great Room" />
				<img src="<?php bloginfo('template_url'); ?>/images/sage_master_tub.png" alt="Sage Master Tub" />
				</div>
				
			<?php else:?>
				<div id="slideshow">
				<img src="<?php bloginfo('template_url'); ?>/images/sage_family_room_slider.png" alt="Sage family room" />
    			<img src="<?php bloginfo('template_url'); ?>/images/living_room1.png" alt="Sage Family Room" />
    			<img src="<?php bloginfo('template_url'); ?>/images/kitchen.png" alt="Sage Kitchen" />
    			<img src="<?php bloginfo('template_url'); ?>/images/sage_kitchen_2.png" alt="Sage Kitchen" />
				<img src="<?php bloginfo('template_url'); ?>/images/sage_great_room.png" alt="Sage Great Room" />
				<img src="<?php bloginfo('template_url'); ?>/images/sage_master_tub.png" alt="Sage Master Tub" />
				</div>
			<?endif;?>

				<div id="home-middle">
				
					<div id="home-middle-top">
					<h2 style="color:#581303; font-style: italic; font-size: 24px;font-weight: bold; text-align: center;margin-bottom: 10px;">Sage Built Homes is a local Pacific Northwest New Home Builder </br>that focuses on quality building practices.</h2>
					<p style="text-align: center;color:#581303;font-size: 20px;">We are currently building new homes in NW Portland, Tigard, Beaverton and SW Portland.</p>
					</div>
					
					<div id="home-middle-bottom">
					<p style="color:red;font-style: italic;">Neighborhoods:<span style="color: white;"> View all of our current and upcoming Sage Built Homes communities.</span> <a href="https://www.google.com/maps/d/embed?mid=zwKDD9N0M02Y.kwrdICNhFaQw" target="_blank">Click Here</a></p>
					</div>
					
				
				</div>
				
		
			
			
				<div id="frontleft">
				
					<div id="frontlefttitle">Search All Listings</div>
					
					<div id="frontleftcontent">
					
					<div style="float: left; margin-right: 20px; margin-left: -10px;">
					<!--<p style="color:black;font-style:italic;font-size:14px;padding-bottom:3px;">Beaverton</p>-->
					<!--<p style="color:black;font-style:italic;font-size:14px;padding-bottom:3px;">Vancouver</p>-->
					<!-- <p style="color:black;font-style:italic;font-size:14px;padding-bottom:3px;">NW Portland</p>-->
					<p style="color:black;font-style:italic;font-size:14px;padding-bottom:3px;">Aloha</p>
					<p style="color:black;font-style:italic;font-size:14px;padding-bottom:3px;">Beaverton</p>
					<?php if(1==2):?>
					<p style="color:black;font-style:italic;font-size:14px;padding-bottom:3px;">Oregon City</p><?php endif;?>
					<p style="color:black;font-style:italic;font-size:14px;padding-bottom:3px;">Tigard</p>
					</div>
					<div style="float: left;">
					<p style="color:black;font-style:italic;font-size:14px;padding-bottom:3px;">SW Portland</p>
					<p style="color:black;font-style:italic;font-size:14px;padding-bottom:3px;">Hillsboro</p>
					</div>
					<div style="height:70px;"></div>
					<a style="color:#570d06;font-style:italic;padding-left:30px;text-decoration:underline;" href="/homes/">Search Now</a>
					
					</div>
				
				</div>
			
				<div id="frontright">
					
					
					<div id="frontrighttitle">Featured Listings</div>
					
					<div id="frontrightcontent">
				<a href="/homes/beaverton/1711-sw-harper-ct-beaverton-97003/">
					


					<?php if(1 == 2):?>
					
					<p style="color:black;font-style:italic;padding-bottom:3px;">$259,950</p>
					<p style="color:black;font-size:14px;padding-bottom:3px;"><a href="/homes/beaverton/sw-165th-ave-beaverton-97007/">4 bedrooms in Beaverton</a></p>
					<div style="height:10px;"></div>

					<p style="color:black;font-style:italic;padding-bottom:3px;">$579,950</p>
					<p style="color:black;font-size:14px;padding-bottom:3px;"><a href="/homes/beaverton/8735-sw-155th-lot-1/">3385 Square Feet. 5 Bedrooms.<br/> Available now in Beaverton.</a></p>

					<div class="listDetails" <p="" style="color:black;font-style:italic;padding-bottom:3px;">$499,950<p></p>
					<p style="color:black;font-size:14px;padding-bottom:3px;">2863 Square Feet. 4 Bedrooms.<br> Available now in Beaverton.</p>

					<?php endif; ?>






					<div class="listDetails" <p="" style="color:black;font-style:italic;padding-bottom:3px;">$344,950<p></p>
					<p style="color:black;font-size:14px;padding-bottom:3px;">1,866 Square Feet<br> 3 Bedrooms<br> 2.5 Bath</p>

					</div>
					
					</a>
					</div>
				
				</div>

				
					
					<div class='featured1'>
						<div id='skew'>
						<img src='http://sagebuilthomesllc.com/wp-content/uploads/2014/07/front-web-image1.jpg'>
						</div>
					</div>
					<div class='overlay1'>
					</div>
		
				
			</div>
		
		</div>
	

	<!-- close content -->	
	</div>

<!-- close midwrap -->	
</div>

<?php get_footer(); ?>