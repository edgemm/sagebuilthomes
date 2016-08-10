<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php $jellythemes = build_jellythemes_theme_options(); ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> data-spy="scroll" data-target=".navbar-main-collapse">
<div class="loader <?php echo (isset($jellythemes['loader']) && $jellythemes['loader'] ? 'disabled' : ''); ?>">
    <div class="sk-fading-circle">
      <div class="sk-circle1 sk-circle"></div>
      <div class="sk-circle2 sk-circle"></div>
      <div class="sk-circle3 sk-circle"></div>
      <div class="sk-circle4 sk-circle"></div>
      <div class="sk-circle5 sk-circle"></div>
      <div class="sk-circle6 sk-circle"></div>
      <div class="sk-circle7 sk-circle"></div>
      <div class="sk-circle8 sk-circle"></div>
      <div class="sk-circle9 sk-circle"></div>
      <div class="sk-circle10 sk-circle"></div>
      <div class="sk-circle11 sk-circle"></div>
      <div class="sk-circle12 sk-circle"></div>
    </div>
</div>
<header id="header">
    <div class="container">
        <?php if (!empty($jellythemes['show_infobar'])) : ?>
        <div class="row info-bar">
            <div class="col-sm-6"><?php echo $jellythemes['infobar_phone'] ?></div>
            <div class="col-sm-6 text-right">
                <?php if (isset($jellythemes['infobar_link1']) && isset($jellythemes['infobar_icon1'])): ?>
                    <a target="_blank" href="<?php echo esc_url($jellythemes['infobar_link1']); ?>" class="social-icon"><i class="icon fa <?php echo esc_attr($jellythemes['infobar_icon1']) ?>"></i></a>
                <?php endif ?>
                <?php if (isset($jellythemes['infobar_link2']) && isset($jellythemes['infobar_icon2'])): ?>
                    <a target="_blank" href="<?php echo esc_url($jellythemes['infobar_link2']); ?>" class="social-icon"><i class="icon fa <?php echo esc_attr($jellythemes['infobar_icon2']) ?>"></i></a>
                <?php endif ?>
                <?php if (isset($jellythemes['infobar_link3']) && isset($jellythemes['infobar_icon3'])): ?>
                    <a target="_blank" href="<?php echo esc_url($jellythemes['infobar_link3']); ?>" class="social-icon"><i class="icon fa <?php echo esc_attr($jellythemes['infobar_icon3']) ?>"></i></a>
                <?php endif ?>
                <?php if (isset($jellythemes['infobar_link4']) && isset($jellythemes['infobar_icon4'])): ?>
                    <a target="_blank" href="<?php echo esc_url($jellythemes['infobar_link4']); ?>" class="social-icon"><i class="icon fa <?php echo esc_attr($jellythemes['infobar_icon4']) ?>"></i></a>
                <?php endif ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
            <i class="icon fa fa-bars"></i>
            </button>
            <a class="navbar-brand normal" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($jellythemes['logo']['url']); ?>" alt="<?php echo strip_tags($jellythemes['blogname']); ?>"/></a>
        </div>
        <?php $pid = !empty($post) ? get_post_meta($post->ID, '_build_jellythemes_menu_name', true) : 0; ?>
        <?php wp_nav_menu(array('container' => 'nav', 'menu_class' => 'nav navbar-nav navigation','menu_id' => 'nav', 'container_class' => 'collapse navbar-collapse navbar-right navbar-main-collapse', 'theme_location' => 'main', 'menu' => $pid, 'walker' => new build_jellythemes_walker_nav_menu)); ?>
    </div>
</header>