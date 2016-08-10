<?php get_header(); ?>
<!-- BASIC SECTION -->
	<section class="section" id="basic">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="container">
        <div class="row">
            <div class="jt_col col-md-8 jt_col col-md-offset-2 text-center">
                <h2 class="title main"><?php the_title() ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="jt_col col-md-10 col-md-offset-1 text-center">
                <h2 class="title fz40"><?php esc_html_e('ABOUT PROJECT','build-jellythemes') ?></h2>
                <h3 class="title fz26"><?php echo wp_kses(get_post_meta( $post->ID, '_build_jellythemes_project_excerpt', true ), array()); ?></h3>
            </div>
        </div>
        <div class="row voffset40">
            <div class="jt_col col-md-10 col-md-offset-1 project-progress">
                <div class="col-sm-3">
                    <div class="icon">
                        <i class="icon fa fa-comments-o fa-fw"></i>
                        <?php esc_html_e('Discuss','build-jellythemes') ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="icon">
                        <i class="icon fa fa-pencil fa-fw"></i>
                        <?php esc_html_e('Design','build-jellythemes') ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="icon">
                        <i class="icon fa fa-check-square-o fa-fw"></i>
                        <?php esc_html_e('Testing','build-jellythemes') ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="icon">
                        <i class="icon fa fa-paper-plane-o fa-fw"></i>
                        <?php esc_html_e('Deliver','build-jellythemes') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="generic-carousel project-carousel" data-dots="false">
        <?php $video = get_post_meta( $post->ID, '_build_jellythemes_project_video', true ); ?>
        <?php if (!empty($video)) : ?><?php echo wp_oembed_get($video, array('width' => 1180)) ?><?php endif; ?>
		<?php $images = rwmb_meta( '_build_jellythemes_build_jellythemes_project_images', 'type=plupload_image', get_the_ID() ); ?>
        <?php  foreach($images as $image) : ?>
        	<?php echo  wp_get_attachment_image( $image['ID'], 'build_jellythemes_project_image', false, array('class' => 'img-responsive')); ?>
        <?php endforeach; ?>
    </div>

    <div class="container bigger">
        <div class="row">
            <div class="col-md-5 project-data">
                <h3 class="title"><?php esc_html_e('Project details','build-jellythemes') ?></h3>
                <ul>
                    <li class="clearfix"><h3 class="title"><?php esc_html_e('Client','build-jellythemes') ?></h3> <h3 class="data"><?php echo esc_html(get_post_meta( $post->ID, '_build_jellythemes_project_client', true )); ?></h3></li>
                    <li class="clearfix"><h3 class="title"><?php esc_html_e('Date','build-jellythemes') ?></h3> <h3 class="data"><?php the_time(get_option( 'date_format' )); ?></h3></li>
                    <li class="clearfix"><h3 class="title"><?php esc_html_e('Online','build-jellythemes') ?></h3> <h3 class="data"><a href="<?php echo esc_url(get_post_meta( $post->ID, '_build_jellythemes_project_url', true )); ?>"><?php echo esc_html(get_post_meta( $post->ID, '_build_jellythemes_project_url', true )); ?></a></h3></li>
                </ul>
                <a href="<?php echo esc_url(get_post_meta( $post->ID, '_build_jellythemes_project_url', true )); ?>" class="button fill"><?php esc_html_e('Go Live','build-jellythemes') ?></a>
            </div>
            <div class="col-md-5 col-md-offset-2 project-text">
				<?php echo apply_filters('the_content', get_post_meta( $post->ID, '_build_jellythemes_project_description', true )); ?>
            </div>
        </div>
       
    </div>
<?php endwhile; ?>
	<?php $projects = new WP_Query(array(
		'posts_per_page' => 3,
		'post_type' => array('works'),
		'post__not_in' => array($post->ID)
	)); ?>
	<?php if ($projects->have_posts() ) : ?>
		<div class="container">
	        <div class="row">
	            <div class="project-related">
	            	<div class="row">
	                    <div class="jt_col col-md-10 col-md-offset-1 text-center">
	                        <h2 class="title fz30"><?php esc_html_e('RELATED PROJECTS','build-jellythemes') ?></h2>
	                    </div>
	                </div>
	                <div class="row">
					<?php while ($projects->have_posts() ) : $projects->the_post(); ?>
	                    <div class="col-md-4">
	                        <a href="<?php the_permalink() ?>">
	                            <?php the_post_thumbnail('project-thumb'); ?>
	                            <h3><?php the_title() ?></h3>
	                            <h3><?php the_time('Y') ?></h3>
	                        </a>
	                    </div>
					<?php endwhile; ?>
					</div>
	            </div>
	        </div>
	    </div>
	<?php endif; ?>
</section>
<!-- END BASIC SECTION -->
<?php endif; ?>

<?php get_footer(); ?>