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

    function fc_check_fields($fc_fields_array)
    {

        $output = array();
        foreach ($fc_fields_array as $f_field) {
            $output[] = get_field($f_field);
        }

        $output = array_filter($output);

        if (empty($output)) {
            return false;
        }

        return true;
    }

    ?>
    <form action="#">
        <select name="#" id="category-selector" class="select-dropdown custom-select"
                onchange="location = this.options[this.selectedIndex].value;">
            <option value="1">Select</option>
            <?php
            foreach ($fields_tabs as $tab => $fields) {

                if ( fc_check_fields($fields) ) {
                    echo '<option value="#' . $fields[0] . '">' . $tab . '</option>';
                }

            }
            ?>
        </select>
    </form>

    <!--Chart-->

    <div class="bar-chart">
        <ul>

            <?php

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
                    foreach ($months as $month) {
                        $season = get_sub_field($month);
                        $abvr = $month[0];

                        switch ($season) {
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
                        echo '<div class="' . $b_class . '"></div>';
                        echo '<div class="bar-label">' . $abvr . '</div>';

                        echo '</li>';
                    }

                endwhile;

            endif;



            ?>

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


<?php

foreach ($fields_tabs as $tab => $fields) {
    if (fc_check_fields($fields)) {
        echo '<h2>'.$tab.'</h2>';

    foreach ($fields as $field) {

        $field_obj = get_field_object($field);

        $field_types = array(
            'text',
            'wysiwyg',
            'number',
            'select',
        );

        if( in_array($field_obj['type'], $field_types) ) {

            if(get_field($field)){
                echo '<h3 id="carte">'.$field_obj['label'].'</h3>';
                the_field($field);
            }



        }

    }
    }

}




?>

    <a href="#" class="more">variétés ></a>
</div>





