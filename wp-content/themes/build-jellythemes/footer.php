<!-- FOOTER -->
<?php $jellythemes = build_jellythemes_theme_options(); ?>
<?php $build_jellythemes_lposts = !empty($jellythemes['latest_posts']); ?>
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="<?php echo $build_jellythemes_lposts ? 'col-md-6 col-lg-3' : 'col-md-4'; ?>">
                <img src="<?php echo esc_url($jellythemes['footer_logo']['url']); ?>" alt="<?php echo strip_tags($jellythemes['blogname']); ?>" class="img-responsive">
                <div class="voffset30"></div>
                <p class="block-title"><?php echo esc_html($jellythemes['about_title']) ?></p>
                <p class="subtitle light"><?php echo $jellythemes['about']; ?></p>
            </div>
            <div class="<?php echo $build_jellythemes_lposts ? 'col-md-6 col-lg-3' : 'col-md-4'; ?>">
                <p class="block-title"><?php esc_html_e('contact info', 'build-jellythemes') ?></p>
                <ul class="contact-info">
                    <li class="subtitle light"><i class="icon fa fa-building-o"></i><?php echo $jellythemes['location']; ?></li>
                    <li class="subtitle light"><i class="icon fa fa-phone"></i><?php echo $jellythemes['phone']; ?></li>
                    <li class="subtitle light"><i class="icon fa fa-phone"></i><?php echo $jellythemes['phone2']; ?></li>
                    <li class="subtitle light"><i class="icon fa fa-envelope-o"></i><?php echo $jellythemes['email']; ?></li>
                    <li class="subtitle light"><i class="icon fa fa-clock-o"></i><?php echo $jellythemes['schedule']; ?></li>
                </ul>
            </div>
            <div class="<?php echo $build_jellythemes_lposts ? 'col-md-6 col-lg-3' : 'col-md-4'; ?>">
                <p class="block-title"><?php esc_html_e('we are social on', 'build-jellythemes') ?></p>
                <div class="row">
                    <?php if (!empty($jellythemes['facebook'])): ?>
                    <div class="col-xs-4">
                        <a href="<?php echo esc_url($jellythemes['facebook']); ?>" class="social-icon"><i class="icon fa fa-facebook"></i></a>
                        <span class="social-count"><?php echo $jellythemes['facebook_count']; ?></span>
                    </div>
                    <?php endif; ?>
                    <?php if (!empty($jellythemes['twitter'])): ?>
                    <div class="col-xs-4">
                        <a href="<?php echo esc_url($jellythemes['twitter']); ?>" class="social-icon"><i class="icon fa fa-twitter"></i></a>
                        <span class="social-count"><?php echo $jellythemes['twitter_count']; ?></span>
                    </div>
                    <?php endif; ?>
                    <?php if (!empty($jellythemes['instagram'])): ?>
                    <div class="col-xs-4">
                        <a href="<?php echo esc_url($jellythemes['instagram']); ?>" class="social-icon"><i class="icon fa fa-instagram"></i></a>
                        <span class="social-count"><?php echo $jellythemes['instagram_count']; ?></span>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php $latest = new WP_Query(array('posts_per_page' => 3)); ?>
            <?php if ($latest->have_posts() && $build_jellythemes_lposts): ?>
                <div class="col-md-6 col-lg-3">
                    <div class="footer-posts">
                        <p class="block-title"><?php esc_html_e('latest posts', 'build-jellythemes') ?></p>
                        <?php while ($latest->have_posts()) : $latest->the_post(); ?>
                            <div class="footer-post">
                                <?php the_post_thumbnail('build_jellythemes_testimonial_avatar'); ?>
                                <div class="post-data">
                                    <p class="subtitle fz12"><?php the_time(get_option('date_format')) ?></p>
                                    <p class="subtitle light"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                                    <p class="subtitle fz12"><?php comments_popup_link(); ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif ?>
            
        </div>
    </div>
<a href="#top" class="scrolltop"><i class="fa fa-angle-up"></i></a>
</footer>
<!-- END FOOTER -->

<!-- SCRIPTS -->
<?php wp_footer(); ?>

</body>
</html>