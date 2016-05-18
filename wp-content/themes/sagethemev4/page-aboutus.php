<?php /* Template Name: About Us Page */ ?>
<?php get_header(); ?>
<?php the_post(); ?>






<div id="midwrap">




	<div id="topcontent"></div>

	
	
	
	<div id="content">
		
		<div id="leftnav">
		<div id="wufoo-z7p4m5">
Fill out my <a href="http://art4orm.wufoo.com/forms/z7p4m5">online form</a>.
</div>
<script type="text/javascript">var z7p4m5;(function(d, t) {
var s = d.createElement(t), options = {
'userName':'art4orm', 
'formHash':'z7p4m5', 
'autoResize':true,
'height':'438',
'width':'80%',
'async':true,
'header':'show', 
'ssl':true};
s.src = ('https:' == d.location.protocol ? 'https://' : 'http://') + 'wufoo.com/scripts/embed/form.js';
s.onload = s.onreadystatechange = function() {
var rs = this.readyState; if (rs) if (rs != 'complete') if (rs != 'loaded') return;
try { z7p4m5 = new WufooForm();z7p4m5.initialize(options);z7p4m5.display(); } catch (e) {}};
var scr = d.getElementsByTagName(t)[0], par = scr.parentNode; par.insertBefore(s, scr);
})(document, 'script');</script>
		</div>
		
		
				
				<div id="contentright">
				
				<h1 id="title"><?php the_title(); ?></h1>
				
				<?php the_content(); ?>
				<div style="height:200px;"></div>









				</div>
		
	
		
		
	
<div id="line"><img src="/wp-content/themes/sagethemev2/images/abovefooterline.png"><div style="margin-top:18px;"></div>	
	<!-- close content -->
	
		</div>
	
</div>
<!-- close midwrap -->	
<div id="bottomcontent"></div>
</div>



<?php get_footer(); ?>







