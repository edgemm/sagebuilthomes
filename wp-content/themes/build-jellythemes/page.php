<?php get_header(); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<section class="blog single">
		    <div class="container">
		        <article <?php post_class(); ?>>
		        	<?php if (has_post_thumbnail()): ?>
			            <div class="row">
			                <div class="col-sm-10 col-sm-offset-1 post-image">
			                    <?php the_post_thumbnail(); ?>
			                </div>
			            </div>
		            <?php endif ?>
		            <div class="row voffset20">
		                <div class="col-sm-10 col-sm-offset-1 ">
		                    <h2 class="title fz34"><?php the_title(); ?></h2>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-sm-10 col-sm-offset-1 post-content">
		                    <div class="text">
		                        <?php the_content(); ?>
		                        <?php wp_link_pages(); ?>
		                    </div>
		                    <div class="post-meta">
		                        <div class="row">
		                            <div class="col-sm-12">
		                                <div class="post-meta">
		                                	<h6>
				                            	<?php esc_html_e("by", 'build-jellythemes'); ?> <?php the_author_posts_link(); ?> /
				                            	<?php comments_popup_link(); ?>
				                            </h6>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </article>
		    </div>
		</section>
	<?php endwhile; ?>
	<?php endif; ?>
	<?php comments_template(); ?>
<?php get_footer(); ?>