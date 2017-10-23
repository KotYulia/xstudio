<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package XStudio
 */

get_header(); ?>

<section class="title-section" style=" background: url('<?php echo get_theme_mod('background-page-single_works', ''); ?>') center/cover no-repeat;">
    <div class="container">
        <p><?php echo get_theme_mod('copyright_single_works', 'See all designs enjoy'); ?></p>
    </div>
</section>

<section class="container portfoil-content">
    <?php
        the_content( sprintf(
            wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'xstudio' ),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            the_post_thumbnail('full', 'class=img-responsive')
        ) );
    ?>
    <h2><?php echo get_theme_mod('title_portfoil', 'Our works'); ?></h2>
    <ul class="row">
        <?php
        $args = array(
            'post_type' => 'works-reviews',
            'posts_per_page' => 6
        );
        $the_query = new WP_Query($args);
        if ($the_query -> have_posts()) : ?>

            <?php while($the_query -> have_posts()) : ?>
                <li class="col-sm-6 col-md-4">
                    <?php $the_query -> the_post(); ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('full', 'class=img-responsive'); ?>
                    </a>
                </li>
            <?php endwhile; ?>
        <?php else : //no posts ?>
        <?php endif; wp_reset_postdata(); ?>
    </ul>
</section>

<?php get_footer(); ?>
