<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$style = get_sub_field('style');

if ($style == 'light_style') {
    $bg_style = 'light_style';
} else {
    $bg_style = 'grey_style';
}

?>

<!-- Two Columns Section Start -->
<section class="two_columns_section wrap_two_columns <?php if (get_sub_field('style')):?><?php echo $bg_style;?><?php endif;?>">
    <div class="container">
        <div class="row align-items-center mx-auto section_two_columns">

            <div class="col-sm-6 col-md-6 col-lg-6 two_columns_image <?php if ( get_sub_field('swap_blocks') == true ) { echo 'right_side'; } ?>">
                <?php if ( get_sub_field('image') ):?>
                    <?php $quick_order_image = get_sub_field('image');?>
                    <img src="<?php echo $quick_order_image;?>">
                <?php endif; ?>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 two_columns_content <?php if ( get_sub_field('swap_blocks') == true ) { echo 'order-first'; } ?>">
                <?php if (get_sub_field('header_subtitle')):?>
                    <h4><?php the_sub_field('header_subtitle'); ?></h4>
                <?php endif;?>
                <h2><?php the_sub_field('h2_header'); ?></h2>
                <?php if (get_sub_field('content')):?>
                    <div class="content">
                        <?php the_sub_field('content'); ?>
                    </div>
                <?php endif;?>

                <?php if (get_sub_field( 'enable_contact_info')): ?>
                    <div class="two_columns_contact">
                    <?php if (have_rows('info_address')) {
                        while (have_rows('info_address')) {
                            the_row(); ?>
                                <div class="two_columns_contacts_item physical_adress">
                                    <i class="bi bi-geo-alt-fill"></i> <?php the_sub_field('address');?>
                                </div>
                        <?php } ?>
                    <?php } ?>

                    <?php if (have_rows('info_work_time')) {
                        while (have_rows('info_work_time')) {
                            the_row(); ?>
                                <div class="two_columns_contacts_item work_time">
                                    <i class="bi bi-clock"></i> <?php the_sub_field('work_time');?>
                                </div>
                        <?php } ?>
                    <?php } ?>

                    <?php if (have_rows('info_emails')) { ?>
                        <?php while (have_rows('info_emails')) {
                            the_row(); ?>
                                <a class="two_columns_contacts_item hero_emails" href="mailto:<?php the_sub_field('email_link');?>" target="_blank">
                                    <i class="bi bi-envelope-fill"></i> <?php the_sub_field('email');?>
                                </a>
                        <?php } ?>
                    <?php } ?>

                    <?php if (have_rows('info_phones')) { ?>
                        <?php while (have_rows('info_phones')) {
                            the_row(); ?>
                                <a class="two_columns_contacts_item hero_phones" href="tel:<?php the_sub_field('phone_link');?>" target="_blank">
                                    <i class="bi bi-telephone-fill"></i><?php the_sub_field('phone');?>
                                </a>
                        <?php } ?>
                    <?php } ?>
                    </div>
                <?php endif;?>

                <?php if (get_sub_field('enable_cta_button')):?>
                    <a class="cta_btn" target="_blank" <?php if (get_sub_field('button_id')):?>id="<?php the_sub_field('button_id'); ?>"<?php endif;?> href="<?php the_sub_field('button_link'); ?>">
                        <?php the_sub_field('button_text'); ?>
                    </a>
                <?php endif;?>
            </div>

        </div>
    </div>
</section>
<!-- Two Columns Section End -->