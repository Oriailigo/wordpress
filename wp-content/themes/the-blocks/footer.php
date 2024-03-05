<?php
/**
 * The template for displaying the footer
 */
?>
<footer id="colophon" class="site-footer">
<div class="site-info">
	<?php esc_html_e( 'The Blocks', 'the-blocks' ); ?>
	<?php /* translators: Proudly powered by WordPress */ ?>
	- <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'the-blocks' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'the-blocks' ), 'WordPress' ); ?></a>
</div>
</footer>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
