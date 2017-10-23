<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package XStudio
 */

get_header(); ?>

<section class="title-section" style=" background: url('<?php echo get_theme_mod('background-page-single', ''); ?>') center/cover no-repeat;">
    <div class="container">
        <p><?php echo get_theme_mod('copyright_single', 'Title Here'); ?></p>
    </div>
</section>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <?php
            while ( have_posts() ) : the_post(); ?>
            <div class="author-block">
                <div class="container">
                    <div class="author">
                        <div><?php echo get_avatar( get_the_author_meta( 'ID' ), 141 ); ?></div>
                        <div class="author-info">
                            <h3><?php the_author();?></h3>
                            <span><?php the_author_description();?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="post-data">
                <div class="container data-info">
                    <div class="entry-meta">
                        <span><?php the_time( 'j F Y ' ); ?></span>
                        <span>share<span class="fa fa-angle-down"></span></span>
                    </div>
                </div>
            </div>
            <div class="post-text">
                <div class="container">
                    <?php get_template_part( 'template-parts/content'); ?>
                    <ul class="row post-links">
                        <li class="col-xs-4">
                            <a href="<?php echo get_theme_mod('social_links_facebook'); ?>" class="fa fa-facebook"></a>
                        </li>
                        <li class="col-xs-4">
                            <a href="<?php echo get_theme_mod('social_links_twitter'); ?>" class="fa fa-twitter"></a>
                        </li>
                        <li class="col-xs-4">
                            <a href="#" class="fa fa-chain"></a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php endwhile; // End of the loop.
            ?>




		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
