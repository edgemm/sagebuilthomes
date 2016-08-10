<?php
    // Define content width
    if ( ! isset( $content_width ) ) $content_width = 1180;

    //Google fonts 
    function build_jellythemes_fonts_url() {
        $font_url = '';
        if ( 'off' !== _x( 'on', 'Google font: on or off', 'build-jellythemes' ) ) {
            $font_url = add_query_arg('family', urlencode('Roboto:400,100,300,500,700,900|Droid+Serif:400italic|Open+Sans:400,300,600' ), "//fonts.googleapis.com/css" );
        }
        return $font_url;
    }

	// Load scripts and styles files
    function build_jellythemes_scripts_and_styles() {
        $jellythemes = build_jellythemes_theme_options();
        if (!is_admin()) {
            wp_enqueue_style( 'build-jellythemes-fonts', build_jellythemes_fonts_url(), array(), '1.0.0' );
            wp_enqueue_script('html5shiv', get_template_directory_uri() . '/js/html5shiv.js', array(), '3.7.2');
            wp_enqueue_script('respond', get_template_directory_uri() . '/js/respond.js', array(), '1.4.2');
            wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
            wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

            $color = empty($jellythemes['color']) ? 'build' : $jellythemes['color'];
            $color = $color . ((empty($jellythemes['layout']) || $jellythemes['layout']=='lighter') ? '.css' : '-dark.css');
            wp_enqueue_style( 'build-jellytheme-main', get_template_directory_uri() . '/css/' . $color );
            wp_enqueue_style( 'build-jellythemes-style', get_stylesheet_uri() );


            wp_deregister_style('js_composer_front');
            wp_enqueue_script(
                'hoverdir',
                get_template_directory_uri() . '/js/jquery.hoverdir.js',
                false,false,true );
             wp_enqueue_script(
                'bootstrap',
                get_template_directory_uri() . '/js/bootstrap.min.js',
                array('jquery'),false,true );
              wp_enqueue_script(
                'imagesLoaded',
                get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'isotope',
                get_template_directory_uri() . '/js/isotope.pkgd.min.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'owl-carousel',
                get_template_directory_uri() . '/js/owl.carousel.min.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'gmaps',
                '//maps.googleapis.com/maps/api/js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'inview',
                get_template_directory_uri() . '/js/jquery.inview.min.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'mbytplayer',
                get_template_directory_uri() . '/js/jquery.mb.YTPlayer.min.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'validate',
                get_template_directory_uri() . '/js/jquery.validate.min.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'form',
                get_template_directory_uri() . '/js/jquery.form.min.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'build-jellythemes-default',
                get_template_directory_uri() . '/js/default.js',
                array('jquery'),false,true );
            
            $theme_opts = array( 'theme_path' => get_template_directory_uri(), 'color' => $jellythemes['color']);
            wp_localize_script( 'build-jellythemes-default', 'jellythemes', $theme_opts );
        }
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
    add_action('wp_enqueue_scripts', 'build_jellythemes_scripts_and_styles');

    // Define walker nav menu to display custom html output
    class build_jellythemes_walker_nav_menu extends Walker_Nav_Menu {

        function start_el( &$output, $item, $depth = 0, $args = array(), $curr = 0 ) {
            global $wp_query;
            $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

            $depth_classes = array(
                ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
                ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
                ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
                'menu-item-depth-' . $depth
            );
            $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
            $class_names = str_replace('current_page_item', 'current', $class_names);
            if (strpos($item->url, '#')) {
                $class_names = str_replace('current-menu-item', '', $class_names);
                $class_names = str_replace('current', '', $class_names);
            }
            $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="page-scroll ' . $depth_class_names . ' ' . $class_names . '">';

            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
            $item_output = '';
            if (is_object($args)) :
            $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
                $args->before,
                $attributes,
                $args->link_before,
                apply_filters( 'the_title', $item->title, $item->ID ),
                $args->link_after,
                $args->after
            );
            endif;
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, 0 );
        }
    }

    //Return array of section's IDs in Main menu
    function build_jellythemes_get_sections(){
        if(!has_nav_menu( 'main' )) {
            return;
        }
        if ( ( $locations = get_nav_menu_locations() ) && $locations['main']  ) {
            $menu = wp_get_nav_menu_object( $locations['main'] );
            $items  = wp_get_nav_menu_items($menu->term_id);
            $sections = array();
            foreach((array) $items as $menu_items){
                if ($menu_items->object == 'page-sections') {
                    $sections[] = $menu_items->object_id;
                }
            }
        }
        return $sections;
    }

    //Comment format and Walker
    function build_jellythemes_comments_format($comment, $args, $depth) {
            $id = $comment->comment_ID;
    ?>
            <li <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php echo $id ?>">

            <!--comment body-->
            <div class="row-fluid comment-body" id="div-comment-<?php echo esc_attr($id); ?>">
                <div class="span1 comment-author vcard">
                    <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, 43); ?>
                </div>

                <div class="span11">
                    <?php if ($comment->comment_approved == '0') : ?>
                    <span class="comment-awaiting-moderation"><?php echo esc_html__('Your comment is awaiting moderation.', 'build-jellythemes') ?></span>
                    <br/>
                    <?php endif; ?>


                    <?php printf(wp_kses(__('<cite class="fn">%s</cite> <span class="says">:</span>', 'build-jellythemes'), array('cite' => array('class' => array()), 'span' => array('class' => array()))), get_comment_author_link()); ?>
                    <div class="comment-meta commentmetadata">
                    <a href="<?php echo esc_url(htmlspecialchars(get_comment_link())); ?>">
                        <?php printf( esc_html__('%1$s at %2$s', 'build-jellythemes'), get_comment_date(),  get_comment_time()); ?>
                    </a>
                    <?php edit_comment_link(esc_html__('(Edit)', 'build-jellythemes'),'&nbsp;&nbsp;',''); ?>
                    </div>
                    <div class="pe-wp-default">
                        <?php comment_text(); ?>
                    </div>
                    <div class="clearfix">
                        <div class="reply pull-right">
                            <?php comment_reply_link(array_merge( $args, array('add_below' => "div-comment", 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                        </div>
                    </div>
                </div>
            </div>
    <?php
    }

    add_filter('comment_reply_link', 'build_jellythemes_replace_reply_link_class');
    function build_jellythemes_replace_reply_link_class($class){
        $class = str_replace("class='comment-reply-link", "class='comment-reply-link button fill", $class);
        return $class;
    }

    //Format title
    function build_jellythemes_wp_title( $title, $sep ) {
        $jellythemes = build_jellythemes_theme_options();

        // Add the site name.
        $title .= strip_tags($jellythemes['blogname']);

        return $title;
    }
    add_filter( 'wp_title', 'build_jellythemes_wp_title', 10, 2 );


    //Comments form structure
    add_filter( 'comment_form_default_fields', 'build_jellythemes_comment_form_fields' );
    function build_jellythemes_comment_form_fields( $fields ) {
        $commenter = wp_get_current_commenter();
        
        $req      = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
        if (!is_user_logged_in()) {
            $fields   =  array(
                'author' => '<div class="col-md-5"><p><input placeholder="' . esc_html__( 'Name', 'build-jellythemes' ) . ( $req ? ' *' : '' ) . '" class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
                'email'  => '<p><input placeholder="' . esc_html__( 'Email', 'build-jellythemes' ) . ( $req ? ' *' : '' ) . '" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" class="form-control"' . $aria_req . ' /></p>',
                'url'    => '<p><input class="form-control" id="url" placeholder="' . esc_html__( 'Website', 'build-jellythemes' ) . ( $req ? ' *' : '' ) . '" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p></div>'        
            );
        }
        
        return $fields;
    }
    add_filter( 'comment_form_defaults', 'build_jellythemes_comment_form' );
    function build_jellythemes_comment_form( $args ) {
        if (!is_user_logged_in()) {
            $args['comment_field'] = '<div class="row"><div class="col-md-7">
                    <textarea placeholder="' . esc_html__( 'Comment', 'build-jellythemes' ) . '" class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></div>';
        } else {
            $args['comment_field'] = '<div class="row"><div class="col-md-12">
                    <textarea placeholder="' . esc_html__( 'Comment', 'build-jellythemes' ) . '" class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></div></div>';
        }
        $args['class_submit'] = 'button fill'; // since WP 4.1
        $args['submit_button']= '<div class="col-sm-12 text-right"><input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" /></div>';
        $args['title_reply_before'] = '<h3 id="reply-title" class="title reply fz24 voffset40">';
        if (!is_user_logged_in()) {
            $args['submit_field'] = '%1$s %2$s</div>';
        } else {
            $args['submit_field'] = '%1$s %2$s';
        }
        return $args;
    }


    add_filter( 'body_class','build_jellythemes_body_classes' );
    function build_jellythemes_body_classes( $classes ) {
        global $post;
        $header_image = get_post_meta($post->ID, '_build_jellythemes_slider_images', true );
        $jellythemes = build_jellythemes_theme_options();
        $classes[] = $jellythemes['layout'];
        $classes[] = $jellythemes['color'];
        if ((is_single() || is_page()) && empty($header_image) && !is_page_template('homepage.php') && !is_page_template('homepage-video.php')) {
            $classes[] = 'overflowed';
        }     
        return $classes;
    }
?>
