<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$bg_img = get_sub_field('bg_img');

?>

<!-- Advantages Section Start -->
<section class="advantages_section">
    
    <div class="container-fluid" style="<?php if (get_sub_field( 'bg_img')): ?>background-image: url('<?php echo esc_url($bg_img['url']); ?>'); background-size: cover;<?php endif;?>">
        <div class="section_overlay"></div>
        <div class="container">

            <!-- Advantages Two Columns Section Start -->
            <div class="row align-items-center mx-auto advantages_two_columns">

                <div class="col-lg-6 statements_content <?php if ( get_sub_field('swap_blocks') == true ) { echo 'right_side'; } ?>">
                    <h6><?php the_sub_field('advantages_above_title'); ?></h6>
                    <h2><?php the_sub_field('advantages_title'); ?></h2>
                    <div class="content"><?php the_sub_field('body_content'); ?></div>

                    <?php if (get_sub_field('enable_cta_button')):?>
                        <a class="cta_btn" <?php if (get_sub_field('body_link_id')):?>id="<?php the_sub_field('body_link_id'); ?>"<?php endif;?> href="<?php the_sub_field('body_link_url'); ?>">
                            <?php the_sub_field('body_link'); ?>
                        </a>
                    <?php endif;?>
                </div>

                <div class="col-lg-6 statements_image <?php if ( get_sub_field('swap_blocks') == true ) { echo 'order-first'; } ?>">
                    <?php if ( get_sub_field('body_img') ):?>
                        <?php $body_img = get_sub_field('body_img');?>
                        <img class="left_img" src="<?php echo $body_img;?>">
                    <?php endif; ?>

                    <?php if ( get_sub_field('body_stamp') ):?>
                        <?php $body_stamp = get_sub_field('body_stamp');?>
                        <img class="stamp" src="<?php echo $body_stamp;?>">
                    <?php endif; ?>
                </div>

            </div>
            <!-- Advantages Two Columns Section END -->
        </div>
    </div>

    <?php if( have_rows('features_list') ): ?>
    <!-- Advantages Features Start -->
    <div class="container advantages_features_icon">
        <div class="row">

            <?php while( have_rows('features_list') ) : the_row(); ?>
                <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                    <?php if ( get_sub_field('icon') ):?>
                        <?php $quick_order_image = get_sub_field('icon');?>
                        <img src="<?php echo $quick_order_image;?>">
                    <?php endif; ?>
                    <h3><?php the_sub_field('title'); ?></h3>
                    <p><?php the_sub_field('content'); ?></p>
                </div>
            <?php endwhile; ?>

        </div>
    </div>
    <!-- Advantages Features END -->
    <?php endif; ?>

</section>
<!-- Advantages Section End -->