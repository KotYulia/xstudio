<?php
/**
 * The template for displaying home
 * Created by PhpStorm.
 * User: Yuliya
 * Date: 25.03.2017
 * Time: 12:50
 */

get_header(); ?>

    <section class="title-section" style=" background: url('<?php echo get_theme_mod('background-page-title', ''); ?>') center/cover no-repeat;">
        <div class="container">
            <p><?php echo get_theme_mod('copyright_textbox', 'See all news'); ?></p>
        </div>
    </section>

    <section class="title-page">
        <h1><?php single_post_title();?> </h1>
    </section>

    <section class="container blog-content">
        <ul class="blog-list">
            <?php if (have_posts()):
                while (have_posts()): the_post(); ?>
                    <li>
                        <article class="col-md-12 article-inline">
                            <?php the_post_thumbnail('full', 'class=img-responsive'); ?>
                            <div>
                                <h2>
                                    <a href="<?php the_permalink(); ?>"> <?php the_title() ?></a>
                                </h2>
                                <?php the_excerpt(); ?>
                            </div>
                        </article>
                    </li>
                <?php endwhile;
                the_posts_navigation(); ?>
            <?php else: ?>
                <p>No posts found</p>
            <?php endif; ?>
        </ul>
    </section>

</main>

<?php get_footer(); ?>