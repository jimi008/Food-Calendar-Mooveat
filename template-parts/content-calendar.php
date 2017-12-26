<?php
/**
 * Template part for displaying calendar content in template-calendar.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mooveat
 */

?>

<!--close button-->

<div id="detail-header">

    <!--Head-->

    <?php
    $image = get_field('image_produit_alimentaire');
    $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
    ?>
    <div class="head">
        <div class="image-holder">
            <?php if (!empty($image)): ?>
                <img src="<?php echo $image['url']; ?>"
                     alt="<?php echo $image['alt']; ?>">
            <?php endif; ?>
        </div>
        <div class="product-title">
            <?php the_title(); ?>
        </div>
    </div>

    <!--Select-->
    <?php

    $fields_tabs = array(
        "Carte d'identité" => array(
            'carte_identite',
            'description_produit_alimentaire',
            'aspect',
            'dimensions',
            'affinage',
            'duree_affinage',
            'poids',
            'provenance_region',
            'provenance_departement',
        ),
        'Saison' => array(
            'saison',
            'quelques_chiffres',
        ),
        'Habitat' => array(
            'habitat',
            'repartition_geographique',
            'mode_de_vie',

        ),
        'Variétés' => array(
            'varietes',
            'variete',
        ),
        'Caractéristiques' => array(
            'caracteristiques',

        ),
        'Choisir & consommer' => array(
            'choisir_consommer',
            'preserver',
            'selectionner',
            'conserver',
            'labels_certifications',
            'conditionnement',
        ),
        'Cuisiner & Déguster' => array(
            'deguster',
            'preparer',
            'cuisiner',
            'utiliser',
            'associer',
            'eviter_gaspiller',
            'peser',
            'pour_parents',
        ),
        'Bien-être & nutrition' => array(
            'bien_etre_nutrition',
            'petit_plus',
            'composition_valeurs_nutritionnelles',
            'traitement_lait',
            'ingredients',
            'allergenes',

        ),
        'Pour les curieux' => array(
            'pour_curieux',
            'histoires_savoureuses',
            'fallait_savoir',

        ),
        'Techniques de pêche' => array(
            'techniques_peche',
            'peche_appats_naturels',
            'peche_leurres',

        ),
        'Un peu de botanique' => array(
            'un_peu_botanique',
            'botanique_chez_producteur',
            'botanique_noms_savants',
        ),
        'Un peu de biologie' => array(
            'un_peu_biologie',
            'noms_courants',
            'nom_scientifique',
            'noms_etrangers',
        )
    );

function fp_get_fields($f_fields_array){

    $output = array();
    foreach($f_fields_array as $f_field){
        $output[] = get_field($f_field);
    }

    $output = array_filter($output);

   if (empty($output)) {
        return false;
   }

   return true;
}


    //fp_get_fields($fields_tabs);


    ?>
    <form action="#">
        <select name="#" id="category-selector" class="select-dropdown custom-select"
                onchange="location = this.options[this.selectedIndex].value;">
            <option value="1">Select</option>
            <?php
            foreach($fields_tabs as $tab => $f_array)
            {
                if ( fp_get_fields($f_array) ){
                    echo '<option value="#'.$f_array[0].'">'.$tab.'</option>';
                }

                foreach( $f_array as $field ){

                }

            }
            ?>
        </select>
    </form>

    <!--Chart-->

    <div class="bar-chart">
        <ul>

            <?php
            //for ($i = 1; $i <= 12; $i++) {
                // check if the repeater field has rows of data
                if (have_rows('calendrier_zone_geo')):

                    // loop through the rows of data
                    while (have_rows('calendrier_zone_geo')) : the_row();


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
                        $season = get_sub_field($month);
                        $abvr = $month[0];

                        switch($season){
                            case 2:
                                $b_class = 'bar green triple-height';
                                break;
                            case 1:
                                $b_class = 'bar blue-green double-height';
                                break;
                            default:
                                $b_class = 'bar';
                        }
                        echo '<li>';
                            echo '<div class="'.$b_class.'"></div>';
                            echo '<div class="bar-label">'.$abvr.'</div>';

                        echo '</li>';
                    }







//                        switch ($i) {
//                            case 1:
//                                $season = f_get_months(janvier);
//                                break;
//                            case 2:
//                                $season = f_get_months(fevrier);
//                                break;
//                            case 3:
//                                $season = f_get_months(mars);
//                                break;
//                            case 4:
//                                $season = f_get_months(avril);
//                                break;
//                            case 5:
//                                $season = f_get_months(mai);
//                                break;
//                            case 6:
//                                $season = f_get_months(juin);
//                                break;
//                            case 7:
//                                $season = f_get_months(juillet);
//                                break;
//                            case 8:
//                                $season = f_get_months(aout);
//                                break;
//                            case 9:
//                                $season = f_get_months(septembre);
//                                break;
//                            case 10:
//                                $season = f_get_months(octobre);
//                                break;
//                            case 11:
//                                $season = f_get_months(novembre);
//                                break;
//                            case 12:
//                                $season = f_get_months(decembre);
//                                break;

//                        }

                    endwhile;

                endif;

//            }

            ?>




<!--            <li>-->
<!--                <div class="bar"></div>-->
<!--                <div class="bar-label">J</div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="bar"></div>-->
<!--                <div class="bar-label">F</div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="bar"></div>-->
<!--                <div class="bar-label">M</div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="bar blue-green double-height"></div>-->
<!--                <div class="bar-label">A</div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="bar green triple-height"></div>-->
<!--                <div class="bar-label">M</div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="bar green triple-height"></div>-->
<!--                <div class="bar-label">J</div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="bar"></div>-->
<!--                <div class="bar-label">J</div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="bar"></div>-->
<!--                <div class="bar-label">A</div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="bar"></div>-->
<!--                <div class="bar-label">S</div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="bar"></div>-->
<!--                <div class="bar-label">O</div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="bar"></div>-->
<!--                <div class="bar-label">N</div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="bar"></div>-->
<!--                <div class="bar-label">D</div>-->
<!--            </li>-->

        </ul>

        <div class="legends">
            <div class="legend green">
                <div class="dot"></div>
                <div class="label">Pleine saison</div>
            </div>
            <div class="legend blue-green">
                <div class="dot"></div>
                <div class="label">Disponible</div>
            </div>
            <div class="legend">
                <div class="dot"></div>
                <div class="label">Indisponible</div>
            </div>
        </div>

    </div>
</div>


<!--Description-->
<div class="description">
    <h2 id="carte">Carte d’identité :</h2>
    <p>
        Originaire d’Asie centrale, la fève est aujourd’hui cultivée dans le monde entier.
        Généreuse, c’est un régal pour le palais. Elle se croque crue ou bien cuite. Grâce à sa
        facilité de conservation sèche, elle fut pendant longtemps un aliment de réserve
        essentiel
        face aux pénuries alimentaires.
    </p>
    <h2 id="bref">En bref : </h2>
    <p>
        Plus grosse graine de la grande famille des légumineuses, elle se cache dans une longue
        cosse aplatie.
        À la différence du haricot, elle possède une fine peau qu’il faut retirer avant de la
        croquer.
        À l’Épiphanie, elle se cache dans la galette des rois et symbolise une pièce de monnaie.
        La fève présente un éventail de qualités nutritionnelles et un fort pouvoir de satiété :
        croquez-en si vous avez un petit creux et vous tiendrez facilement jusqu’au prochain
        repas.
        Ne laissez pas passer la saison ! La fève est une plante annuelle qui n’est disponible
        que
        quelques semaines, d’avril à juillet.
    </p>
    <a href="#" class="more">variétés ></a>
</div>





