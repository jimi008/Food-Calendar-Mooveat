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

get_header('calendar');

?>

    <div id="primary" class="content-area">
        <div id="top-header-bar">
            <?php wp_nav_menu('Menu Principal'); ?>
        </div>
        <div id="header-search-bar">
            <div id="nav_list-pushmenu"><i class="icon-menu-ouvrir"></i></div>
            <nav id="accordion" class="pushmenu pushmenu-left panel-group" role="tablist">
                <div id="pushmenu-search-bar-input-container" class="ui-front">
                    <input type="text" placeholder="Rechercher" id="pushmenu-search-bar-input" class="map-search-input">
                    <div id="pushmenu-search-trigger" class="icon-loupe"></div>
                    <div class="empty-input-trigger">&times;</div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">
                        <h3 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#links-lieux">Lieux <i
                                        class="icon-liste-petit"></i></a>
                        </h3>
                    </div>
                    <ul id="links-lieux" class="pushmenu-links collapse panel-collapse" role="tabpanel">
                        <li><a href="#" data-cat-slug="ferme"><i class="icon-Ferme"></i> Ferme</a></li>
                        <li><a href="#" data-cat-slug="viticulteur-alcool"><i class="icon-viticulteur"></i> Viticulteur</a>
                        </li>
                        <li><a href="#" data-cat-slug="cueillette"><i class="icon-cueillette"></i> Cueillette</a></li>
                        <li><a href="#" data-cat-slug="magasin-boutique"><i class="icon-boutique"></i> Magasin &
                                boutique</a></li>
                        <li><a href="#" data-cat-slug="restaurant"><i class="icon-boutique"></i> Restaurant</a></li>
                        <li><a href="#" data-cat-slug="marche"><i class="icon-marche"></i> Marché</a></li>
                        <li><a href="#" data-cat-slug="regroupement-de-producteurs"><i class="icon-regroupements"></i>
                                Groupe producteurs</a></li>
                        <li><a href="#" data-cat-slug="vente-directe"><i class="icon-distributeur"></i> Casier
                                automatique</a></li>
                    </ul>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">
                        <h3 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#modes-commande">Modes de
                                commande</span><i
                                        class="icon-liste-petit"></i></a>
                        </h3>
                    </div>
                    <ul id="modes-commande" class="pushmenu-links collapse panel-collapse" role="tabpanel">
                        <li><a href="#"><i class="icon-sur-place"></i> Sur place</a></li>
                        <li><a href="#"><i class="icon-courses-en-ligne"></i> En ligne</a></li>
                        <li><a href="#"><i class="icon-livraison"></i> Livraison</a></li>
                        <li><a href="#"><i class="icon-distributeur"></i> Casier automatique</a></li>
                    </ul>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">
                        <h3 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#certifications">Certifications
                                <span>(Bio, label ...)</span><i
                                        class="icon-liste-petit"></i></a>
                        </h3>
                    </div>
                    <ul id="certifications" class="pushmenu-links collapse panel-collapse" role="tabpanel">
                        <li><a href="#" data-cat-slug="label-bio"><i class="icon-bio-02"></i> Bio</a></li>
                        <li><a href="#" data-cat-slug="label"><i class="icon-label"></i> Label</a></li>
                        <li><a href="#"><i class="icon-vegan"></i> Vegan</a></li>
                        <li><a href="#"><i class="icon-ss-gluten"></i> Sans gluten</a></li>
                    </ul>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">
                        <h3 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#preferences">Préférences<i
                                        class="icon-liste-petit"></i></a>
                        </h3>
                    </div>
                    <ul id="preferences" class="pushmenu-links collapse panel-collapse" role="tabpanel">
                        <p class="select-slider-info">
                            <span>Dans un rayon de : </span><span class="selectedRadius"></span>
                        </p>
                        <select class="form-control selectRadius">
                        </select>
                        <li class="preference-item"><a href="#" data-preference="geolocate-me"><i
                                        class="icon-geoloc"></i> Me géolocaliser
                                <span class="onoffswitch">
                                    <span class="onoffswitch-label">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </span>
                                </span>
                            </a></li>
                        <li class="preference-item"><a href="#" data-preference=""><i class="icon-saison"></i> De saison
                                <span class="onoffswitch">
                                    <span class="onoffswitch-label">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </span>
                                </span>
                            </a></li>
                        <li class="preference-item"><a href="#" data-preference=""><i class="icon-open"></i> Ouvert
                                actuellement <span
                                        class="onoffswitch">
                                    <span class="onoffswitch-label">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </span>
                                </span></a></li>
                        <li class="preference-item"><a href="#" data-preference=""><i class="icon-environnement"></i> 0
                                impact
                                environnement <span class="onoffswitch">
                                    <span class="onoffswitch-label">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </span>
                                </span></a></li>
                        <li class="preference-item"><a href="#" data-preference=""><i class="icon-chefs"></i> Nos chefs
                                recommandent <span
                                        class="onoffswitch">
                                    <span class="onoffswitch-label">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </span>
                                </span></a>
                        </li>
                    </ul>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">
                        <h3 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#acheter">Acheter</span><i
                                        class="icon-liste-petit"></i></a>
                        </h3>
                    </div>
                    <ul id="acheter" class="pushmenu-links collapse panel-collapse" role="tabpanel">
                        <li><a href="#"><i class="icon-saison"></i> Calendrier de saison</a></li>
                        <li><a href="#"><i class="icon-prix-marche"></i> Prix du marché</a></li>
                        <li><a href="#"><i class="icon-courses-en-ligne"></i> Courses en ligne</a></li>
                        <li><a href="#"><i class="icon-bourse-transports"></i> Bourse aux transports</a></li>
                    </ul>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">
                        <h3 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#gestion-compte">Mon compte</span>
                                <i
                                        class="icon-liste-petit"></i></a>
                        </h3>
                    </div>
                    <ul id="gestion-compte" class="pushmenu-links collapse panel-collapse" role="tabpanel">
                        <li class="deconnexion"><a href="#"><i class="icon-menu-fermer"></i> Déconnexion</a></li>
                    </ul>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">
                        <h3 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#partager-parrainer">Partager /
                                parrainer</span><i
                                        class="icon-liste-petit"></i></a>
                        </h3>
                    </div>
                    <ul id="partager-parrainer" class="pushmenu-links collapse panel-collapse" role="tabpanel">

                    </ul>
                </div>


            </nav>
            <div id="header-search-logo"><a href="http://www.mooveat.co/" target="_blank"
                                            title="Plateforme mobile de connexion entre producteurs & consommateurs pour favoriser une alimentation variée à travers les structures de ventes directes et les circuits courts">&nbsp;</a>
            </div>
            <div id="header-search-bar-input-container" class="ui-front scrollable">
                <i class="icon-infos-pratiques popup-search-info"></i>
                <input type="text" placeholder="Recherche" id="header-search-bar-input" class="map-search-input">
                <div class="placeholder-mask">
                    <div class="layer">Saisissez une adresse complète ou des mots clés parmi les propositions qui
                        s'afficheront (mots clés séparés par un point-virgule)
                    </div>
                </div>
                <div id="header-search-trigger" class="icon-loupe"></div>
                <div class="empty-input-trigger">&times;</div>
            </div>
        </div>

    </div><!-- #primary -->

    <!-- Calendar view  Start-->

    <div id="calendar">

        <div class="container">

            <div class="row">

                <!--Calendar-->
                <div class="col-md-7 cal-wrap">

                    <!-- Month bar -->
                    <?php

                    $terms = get_terms(array(
                        'taxonomy' => 'categorie_produit_alimentaire',
                        'hide_empty' => false,
                    ));
                    global $food_family;
                    $food_family = array();

                    if (!empty($terms) && !is_wp_error($terms)) :

                    ?>
                    <div class="cal-head">
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

                                <select title="Select product family" name="#" id="family-selector-m"
                                        class="select-dropdown custom-select">
                                    <option value="1">Select</option>

                                    <?php foreach ($terms as $term) : ?>

                                        <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>

                                    <?php endforeach; ?>

                                </select>

                            </form>
                        </div>
                        <?php endif; ?>

                        <!-- Dropdown Area End -->
                    </div>
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
                                        'posts_per_page' => -1,
                                        'orderby' => 'title',
                                        'order' => 'ASC',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'categorie_produit_alimentaire',
                                                'field' => 'term_id',
                                                'terms' => $food_family,
                                            ),
                                        ),
                                    );

                                    // the query
                                    $foods_query = new WP_Query($args);


                                    if ($foods_query->have_posts()) :

                                        while ($foods_query->have_posts()) : $foods_query->the_post();

                                            global $post;

                                            $label_color = (color_class('') == 'peach') ? 'orange' : 'green';
                                            $image = get_field('image_produit_alimentaire');
                                            $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)

                                            ?>
                                            <!--product-->
                                            <a class="p-label <?php echo $label_color; ?>"
                                               data-id="<?php echo get_the_ID(); ?>"
                                               data-family="<?php echo color_class('slug') ?>"
                                            data-slug="<?php echo $post->post_name; ?>"
                                            >
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

                                    foreach ($months as $key => $month) {

                                        ?>

                                        <!--col <?php echo $key; ?> -->
                                        <div class="col">

                                            <?php
                                            // the query
                                            $foods_query = new WP_Query($args);
                                            global $post;

                                            if ($foods_query->have_posts()) :

                                                while ($foods_query->have_posts()) : $foods_query->the_post();
                                                    $season = '';

                                                    // check if the repeater field has rows of data
                                                    if (have_rows('calendrier_zone_geo')):

                                                        // loop through the rows of data
                                                        while (have_rows('calendrier_zone_geo')) : the_row();

                                                            $season = get_sub_field($month);

                                                        endwhile;

                                                    endif;

                                                    $season_check = $season != 0 ? true : false;
                                                    $color = ($season_check == true) ? color_class():"";

                                                        $cell = '<div class="cell ' . $color . '" 
                                                        data-season="' . $season . '" 
                                                        data-id="' . get_the_ID() . '" 
                                                        data-family="' . color_class('slug') . '"
                                                        data-slug="' . $post->post_name . '"></div>';

                                                        echo $cell;

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

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Calendar view End -->

<?php get_footer('calendar'); ?>