<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package XStudio
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
            <div class="footer-info">
                <p>Design by XStudio</p><!-- .site-info -->
                <ul class="social">
                    <li>
                        <a href="<?php echo get_theme_mod('social_links_instagram'); ?>" class="fa fa-linkedin"></a>
                    </li>
                    <li>
                        <a href="<?php echo get_theme_mod('social_links_twitter'); ?>" class="fa fa-twitter"></a>
                    </li>
                    <li>
                        <a href="<?php echo get_theme_mod('social_links_youtube'); ?>" class="fa fa-youtube"></a>
                    </li>
                    <li>
                        <a href="<?php echo get_theme_mod('social_links_rss'); ?>" class="fa fa-rss"></a>
                    </li>
                    <li>
                        <a href="<?php echo get_theme_mod('social_links_behance'); ?>" class="fa fa-behance"></a>
                    </li>
                    <li>
                        <a href="<?php echo get_theme_mod('social_links_deviantart'); ?>" class="fa fa-deviantart"></a>
                    </li>
                    <li>
                        <a href="<?php echo get_theme_mod('social_links_facebook'); ?>" class="fa fa-facebook"></a>
                    </li>
                </ul>
            </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
