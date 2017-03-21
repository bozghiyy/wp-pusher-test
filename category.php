<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Accesspress Mag Pro
 */

get_header(); ?>
<div class="apmag-container">
    <?php
        $accesspress_mag_show_breadcrumbs = of_get_option('show_hide_breadcrumbs');
        if ((function_exists('accesspress_breadcrumbs') && $accesspress_mag_show_breadcrumbs == 1)) {
			    accesspress_breadcrumbs();
            }
    ?>

    <?php
    // AFISARE SLIDER CATEGORIE IN FUNCTIE DE CATEGORIA PARINTE PRINCIPALA
    $category = get_the_category();
    $i = 0;
    while (true){
      if ($category[$i]->term_id == 6486)
      { $i++; }
      else {
        $cat_tree = get_category_parents($category[$i]->term_id, FALSE, ':', TRUE);
        break;
      }
    }
    // $cat_tree = get_category_parents($category[$i]->term_id, FALSE, ':', TRUE);
    $top_cat = split(':',$cat_tree);
    $parent = $top_cat[0];



     echo do_shortcode('[rev_slider alias="' . $parent . '"]');
    ?>
    <br><br>
            <?php
                  $code = do_shortcode('
                          <div align="center" class="publicitate" style="padding: 20px 0 20px 0; margin: 0 auto;">
                            [notdevice]
                              <div id="div-gpt-ad-FEM_Top2_Desktop" style="margin:0;padding:0">
                                <script type="text/javascript">
                                  googletag.cmd.push(function() { googletag.display("div-gpt-ad-FEM_Top2_Desktop"); });
                                </script>
                              </div>              
                            [/notdevice]              
                          </div>');         
                  echo $code;
            ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">





		<?php
            if ( have_posts() ) :
        ?>



			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
                    get_template_part( 'content', 'archive-default' );
				?>

			<?php endwhile; wp_reset_query(); ?>

			<?php accesspress_mag_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
    if( is_category() ) {
        $cat_id = get_query_var( 'cat' );
        $global_sidebar = of_get_option( 'global_archive_sidebar', 'right-sidebar' );
        $category_sidebar = of_get_option( $cat_id.'_cat_sidebar', 'global-sidebar' );
        if( $category_sidebar == 'global-sidebar' ){
            $sidebar_option = $global_sidebar;
        } else {
            $sidebar_option = $category_sidebar;
        }
        if( $sidebar_option != 'no-sidebar' ){
            $option_value = explode( '-', $sidebar_option );
            get_sidebar( $option_value[0] );
        }
    } else {
        $sidebar_option = of_get_option( 'global_archive_sidebar', 'right-sidebar' );
        if( $sidebar_option != 'no-sidebar' ){
               $option_value = explode( '-', $sidebar_option );
               get_sidebar( $option_value[0] );
        }
    }
?>
</div>
<?php get_footer(); ?>
