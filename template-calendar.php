<?php
/**
 *  Template Name: Food Calendar
 */

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <!-- start: Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- end: Mobile Specific -->
        <title>Mooveat</title>
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/calendar.css">
    </head>
    <body>

    <div id="header">

        <div class="top-bar">
            <ul class="top-nav">
                <li>
                    <a href="#">signaler un producteur</a>
                </li>
                <li>
                    <a href="#">déconnexion</a>
                </li>
                <li>
                    <a href="#">inscription</a>
                </li>
                <li>
                    <a href="#">fr</a>
                </li>
            </ul>
        </div>

        <div class="search-bar">

            <div class="search-holder">

                <form action="#">
                    <input type="text" placeholder="Recherche">
                    <button></button>
                </form>

            </div>

            <a href="#" class="menu-icon">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </a>
            <div class="logo-holder">
                <img src="images/logo-signature.png" alt="Mooveat Logo" class="logo-desktop">
                <img src="images/mobile-logo.png" alt="Mooveat Logo" class="logo-mobile">


            </div>

        </div>

    </div>

    <!-- Calendar view  Start-->

    <div id="calendar">


        <div class="container">
            <div class="row">

                <!--Calendar-->
                <div class="col-md-7">


                    <!-- Month bar -->

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

                                $post_type = 'mve_produit_alim';


                                $terms = get_terms(array(
                                    'taxonomy' => 'categorie_produit_alimentaire',
                                    'hide_empty' => false,
                                ));
                                $food_family = array();

                                if (!empty($terms) && !is_wp_error($terms)) :

                                foreach ($terms as $term) :
                                    $food_family[] = $term->term_id;
                                    ?>

                                    <div class="checkbox">
                                        <input type="checkbox" id="<?php echo $term->slug . $term->term_id; ?>"
                                               data-foodfamily="<?php echo $term->slug; ?>"
                                               checked/>
                                        <label for="<?php echo $term->slug . $term->term_id; ?>"><?php echo $term->name; ?></label>
                                    </div>

                                <?php endforeach; ?>


                            </div>

                            <select name="#" id="category-selector1" class="select-dropdown custom-select ">
                                <option value="1">Select</option>
                                <?php
                                foreach ($terms as $term) :
                                    ?>

                                    <option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>

                                <?php endforeach; ?>
                            </select>

                            <?php endif; ?>
                        </form>
                    </div>


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
                                            $food_family_slug = $f_term->slug . $f_term->term_id;
                                            $color_class = get_field('color_class', 'term_' . $f_term->term_id);
                                        }

                                        if ($output == 'slug'){
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
                                            <a class="p-label <?php echo $label_color; ?>" data-id="<?php echo get_the_ID(); ?>" data-family="<?php echo color_class('slug')?>">
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

                                    function f_get_months($f_month){
                                        return get_sub_field($f_month);
                                    }

//                                    for ($i = 1; $i <= 12; $i++) {

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
                                    foreach ($months as $month){

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

//                                                            switch ($i) {
//                                                                case 1:
//                                                                    $season = f_get_months(janvier);
//                                                                    break;
//                                                                case 2:
//                                                                    $season = f_get_months(fevrier);
//                                                                    break;
//                                                                case 3:
//                                                                    $season = f_get_months(mars);
//                                                                    break;
//                                                                case 4:
//                                                                    $season = f_get_months(avril);
//                                                                    break;
//                                                                case 5:
//                                                                    $season = f_get_months(mai);
//                                                                    break;
//                                                                case 6:
//                                                                    $season = f_get_months(juin);
//                                                                    break;
//                                                                case 7:
//                                                                    $season = f_get_months(juillet);
//                                                                    break;
//                                                                case 8:
//                                                                    $season = f_get_months(aout);
//                                                                    break;
//                                                                case 9:
//                                                                    $season = f_get_months(septembre);
//                                                                    break;
//                                                                case 10:
//                                                                    $season = f_get_months(octobre);
//                                                                    break;
//                                                                case 11:
//                                                                    $season = f_get_months(novembre);
//                                                                    break;
//                                                                case 12:
//                                                                    $season = f_get_months(decembre);
//                                                                    break;
//
//                                                            }
                                                            $season = get_sub_field($month);
                                                        endwhile;

                                                    endif;

                                                    $season_check = $season != 0 ? true : false;

                                                    if ($season_check == true) {
                                                        echo '<div class="cell ' . color_class() . '" data-season="' . $season . '" data-id="'.get_the_ID().'" data-family="'.color_class('slug').'"></div>';
                                                    } else {
                                                        echo '<div class="cell" data-season="' . $season . '"></div>';
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

<?php

$args = array(
    'post_type' => 'mve_produit_alim',
    'tax_query' => array(
        array(
            'taxonomy' => 'categorie_produit_alimentaire',
            'field' => 'slug',
            'terms' => 'viandes-volailles-gibiers',
        ),
    ),
);

// the query
$foods_query = new WP_Query($args); ?>

<?php if ($foods_query->have_posts()) : ?>

    <!-- the loop -->
    <?php while ($foods_query->have_posts()) : $foods_query->the_post(); ?>

        <?php get_template_part( 'template-parts/content', 'calendar' ); ?>

    <?php endwhile; ?>
    <!-- end of the loop -->
    <?php wp_reset_postdata(); ?>
<?php endif; ?>

                    </div>



                </div>

            </div>
        </div>


    </div>

    <!-- Calendar view End -->

    <footer class="footer">
        <ul class="footer-links">
            <li>
                <a href="">
                    Conditions générales d’utilisation
                </a>
            </li>

            <li>
                <a href="">
                    Contactez-nous
                </a>
            </li>

            <li>
                <a href="">
                    Mentions légales
                </a>
            </li>

            <li>
                <a href="">
                    Crédits
                </a>
            </li>
        </ul>

    </footer>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js" type="text/javascript"></script>

    <!-- Slick Slider -->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/slick.js" type="text/javascript"
            charset="utf-8"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.sticky.js" type="text/javascript"
            charset="utf-8"></script>

    <!--Global Script-->

    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/script.js"></script>


    </body>
    </html>

<?php

?>