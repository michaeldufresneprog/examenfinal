<?php get_header(); ?>
<h1 class="container">Nos événements important cette année</h1>
<section class="container section-grid">
        <?php
        $query = new WP_Query( array( 'category_name' => "evenement",
        'date_query' => array(
            'column' => 'post_date',
            'after' => '2019-09-01',
            'before' => '2019-11-31' 
          ),));
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                    $query->the_post();
                    $jour = get_the_date("j");
                    $mois = get_the_date("m");
                    switch ($mois) {
                        case 9:
                            $mois =1;
                            break;
                        case 10:
                            $mois =2;
                            break;
                        case 11:
                            $mois =3;
                            break;
                        default:
                    }
                    $jour++;
                    $stylB = "grid-row-end:" .  $jour;
                    $stylA = "grid-column-start:" . $mois;
                    $texte = $stylB . ";" . $stylA;
					?><div class="border-div" style="<?php echo $texte ?>" class = "structure-evenement">
                        <?php
                            echo '<p class="p-tittle"><a href="'.get_permalink( $id ).'">' . get_the_title() .  '</a></p>';
                            echo "<p>" . get_the_date() . "</p>";
                        ?>
					</div>
					<?php
                }
        } 
        else {
            echo "no found";
        }
        wp_reset_postdata();
        ?>
</section>
<?php get_footer(); ?>