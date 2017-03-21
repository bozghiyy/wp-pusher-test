<?php
/**
 * Default layout for Home page
 *
 * @package Accesspress Mag Pro
 */

$cat_link_option = of_get_option( 'home_cat_link', '' );
$fallback_image_option = of_get_option( 'fallback_image_option', '1' );
$fallback_image = of_get_option( 'fallback_image', get_template_directory_uri(). '/images/no-image.jpg' );
$apmag_overlay_icon = of_get_option( 'apmag_overlay_icon', 'fa-external-link' );
?>

<section class="first-block wow fadeInUp clearfix" data-wow-delay="0.5s">

    <?php
        $block1_cat = of_get_option( 'featured_block_1' );
        if( !empty( $block1_cat ) ):
                $posts_for_block1 = of_get_option( 'posts_for_block1' );
                $category_info = get_category_by_slug( $block1_cat );
                $category_id = $category_info->cat_ID;
                $category_link = get_category_link( $category_id );
                $category_name = $category_info->name;
     ?>
                <div class="first-block-wrapper">
                    <h2 class="block-cat-name"><span>
                        <?php
                            if ( $cat_link_option == 1 && !empty( $cat_link_option ) ) {
                        ?>
                            <a href="<?php echo esc_url( $category_link )?>" title="<?php echo esc_attr( $category_name );?>"><?php echo esc_attr( $category_name );?></a>
                        <?php
                            } else {
                                echo esc_attr( $category_name );
                            }
                        ?>
                    </span></h2>
                    <div class="block-post-wrapper clearfix">
     <?php
            $block1_args = array(
                                'post_type' => 'post',
                                'category_name' => $block1_cat,
                                'post_status' => 'publish',
                                'posts_per_page' => $posts_for_block1,
                                'order' => 'DESC'
                                );
            $block1_query = new WP_Query( $block1_args );
            $b_counter = 0;
            $total_posts_block1 = $block1_query->found_posts;
            if( $block1_query->have_posts() ) {
                while( $block1_query->have_posts() ) {
                    $b_counter++;
                    $block1_query->the_post();
                    $b1_image_id = get_post_thumbnail_id();
                    $b1_big_image_path = wp_get_attachment_image_src( $b1_image_id, 'accesspress-mag-block-big-thumb', true );
                    $b1_small_image_path = wp_get_attachment_image_src( $b1_image_id, 'accesspress-mag-block-small-thumb', true );
                    $b1_image_alt = get_post_meta( $b1_image_id, '_wp_attachment_image_alt', true );
                    $post_format = get_post_format( get_the_ID() );
                    if( $post_format == 'video' ){
                        $post_format_icon = 'fa-video-camera';
                        $show_icon = 'on';
                    } elseif( $post_format == 'audio' ){
                        $post_format_icon = 'fa-music';
                        $show_icon = 'on';
                    } elseif( $post_format == 'gallery' ){
                        $post_format_icon = 'fa-picture-o';
                        $show_icon = 'on';
                    } else{
                        $show_icon = 'off';
                    }
                    if( $b_counter == 1 ){ echo '<div class="toppost-wrapper clearfix">'; }
                    if( $b_counter > 2 && $b_counter == 3 ){ echo '<div class="bottompost-wrapper">'; }
    ?>
        <div class="single_post clearfix <?php if( $b_counter <= 2 ){ echo 'top-post'; }?>">
            <?php if( has_post_thumbnail() ){ ?>
                <div class="post-image"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><img src="<?php if( $b_counter <=2 ){echo esc_url( $b1_big_image_path[0] ) ;}else{ echo esc_url( $b1_small_image_path[0] );}?>" alt="<?php echo esc_attr( $b1_image_alt );?>" /></a>

                    <?php if( $show_icon == 'on' ){?><span class="format_icon <?php if( $b_counter > 2 ){ echo 'small'; }?>"><i class="fa <?php echo esc_attr( $post_format_icon );?>"></i></span><?php } ?>
                </div>
            <?php } else {
                        if( $fallback_image_option == 1 && !empty( $fallback_image ) ) {
            ?>
                <div class="post-image"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><img src="<?php echo esc_url( $fallback_image ); ?>" alt="<?php _e( 'Fallback Image',  'accesspress-mag' ); ?>" /></a>

                    <?php if( $show_icon == 'on' ){?><span class="format_icon <?php if( $b_counter > 2 ){ echo 'small'; }?>"><i class="fa <?php echo esc_attr( $post_format_icon );?>"></i></span><?php } ?>
                </div>
            <?php
                        }
                     }
            ?>
                <div class="post-desc-wrapper">
                    <h3 class="post-title line-clamp line-clamp-2"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                    <div class="ratings-wrapper"><?php do_action('accesspress_mag_post_review');?></div>
                    <div class="block-poston"><?php do_action( 'accesspress_mag_home_posted_on' );?></div>
                </div>
                <?php if( $b_counter <= 2 ):?><div class="post-content line-clamp line-clamp-4"><?php accesspress_mag_homepage_excerpt(); ?></div><?php endif ;?>
        </div>
    <?php
            if( $b_counter > 2 && $b_counter == $total_posts_block1 ){ echo '</div>'; }
            if( $b_counter == 2){ echo '</div>'; }
                }
            }
    ?>
            </div>
        </div>
    <?php
        endif;
        wp_reset_query();
    ?>
</section>


<section class="second-block clearfix wow fadeInLeft" data-wow-delay="0.5s">

    <?php
        $block2_cat = of_get_option( 'featured_block_2' );
        if( !empty( $block2_cat ) ):
                $posts_for_block2 = of_get_option( 'posts_for_block2' );
                $category_info = get_category_by_slug( $block2_cat );
                $category_id = $category_info->cat_ID;
                $category_link = get_category_link( $category_id );
                $category_name = $category_info->name;
     ?>
                <div class="second-block-wrapper">
                    <h2 class="block-cat-name"><span>
                        <?php
                            if ( $cat_link_option == 1 && !empty( $cat_link_option ) ) {
                        ?>
                            <a href="<?php echo esc_url( $category_link )?>" title="<?php echo esc_attr( $category_name );?>"><?php echo esc_attr( $category_name );?></a>
                        <?php
                            } else {
                                echo esc_attr( $category_name );
                            }
                        ?>
                    </span></h2>
                    <div class="block-post-wrapper clearfix">
     <?php
            $block2_args = array(
                                'post_type' => 'post',
                                'category_name' => $block2_cat,
                                'post_status' => 'publish',
                                'posts_per_page' => $posts_for_block2,
                                'order' => 'DESC'
                                );
            $block2_query = new WP_Query( $block2_args );
            $b_counter = 0;
            $total_posts_block2 = $block2_query->found_posts;
            if( $block2_query->have_posts() ) {
                while( $block2_query->have_posts() ) {
                    $b_counter++;
                    $block2_query->the_post();
                    $b2_image_id = get_post_thumbnail_id();
                    $b2_big_image_path = wp_get_attachment_image_src( $b2_image_id, 'accesspress-mag-block-big-thumb', true );
                    $b2_small_image_path = wp_get_attachment_image_src( $b2_image_id, 'accesspress-mag-block-small-thumb', true );
                    $b2_image_alt = get_post_meta( $b2_image_id, '_wp_attachment_image_alt', true );
                    $post_format = get_post_format( get_the_ID() );
                    if( $post_format == 'video' ){
                        $post_format_icon = 'fa-video-camera';
                        $show_icon = 'on';
                    } elseif( $post_format == 'audio' ){
                        $post_format_icon = 'fa-music';
                        $show_icon = 'on';
                    } elseif( $post_format == 'gallery' ){
                        $post_format_icon = 'fa-picture-o';
                        $show_icon = 'on';
                    } else{
                        $show_icon = 'off';
                    }
                    if( $b_counter == 1 ){ echo '<div class="toppost-wrapper clearfix">'; }
                    if( $b_counter > 2 && $b_counter == 3 ){ echo '<div class="bottompost-wrapper">'; }
    ?>
        <div class="single_post clearfix <?php if( $b_counter <= 2 ){ echo 'top-post'; }?>">
            <?php if( has_post_thumbnail() ){ ?>
                <div class="post-image"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><img src="<?php if( $b_counter <=2 ){echo esc_url( $b2_big_image_path[0] ) ;}else{ echo esc_url( $b2_small_image_path[0] );}?>" alt="<?php echo esc_attr( $b2_image_alt );?>" /></a>

                    <?php if( $show_icon == 'on' ){?><span class="format_icon <?php if( $b_counter > 2 ){ echo 'small'; }?>"><i class="fa <?php echo esc_attr( $post_format_icon );?>"></i></span><?php } ?>
                </div>
            <?php } else {
                        if( $fallback_image_option == 1 && !empty( $fallback_image ) ) {
            ?>
                <div class="post-image"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><img src="<?php echo esc_url( $fallback_image ); ?>" alt="<?php _e( 'Fallback Image',  'accesspress-mag' ); ?>" /></a>

                    <?php if( $show_icon == 'on' ){?><span class="format_icon <?php if( $b_counter > 2 ){ echo 'small'; }?>"><i class="fa <?php echo esc_attr( $post_format_icon );?>"></i></span><?php } ?>
                </div>
            <?php
                        }
                     }
            ?>
                <div class="post-desc-wrapper">
                    <h3 class="post-title line-clamp line-clamp-2"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                    <div class="ratings-wrapper"><?php do_action('accesspress_mag_post_review');?></div>
                    <div class="block-poston"><?php do_action( 'accesspress_mag_home_posted_on' );?></div>
                </div>
                <?php if( $b_counter <= 2 ):?><div class="post-content line-clamp line-clamp-4"><?php accesspress_mag_homepage_excerpt(); ?></div><?php endif ;?>
        </div>
    <?php
            if( $b_counter > 2 && $b_counter == $total_posts_block2 ){ echo '</div>'; }
            if( $b_counter == 2){ echo '</div>'; }
                }
            }
    ?>
            </div>
        </div>
    <?php
        endif;
        wp_reset_query();
    ?>
</section>


<?php
    $home_inline_ad = of_get_option( 'value_homepage_inline_ad' );
    if( !empty( $home_inline_ad ) ) {
        echo '<div class="homepage-middle-ad wow flipInX" data-wow-delay="1s">'.$home_inline_ad.'</div>';
    }
?>

<section class="third-block clearfix wow fadeInUp" data-wow-delay="0.5s">

    <?php
        $block3_cat = of_get_option( 'featured_block_3' );
        if( !empty( $block3_cat ) ):
                $posts_for_block3 = of_get_option( 'posts_for_block3' );
                $category_info = get_category_by_slug( $block3_cat );
                $category_id = $category_info->cat_ID;
                $category_link = get_category_link( $category_id );
                $category_name = $category_info->name;
     ?>
                <div class="third-block-wrapper">
                    <h2 class="block-cat-name"><span>
                        <?php
                            if ( $cat_link_option == 1 && !empty( $cat_link_option ) ) {
                        ?>
                            <a href="<?php echo esc_url( $category_link )?>" title="<?php echo esc_attr( $category_name );?>"><?php echo esc_attr( $category_name );?></a>
                        <?php
                            } else {
                                echo esc_attr( $category_name );
                            }
                        ?>
                    </span></h2>
                    <div class="block-post-wrapper clearfix">
     <?php
            $block3_args = array(
                                'post_type' => 'post',
                                'category_name' => $block3_cat,
                                'post_status' => 'publish',
                                'posts_per_page' => $posts_for_block3,
                                'order' => 'DESC'
                                );
            $block3_query = new WP_Query( $block3_args );
            $b_counter = 0;
            $total_posts_block3 = $block3_query->found_posts;
            if( $block3_query->have_posts() ) {
                while( $block3_query->have_posts() ) {
                    $b_counter++;
                    $block3_query->the_post();
                    $b3_image_id = get_post_thumbnail_id();
                    $b3_big_image_path = wp_get_attachment_image_src( $b3_image_id, 'accesspress-mag-block-big-thumb', true );
                    $b3_small_image_path = wp_get_attachment_image_src( $b3_image_id, 'accesspress-mag-block-small-thumb', true );
                    $b3_image_alt = get_post_meta( $b3_image_id, '_wp_attachment_image_alt', true );
                    $post_format = get_post_format( get_the_ID() );
                    if( $post_format == 'video' ){
                        $post_format_icon = 'fa-video-camera';
                        $show_icon = 'on';
                    } elseif( $post_format == 'audio' ){
                        $post_format_icon = 'fa-music';
                        $show_icon = 'on';
                    } elseif( $post_format == 'gallery' ){
                        $post_format_icon = 'fa-picture-o';
                        $show_icon = 'on';
                    } else{
                        $show_icon = 'off';
                    }
                    if( $b_counter == 1 ){ echo '<div class="toppost-wrapper clearfix">'; }
                    if( $b_counter > 2 && $b_counter == 3 ){ echo '<div class="bottompost-wrapper">'; }
    ?>
        <div class="single_post clearfix <?php if( $b_counter <= 2 ){ echo 'top-post'; }?>">
            <?php if( has_post_thumbnail() ){ ?>
                <div class="post-image"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><img src="<?php if( $b_counter <=2 ){echo esc_url( $b3_big_image_path[0] ) ;}else{ echo esc_url( $b3_small_image_path[0] );}?>" alt="<?php echo esc_attr( $b3_image_alt );?>" /></a>

                    <?php if( $show_icon == 'on' ){?><span class="format_icon <?php if( $b_counter > 2 ){ echo 'small'; }?>"><i class="fa <?php echo esc_attr( $post_format_icon );?>"></i></span><?php } ?>
                </div>
            <?php } else {
                        if( $fallback_image_option == 1 && !empty( $fallback_image ) ) {
            ?>
                <div class="post-image"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><img src="<?php echo esc_url( $fallback_image ); ?>" alt="<?php _e( 'Fallback Image',  'accesspress-mag' ); ?>" /></a>

                    <?php if( $show_icon == 'on' ){?><span class="format_icon <?php if( $b_counter > 2 ){ echo 'small'; }?>"><i class="fa <?php echo esc_attr( $post_format_icon );?>"></i></span><?php } ?>
                </div>
            <?php
                        }
                     }
            ?>
                <div class="post-desc-wrapper">
                    <h3 class="post-title line-clamp line-clamp-2"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                    <div class="ratings-wrapper"><?php do_action('accesspress_mag_post_review');?></div>
                    <div class="block-poston"><?php do_action( 'accesspress_mag_home_posted_on' );?></div>
                </div>
                <?php if( $b_counter <= 2 ):?><div class="post-content line-clamp line-clamp-4"><?php accesspress_mag_homepage_excerpt(); ?></div><?php endif ;?>
        </div>
    <?php
            if( $b_counter > 2 && $b_counter == $total_posts_block3 ){ echo '</div>'; }
            if( $b_counter == 2){ echo '</div>'; }
                }
            }
    ?>
            </div>
        </div>
    <?php
        endif;
        wp_reset_query();
    ?>
</section>

<section class="forth-block wow fadeInUp clearfix" data-wow-delay="0.5s">

    <?php
        $block4_cat = of_get_option( 'featured_block_4' );
        if( !empty( $block4_cat ) ):
                $posts_for_block4 = of_get_option( 'posts_for_block4' );
                $category_info = get_category_by_slug( $block4_cat );
                $category_id = $category_info->cat_ID;
                $category_link = get_category_link( $category_id );
                $category_name = $category_info->name;
     ?>
                <div class="forth-block-wrapper">
                    <h2 class="block-cat-name"><span>
                        <?php
                            if ( $cat_link_option == 1 && !empty( $cat_link_option ) ) {
                        ?>
                            <a href="<?php echo esc_url( $category_link )?>" title="<?php echo esc_attr( $category_name );?>"><?php echo esc_attr( $category_name );?></a>
                        <?php
                            } else {
                                echo esc_attr( $category_name );
                            }
                        ?>
                    </span></h2>
                    <div class="block-post-wrapper clearfix">
     <?php
            $block4_args = array(
                                'post_type' => 'post',
                                'category_name' => $block4_cat,
                                'post_status' => 'publish',
                                'posts_per_page' => $posts_for_block4,
                                'order' => 'DESC'
                                );
            $block4_query = new WP_Query( $block4_args );
            $b_counter = 0;
            $total_posts_block4 = $block4_query->found_posts;
            if( $block4_query->have_posts() ) {
                while( $block4_query->have_posts() ) {
                    $b_counter++;
                    $block4_query->the_post();
                    $b4_image_id = get_post_thumbnail_id();
                    $b4_big_image_path = wp_get_attachment_image_src( $b4_image_id, 'accesspress-mag-block-big-thumb', true );
                    $b4_small_image_path = wp_get_attachment_image_src( $b4_image_id, 'accesspress-mag-block-small-thumb', true );
                    $b4_image_alt = get_post_meta( $b4_image_id, '_wp_attachment_image_alt', true );
                    $post_format = get_post_format( get_the_ID() );
                    if( $post_format == 'video' ){
                        $post_format_icon = 'fa-video-camera';
                        $show_icon = 'on';
                    } elseif( $post_format == 'audio' ){
                        $post_format_icon = 'fa-music';
                        $show_icon = 'on';
                    } elseif( $post_format == 'gallery' ){
                        $post_format_icon = 'fa-picture-o';
                        $show_icon = 'on';
                    } else{
                        $show_icon = 'off';
                    }
                    if( $b_counter == 1 ){ echo '<div class="toppost-wrapper clearfix">'; }
                    if( $b_counter > 2 && $b_counter == 3 ){ echo '<div class="bottompost-wrapper">'; }
    ?>
        <div class="single_post clearfix <?php if( $b_counter <= 2 ){ echo 'top-post'; }?>">
            <?php if( has_post_thumbnail() ){ ?>
                <div class="post-image"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><img src="<?php if( $b_counter <=2 ){echo esc_url( $b4_big_image_path[0] ) ;}else{ echo esc_url( $b4_small_image_path[0] );}?>" alt="<?php echo esc_attr( $b4_image_alt );?>" /></a>

                    <?php if( $show_icon == 'on' ){?><span class="format_icon <?php if( $b_counter > 2 ){ echo 'small'; }?>"><i class="fa <?php echo esc_attr( $post_format_icon );?>"></i></span><?php } ?>
                </div>
            <?php } else {
                        if( $fallback_image_option == 1 && !empty( $fallback_image ) ) {
            ?>
                <div class="post-image"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><img src="<?php echo esc_url( $fallback_image ); ?>" alt="<?php _e( 'Fallback Image',  'accesspress-mag' ); ?>" /></a>

                    <?php if( $show_icon == 'on' ){?><span class="format_icon <?php if( $b_counter > 2 ){ echo 'small'; }?>"><i class="fa <?php echo esc_attr( $post_format_icon );?>"></i></span><?php } ?>
                </div>
            <?php
                        }
                     }
            ?>
                <div class="post-desc-wrapper">
                    <h3 class="post-title line-clamp line-clamp-2"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                    <div class="ratings-wrapper"><?php do_action('accesspress_mag_post_review');?></div>
                    <div class="block-poston"><?php do_action( 'accesspress_mag_home_posted_on' );?></div>
                </div>
                <?php if( $b_counter <= 2 ):?><div class="post-content line-clamp line-clamp-4"><?php accesspress_mag_homepage_excerpt(); ?></div><?php endif ;?>
        </div>
    <?php
            if( $b_counter > 2 && $b_counter == $total_posts_block4 ){ echo '</div>'; }
            if( $b_counter == 2){ echo '</div>'; }
                }
            }
    ?>
            </div>
        </div>
    <?php
        endif;
        wp_reset_query();
    ?>
</section>


<section class="fifth-block wow fadeInUp clearfix" data-wow-delay="0.5s">

    <?php
        $block5_cat = of_get_option( 'featured_block_5' );
        if( !empty( $block5_cat ) ):
                $posts_for_block5 = of_get_option( 'posts_for_block5' );
                $category_info = get_category_by_slug( $block5_cat );
                $category_id = $category_info->cat_ID;
                $category_link = get_category_link( $category_id );
                $category_name = $category_info->name;
     ?>
                <div class="fifth-block-wrapper">
                    <h2 class="block-cat-name"><span>
                        <?php
                            if ( $cat_link_option == 1 && !empty( $cat_link_option ) ) {
                        ?>
                            <a href="<?php echo esc_url( $category_link )?>" title="<?php echo esc_attr( $category_name );?>"><?php echo esc_attr( $category_name );?></a>
                        <?php
                            } else {
                                echo esc_attr( $category_name );
                            }
                        ?>
                    </span></h2>
                    <div class="block-post-wrapper clearfix">
     <?php
            $block5_args = array(
                                'post_type' => 'post',
                                'category_name' => $block5_cat,
                                'post_status' => 'publish',
                                'posts_per_page' => $posts_for_block5,
                                'order' => 'DESC'
                                );
            $block5_query = new WP_Query( $block5_args );
            $b_counter = 0;
            $total_posts_block5 = $block5_query->found_posts;
            if( $block5_query->have_posts() ) {
                while( $block5_query->have_posts() ) {
                    $b_counter++;
                    $block5_query->the_post();
                    $b5_image_id = get_post_thumbnail_id();
                    $b5_big_image_path = wp_get_attachment_image_src( $b5_image_id, 'accesspress-mag-block-big-thumb', true );
                    $b5_small_image_path = wp_get_attachment_image_src( $b5_image_id, 'accesspress-mag-block-small-thumb', true );
                    $b5_image_alt = get_post_meta( $b5_image_id, '_wp_attachment_image_alt', true );
                    $post_format = get_post_format( get_the_ID() );
                    if( $post_format == 'video' ){
                        $post_format_icon = 'fa-video-camera';
                        $show_icon = 'on';
                    } elseif( $post_format == 'audio' ){
                        $post_format_icon = 'fa-music';
                        $show_icon = 'on';
                    } elseif( $post_format == 'gallery' ){
                        $post_format_icon = 'fa-picture-o';
                        $show_icon = 'on';
                    } else{
                        $show_icon = 'off';
                    }
                    if( $b_counter == 1 ){ echo '<div class="toppost-wrapper clearfix">'; }
                    if( $b_counter > 2 && $b_counter == 3 ){ echo '<div class="bottompost-wrapper">'; }
    ?>
        <div class="single_post clearfix <?php if( $b_counter <= 2 ){ echo 'top-post'; }?>">
            <?php if( has_post_thumbnail() ){ ?>
                <div class="post-image"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><img src="<?php if( $b_counter <=2 ){echo esc_url( $b5_big_image_path[0] ) ;}else{ echo esc_url( $b5_small_image_path[0] );}?>" alt="<?php echo esc_attr( $b5_image_alt );?>" /></a>

                    <?php if( $show_icon == 'on' ){?><span class="format_icon <?php if( $b_counter > 2 ){ echo 'small'; }?>"><i class="fa <?php echo esc_attr( $post_format_icon );?>"></i></span><?php } ?>
                </div>
            <?php } else {
                        if( $fallback_image_option == 1 && !empty( $fallback_image ) ) {
            ?>
                <div class="post-image"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><img src="<?php echo esc_url( $fallback_image ); ?>" alt="<?php _e( 'Fallback Image',  'accesspress-mag' ); ?>" /></a>

                    <?php if( $show_icon == 'on' ){?><span class="format_icon <?php if( $b_counter > 2 ){ echo 'small'; }?>"><i class="fa <?php echo esc_attr( $post_format_icon );?>"></i></span><?php } ?>
                </div>
            <?php
                        }
                     }
            ?>
                <div class="post-desc-wrapper">
                    <h3 class="post-title line-clamp line-clamp-2"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                    <div class="ratings-wrapper"><?php do_action('accesspress_mag_post_review');?></div>
                    <div class="block-poston"><?php do_action( 'accesspress_mag_home_posted_on' );?></div>
                </div>
                <?php if( $b_counter <= 2 ):?><div class="post-content line-clamp line-clamp-4"><?php accesspress_mag_homepage_excerpt(); ?></div><?php endif ;?>
        </div>
    <?php
            if( $b_counter > 2 && $b_counter == $total_posts_block5 ){ echo '</div>'; }
            if( $b_counter == 2){ echo '</div>'; }
                }
            }
    ?>
            </div>
        </div>
    <?php
        endif;
        wp_reset_query();
    ?>
</section>

<section class="sixth-block wow fadeInLeft clearfix" data-wow-delay="0.5s">

    <?php
        $block6_cat = of_get_option( 'featured_block_6' );
        if( !empty( $block6_cat ) ):
                $posts_for_block6 = of_get_option( 'posts_for_block6' );
                $category_info = get_category_by_slug( $block6_cat );
                $category_id = $category_info->cat_ID;
                $category_link = get_category_link( $category_id );
                $category_name = $category_info->name;
     ?>
                <div class="sixth-block-wrapper">
                    <h2 class="block-cat-name"><span>
                        <?php
                            if ( $cat_link_option == 1 && !empty( $cat_link_option ) ) {
                        ?>
                            <a href="<?php echo esc_url( $category_link )?>" title="<?php echo esc_attr( $category_name );?>"><?php echo esc_attr( $category_name );?></a>
                        <?php
                            } else {
                                echo esc_attr( $category_name );
                            }
                        ?>
                    </span></h2>
                    <div class="block-post-wrapper clearfix">
     <?php
            $block6_args = array(
                                'post_type' => 'post',
                                'category_name' => $block6_cat,
                                'post_status' => 'publish',
                                'posts_per_page' => $posts_for_block6,
                                'order' => 'DESC'
                                );
            $block6_query = new WP_Query( $block6_args );
            $b_counter = 0;
            $total_posts_block6 = $block6_query->found_posts;
            if( $block6_query->have_posts() ) {
                while( $block6_query->have_posts() ) {
                    $b_counter++;
                    $block6_query->the_post();
                    $b6_image_id = get_post_thumbnail_id();
                    $b6_big_image_path = wp_get_attachment_image_src( $b6_image_id, 'accesspress-mag-block-big-thumb', true );
                    $b6_small_image_path = wp_get_attachment_image_src( $b6_image_id, 'accesspress-mag-block-small-thumb', true );
                    $b6_image_alt = get_post_meta( $b6_image_id, '_wp_attachment_image_alt', true );
                    $post_format = get_post_format( get_the_ID() );
                    if( $post_format == 'video' ){
                        $post_format_icon = 'fa-video-camera';
                        $show_icon = 'on';
                    } elseif( $post_format == 'audio' ){
                        $post_format_icon = 'fa-music';
                        $show_icon = 'on';
                    } elseif( $post_format == 'gallery' ){
                        $post_format_icon = 'fa-picture-o';
                        $show_icon = 'on';
                    } else{
                        $show_icon = 'off';
                    }
                    if( $b_counter == 1 ){ echo '<div class="toppost-wrapper clearfix">'; }
                    if( $b_counter > 2 && $b_counter == 3 ){ echo '<div class="bottompost-wrapper">'; }
    ?>
        <div class="single_post clearfix <?php if( $b_counter <= 2 ){ echo 'top-post'; }?>">
            <?php if( has_post_thumbnail() ){ ?>
                <div class="post-image"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><img src="<?php if( $b_counter <=2 ){echo esc_url( $b6_big_image_path[0] ) ;}else{ echo esc_url( $b6_small_image_path[0] );}?>" alt="<?php echo esc_attr( $b6_image_alt );?>" /></a>

                    <?php if( $show_icon == 'on' ){?><span class="format_icon <?php if( $b_counter > 2 ){ echo 'small'; }?>"><i class="fa <?php echo esc_attr( $post_format_icon );?>"></i></span><?php } ?>
                </div>
            <?php } else {
                        if( $fallback_image_option == 1 && !empty( $fallback_image ) ) {
            ?>
                <div class="post-image"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><img src="<?php echo esc_url( $fallback_image ); ?>" alt="<?php _e( 'Fallback Image',  'accesspress-mag' ); ?>" /></a>

                    <?php if( $show_icon == 'on' ){?><span class="format_icon <?php if( $b_counter > 2 ){ echo 'small'; }?>"><i class="fa <?php echo esc_attr( $post_format_icon );?>"></i></span><?php } ?>
                </div>
            <?php
                        }
                     }
            ?>
                <div class="post-desc-wrapper">
                    <h3 class="post-title line-clamp line-clamp-2"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                    <div class="ratings-wrapper"><?php do_action('accesspress_mag_post_review');?></div>
                    <div class="block-poston"><?php do_action( 'accesspress_mag_home_posted_on' );?></div>
                </div>
                <?php if( $b_counter <= 2 ):?><div class="post-content line-clamp line-clamp-4"><?php accesspress_mag_homepage_excerpt(); ?></div><?php endif ;?>
        </div>
    <?php
            if( $b_counter > 2 && $b_counter == $total_posts_block6 ){ echo '</div>'; }
            if( $b_counter == 2){ echo '</div>'; }
                }
            }
    ?>
            </div>
        </div>
    <?php
        endif;
        wp_reset_query();
    ?>
</section>

<section class="seventh-block wow fadeInUp clearfix" data-wow-delay="0.5s">

    <?php
        $block7_cat = of_get_option( 'featured_block_7' );
        if( !empty( $block7_cat ) ):
                $posts_for_block7 = of_get_option( 'posts_for_block7' );
                $category_info = get_category_by_slug( $block7_cat );
                $category_id = $category_info->cat_ID;
                $category_link = get_category_link( $category_id );
                $category_name = $category_info->name;
     ?>
                <div class="seventh-block-wrapper">
                    <h2 class="block-cat-name"><span>
                        <?php
                            if ( $cat_link_option == 1 && !empty( $cat_link_option ) ) {
                        ?>
                            <a href="<?php echo esc_url( $category_link )?>" title="<?php echo esc_attr( $category_name );?>"><?php echo esc_attr( $category_name );?></a>
                        <?php
                            } else {
                                echo esc_attr( $category_name );
                            }
                        ?>
                    </span></h2>
                    <div class="block-post-wrapper clearfix">
     <?php
            $block7_args = array(
                                'post_type' => 'post',
                                'category_name' => $block7_cat,
                                'post_status' => 'publish',
                                'posts_per_page' => $posts_for_block7,
                                'order' => 'DESC'
                                );
            $block7_query = new WP_Query( $block7_args );
            $b_counter = 0;
            $total_posts_block7 = $block7_query->found_posts;
            if( $block7_query->have_posts() ) {
                while( $block7_query->have_posts() ) {
                    $b_counter++;
                    $block7_query->the_post();
                    $b7_image_id = get_post_thumbnail_id();
                    $b7_big_image_path = wp_get_attachment_image_src( $b7_image_id, 'accesspress-mag-block-big-thumb', true );
                    $b7_small_image_path = wp_get_attachment_image_src( $b7_image_id, 'accesspress-mag-block-small-thumb', true );
                    $b7_image_alt = get_post_meta( $b7_image_id, '_wp_attachment_image_alt', true );
                    $post_format = get_post_format( get_the_ID() );
                    if( $post_format == 'video' ){
                        $post_format_icon = 'fa-video-camera';
                        $show_icon = 'on';
                    } elseif( $post_format == 'audio' ){
                        $post_format_icon = 'fa-music';
                        $show_icon = 'on';
                    } elseif( $post_format == 'gallery' ){
                        $post_format_icon = 'fa-picture-o';
                        $show_icon = 'on';
                    } else{
                        $show_icon = 'off';
                    }
                    if( $b_counter == 1 ){ echo '<div class="toppost-wrapper clearfix">'; }
                    if( $b_counter > 2 && $b_counter == 3 ){ echo '<div class="bottompost-wrapper">'; }
    ?>
        <div class="single_post clearfix <?php if( $b_counter <= 2 ){ echo 'top-post'; }?>">
            <?php if( has_post_thumbnail() ){ ?>
                <div class="post-image"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><img src="<?php if( $b_counter <=2 ){echo esc_url( $b7_big_image_path[0] ) ;}else{ echo esc_url( $b7_small_image_path[0] );}?>" alt="<?php echo esc_attr( $b7_image_alt );?>" /></a>

                    <?php if( $show_icon == 'on' ){?><span class="format_icon <?php if( $b_counter > 2 ){ echo 'small'; }?>"><i class="fa <?php echo esc_attr( $post_format_icon );?>"></i></span><?php } ?>
                </div>
            <?php } else {
                        if( $fallback_image_option == 1 && !empty( $fallback_image ) ) {
            ?>
                <div class="post-image"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><img src="<?php echo esc_url( $fallback_image ); ?>" alt="<?php _e( 'Fallback Image',  'accesspress-mag' ); ?>" /></a>

                    <?php if( $show_icon == 'on' ){?><span class="format_icon <?php if( $b_counter > 2 ){ echo 'small'; }?>"><i class="fa <?php echo esc_attr( $post_format_icon );?>"></i></span><?php } ?>
                </div>
            <?php
                        }
                     }
            ?>
                <div class="post-desc-wrapper">
                    <h3 class="post-title line-clamp line-clamp-2"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                    <div class="ratings-wrapper"><?php do_action('accesspress_mag_post_review');?></div>
                    <div class="block-poston"><?php do_action( 'accesspress_mag_home_posted_on' );?></div>
                </div>
                <?php if( $b_counter <= 2 ):?><div class="post-content line-clamp line-clamp-4"><?php accesspress_mag_homepage_excerpt(); ?></div><?php endif ;?>
        </div>
    <?php
            if( $b_counter > 2 && $b_counter == $total_posts_block7 ){ echo '</div>'; }
            if( $b_counter == 2){ echo '</div>'; }
                }
            }
    ?>
            </div>
        </div>
    <?php
        endif;
        wp_reset_query();
    ?>
</section>

<section class="eigth-block wow fadeInRight clearfix" data-wow-delay="0.5s">

    <?php
        $block8_cat = of_get_option( 'featured_block_8' );
        if( !empty( $block8_cat ) ):
                $posts_for_block8 = of_get_option( 'posts_for_block8' );
                $category_info = get_category_by_slug( $block8_cat );
                $category_id = $category_info->cat_ID;
                $category_link = get_category_link( $category_id );
                $category_name = $category_info->name;
     ?>
                <div class="eigth-block-wrapper">
                    <h2 class="block-cat-name"><span>
                        <?php
                            if ( $cat_link_option == 1 && !empty( $cat_link_option ) ) {
                        ?>
                            <a href="<?php echo esc_url( $category_link )?>" title="<?php echo esc_attr( $category_name );?>"><?php echo esc_attr( $category_name );?></a>
                        <?php
                            } else {
                                echo esc_attr( $category_name );
                            }
                        ?>
                    </span></h2>
                    <div class="block-post-wrapper clearfix">
     <?php
            $block8_args = array(
                                'post_type' => 'post',
                                'category_name' => $block8_cat,
                                'post_status' => 'publish',
                                'posts_per_page' => $posts_for_block8,
                                'order' => 'DESC'
                                );
            $block8_query = new WP_Query( $block8_args );
            $b_counter = 0;
            $total_posts_block8 = $block8_query->found_posts;
            if( $block8_query->have_posts() ) {
                while( $block8_query->have_posts() ) {
                    $b_counter++;
                    $block8_query->the_post();
                    $b8_image_id = get_post_thumbnail_id();
                    $b8_big_image_path = wp_get_attachment_image_src( $b8_image_id, 'accesspress-mag-block-big-thumb', true );
                    $b8_small_image_path = wp_get_attachment_image_src( $b8_image_id, 'accesspress-mag-block-small-thumb', true );
                    $b8_image_alt = get_post_meta( $b8_image_id, '_wp_attachment_image_alt', true );
                    $post_format = get_post_format( get_the_ID() );
                    if( $post_format == 'video' ){
                        $post_format_icon = 'fa-video-camera';
                        $show_icon = 'on';
                    } elseif( $post_format == 'audio' ){
                        $post_format_icon = 'fa-music';
                        $show_icon = 'on';
                    } elseif( $post_format == 'gallery' ){
                        $post_format_icon = 'fa-picture-o';
                        $show_icon = 'on';
                    } else{
                        $show_icon = 'off';
                    }
                    if( $b_counter == 1 ){ echo '<div class="toppost-wrapper clearfix">'; }
                    if( $b_counter > 2 && $b_counter == 3 ){ echo '<div class="bottompost-wrapper">'; }
    ?>
        <div class="single_post clearfix <?php if( $b_counter <= 2 ){ echo 'top-post'; }?>">
            <?php if( has_post_thumbnail() ){ ?>
                <div class="post-image"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><img src="<?php if( $b_counter <=2 ){echo esc_url( $b8_big_image_path[0] ) ;}else{ echo esc_url( $b8_small_image_path[0] );}?>" alt="<?php echo esc_attr( $b8_image_alt );?>" /></a>

                    <?php if( $show_icon == 'on' ){?><span class="format_icon <?php if( $b_counter > 2 ){ echo 'small'; }?>"><i class="fa <?php echo esc_attr( $post_format_icon );?>"></i></span><?php } ?>
                </div>
            <?php } else {
                        if( $fallback_image_option == 1 && !empty( $fallback_image ) ) {
            ?>
                <div class="post-image"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><img src="<?php echo esc_url( $fallback_image ); ?>" alt="<?php _e( 'Fallback Image',  'accesspress-mag' ); ?>" /></a>

                    <?php if( $show_icon == 'on' ){?><span class="format_icon <?php if( $b_counter > 2 ){ echo 'small'; }?>"><i class="fa <?php echo esc_attr( $post_format_icon );?>"></i></span><?php } ?>
                </div>
            <?php
                        }
                     }
            ?>
                <div class="post-desc-wrapper">
                    <h3 class="post-title line-clamp line-clamp-2"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                    <div class="ratings-wrapper"><?php do_action('accesspress_mag_post_review');?></div>
                    <div class="block-poston"><?php do_action( 'accesspress_mag_home_posted_on' );?></div>
                </div>
                <?php if( $b_counter <= 2 ):?><div class="post-content line-clamp line-clamp-4"><?php accesspress_mag_homepage_excerpt(); ?></div><?php endif ;?>
        </div>
    <?php
            if( $b_counter > 2 && $b_counter == $total_posts_block8 ){ echo '</div>'; }
            if( $b_counter == 2){ echo '</div>'; }
                }
            }
    ?>
            </div>
        </div>
    <?php
        endif;
        wp_reset_query();
    ?>
</section>

<section class="ninth-block wow fadeInUp clearfix" data-wow-delay="0.5s">

    <?php
        $block9_cat = of_get_option( 'featured_block_9' );
        if( !empty( $block9_cat ) ):
                $posts_for_block9 = of_get_option( 'posts_for_block9' );
                $category_info = get_category_by_slug( $block9_cat );
                $category_id = $category_info->cat_ID;
                $category_link = get_category_link( $category_id );
                $category_name = $category_info->name;
     ?>
                <div class="ninth-block-wrapper">
                    <h2 class="block-cat-name"><span>
                        <?php
                            if ( $cat_link_option == 1 && !empty( $cat_link_option ) ) {
                        ?>
                            <a href="<?php echo esc_url( $category_link )?>" title="<?php echo esc_attr( $category_name );?>"><?php echo esc_attr( $category_name );?></a>
                        <?php
                            } else {
                                echo esc_attr( $category_name );
                            }
                        ?>
                    </span></h2>
                    <div class="block-post-wrapper clearfix">
     <?php
            $block9_args = array(
                                'post_type' => 'post',
                                'category_name' => $block9_cat,
                                'post_status' => 'publish',
                                'posts_per_page' => $posts_for_block9,
                                'order' => 'DESC'
                                );
            $block9_query = new WP_Query( $block9_args );
            $b_counter = 0;
            $total_posts_block9 = $block9_query->found_posts;
            if( $block9_query->have_posts() ) {
                while( $block9_query->have_posts() ) {
                    $b_counter++;
                    $block9_query->the_post();
                    $b9_image_id = get_post_thumbnail_id();
                    $b9_big_image_path = wp_get_attachment_image_src( $b9_image_id, 'accesspress-mag-block-big-thumb', true );
                    $b9_small_image_path = wp_get_attachment_image_src( $b9_image_id, 'accesspress-mag-block-small-thumb', true );
                    $b9_image_alt = get_post_meta( $b9_image_id, '_wp_attachment_image_alt', true );
                    $post_format = get_post_format( get_the_ID() );
                    if( $post_format == 'video' ){
                        $post_format_icon = 'fa-video-camera';
                        $show_icon = 'on';
                    } elseif( $post_format == 'audio' ){
                        $post_format_icon = 'fa-music';
                        $show_icon = 'on';
                    } elseif( $post_format == 'gallery' ){
                        $post_format_icon = 'fa-picture-o';
                        $show_icon = 'on';
                    } else{
                        $show_icon = 'off';
                    }
                    if( $b_counter == 1 ){ echo '<div class="toppost-wrapper clearfix">'; }
                    if( $b_counter > 2 && $b_counter == 3 ){ echo '<div class="bottompost-wrapper">'; }
    ?>
        <div class="single_post clearfix <?php if( $b_counter <= 2 ){ echo 'top-post'; }?>">
            <?php if( has_post_thumbnail() ){ ?>
                <div class="post-image"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><img src="<?php if( $b_counter <=2 ){echo esc_url( $b9_big_image_path[0] ) ;}else{ echo esc_url( $b9_small_image_path[0] );}?>" alt="<?php echo esc_attr( $b9_image_alt );?>" /></a>

                    <?php if( $show_icon == 'on' ){?><span class="format_icon <?php if( $b_counter > 2 ){ echo 'small'; }?>"><i class="fa <?php echo esc_attr( $post_format_icon );?>"></i></span><?php } ?>
                </div>
            <?php } else {
                        if( $fallback_image_option == 1 && !empty( $fallback_image ) ) {
            ?>
                <div class="post-image"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><img src="<?php echo esc_url( $fallback_image ); ?>" alt="<?php _e( 'Fallback Image',  'accesspress-mag' ); ?>" /></a>

                    <?php if( $show_icon == 'on' ){?><span class="format_icon <?php if( $b_counter > 2 ){ echo 'small'; }?>"><i class="fa <?php echo esc_attr( $post_format_icon );?>"></i></span><?php } ?>
                </div>
            <?php
                        }
                     }
            ?>
                <div class="post-desc-wrapper">
                    <h3 class="post-title line-clamp line-clamp-2"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                    <div class="ratings-wrapper"><?php do_action('accesspress_mag_post_review');?></div>
                    <div class="block-poston"><?php do_action( 'accesspress_mag_home_posted_on' );?></div>
                </div>
                <?php if( $b_counter <= 2 ):?><div class="post-content line-clamp line-clamp-4"><?php accesspress_mag_homepage_excerpt(); ?></div><?php endif ;?>
        </div>
    <?php
            if( $b_counter > 2 && $b_counter == $total_posts_block9 ){ echo '</div>'; }
            if( $b_counter == 2){ echo '</div>'; }
                }
            }
    ?>
            </div>
        </div>
    <?php
        endif;
        wp_reset_query();
    ?>
</section>

<section class="tenth-block wow fadeInLeft clearfix" data-wow-delay="0.5s">

    <?php
        $block10_cat = of_get_option( 'featured_block_10' );
        if( !empty( $block10_cat ) ):
                $posts_for_block10 = of_get_option( 'posts_for_block10' );
                $category_info = get_category_by_slug( $block10_cat );
                $category_id = $category_info->cat_ID;
                $category_link = get_category_link( $category_id );
                $category_name = $category_info->name;
     ?>
                <div class="tenth-block-wrapper">
                    <h2 class="block-cat-name"><span>
                        <?php
                            if ( $cat_link_option == 1 && !empty( $cat_link_option ) ) {
                        ?>
                            <a href="<?php echo esc_url( $category_link )?>" title="<?php echo esc_attr( $category_name );?>"><?php echo esc_attr( $category_name );?></a>
                        <?php
                            } else {
                                echo esc_attr( $category_name );
                            }
                        ?>
                    </span></h2>
                    <div class="block-post-wrapper clearfix">
     <?php
            $block10_args = array(
                                'post_type' => 'post',
                                'category_name' => $block10_cat,
                                'post_status' => 'publish',
                                'posts_per_page' => $posts_for_block10,
                                'order' => 'DESC'
                                );
            $block10_query = new WP_Query( $block10_args );
            $b_counter = 0;
            $total_posts_block10 = $block10_query->found_posts;
            if( $block10_query->have_posts() ) {
                while( $block10_query->have_posts() ) {
                    $b_counter++;
                    $block10_query->the_post();
                    $b10_image_id = get_post_thumbnail_id();
                    $b10_big_image_path = wp_get_attachment_image_src( $b10_image_id, 'accesspress-mag-block-big-thumb', true );
                    $b10_small_image_path = wp_get_attachment_image_src( $b10_image_id, 'accesspress-mag-block-small-thumb', true );
                    $b10_image_alt = get_post_meta( $b10_image_id, '_wp_attachment_image_alt', true );
                    $post_format = get_post_format( get_the_ID() );
                    if( $post_format == 'video' ){
                        $post_format_icon = 'fa-video-camera';
                        $show_icon = 'on';
                    } elseif( $post_format == 'audio' ){
                        $post_format_icon = 'fa-music';
                        $show_icon = 'on';
                    } elseif( $post_format == 'gallery' ){
                        $post_format_icon = 'fa-picture-o';
                        $show_icon = 'on';
                    } else{
                        $show_icon = 'off';
                    }
                    if( $b_counter == 1 ){ echo '<div class="toppost-wrapper clearfix">'; }
                    if( $b_counter > 2 && $b_counter == 3 ){ echo '<div class="bottompost-wrapper">'; }
    ?>
        <div class="single_post clearfix <?php if( $b_counter <= 2 ){ echo 'top-post'; }?>">
            <?php if( has_post_thumbnail() ){ ?>
                <div class="post-image"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><img src="<?php if( $b_counter <=2 ){echo esc_url( $b10_big_image_path[0] ) ;}else{ echo esc_url( $b10_small_image_path[0] );}?>" alt="<?php echo esc_attr( $b10_image_alt );?>" /></a>

                    <?php if( $show_icon == 'on' ){?><span class="format_icon <?php if( $b_counter > 2 ){ echo 'small'; }?>"><i class="fa <?php echo esc_attr( $post_format_icon );?>"></i></span><?php } ?>
                </div>
            <?php } else {
                        if( $fallback_image_option == 1 && !empty( $fallback_image ) ) {
            ?>
                <div class="post-image"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><img src="<?php echo esc_url( $fallback_image ); ?>" alt="<?php _e( 'Fallback Image',  'accesspress-mag' ); ?>" /></a>

                    <?php if( $show_icon == 'on' ){?><span class="format_icon <?php if( $b_counter > 2 ){ echo 'small'; }?>"><i class="fa <?php echo esc_attr( $post_format_icon );?>"></i></span><?php } ?>
                </div>
            <?php
                        }
                     }
            ?>
                <div class="post-desc-wrapper">
                    <h3 class="post-title line-clamp line-clamp-2"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                    <div class="ratings-wrapper"><?php do_action('accesspress_mag_post_review');?></div>
                    <div class="block-poston"><?php do_action( 'accesspress_mag_home_posted_on' );?></div>
                </div>
                <?php if( $b_counter <= 2 ):?><div class="post-content line-clamp line-clamp-4"><?php accesspress_mag_homepage_excerpt(); ?></div><?php endif ;?>
        </div>
    <?php
            if( $b_counter > 2 && $b_counter == $total_posts_block10 ){ echo '</div>'; }
            if( $b_counter == 2){ echo '</div>'; }
                }
            }
    ?>
            </div>
        </div>
    <?php
        endif;
        wp_reset_query();
    ?>
</section>
