<?php get_header(); ?>
<p class='container'>Git,Sass,Grid,Thème WP</p>
<h1 class="container"></h1>
<h1 class='container tittle-des'><?php the_archive_description() ?></h1>
<section class="container section-nouvelle">
        <?php
        $query = new WP_Query( array( 'category_name' => "atelier",
        'order' => 'ASC'
        ));
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                    $query->the_post();
                    $heure = get_post_field('post_name');
                    $mystring = $heure;
                    $trouve   = '-';
                    $pos = strpos($mystring, $trouve);
                    $subtr = substr($heure,($pos + 1));
                    if($subtr == "08"){
                        $subtr = 8;
                    }
                    echo $subtr;
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