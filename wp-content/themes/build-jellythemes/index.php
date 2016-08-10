<?php get_header(); ?>
<?php $jellythemes = build_jellythemes_theme_options(); ?>
<div class="page-header" style="background-image:url(<?php echo esc_url($jellythemes['blog_header']['url']); ?>);">
    <div class="title light">
        <h1 class="light fz70"><?php bloginfo('name'); ?></h1>
        <h2 class="light fz24"><?php bloginfo('description'); ?></h2>
    </div>
</div>
<section class="blog">
    <div class="container">
    	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    		<article <?php post_class(); ?>>
	            <div class="row">
	                <div class="col-sm-1 post-date">
	                        <div class="day"><?php echo get_the_date('d') ?></div>
	                        <div class="month"><?php echo get_the_date('M') ?></div>
	                        <div class="year"><?php echo get_the_date('Y') ?></div>
	                </div>
	                <div class="col-sm-4 post-image">
	                    <?php the_post_thumbnail(); ?>
	                </div>
	                <div class="<?php echo (has_post_thumbnail() ? 'col-sm-7' : 'col-sm-11') ?> post-content">
	                    <h2 class="title fz24"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	                    <div class="text">
	                        <?php the_excerpt(); ?>
	                    </div>
	                    <a href="<?php the_permalink(); ?>" class="button fill"><?php esc_html_e('Read more','build-jellythemes') ?></a>
	                </div>
	            </div>
	        </article>
    	<?php endwhile; ?>
    		<nav class="pagination">
                <?php posts_nav_link(); ?>
            </nav>
    	<?php else: ?>
    		<div class="row">
	    		<div class="col-md-12 jt_col column_container">
	               <p class="title fz20 voffset150"><?php esc_html_e('There are no results for your query', 'build-jellythemes'); ?></p>
	            </div>
            </div>
    	<?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>