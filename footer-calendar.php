<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mooveat
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer footer" role="contentinfo">
    <div class="site-info">
        <span>Copyright &copy; 2017, Mooveat</span>
        <span class="sep"> | </span>
    </div><!-- .site-info -->
    <div class="mve-footer-links">
        <span>Conditions générales d'utilisation</span>
        <span class="sep"> | </span>
        <span>Contactez-nous</span>
        <span class="sep"> | </span>
        <span>Mentions légales</span>
        <span class="sep"> | </span>
        <span>Crédits</span>
        <span class="sep"> | </span>
        <span><i class="icon-facebook-02"></i></span>
        <span>&nbsp;&nbsp;</span>
        <span><i class="icon-twitter-02"></i></span>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<script>
    <?php
    global $food_family;
    $args = array(
        'post_type' => 'mve_produit_alim',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
//        'post_parent' => 0,
        'tax_query' => array(
            array(
                'taxonomy' => 'categorie_produit_alimentaire',
                'field' => 'term_id',
                'terms' => $food_family,
            ),
        ),
    );

    // the query
    $foods_parent_query = new WP_Query($args);

    if ($foods_parent_query->have_posts()) :

    while ($foods_parent_query->have_posts()) : $foods_parent_query->the_post();

    global $post;

    $availableFood[] = array(
        'label'  => get_post_field('post_title', $post_id, 'raw'),
        'value' => $post->post_name
    );

    endwhile;

    ?>
    //All parent food items
    var availableFood = <?php echo json_encode($availableFood, JSON_PRETTY_PRINT) ?>;
    <?php
    wp_reset_postdata();

    endif;
    ?>

</script>
<?php wp_footer(); ?>

</body>
</html>
