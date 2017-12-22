<?php
/*
 * Template Name: Home Page Mooveat
 */


get_header(); ?>

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
                        <li><a href="#" data-cat-slug="viticulteur-alcool"><i class="icon-viticulteur"></i> Viticulteur</a></li>
                        <li><a href="#" data-cat-slug="cueillette"><i class="icon-cueillette"></i> Cueillette</a></li>
                        <li><a href="#" data-cat-slug="magasin-boutique"><i class="icon-boutique"></i> Magasin & boutique</a></li>
                        <li><a href="#" data-cat-slug="restaurant"><i class="icon-boutique"></i> Restaurant</a></li>
                        <li><a href="#" data-cat-slug="marche"><i class="icon-marche"></i> Marché</a></li>
                        <li><a href="#" data-cat-slug="regroupement-de-producteurs"><i class="icon-regroupements"></i> Groupe producteurs</a></li>
                        <li><a href="#" data-cat-slug="vente-directe"><i class="icon-distributeur"></i> Casier automatique</a></li>
                    </ul>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">
                        <h3 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#modes-commande">Modes de commande</span><i
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
                            <a data-toggle="collapse" data-parent="#accordion" href="#certifications">Certifications <span>(Bio, label ...)</span><i
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
                        <li class="preference-item"><a href="#" data-preference="geolocate-me"><i class="icon-geoloc"></i> Me géolocaliser
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
                        <li class="preference-item"><a href="#" data-preference=""><i class="icon-open"></i> Ouvert actuellement <span
                                        class="onoffswitch">
                                    <span class="onoffswitch-label">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </span>
                                </span></a></li>
                        <li class="preference-item"><a href="#" data-preference=""><i class="icon-environnement"></i> 0 impact
                                environnement <span class="onoffswitch">
                                    <span class="onoffswitch-label">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </span>
                                </span></a></li>
                        <li class="preference-item"><a href="#" data-preference=""><i class="icon-chefs"></i> Nos chefs recommandent <span
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
                        <li><a href="#" ><i class="icon-saison"></i> Calendrier de saison</a></li>
                        <li><a href="#" ><i class="icon-prix-marche"></i> Prix du marché</a></li>
                        <li><a href="#" ><i class="icon-courses-en-ligne"></i> Courses en ligne</a></li>
                        <li><a href="#" ><i class="icon-bourse-transports"></i> Bourse aux transports</a></li>
                    </ul>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">
                        <h3 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#gestion-compte">Mon compte</span><i
                                        class="icon-liste-petit"></i></a>
                        </h3>
                    </div>
                    <ul id="gestion-compte" class="pushmenu-links collapse panel-collapse" role="tabpanel">
                        <li class="deconnexion"><a href="#" ><i class="icon-menu-fermer"></i> Déconnexion</a></li>
                    </ul>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">
                        <h3 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#partager-parrainer">Partager / parrainer</span><i
                                        class="icon-liste-petit"></i></a>
                        </h3>
                    </div>
                    <ul id="partager-parrainer" class="pushmenu-links collapse panel-collapse" role="tabpanel">

                    </ul>
                </div>


            </nav>
            <div id="header-search-logo"><a href="http://www.mooveat.co/" target="_blank" title="Plateforme mobile de connexion entre producteurs & consommateurs pour favoriser une alimentation variée à travers les structures de ventes directes et les circuits courts">&nbsp;</a></div>
            <div id="header-search-bar-input-container" class="ui-front scrollable">
                <i class="icon-infos-pratiques popup-search-info"></i>
                <input type="text" placeholder="Recherche" id="header-search-bar-input" class="map-search-input">
                <div class="placeholder-mask">
                    <div class="layer">Saisissez une adresse complète ou des mots clés parmi les propositions qui s'afficheront (mots clés séparés par un point-virgule)</div>
                </div>
                <div id="header-search-trigger" class="icon-loupe"></div>
                <div class="empty-input-trigger">&times;</div>
            </div>
        </div>
        <div id="splash-screen-container">
            <div class="row d-table">
                <div id="splash-screen-content" class="col-xs-12 d-cell v-centered">
                    <div id="splash-screen-logo" class="animate-flicker">
                        <a href="http://www.mooveat.co/" target="_blank" title="Plateforme mobile de connexion entre producteurs & consommateurs pour favoriser une alimentation variée à travers les structures de ventes directes et les circuits courts"><img src="<?php echo get_stylesheet_directory_uri().'/images/logos/'.'mooveat-logo-blanc.png';?>" width="300" height="auto" /></a>
                    </div>
                    <div class="mve-separator mve-large hidden"></div>
                    <div id="splash-screen-wrap">
                        <a href="http://www.mooveat.co/" class="logo-link" target="_blank" title="Plateforme mobile de connexion entre producteurs & consommateurs pour favoriser une alimentation variée à travers les structures de ventes directes et les circuits courts"><img src="<?php echo get_stylesheet_directory_uri().'/images/logos/'.'mooveat-logo-orange-500.png';?>" width="250" height="auto" /></a>
                        <div id="splash-screen-search-container">
                            <div class="before-ajax-info"></div>
                            <form class="form-horizontal mve-start-search">
                                <div class="form-group">
                                    <div class="col-xs-12 icon-geoloc splash-input-icon">
                                        <input type="text" class="form-control" id="inputGeoloc" placeholder="Je me géolocalise" readonly="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12 icon-loupe splash-input-icon">
                                        <input type="text" class="form-control" id="inputAddress" placeholder="Je saisis une adresse">
                                    </div>
                                </div>
                                <div class="mve-separator mve-small"></div>
                                <div class="form-group select-radius-container">
                                    <div class="col-xs-12">
                                        <p class="select-slider-info">
                                            <span>Dans un rayon de : </span><span class="selectedRadius"></span>
                                        </p>
                                        <select class="form-control selectRadius" id="selectRadius">
                                        </select>
                                    </div>
                                </div>
                                <div class="mve-separator"></div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button type="submit" class="btn btn-default orange-button">Rechercher</button>
                                    </div>
                                </div>
                            </form>
                            <div id="splash-screen-login-container">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <main id="main" class="site-main" role="main">

            <?php
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', 'homepage' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->
    <div id="infoModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-content-inner"><p>Infos Mooveat</p></div>
        </div>
    </div>

<?php
/*get_sidebar();*/
get_footer();
