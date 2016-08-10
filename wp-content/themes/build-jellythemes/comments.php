<?php 
if ( post_password_required() ) {
	return;
}
?>
<section class="comments-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <?php comment_form(); ?>
            </div>
        </div>
        <?php if ( have_comments() ) : ?>
	        <div class="row">
	            <div class="col-sm-10 col-sm-offset-1">
	                <div id="comments">
	                    <ul class="commentlist">
							<?php wp_list_comments(array("callback"=> "build_jellythemes_comments_format")); ?>
						</ul>
	                </div>
	            </div>
	        </div>
			<div class="row">
				<div class="col-sm-12">
					<nav class="pagination">
						<?php paginate_comments_links(); ?>
					</nav>
				</div>
			</div>
		<?php endif; ?>
    </div>
</section>