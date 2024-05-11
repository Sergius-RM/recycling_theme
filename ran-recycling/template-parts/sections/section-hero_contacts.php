<?php
$image = get_sub_field('hero_img');
$right_image = get_sub_field('hero_top_icon');
?>

<!-- Hero Section Start -->
<section class="hero-section hero-form-section <?php if (get_sub_field( 'margin_bottom_off')): ?>margin_bottom_off<?php endif;?>">
    <div class="banner_overlay"></div>
    <div class="hero-container container-fluid with_form_area" style="<?php if (get_sub_field( 'hero_img')): ?>background-image: url('<?php echo esc_url($image['url']); ?>');<?php endif;?>">
        <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 info_area">
                <h1 class="hero_title mx-auto">
                    <?php echo get_sub_field('header_title');?>
                </h1>
                <?php if (get_sub_field( 'content')): ?>
                    <span class="hero-content d-block">
                        <?php echo get_sub_field('content');?>
                    </span>
                <?php endif;?>

                <?php if (get_sub_field( 'enable_hero_contact')): ?>
                    <div class="hero_contacts">

                    <?php if (get_sub_field( 'contacts_title')): ?>
                        <h4>
                            <?php echo get_sub_field('contacts_title');?>
                        </h4>
                    <?php endif;?>

                    <?php if (have_rows('hero_info')) {
                        while (have_rows('hero_info')) {
                            the_row(); ?>
                                <div class="hero_contacts_item physical_adress">
                                    <i class="bi bi-info-circle"></i> <?php the_sub_field('info');?>
                                </div>
                        <?php } ?>
                    <?php } ?>

                    <?php if (have_rows('hero_address')) {
                        while (have_rows('hero_address')) {
                            the_row(); ?>
                                <div class="hero_contacts_item physical_adress">
                                    <i class="bi bi-geo-alt"></i> <?php the_sub_field('address');?>
                                </div>
                        <?php } ?>
                    <?php } ?>

                    <?php if (have_rows('hero_work_time')) {
                        while (have_rows('hero_work_time')) {
                            the_row(); ?>
                                <div class="hero_contacts_item work_time">
                                    <i class="bi bi-clock"></i> <?php the_sub_field('work_time');?>
                                </div>
                        <?php } ?>
                    <?php } ?>

                    <?php if (have_rows('hero_phones')) { ?>
                        <?php while (have_rows('hero_phones')) {
                            the_row(); ?>
                                <a class="hero_contacts_item hero_phones" href="tel:<?php the_sub_field('phone_link');?>" target="_blank">
                                    <i class="bi bi-telephone-fill"></i><?php the_sub_field('phone');?>
                                </a>
                        <?php } ?>
                    <?php } ?>

                    <?php if (have_rows('hero_emails')) { ?>
                        <?php while (have_rows('hero_emails')) {
                            the_row(); ?>
                                <a class="hero_contacts_item hero_emails" href="mailto:<?php the_sub_field('email_link');?>" target="_blank">
                                    <i class="bi bi-envelope-fill"></i> <?php the_sub_field('email');?>
                                </a>
                        <?php } ?>
                    <?php } ?>
                    </div>
                <?php endif;?>

                <?php if (get_sub_field( 'enable_cta_button')): ?>
                    <?php if (get_sub_field( 'button_title')): ?>
                        <h4>
                            <?php echo get_sub_field('button_title');?>
                        </h4>
                    <?php endif;?>

                    <a class="read_more_link" <?php if (get_sub_field('hero_link_id')):?>id="<?php the_sub_field('hero_link_id'); ?>"<?php endif;?> href="<?php echo get_sub_field('hero_link_url');?>"><?php echo get_sub_field('hero_link_text');?></a>

                    <?php if (get_sub_field( 'under_button_phone')): ?>
                        <a class="under_button_phone" href="tel:<?php the_sub_field('under_button_phone_link');?>" target="_blank">
                            <i class="bi bi-telephone-fill"></i><?php the_sub_field('under_button_phone');?>
                        </a>
                    <?php endif;?>
                <?php endif;?>

            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 m-auto form_area">
                <div class="contactus_form m-auto">
                    <?php if( get_sub_field('form_title') ): ?>
                        <h3><?php the_sub_field('form_title'); ?></h3>
                    <?php endif;?>
                    <?php if( get_sub_field('form_content') ): ?>
                        <p><?php the_sub_field('form_content'); ?></p>
                    <?php endif;?>

                    <?php if (get_sub_field('hero_form')):?>
                        <?php $form_id = get_sub_field('hero_form');?>
                        <?php echo do_shortcode('[gravityform id="'. $form_id .'" title="false" description="false" ajax="true"]');?>
                    <?php endif;?>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->