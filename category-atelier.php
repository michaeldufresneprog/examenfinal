<?php get_header(); ?>
<p class='container'>Git,Sass,Grid,Thème WP</p>
<h1 class="container"></h1>
<h1 class='container tittle-des'><?php the_archive_description() ?></h1>
<section class="container section-nouvelle">
        <?php
        $query = new WP_Query( array( 'category_name' => "atelier",
        'posts_per_page' => 16,
        'order' => 'ASC'
        ));
        if ( $query->have_posts() ) {
            $compte = 0;
            $couleur = 0;
            while ( $query->have_posts() ) {
                    $query->the_post();
                    $heure = get_post_field('post_name');
                    $position = get_the_author_meta( 'display_name', $post->post_author );
                    switch ($position) {
                        case "Luna":
                            $position = 1;
                            break;
                        case "Eddy":
                            $position = 2;
                            break;
                        case "Derick":
                            $position = 3;
                            break;
                        case "Maybell":
                            $position = 4;
                            break;
                    }
                    $mystring = $heure;
                    $trouve   = '-';
                    $pos = strpos($mystring, $trouve);
                    $subtr = substr($heure,($pos + 1));
                    switch ($subtr) {
                        case "08":
                            $subtr = 2;
                            break;
                        case "10":
                            $subtr = 4;
                            break;
                        case "13":
                            $subtr = 7;
                            break;
                        case "15":
                            $subtr = 9;
                            break;
                    }
                    $array = ["Luna","Eddy","Derick","Maybell"];
                    $style = "title-name title-name" . $compte;
                    $texte =  "<div class=' . $style . '>" . $array[$compte] . "</div>";
                    $lunch = "<div class=' . $style . '>" . $array[$compte] . "</div>";
                    if($compte <= 3){
                        echo $texte;
                      
                    }
                    $compte ++;
                    $couleur = $couleur + 10;
                    $gridEnd = $subtr + 2;
                    $position = "grid-column-start:" . $position . ";";
                    $gridEnd = "grid-row-end:" . $gridEnd;
                    $heure = "grid-row-start:" . $subtr . ";";
					?><div style='<?php echo $heure .  $position . $gridEnd ?>' class = "structure-atelier">
                        <?php
                            //echo '<p class="p-tittle"><a href="'.get_permalink( $id ).'">' . get_the_title() . "___" . "<span class='span-1'>" . get_post_field('post_name') . "</span>" . "___" . "<span class='span-2'>" . get_the_author_meta( 'display_name', $post->post_author )   . "</span>" . '</a></p>';
                            echo "<p>" . get_the_title() . "</p>";
                            echo "<p>" . get_post_field('post_name') . "</p>";
                            echo "<p>" . get_the_author_meta( 'display_name', $post->post_author ) . "</p>";
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