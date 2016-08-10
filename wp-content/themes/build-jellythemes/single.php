<?php get_header(); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<section class="blog single">
		    <span class="prev-post"><?php previous_post_link('%link',esc_html__('Prev','build-jellythemes')); ?></span>
		    <span class="next-post"><?php next_post_link('%link',esc_html__('Next','build-jellythemes')) ?></span>
		    <div class="container">
		        <article <?php post_class(); ?>>
		        	<?php if (has_post_thumbnail()): ?>
			            <div class="row">
			                <div class="col-sm-10 col-sm-offset-1 post-image">
			                    <?php the_post_thumbnail(); ?>
			                </div>
			            </div>
		            <?php endif ?>
		            <div class="row">
		                <div class="col-sm-1 col-sm-offset-1 post-date">
							<div class="day"><?php echo get_the_date('d') ?></div>
							<div class="month"><?php echo get_the_date('M') ?></div>
							<div class="year"><?php echo get_the_date('Y') ?></div>
		                </div>
		                <div class="col-sm-9">
		                    <h2 class="title fz24"><?php the_title(); ?></h2>
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
				                            	<?php esc_html_e("in", 'build-jellythemes'); ?> <?php the_category(', '); ?> / <?php the_tags(); ?> /
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