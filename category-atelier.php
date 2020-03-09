<?php get_header(); ?>
<h1 class="container">Nos événements important cette année</h1>
<section class="container section-nouvelle">
        <?php
        $query = new WP_Query( array( 'category_name' => "atelier",
        ));
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                    $query->the_post();
					?><div class="div-atelier"class = "structure-atelier">
                        <?php
                            echo '<p class="p-tittle"><a href="'.get_permalink( $id ).'">' . get_the_title() .  '</a></p>';
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