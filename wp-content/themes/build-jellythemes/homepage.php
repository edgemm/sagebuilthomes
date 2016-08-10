<?php /* Template Name: Page Photo Slider */ ?>
<?php get_header(); ?>
    <?php if (function_exists('rwmb_meta')): ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <!-- SLIDER -->
            <?php $fixed = get_post_meta( $post->ID, '_build_jellythemes_slider_fixed', true ); ?>
            <section id="home-slider" <?php echo ($fixed ? 'class="fixed-height"' : ''); ?>>
                <?php $images = rwmb_meta('_build_jellythemes_slider_images', 'type=image', $post->ID ); ?>
                <div id="owl-main" class="owl-carousel">
                    <?php foreach ($images as $image) : ?>
                        <div class="item" style="background-image:url(<?php echo esc_url($image['full_url']); ?>);">
                            <div class="overlay"></div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="slide-content">
                    <?php $logos = rwmb_meta('_build_jellythemes_slider_logo', 'type=image', $post->ID ); ?>
                    <?php foreach ($logos as $logo) : ?>
                        <img src="<?php echo esc_url($logo['full_url']); ?>" class="slide-logo" alt="<?php echo get_post_meta( $post->ID, '_build_jellythemes_slider_content', true ); ?>"/>
                    <?php endforeach; ?>
                    <h3 class="slide-title"><?php echo get_post_meta( $post->ID, '_build_jellythemes_slider_content', true ); ?></h3>
                    <div id="owl-text" class="owl-carousel">
                        <?php $texts =  get_post_meta( $post->ID, '_build_jellythemes_slider_text', true ); ?>
                        <?php foreach ($texts as $i => $text) : ?>
                            <div class="item">
                                <div class="container">
                                    <div class="col-sm-12">
                                        <h2><?php echo $text ?></h2>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <a href="<?php echo esc_url(get_post_meta( $post->ID, '_build_jellythemes_slider_button_link_1', true )); ?>" class="button fill"><?php echo get_post_meta( $post->ID, '_build_jellythemes_slider_button_1', true ); ?></a>
                    <a href="<?php echo esc_url(get_post_meta( $post->ID, '_build_jellythemes_slider_button_link_2', true )); ?>" class="button"><?php echo get_post_meta( $post->ID, '_build_jellythemes_slider_button_2', true ); ?></a>
                </div>
                <div class="scroll"><span></span></div>
            </section>
            <!-- END SLIDER -->
        <?php endwhile; ?>
        <?php $back = $post //backup post data?>
        <?php $child_sections = new WP_Query(array('post_type' => 'page', 'post_parent' => $post->ID, 'orderby' => 'menu_order', 'order' =>'ASC', 'posts_per_page' => -1)); ?>
        <?php while ($child_sections->have_posts() ) : $child_sections->the_post(); ?>
            <?php $bg = rwmb_meta( '_build_jellythemes_section_bg', 'type=image', get_the_ID() );  foreach ($bg as $bg_image) : $bg_url = $bg_image['full_url']; endforeach; ?>
                <?php $pattern = get_post_meta( $post->ID, '_build_jellythemes_pattern', true ); ?>
                <section id="<?php echo esc_attr($post->post_name); ?>" class="section <?php echo get_post_meta( $post->ID, '_build_jellythemes_section_width', true ); ?> <?php echo ($pattern ? 'pattern' : ''); ?>" style="background-color:<?php echo get_post_meta( $post->ID, '_build_jellythemes_bg_color', true ); ?>; <?php echo (!empty($bg_url) ? 'background-image: url(' . $bg_url . ')' : ''); ?>">
                    <div class="container">
                        <?php the_content(); ?> 
                    </div>
                </section>
            <?php $bg_url=''; ?>
        <?php endwhile; ?>
        <?php $post = $back //restore post data ?>
    <?php endif ?>    
<?php get_footer(); ?>