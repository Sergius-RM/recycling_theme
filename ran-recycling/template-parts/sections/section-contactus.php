<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>

<!-- Contact US Section Start -->
<section class="contactus_section wrap_two_columns">
    <div class="container-fluid">
    <div class="container">
        <div class="row mx-auto justify-content-end section_two_columns">

            <div class="col-sm-12 col-md-6 col-lg-6 contactus_content">
                <?php if( get_sub_field('contactus_title') ): ?>
                    <h2><?php the_sub_field('contactus_title'); ?></h2>
                <?php endif;?>
                <?php if( get_sub_field('contactus_content') ): ?>
                    <p><?php the_sub_field('contactus_content'); ?></p>
                <?php endif;?>

                <?php if( get_sub_field('enable_cta_button') ): ?>
                    <a <?php if (get_sub_field('button_id')):?>id="<?php the_sub_field('button_id'); ?>"<?php endif;?> class="cta_btn" href="<?php the_sub_field('button_link'); ?>">
                        <?php the_sub_field('button_text'); ?>
                    </a>
                <?php endif;?>

                <?php if (get_sub_field( 'under_button_phone')): ?>
                    <a class="under_button_phone" href="tel:<?php the_sub_field('under_button_phone_link');?>" target="_blank">
                        <i class="bi bi-telephone-fill"></i><?php the_sub_field('under_button_phone');?>
                    </a>
                <?php endif;?>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="contactus_form m-auto">
                    <?php if( get_sub_field('form_title') ): ?>
                        <h3><?php the_sub_field('form_title'); ?></h3>
                    <?php endif;?>
                    <?php if( get_sub_field('form_content') ): ?>
                        <p><?php the_sub_field('form_content'); ?></p>
                    <?php endif;?>

                    <?php if (get_sub_field('contactus_shortcode_form')):?>
                        <?php $form_id = get_sub_field('contactus_shortcode_form');?>
                        <?php echo do_shortcode('[gravityform id="'. $form_id .'" title="false" description="false" ajax="true"]');?>
                    <?php endif;?>
                </div>
            </div>

        </div>
    </div>
    </div>
</section>
<!-- Contact US Section End -->