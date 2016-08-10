<?php
    // Load the theme/plugin options
    if ( file_exists( get_template_directory() . '/inc/admin/options-init.php' ) ) {
        require_once get_template_directory() . '/inc/admin/options-init.php';
    }