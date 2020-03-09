<?php
/**
 * The template for displaying all page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Astral
 * @since 0.1
 */
get_header();
/* 
* Functions hooked into astral_top_banner action
* 
* @hooked astral_inner_banner
*/
do_action( 'astral_top_banner' );
/* 
* Functions hooked into astral_breadcrumb_area action
* 
* @hooked astral_breadcrumb_area
*/
do_action( 'astral_breadcrumb_area' );
?>

<?php underscores_post_thumbnail(); ?>
<?php
?>
<section class="container">
    <h2 class=>Mes dernières conférences</h2>
    <!--<p>Je suis modifié par le front-page .php</p>-->
    <div id="primary" class="content-area">
        <main id="main" class="site-main">

    <?php
    while ( have_posts() ) :
        the_post();
        $query = new WP_Query( array( 'category_name' => "conference",
        'posts_per_page' => 3));
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
					$query->the_post();
					?><div class = "structure-conference">
					<?php
                    //echo '<p>' . the_excerpt() . '</p>';
					the_post_thumbnail("thumbnail");
					?>
					<div>
					<?php
						echo '<h1>' . get_the_title() .  '</h1>';
                        echo '<a href="'.get_permalink( $id ).'">' . get_the_date() . '</a>';
					?>
					</div>
					</div>
					<?php
                }
        } 
        else {
            echo "no found";
        }
        wp_reset_postdata();
        ?>
        <h1>Voici les dernières nouvelles</h1>
        <div class="div-nouvelle">
        <?php
        $query = new WP_Query( array( 'category_name' => "nouvellle",
        'posts_per_page' => 4));
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
					$query->the_post();
					?><div class = "structure-nouvelle">
                        <?php
                        //echo '<p>' . the_excerpt() . '</p>';
                        the_post_thumbnail("thumbnail");
                        ?>
                        <div>
                        <?php
                            echo '<h1><a href="'.get_permalink( $id ).'">' . get_the_title() .  '</a></h1>';
                            //echo '<a href="'.get_permalink( $id ).'">' . get_the_date() . '</a>';
                        ?>
                        </div>
					</div>
					<?php
                }
        } 
        else {
            echo "no found";
        }
        wp_reset_postdata();
        
        //echo get_the_title();
        // If comments are open or we have at least one comment, load up the comment template.

    endwhile; // End of the loop.
?>
</div>
</section>
<div class="a-link-evn container">
    <a href="category/evenement/">regardez nos évènements</a>
</div>
<?php

get_footer(); ?>
