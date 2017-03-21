<?php
/* Template Name: CategoriesPage */


get_header(); ?>
	<div class="apmag-container">
        <?php
            $accesspress_mag_show_breadcrumbs = of_get_option( 'show_hide_breadcrumbs' );
                if ( ( function_exists( 'accesspress_breadcrumbs' ) && $accesspress_mag_show_breadcrumbs == 1 ) ) {
    				    accesspress_breadcrumbs();
                    }
        ?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php
	                   	// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // end of the loop. ?>

				<ul>
				    <?php wp_list_categories( array(
				        'orderby'    => 'name',
				        'show_count' => true
				    ) ); ?>
				</ul>





			</main><!-- #main -->
		</div><!-- #primary -->

<?php
    global $post;
    $page_sidebar = get_post_meta( $post->ID, 'accesspress_mag_page_sidebar_layout', true );
    if( empty( $page_sidebar ) ) {
        $page_sidebar = 'right-sidebar';
    }
    if( $page_sidebar != 'no-sidebar' ) {
        $option_value = explode( '-', $page_sidebar );
        get_sidebar( $option_value[0] );
    }
?>
</div>
<?php get_footer(); ?>
