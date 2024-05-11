<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$number = get_sub_field( 'number_of_posts' );
$orderby = get_sub_field( 'order_by' );
$order = get_sub_field( 'sorting_order' );
$location = get_sub_field('from_dep');
$term_array = array( $location );

if ( get_sub_field('from_dep') == true ) {
    $team_posts = get_posts( array(
        'post_type'      => 'team',
        'post_status'    => 'publish',
        'posts_per_page' => $number,
        'orderby'        => $orderby,
        'order'          => $order,
        'tax_query' => array(
            array(
                'taxonomy' => 'team_category',
                'field'    => 'tag_ID',
                'terms'    => $term_array[0],
            )
        )
    ) );
} else {
    $team_posts = get_posts( array(
        'post_type'      => 'team',
        'post_status'    => 'publish',
        'posts_per_page' => $number,
        'orderby'        => $orderby,
        'order'          => $order
    ) );
}

?>

<!-- Team Area Start -->
<section class="team_section">
<div class="container">

        <div class="team_info">
            <?php if( get_sub_field('subtitle') ): ?>
                <h6><?php the_sub_field('subtitle'); ?></h6>
            <?php endif; ?>

            <h2><?php the_sub_field('h2_header'); ?></h2>

            <?php if( get_sub_field('content') ): ?>
                <?php the_sub_field('content'); ?>
            <?php endif; ?>
        </div>

        <div class="row align-items-center">

        <?php if ( $team_posts ): ?>
            <?php
            foreach ( $team_posts as $post ): setup_postdata($post); $thumb_src = null;
            if ( has_post_thumbnail($post->ID) ) {
                $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ));
                $thumb_src = $src[0]; }
            ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 m-auto member-item">
                    <div class="team-member">
                        <div class="image">
                            <?php if ( $thumb_src ): ?>
                                <img src="<?php echo $thumb_src; ?>" alt="<?php the_title(); ?>, <?php the_field('team_job_title'); ?>">
                            <?php endif; ?>
                        </div>

                        <?php if( have_rows('languages') ): ?>
                            <ul class="languages">
                            <?php while( have_rows('languages') ) : the_row(); ?>
                                <li class="lang_item">
                                    <img src="/wp-content/themes/ran-recycling/assets/images/lang/<?php the_sub_field('lang_item');?>.png" alt="">
                                </li>
                            <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>

                        <div class="member-designation">

                            <?php if( get_field('team_first_name') ): ?>
                                <h4><?php echo the_field('team_first_name'); ?> <?php echo the_field('team_last_name'); ?></h4>
                            <?php endif; ?>

                            <?php if( get_field('team_job_title') ): ?>
                                <span><?php echo the_field('team_job_title'); ?></span>
                            <?php endif; ?>
                            <?php if( get_field('member_location') ) : ?>
                                <span><?php echo the_field('member_location'); ?></span>
                            <?php endif; ?>

                            <div class="content">
                                <?php if( get_field('team_email_address') ): ?>
                                    <a href="mailto:<?php echo the_field('team_email_address'); ?>" class="team-cta-btn">
                                        <i class="bi bi-envelope-fill"></i> <?php echo the_field('team_email_address'); ?>
                                    </a>
                                <?php endif; ?>
                                <?php if( get_field('team_phone_number') ): ?>
                                    <a href="callto:<?php echo the_field('team_phone_number'); ?>" class="team-cta-btn">
                                        <i class="bi bi-telephone-fill"></i> <?php echo the_field('team_phone_number'); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php wp_reset_query();?>
        </div>
    </div>

</section>
<!-- Team Area END  -->
