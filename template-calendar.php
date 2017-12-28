<?php
/**
 * Template Name: Food Calendar
 *
 * The sitemap page template displays a user-friendly overview
 * of the content of your website.
 *
 * @package mooveat
 * @subpackage Food Calendar
 */

get_header();

?>
    <!-- Calendar view  Start-->

    <div id="calendar">

        <div class="container">
            <div class="row">

                <!--Calendar-->
                <div class="col-md-7">


                    <!-- Month bar -->
<?php

$post_type = 'mve_produit_alim';

$terms = get_terms(array(
    'taxonomy' => 'categorie_produit_alimentaire',
    'hide_empty' => false,
));

$food_family = array();

if (!empty($terms) && !is_wp_error($terms)) :

?>
                    <div id="month-bar">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="flexslider" id="months">

                                    <section class="regular slider slider-month" id="slider-month">
                                        <div class="col">
                                            <div class="month">Janv</div>
                                        </div>
                                        <div class="col">
                                            <div class="month">Févr.</div>
                                        </div>
                                        <div class="col">
                                            <div class="month">Mars</div>
                                        </div>
                                        <div class="col">
                                            <div class="month">Avril</div>
                                        </div>
                                        <div class="col">
                                            <div class="month">Mai</div>
                                        </div>
                                        <div class="col">
                                            <div class="month">Juin</div>
                                        </div>
                                        <div class="col">
                                            <div class="month">Juillet</div>
                                        </div>
                                        <div class="col">
                                            <div class="month">Août</div>
                                        </div>
                                        <div class="col">
                                            <div class="month">Sep</div>
                                        </div>
                                        <div class="col">
                                            <div class="month">Oct</div>
                                        </div>
                                        <div class="col">
                                            <div class="month">Nov</div>
                                        </div>
                                        <div class="col">
                                            <div class="month">Déc</div>
                                        </div>
                                        <!-- items mirrored twice, total of 12 -->

                                    </section>

                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Month bar end -->

                    <!-- Dropdown Area -->

                    <div class="dropdown-holder" id="dropdown-holder">

                        <form action="#">

                            <div class="checkbox-holder">

                                <?php

                                foreach ($terms as $term) :
                                    $food_family[] = $term->term_id;
                                    ?>

                                    <div class="checkbox">
                                        <input type="checkbox" id="<?php echo $term->slug . $term->term_id; ?>"
                                               data-family="<?php echo $term->slug; ?>"
                                               checked/>
                                        <label for="<?php echo $term->slug . $term->term_id; ?>"><?php echo $term->name; ?></label>
                                    </div>

                                <?php endforeach; ?>

                            </div>

                            <select name="#" id="family-selector-m" class="select-dropdown custom-select ">
                                <option value="1">Select</option>
                                <?php
                                foreach ($terms as $term) :
                                    ?>

                                    <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>

                                <?php endforeach; ?>
                            </select>


                        </form>
                    </div>
<?php endif; ?>

                    <!-- Dropdown Area End -->

                    <!-- Product Holder -->

                    <div id="products">

                        <div class="container-fluid">
                            <!--row one-->
                            <div class="row">
                                <div class="product-labels">

                                    <?php

                                    function color_class($output)
                                    {
                                        $family_terms = get_the_terms(get_the_ID(), 'categorie_produit_alimentaire');
                                        $color_class = '';
                                        foreach ($family_terms as $f_term) {
                                            $food_family_slug = $f_term->slug;
                                            $color_class = get_field('color_class', 'term_' . $f_term->term_id);
                                        }

                                        if ($output == 'slug') {
                                            return $food_family_slug;
                                        }
                                        return $color_class;
                                    }

                                    $args = array(
                                        'post_type' => 'mve_produit_alim',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'categorie_produit_alimentaire',
                                                'field' => 'term_id',
                                                'terms' => $food_family,
                                            ),
                                        ),
                                    );

                                    // the query
                                    $foods_query = new WP_Query($args); ?>

                                    <?php if ($foods_query->have_posts()) : ?>

                                        <!-- the loop -->
                                        <?php while ($foods_query->have_posts()) : $foods_query->the_post(); ?>

                                            <?php

                                            $label_color = (color_class() == 'peach') ? 'orange' : 'green';

                                            $image = get_field('image_produit_alimentaire');
                                            $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)

                                            ?>
                                            <!--product-->
                                            <a class="p-label <?php echo $label_color; ?>"
                                               data-id="<?php echo get_the_ID(); ?>"
                                               data-family="<?php echo color_class('slug') ?>">
                                                <div class="image-holder">
                                                    <?php if (!empty($image)): ?>
                                                        <img src="<?php echo $image['url']; ?>"
                                                             alt="<?php echo $image['alt']; ?>">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="p-text"><?php the_title(); ?></div>
                                            </a>

                                        <?php endwhile; ?>
                                        <!-- end of the loop -->
                                        <?php wp_reset_postdata(); ?>
                                    <?php endif; ?>

                                </div>

                                <section class="regular slider slider-product" id="slider-product">

                                    <?php

                                    $months = array(
                                        'janvier',
                                        'fevrier',
                                        'mars',
                                        'avril',
                                        'mai',
                                        'juin',
                                        'juillet',
                                        'aout',
                                        'septembre',
                                        'octobre',
                                        'novembre',
                                        'decembre',
                                    );
                                    foreach ($months as $month) {

                                        ?>

                                        <!--col <?php echo $i; ?> -->
                                        <div class="col">

                                            <?php
                                            // the query
                                            $foods_query = new WP_Query($args); ?>

                                            <?php if ($foods_query->have_posts()) : ?>

                                                <!-- the loop -->
                                                <?php while ($foods_query->have_posts()) : $foods_query->the_post(); ?>

                                                    <?php

                                                    // check if the repeater field has rows of data
                                                    if (have_rows('calendrier_zone_geo')):

                                                        // loop through the rows of data
                                                        while (have_rows('calendrier_zone_geo')) : the_row();

                                                            $season = get_sub_field($month);
                                                        endwhile;

                                                    endif;

                                                    $season_check = $season != 0 ? true : false;

                                                    if ($season_check == true) {
                                                        echo '<div class="cell ' . color_class() . '" data-season="' . $season . '" data-id="' . get_the_ID() . '" data-family="' . color_class('slug') . '"></div>';
                                                    } else {
                                                        echo '<div class="cell" data-season="' . $season . '" data-id="' . get_the_ID() . '" data-family="' . color_class('slug') . '"></div>';
                                                    }

                                                    ?>

                                                <?php endwhile; ?>
                                                <!-- end of the loop -->
                                                <?php wp_reset_postdata(); ?>
                                            <?php endif; ?>

                                        </div>
                                        <?php
                                    }
                                    ?>

                                </section>

                            </div>

                        </div>

                    </div>

                    <!-- Product Holder End -->

                </div>

                <!--Detail-->
                <div class="col-md-5">

                    <div class="tint"></div>
                    <a class="btn-close">&times;</a>

                    <div id="detail" class="">

                        <div class="ajaxed-data">

                            <?php

                            $args = array(
                                'post_type' => 'mve_produit_alim',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'categorie_produit_alimentaire',
                                        'field' => 'slug',
                                        'terms' => 'fruits',
                                    ),
                                ),
                            );

                            // the query
                            $foods_query = new WP_Query($args); ?>

                            <?php if ($foods_query->have_posts()) : ?>

                                <!-- the loop -->
                                <?php while ($foods_query->have_posts()) : $foods_query->the_post(); ?>

                                    <?php get_template_part('template-parts/content', 'calendar'); ?>

                                <?php endwhile; ?>
                                <!-- end of the loop -->
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>

                        </div>

                    </div>


                </div>

            </div>
        </div>

    </div>

    <!-- Calendar view End -->

<?php
get_footer();
?>