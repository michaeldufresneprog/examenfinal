<?php get_header(); ?>
<h1 class="container">Nos événements important cette année</h1>
<section class="container section-nouvelle">
        <?php
        $query = new WP_Query( array( 'category_name' => "atelier",
        'order' => 'ASC'
        ));
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                    $query->the_post();
					?><div class="div-atelier"class = "structure-atelier">
                        <?php
                            echo '<p class="p-tittle"><a href="'.get_permalink( $id ).'">' . get_the_title() . "___" . "<span class='span-1'>" . get_post_field('post_name') . "</span>" . "___" . "<span class='span-2'>" . get_the_author_meta( 'display_name', $post->post_author )   . "</span>" . '</a></p>';
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