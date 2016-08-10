<?php /* Template Name: Visual Composer Page */ ?>
<?php get_header(); ?>
    <?php $images = rwmb_meta('_build_jellythemes_slider_images', 'type=image', $post->ID ); ?>
    <?php foreach ($images as $image) : ?>
        <div class="page-header single" style="background-image:url(<?php echo esc_url($image['full_url']); ?>);">
            <div class="title light">
                <h1 class="light fz70"><?php the_title() ?></h1>
                <h2 class="light fz24"><?php echo get_post_meta( $post->ID, '_build_jellythemes_slider_content', true ); ?></h2>
            </div>
        </div>
        <?php break; ?>
    <?php endforeach; ?>
    <?php if (function_exists('rwmb_meta')): ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php $bg = rwmb_meta( '_build_jellythemes_section_bg', 'type=image', get_the_ID() );  foreach ($bg as $bg_image) : $bg_url = $bg_image['full_url']; endforeach; ?>
                <section id="<?php echo esc_attr($post->post_name); ?>" class="section <?php echo get_post_meta( $post->ID, '_build_jellythemes_section_width', true ); ?>" style="background-color:<?php echo get_post_meta( $post->ID, '_build_jellythemes_bg_color', true ); ?>; <?php echo (!empty($bg_url) ? 'background-image: url(' . $bg_url . ')' : ''); ?>">
                    <div class="container">
                        <?php the_content(); ?> 
                    </div>
                </section>
            <?php $bg_url=''; ?>
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