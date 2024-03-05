<?php
/**
 * The header for our theme
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="profile" href="https://gmpg.org/xfn/11" />
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <div id="page-content" class="site-content">
            <header class="main-header">
                <div class="container">
                    <?php the_custom_logo(); ?>
                    <h1>
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <?php bloginfo('name'); ?>
                        </a>
                    </h1>
                    <?php
                    $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) :
                        ?>
                        <p class="site-description">
                            <?php echo esc_html($description); ?>
                        </p>
                    <?php endif; ?>
                    <?php if (has_nav_menu('primary')) : ?>
                        <input type="checkbox" id="main-menu" />
                        <label for="main-menu" class="main-menu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </label>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'container' => 'nav',
                            'container_class' => 'nav'));
                        ?>
                    <?php endif; ?>

                </div>
            </header>

