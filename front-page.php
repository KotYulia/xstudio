<?php
/**
 * The template for displaying front page
 * Created by PhpStorm.
 * User: Yuliya
 * Date: 25.03.2017
 * Time: 12:50
 */

get_header(); ?>

    <section class="container-fluid main-slider">
        <div id="carousel-example-generic" class="carousel slide home-slider" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <?php
                $args = array(
                    'post_type' => 'slider-reviews'
                );
                $the_query = new WP_Query($args);
                if ($the_query -> have_posts()) : ?>

                    <?php while($the_query -> have_posts()) : ?>
                        <div class="item">
                            <?php $the_query -> the_post(); ?>
                            <?php the_post_thumbnail('full', 'class=img-responsive'); ?>
                            <div class="carousel-caption slide-info">
                                <h1><?php the_title(); ?></h1>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else : //no posts ?>
                <?php endif; wp_reset_postdata(); ?>
            </div>
            <a class="left carousel-control home-carousel" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="fa fa-angle-left carousel-left" aria-hidden="true"></span>
            </a>
            <a class="right carousel-control home-carousel" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="fa fa-angle-right carousel-right" aria-hidden="true"></span>
            </a>
        </div>
    </section>

    <section class="services">
        <div class="container">
            <ul class="row services-content">
                <?php
                $query = new WP_Query( array('post_type' => 'services-reviews', 'posts_per_page' => 4 ) );
                if ($query->have_posts()):?>
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <li class="col-sm-4 col-md-3">
                            <?php
                            $icon = get_post_custom_values('icon');
                            foreach( $icon as $key => $value ) {
                                echo "$value";
                            }
                            ?>
                            <h3><?php the_title(); ?></h3>
                            <p><?php the_excerpt(); ?></p>
                        </li>
                    <?php endwhile; ?>
                <?php endif; wp_reset_postdata(); ?>
            </ul>
        </div>
    </section>
    <section class="container-fluid carousel-works">
        <h2><?php echo get_theme_mod('title_portfoil', 'Our works'); ?></h2>
        <div class="carousel slide multi-item-carousel" id="theCarousel">
            <div class="carousel-inner">
                <?php
                $args = array(
                    'post_type' => 'works-reviews',
                    'posts_per_page' => 9
                );
                $the_query = new WP_Query($args);
                if ($the_query -> have_posts()) : ?>

                    <?php while($the_query -> have_posts()) : ?>
                        <div class="item">
                            <?php $the_query -> the_post(); ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('full', 'class=img-responsive'); ?>
                            </a>
                        </div>
                    <?php endwhile; ?>
                <?php else : //no posts ?>
                <?php endif; wp_reset_postdata(); ?>
            </div>
            <a class="left carousel-control" href="#theCarousel" data-slide="prev">
                <span class="fa fa-angle-left carousel-left" aria-hidden="true"></span>
            </a>
            <a class="right carousel-control" href="#theCarousel" data-slide="next">
                <span class="fa fa-angle-right carousel-right" aria-hidden="true"></span>
            </a>
        </div>
    </section>

    <section class="about">
        <div class="container about-info">
            <?php if(!dynamic_sidebar('About us')) : ?>

            <?php endif; ?>
        </div>
    </section>




<?php get_footer(); ?>