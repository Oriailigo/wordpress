<?php
/**
 * The base template
 */

get_header();
?>

<main id="site-content" class="container" role="main">

        <?php
        if (have_posts()) :

            while (have_posts()) : the_post();

                get_template_part('content', get_post_format());

            endwhile;

            the_posts_pagination();

        else :
        endif;
        ?>
</main>

<?php
get_footer();
