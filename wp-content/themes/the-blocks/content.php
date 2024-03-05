<?php
/**
 * The template for displaying content
 */
?>
<article <?php post_class('post-item row'); ?>>          

    <div class="news-thumb col-md-3">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail(); ?>
        </a>
    </div>

    <div class="news-text-wrap col-md-<?php echo (has_post_thumbnail() ? '9' : '12') ?>">   
        <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
        <span class="posted-date">
            <?php echo esc_html(get_the_date()); ?>
        </span>

        <div class="post-content">
            <?php
            if (is_singular()) {
                the_content();
                wp_link_pages();
                the_tags();
                comments_template();
            } else {
                the_excerpt();
            }
            ?>
        </div><!-- .post-excerpt -->
    </div><!-- .news-text-wrap -->

</article>
