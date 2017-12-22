<?php
/**
 * mooveat functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mooveat
 */

if ( ! function_exists( 'mooveat_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mooveat_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on mooveat, use a find and replace
	 * to change 'mooveat' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'mooveat', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'mooveat' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mooveat_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'mooveat_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mooveat_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mooveat_content_width', 640 );
}
add_action( 'after_setup_theme', 'mooveat_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mooveat_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mooveat' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mooveat' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mooveat_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mooveat_scripts() {

    wp_register_script( 'bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), NULL, true );
    wp_register_style( 'bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', false, NULL, 'all' );
    wp_enqueue_script( 'bootstrap-js' );
    wp_enqueue_style( 'bootstrap-css' );

	wp_enqueue_style( 'mooveat-style', get_stylesheet_uri() );
    wp_enqueue_style( 'custom-mooveat-style', get_template_directory_uri().'/scss/custom-mooveat.css' );

    if(get_page_template_slug()=="page-gravityform.php"){
        $gravity_handle = 'mve_gravity_css';
        $gravity_stylesheet = get_stylesheet_directory_uri() . '/scss/mve-gravity-styles.css';
        wp_enqueue_style( $gravity_handle, $gravity_stylesheet );
        wp_enqueue_script( 'mve_gravity_script', get_template_directory_uri() . '/js/mve-gravity.js', array('jquery','wpgmp-google-map-main'), '20170912', true );
    }

    /*wp_enqueue_style( 'sprites-1-mooveat-style', get_template_directory_uri().'/scss/icons-sprites-1.css' );
    wp_enqueue_style( 'sprites-2-mooveat-style', get_template_directory_uri().'/scss/icons-sprites-2.css' );
    wp_enqueue_style( 'sprites-3-mooveat-style', get_template_directory_uri().'/scss/icons-sprites-3.css' );*/

    wp_enqueue_script('jquery-ui-slider');
    wp_enqueue_script('jquery-ui-autocomplete');
    wp_enqueue_script('jquery-touch-punch');

    wp_enqueue_script( 'custom-mve-script', get_stylesheet_directory_uri() . '/js/mooveat-custom.js', array( 'jquery','wpgmp-google-map-main' ),false, true );

	wp_enqueue_script( 'mooveat-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'mooveat-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		/*wp_enqueue_script( 'comment-reply' );*/
	}

    ?>
    <script>
        (function() {
            if (sessionStorage.fonts) {
                console.log("Fonts installed.");
                document.documentElement.classList.add('wf-active');
            } else {
                console.log("No fonts installed.");
            }
        })();
    </script>
    <link href='https://fonts.gstatic.com' rel='preconnect' crossorigin>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Nunito:300,400,700']
            },
            active: function() {
                sessionStorage.fonts = true;
            },
            timeout: 2000
        });
    </script>

    <?php

}
add_action( 'wp_enqueue_scripts', 'mooveat_scripts' );

function add_gravity_script_footer(){
    if(get_page_template_slug()=="page-gravityform.php"){
    ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAG7L67S2z2WRbU4LDS6PtqOQA3H7wGtq0&callback=initMap"
            async defer></script>
    <?php
    }
}

//add_action('wp_footer', 'add_gravity_script_footer',999);


function smartsupp_script(){
    echo '<!-- Start of Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = "eb126d7ef488c2bc7107c092d854e60a27757226";
window.smartsupp||(function(d) {
	var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
	s=d.getElementsByTagName("script")[0];c=d.createElement("script");
	c.type="text/javascript";c.charset="utf-8";c.async=true;
	c.src="//www.smartsuppchat.com/loader.js?";s.parentNode.insertBefore(c,s);
})(document);
</script>';
}

//add_action('wp_head', 'smartsupp_script');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**************************************************************************************************/
/**
 * custom login page
 */


// changing the logo link from wordpress.org to your site
function mve_login_url() {  return home_url(); }
add_filter( 'login_headerurl', 'mve_login_url' );

// changing the alt text on the logo to show your site name
function mve_login_title() { return get_option( 'blogname' ); }
add_filter( 'login_headertitle', 'mve_login_title' );

function my_login_logo() { ?>
    <?php $logoW = '320px';
    $logoH = '68px';
    ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url('/wp-content/themes/mooveat/images/logos/mooveat-logo-vert.png');
            padding-bottom: 0;
            -webkit-background-size: <?php echo $logoW . ' ' . $logoH ?>;
            -moz-background-size: <?php echo $logoW . ' ' . $logoH ?>;
            background-size: <?php echo $logoW . ' ' . $logoH ?>;
            width: <?php echo $logoW ?>;
            height: <?php echo $logoH ?>;
        }
        .newsociallogins{
            display: none !important;
        }
        h3{
            display: none !important;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


/**************************************************************************************************/
/**
 * remove admin bar for logged in users
 */

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}

/**************************************************************************************************/
/**
 *add favicons
 */

add_action('wp_head', 'add_mve_favicons');
function add_mve_favicons()
{
    ?>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="apple-touch-icon" href="/apple-touch-icon.png"/>
    <link rel="apple-touch-icon" sizes="57x57"
          href="/apple-touch-icon-57x57.png"/>
    <link rel="apple-touch-icon" sizes="72x72"
          href="/apple-touch-icon-72x72.png"/>
    <link rel="apple-touch-icon" sizes="76x76"
          href="/apple-touch-icon-76x76.png"/>
    <link rel="apple-touch-icon" sizes="114x114"
          href="/apple-touch-icon-114x114.png"/>
    <link rel="apple-touch-icon" sizes="120x120"
          href="/apple-touch-icon-120x120.png"/>
    <link rel="apple-touch-icon" sizes="144x144"
          href="/apple-touch-icon-144x144.png"/>
    <link rel="apple-touch-icon" sizes="152x152"
          href="/apple-touch-icon-152x152.png"/>
    <?php
}

/**************************************************************************************************/
// Allow SVG
/*add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
        return $data;
    }

    $filetype = wp_check_filetype( $filename, $mimes );

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];

}, 10, 4 );

function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );
*/

/**************************************************************************************************/
// ACF settings

add_action('save_post', 'assign_parent_terms', 15, 2);

function assign_parent_terms($post_id, $post){

    $post_type = $post->post_type;
    if($post_type != 'cpt_producteur' && $post_type != 'cpt_point_de_vente' && $post_type != 'cpt_mooveat_client' )
        return $post_id;

    // get all assigned terms
    $terms = wp_get_post_terms($post_id, 'categorie_producteur_point_vente', array('orderby' => 'term_id', "fields" => "all"));
    //error_log('assign_parent_terms action :' . $post_id . ' // ' . print_r($terms, TRUE) );

    foreach($terms as $term){
        while($term->parent != 0 && $term->parent != 671){ // id of category "Produits" is 671
            // move upward until we get to 0 level terms
            wp_set_post_terms($post_id, array($term->parent), 'categorie_producteur_point_vente', true);
            $term = get_term($term->parent, 'categorie_producteur_point_vente');
        }
    }

}

/*add_action('pmxi_saved_post', 'test_pmxi_saved_post', 10, 2);
function test_pmxi_saved_post($post_id){
    $terms = wp_get_post_terms($post_id, 'categorie_producteur_point_vente' );
    error_log('pmxi_saved_post action :' . $post_id . ' // ' . print_r($terms, TRUE) );
}*/

add_action('save_post', 'set_full_address', 16, 2);

function set_full_address($post_id, $post){
    if($post->post_type != 'cpt_producteur' && $post->post_type != 'cpt_point_de_vente' && $post->post_type != 'cpt_mooveat_client' )
        return $post_id;

    if(empty(get_field('adresse',$post_id)) || strlen(get_field('adresse',$post_id))<5){
        $full_address = '';

        $full_address .= !empty(get_field('adresse_rue',$post_id))? get_field('adresse_rue',$post_id) . ', ' . get_field('code_postal',$post_id) . ' ' . get_field('ville',$post_id) . ', ' . get_field('pays',$post_id) : get_field('code_postal',$post_id) . ' ' . get_field('ville',$post_id) . ', ' . get_field('pays',$post_id);

        update_field('adresse', $full_address, $post_id);
    }
}


add_action('save_post', 'set_place_meta_arrays', 17, 2);

function set_place_meta_arrays($post_id,$post){

    if($post->post_type != 'cpt_producteur' && $post->post_type != 'cpt_point_de_vente' && $post->post_type != 'cpt_mooveat_client' )
        return $post_id;

    $markerPath = get_template_directory_uri() . '/images/markers/';
    $iconPath = get_template_directory_uri() . '/images/icones/';

    $post_taxonomies = get_post_taxonomies($post_id);

    if ($post_taxonomies) {
        foreach ($post_taxonomies as $k => $tax) {
            $term_list = wp_get_post_terms($post_id, $tax, array('orderby' => 'term_id', "fields" => "all")); // order by term id to use hierarchy
            $meta_value = '';
            $tags_links = array();

            $category_count = 0;
            //error_log('set_place_meta_arrays ' . print_r($term_list, TRUE) );
            if ($term_list) {
                $markerIcon = '';
                $place_location_icons = array();
                foreach ($term_list as $tag) {
                    $tags_links[] = $tag->name;
                    $thisSlug = $tag->slug;
                    if($tax=='categorie_producteur_point_vente' && $thisSlug!="produits" && $thisSlug!="producteur" && $thisSlug!="point-de-vente"){

                        $ancestors = get_ancestors($tag->term_id,$tax,'taxonomy');

                        $typologieSlug = get_term(end($ancestors), $tax)->slug; // produits, producteurs, points de vente ou labels

                        if($typologieSlug != "label" && $typologieSlug != "produits"){
                            $mainAncestorSlug = get_term($ancestors[count($ancestors)-2], $tax)->slug;
                        }
                        else{
                            $mainAncestorSlug = $typologieSlug;
                        }

                        //error_log( 'Ancestors: ' . print_r($ancestors, TRUE) );

                        if($mainAncestorSlug && $mainAncestorSlug!=''){
                            if($mainAncestorSlug!='produits'){
                                $markerIcon = $markerPath . $mainAncestorSlug . 'x2.png';
                                $place_location_icons[] = $mainAncestorSlug;
                                $place['mooveat_icon_url'][] = $iconPath . 'icone-' . $mainAncestorSlug . '.png';
                                $place['mooveat_icon_url'] = array_unique($place['mooveat_icon_url']);
                            }
                            else{
                                $markerIcon = $markerPath . 'generique' . 'x2.png';
                                $place_location_icons[] = 'generique';
                            }
                        }
                        else{
                            $markerIcon = $markerPath . $thisSlug . 'x2.png';
                            $place_location_icons[] = $thisSlug;
                            $place['mooveat_icon_url'][] = $iconPath . 'icone-' . $thisSlug . '.png';
                            $mainAncestorSlug = $thisSlug;
                        }


                        $place['categories'][$category_count]['name'] = $tag->name;
                        $place['categories'][$category_count]['slug'] = $tag->slug;
                        $place['categories'][$category_count]['parent_slug'] = $mainAncestorSlug;
                        $place['categories'][$category_count]['id'] = $tag->term_id;
                        $place['categories'][$category_count]['type'] = 'category';
                        $place['categories'][$category_count]['icon'] = $markerIcon;
                        $category_count++;
                        //$cat_mooveat_id++;
                    }
                }
                $place_location_icons = array_unique($place_location_icons);
                //error_log( print_r($place_location_icons, TRUE) );
                if(count($place_location_icons)>1){
                    foreach ($place_location_icons as $i=>$icon){
                        if($icon!='generique' && $icon!='label'){
                            $place['location']['icon'] = $markerPath . $icon . 'x2.png';
                            //error_log($icon);
                        }
                    }
                }
                else{
                    $place['location']['icon'] = $markerPath . $place_location_icons[0] . 'x2.png';
                }


                if($place['location']['icon']=='' || empty($place['location']['icon'])){
                    $place['location']['icon'] = $markerPath . 'generique' . 'x2.png';
                }
            }
        }
    }

    $place_mooveat_icon_url = $place['mooveat_icon_url'];
    update_post_meta($post_id, 'place_mooveat_icon_url', $place_mooveat_icon_url);

    //error_log( 'place_mooveat_icon_url get_post_meta: ' . print_r(get_post_meta($post_id, 'place_mooveat_icon_url'), TRUE) );

    $place_categories_meta = $place['categories'];
    update_post_meta($post_id, 'place_categories_meta', $place_categories_meta);

    //error_log( 'place_categories_meta get_post_meta: ' . print_r(get_post_meta($post_id, 'place_categories_meta'), TRUE) );

    $place_location_icon = $place['location']['icon'];
    update_post_meta($post_id, 'place_location_icon', $place_location_icon);

    //error_log( 'place_location_icon get_post_meta: ' . print_r(get_post_meta($post_id, 'place_location_icon'), TRUE) );

};

/**************************************************************************************************/
// ACF settings

function cat_prod_point_vente_label_query( $args, $field ) { // set the list of cats for each acf fields

    global $post;
    //error_log('$post_id = ' . $post->post_title);

    if($post->post_type != 'cpt_producteur' && $post->post_type != 'cpt_point_de_vente' && $post->post_type != 'cpt_mooveat_client' )
        return $args;

    $mainCatSlugArray = array('ferme'=>'categorie_ferme','viticulteur-alcool'=>'categorie_viticulteur-alcool','magasin-boutique'=>'categorie_magasin-boutique','marche'=>'categorie_marche','restaurant'=>'categorie_restaurant','vente-directe'=>'categorie_vente-directe','regroupement-de-producteurs'=>'categorie_regroupement-de-producteurs','cueillette'=>'categorie_cueillette','produits'=>'produits_liste','label'=>'label_producteur');

    foreach ($mainCatSlugArray as $catSlug=>$fieldName){
        $catId = get_term_by( 'slug', $catSlug, 'categorie_producteur_point_vente')->term_id;
        if($field['_name']=='categorie_principale'){
            continue;
        }
        else if($field['_name']==$fieldName){
            $args['child_of'] = $catId;
            return $args;
        }
    }

    $producteurId = get_term_by( 'slug', 'producteur', 'categorie_producteur_point_vente')->term_id;
    $pointVenteId = get_term_by( 'slug', 'point-de-vente', 'categorie_producteur_point_vente')->term_id;

    $args1 = array(
        'parent' => $producteurId,
        'taxonomy' => 'categorie_producteur_point_vente',
        'hide_empty' => 0,
        'hierarchical' => true,
        'fields' => 'ids'
    );
    $args2 = array(
        'parent' => $pointVenteId,
        'taxonomy' => 'categorie_producteur_point_vente',
        'hide_empty' => 0,
        'hierarchical' => true,
        'fields' => 'ids'
    );
    $cats1 = get_terms( $args1 );
    $cats2 = get_terms( $args2 );

    $mainCats = array_merge($cats1,$cats2);
    if($field['_name']=='categorie_principale'){
        $args['include'] = implode(",",$mainCats);
        return $args;
    }

}

add_filter('acf/fields/taxonomy/wp_list_categories', 'cat_prod_point_vente_label_query', 10, 2);


function mve_acf_load_value( $value, $post_id, $field ) // load cats in acf fields for each custom post
{
    //error_log(print_r($value, TRUE));
    //error_log(print_r($field['_name'], TRUE));

    global $post;

    if($post->post_type != 'cpt_producteur' && $post->post_type != 'cpt_point_de_vente' && $post->post_type != 'cpt_mooveat_client' )
        return $value;

    if(current_user_can('edit_post', $post_id) && $field['taxonomy']=='categorie_producteur_point_vente'){

        if(empty($value)){
            if(empty($terms)) $terms = wp_get_post_terms($post_id, 'categorie_producteur_point_vente' );

            $mainCatSlugArray = array('ferme'=>'categorie_ferme','viticulteur-alcool'=>'categorie_viticulteur-alcool','magasin-boutique'=>'categorie_magasin-boutique','marche'=>'categorie_marche','restaurant'=>'categorie_restaurant','vente-directe'=>'categorie_vente-directe','regroupement-de-producteurs'=>'categorie_regroupement-de-producteurs','cueillette'=>'categorie_cueillette','produits'=>'produits_liste','label'=>'label_producteur');

            if($field['_name'] == 'categorie_principale'){
                $producteurId = get_term_by( 'slug', 'producteur', 'categorie_producteur_point_vente')->term_id;
                $pointVenteId = get_term_by( 'slug', 'point-de-vente', 'categorie_producteur_point_vente')->term_id;

                $args1 = array(
                    'parent' => $producteurId,
                    'taxonomy' => 'categorie_producteur_point_vente',
                    'hide_empty' => 0,
                    'hierarchical' => true,
                    'fields' => 'ids'
                );
                $args2 = array(
                    'parent' => $pointVenteId,
                    'taxonomy' => 'categorie_producteur_point_vente',
                    'hide_empty' => 0,
                    'hierarchical' => true,
                    'fields' => 'ids'
                );
                $cats1 = get_terms( $args1 );
                $cats2 = get_terms( $args2 );

                $cats = array_merge($cats1,$cats2);

                //error_log(print_r($cats, TRUE));

                $termArray = array();

                foreach($terms as $term){
                    $termId = $term->term_id;
                    if(in_array($termId,$cats)){
                        $termArray[] = $term->term_id;
                    }
                }
                //error_log(print_r($termArray, TRUE));
                //update_field($field['name'], $termArray, $post_id);
                $value = $termArray;
            }
            else{
                foreach ($mainCatSlugArray as $catSlug => $fieldName){
                    $catId = get_term_by( 'slug', $catSlug, 'categorie_producteur_point_vente')->term_id;
                    if($field['_name'] == $fieldName){
                        $args = array(
                            'child_of' => $catId,
                            'taxonomy' => 'categorie_producteur_point_vente',
                            'hide_empty' => 0,
                            'hierarchical' => true,
                            'fields' => 'ids'
                        );

                        $cats = get_terms($args);
                        $termArray = array();

                        foreach($terms as $term){
                            $termId = $term->term_id;
                            if(in_array($termId,$cats)){
                                $termArray[] = $term->term_id;
                            }
                        }
                        //error_log(print_r($termArray, TRUE));
                        //update_field($field['name'], $termArray, $post_id);
                        $value = $termArray;
                    }
                }
            }
        }

    }

    return $value;
}

add_filter('acf/load_value', 'mve_acf_load_value', 10, 3);


/**************************************************************************************************/
// USERS CUSTOM FIELDS
/**************************************************************************************************/


function mve_additional_profile_fields( $user ) {

    $default_user_type = 1;
    $mve_user_type = get_user_meta($user->ID,'mve_user_type',true) > 0 ? get_user_meta($user->ID,'mve_user_type',true) : 1;
    $mve_activity_field = get_user_meta($user->ID,'mve_activity_field',true) > 0 ? get_user_meta($user->ID,'mve_activity_field',true) : 1;

    $pro_activity_fields = array(1=>'Producteur', 2=>'Point de vente', 3=>'Restaurateur', 4=>'Prestataire logistique', 5=>'');

    ?>
    <h3>Champs utilisateurs Mooveat</h3>

    <table class="form-table">
        <tr>
            <th><label for="mve-user-type">Type utilisateur</label></th>
            <td>
                <select id="mve-user-type" name="mve_user_type">
                    <option value="1" <?php selected( $mve_user_type, 1 ); ?>>Particulier</option>
                    <option value="2" <?php selected( $mve_user_type, 2 ); ?>>Professionnel</option>
                    <option value="3" <?php selected( $mve_user_type, 3 ); ?>>Team Mooveat</option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="mve-activity-field">Domaine d'activité</label></th>
            <td>
                <select id="mve-activity-field" name="mve_activity_field">
                    <?php
                        foreach ( $pro_activity_fields as $activity_id => $activity_field ) {
                            printf( '<option value="%1$s" %3$s>%2$s</option>', $activity_id, $activity_field ,selected( $mve_activity_field, $activity_id, false ) );
                        }
                    ?>
                </select>
            </td>
        </tr>
    </table>
    <?php
}

add_action( 'show_user_profile', 'mve_additional_profile_fields' );
add_action( 'edit_user_profile', 'mve_additional_profile_fields' );

function mve_save_profile_fields( $user_id ) {

    $mve_activity_field = $_POST['mve_activity_field'];

    if ( ! current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }

    if ( empty( $_POST['mve_user_type'] )) {
        return false;
    }

    if($_POST['mve_user_type']==1 || $_POST['mve_user_type']==3){
        $mve_activity_field = 5;
    }


    update_user_meta( $user_id, 'mve_user_type', $_POST['mve_user_type'] );
    update_user_meta( $user_id, 'mve_activity_field', $mve_activity_field);
}

add_action( 'personal_options_update', 'mve_save_profile_fields' );
add_action( 'edit_user_profile_update', 'mve_save_profile_fields' );



add_filter( 'registration_errors', 'mve_registration_errors', 10, 3 );
function mve_registration_errors( $errors, $sanitized_user_login, $user_email ) {

    if ( empty($_POST['mve_user_type']) || (!empty( $_POST['mve_user_type'] ) && trim( $_POST['mve_user_type'] ) == '')) {
        $errors->add( 'mve_user_type_error', __('Erreur. Merci de définir votre profil utilisateur.') );
    }

    if (empty($_POST['mve_activity_field']) || (!empty( $_POST['mve_activity_field'] ) && trim( $_POST['mve_activity_field'] ) == '')) {
        $errors->add( 'mve_activity_field_error', __("Erreur. Valeur incorrecte pour le domaine d'activité.") );
    }

    return $errors;
}

add_action( 'user_register', 'mve_user_register' );
function mve_user_register( $user_id ) {

    if ( ! empty( $_POST['mve_user_type'] ) ) {
        update_user_meta( $user_id, 'mve_user_type', trim( $_POST['mve_user_type'] ) );
    }
    $mve_activity_field = $_POST['mve_activity_field'];

    if ( ! empty( $_POST['mve_activity_field'] ) ) {
        if($_POST['mve_user_type']==1 || $_POST['mve_user_type']==3){
            $mve_activity_field = 5;
        }
        update_user_meta( $user_id, 'mve_activity_field', trim($mve_activity_field) );
    }
}

/**************************************************************************************************/
// Redirection after login et reset passw

function mve_to_home_redirect() {
    wp_redirect( home_url() );
    exit;
}
add_action('after_password_reset', 'mve_to_home_redirect');

/*add_filter('retrieve_password_message', 'mve_reset_msg', 10, 2);
function mve_reset_msg($message, $reset_key)
{

}*/

/**************************************************************************************************/
// Disable search page
function disablesearch_filter_query( $query, $error = true ) {

    if ( is_search() && !is_admin()) {
        $query->is_search = false;
        $query->query_vars['s'] = false;
        $query->query['s'] = false;

// to error
        if ( $error == true )
            $query->is_404 = true;
    }
}

add_action( 'parse_query', 'disablesearch_filter_query' );
add_filter( 'get_search_form', create_function( '$a', "return null;" ) );

/**************************************************************************************************/
// TEMPORARY WP ALL IMPORT
/**************************************************************************************************/
/**************************************************************************************************/

//add_filter( 'wp_all_import_is_check_duplicates', 'wpai_is_check_duplicates', 10, 2 );

function wpai_is_check_duplicates( $is_check_duplicates, $import_id ) {
    return false;
}

/**************************************************************************************************/
// Admin CSS
function mve_admin_css() {

    $admin_handle = 'mve_admin_css';
    $admin_stylesheet = get_stylesheet_directory_uri() . '/scss/mve_admin_css.css';

    wp_enqueue_style( $admin_handle, $admin_stylesheet );
}
add_action('admin_print_styles', 'mve_admin_css', 11 );



/**************************************************************************************************/
/* Function which remove Plugin Update Notices – WP Google Map*/
function disable_plugin_updates( $value ) {
    if(isset($value->response['wp-google-map-gold/wp-google-map-gold.php']))
        unset( $value->response['wp-google-map-gold/wp-google-map-gold.php'] );
    return $value;
}
add_filter( 'site_transient_update_plugins', 'disable_plugin_updates' );



/**************************************************************************************************/
/* GRAVITY FORM HOOKS */

function add_gravity_styles_scripts($form){
    return $form;
}

//add_filter( 'gform_pre_render_1', 'add_gravity_styles_scripts' );