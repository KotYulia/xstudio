<?php
/*
 * Template Name: Portfoil
 */

get_header(); ?>

    <section class="title-section" style=" background: url('<?php echo get_theme_mod('background-page-works', ''); ?>') center/cover no-repeat;">
        <div class="container">
            <p><?php echo get_theme_mod('copyright_works', 'See all designs enjoy'); ?></p>
        </div>
    </section>

    <div class="title-page">
        <ul id="filters" class="design-list">
            <li><a href="#" data-filter="*" class="selected">Everything</a></li>
            <?php
            $terms = get_terms("category"); // get all categories, but you can use any taxonomy
            $count = count($terms); //How many are they?
            if ( $count > 0 ){  //If there are more than 0 terms
                foreach ( $terms as $term ) {  //for each term:
                    echo "<li><a href='#' data-filter='.".$term->slug."'>" . $term->name . "</a></li>\n";
                    //create a list item with the current term slug for sorting, and name for label
                }
            }
            ?>
        </ul>
    </div>

    <section class="container portfoil-content">

            <?php
            $args = array(
                'post_type' => 'works-reviews',
                'posts_per_page' => 9
            );
            $the_query = new WP_Query($args);
            if ($the_query -> have_posts()) : ?>
                <ul id="isotope-list" class="row">
                    <?php while($the_query -> have_posts()) :
                        $termsArray = get_the_terms( $post->ID, "category" );  //Get the terms for this particular item
                        $termsString = ""; //initialize the string that will contain the terms
                        foreach ( $termsArray as $term ) { // for each term
                            $termsString .= $term->slug.' '; //create a string that has all the slugs
                        }
                        ?>
                        <li class="col-sm-6 col-md-4 <?php echo $termsString; ?> item">
                            <?php $the_query -> the_post(); ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('full', 'class=img-responsive'); ?>
                            </a>
                        </li>
                 <?php endwhile; ?>
                </ul>
            <?php else : //no posts ?>
            <?php endif; wp_reset_postdata(); ?>

    </section>

</main>

<?php get_footer(); ?>