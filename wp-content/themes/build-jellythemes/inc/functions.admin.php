<?php
	// Setup theme
	add_action('after_setup_theme', 'build_jellythemes_setup');
	function build_jellythemes_setup(){
		// Load text domain
	    load_theme_textdomain('build-jellythemes', get_template_directory() . '/languages');

	    // Theme supports
	    add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	    add_theme_support( 'automatic-feed-links' );
	    add_theme_support( "post-thumbnails" );
	    add_theme_support( 'title-tag' );
	}


	// menu's definition
	if ( function_exists( 'register_nav_menus' ) ) {
		register_nav_menus(
			array(
			  'main' =>  esc_html__('Main menu', 'build-jellythemes')
			)
		);
	}
	// Add custom image sizes
	if ( function_exists( 'add_image_size' ) ) {
	    add_image_size( 'build_jellythemes_project_image', 1173, 1000, false );
	    add_image_size( 'build_jellythemes_project_thumb', 853, 568, true );
	    add_image_size( 'build_jellythemes_blog_thumb', 740, 420, true );
	    add_image_size( 'build_jellythemes_testimonial_avatar', 200, 200, true );
	}

	// Filter to show custom tax clasess in post_class() function output
	add_filter( 'post_class', 'build_jellythemes_custom_taxonomy_post_class', 10, 3 );
	if( !function_exists( 'build_jellythemes_custom_taxonomy_post_class' ) ) {
	    function build_jellythemes_custom_taxonomy_post_class( $classes, $class, $ID ) {
	        $terms = get_the_terms( (int) $ID, 'type' );
	        if(!empty($terms)) {
	            foreach( (array) $terms as $order => $term ) {
	         		if (is_object($term)) {
	         			if(!in_array($term->slug, $classes ) ) {
		                    $classes[] = $term->slug;
		                }
	         		} 
	            }
	        }
	    return $classes;
	    }
	}

	//Registering plugin to require activation
	add_action( 'tgmpa_register', 'build_jellythemes_register_js_composer_plugins' );
	function build_jellythemes_register_js_composer_plugins() {
	    $plugins = array(
	        array(
	            'name'			=> 'WPBakery Visual Composer', // The plugin name
	            'slug'			=> 'js_composer', 
	            'source'			=> get_stylesheet_directory() . '/plugins/js_composer.zip', 
	            'required'			=> true, 
	            'version'			=> '4.3.4', 
	            'force_activation'		=> false, 
	            'force_deactivation'	=> false, 
	            'external_url'		=> '', 
	        ),
	        array(
	            'name'			=> 'BUILD Theme Functionality', 
	            'slug'			=> 'build-jellythemes-plugin', 
	            'source'			=> get_stylesheet_directory() . '/plugins/build-jellythemes-plugin.zip', 
	            'required'			=> true, 
	            'version'			=> '1.1.0', 
	            'force_activation'		=> false, 
	            'force_deactivation'	=> false, 
	            'external_url'		=> '',
	        ),
	        array(
				'name' 	   => 'Redux Framework',
				'slug' 	   => 'redux-framework',
				'required' => true,
			),
	    );

	    $config = array(
	        'domain'		=> 'build-jellythemes',
	        'default_path'		=> '', 
	        'menu'			=> 'install-required-plugins', 
	        'has_notices'		=> true, 
	        'is_automatic'		=> true, 
	        'message'		=> '', 
	        'strings'		=> array(
	            'page_title'			=> esc_html__( 'Install Required Plugins', 'build-jellythemes' ),
	            'menu_title'			=> esc_html__( 'Install Plugins', 'build-jellythemes' ),
	            'installing'			=> esc_html__( 'Installing Plugin: %s', 'build-jellythemes' ), 
	            'oops'				=> esc_html__( 'Something went wrong with the plugin API.', 'build-jellythemes' ),
	            'notice_can_install_required'	=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'build-jellythemes' ),
	            'notice_can_install_recommended'	=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'build-jellythemes' ),
	            'notice_cannot_install'		=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'build-jellythemes' ), 
	            'notice_can_activate_required'	=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'build-jellythemes' ), 
	            'notice_can_activate_recommended'	=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'build-jellythemes' ), 
	            'notice_cannot_activate'		=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'build-jellythemes' ), 
	            'notice_ask_to_update'		=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'build-jellythemes' ), // %1$s = plugin name(s)
	            'notice_cannot_update'		=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'build-jellythemes' ), // %1$s = plugin name(s)
	            'install_link'			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'build-jellythemes' ),
	            'activate_link'			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'build-jellythemes' ),
	            'return'				=> esc_html__( 'Return to Required Plugins Installer', 'build-jellythemes' ),
	            'plugin_activated'			=> esc_html__( 'Plugin activated successfully.', 'build-jellythemes' ),
	            'complete'				=> esc_html__( 'All plugins installed and activated successfully. %s', 'build-jellythemes' ), // %1$s = dashboard link
	            'nag_type'				=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
	        )
	    );
	    tgmpa( $plugins, $config );
	}

	/**
	 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
	 */
	if(function_exists('vc_set_as_theme')) vc_set_as_theme();


	/**
	* Return jellythemes options variable
	*/
	function build_jellythemes_theme_options() {
		global $jellythemes;
		if (empty($jellythemes)) {
			$jellythemes['logo'] = array('url'=> get_stylesheet_directory_uri() . '/images/logo.png');
			$jellythemes['blogname'] = 'BUILD';
			$jellythemes['color'] = 'build';
			$jellythemes['layout'] = 'lighter';
			$jellythemes['blog_header'] = array('url'=> 'http://placehold.it/1500x400');
			$jellythemes['contact_email'] = get_option('admin_email');
			
			$jellythemes['footer_logo'] = array('url'=> get_stylesheet_directory_uri() . '/images/logo-footer.png');
			$jellythemes['location'] = '27 Street, Road North, New York';
			$jellythemes['about_title'] = 'About build';
			$jellythemes['about'] = 'We suport 24/7, sed diam nonummy nibh euismod normani gov. Lorem ipsum dolor,sed diam nonumy eirmod tempor invid unt utat';
			$jellythemes['phone'] = '+7 (201) 9-556-700';
			$jellythemes['phone2'] = '+7 (201) 9-556-700';
			$jellythemes['email'] = 'support@build.com';
			$jellythemes['schedule'] = '8AM - 5 PM 7/365';
		}
		return $jellythemes;
	}

	/**
	* REMOVE FRAMEBORDER FOR HTML VALIDATOR
	*/
	function build_jellythemes_oembed( $return, $data, $url ) {
	 	$return = str_replace('frameborder="0" allowfullscreen', 'style="border: none"', $return);
		return $return;
	}
	add_filter('oembed_dataparse', 'build_jellythemes_oembed', 90, 3 );

?>