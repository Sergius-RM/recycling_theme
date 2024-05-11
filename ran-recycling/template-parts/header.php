<?php
/**
 * The template for displaying header.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description', 'display' );
?>

<!-- START Top Header Area -->
<div class="container-fluid header_top align-items-center">
        <!-- Contacts Info Area Start -->
        <div class="header_top_contacts d-flex">

        <?php if (have_rows('topbaremails', 'option')) { ?>
            <?php while (have_rows('topbaremails', 'option')) {
                the_row(); ?>
                    <a class="contact_item" href="mailto:<?php the_sub_field('top_bar_email_link');?>" target="_blank">
                        <i class="bi bi-envelope-fill"></i> <?php the_sub_field('top_bar_email');?>
                    </a>
            <?php } ?>
        <?php } ?>

        <?php if (have_rows('topbarphones', 'option')) { ?>
            <?php while (have_rows('topbarphones', 'option')) {
                the_row(); ?>
                    <a class="contact_item" href="tel:<?php the_sub_field('top_bar_phone_link');?>" target="_blank">
                        <i class="bi bi-telephone-fill"></i><?php the_sub_field('top_bar_phone');?>
                    </a>
            <?php } ?>
        <?php } ?>

        <?php if (have_rows('physical_adress', 'option')) {
            while (have_rows('physical_adress', 'option')) {
                the_row(); ?>
                    <div class="contact_item physical_adress">
                        <i class="bi bi-geo-alt"></i> <?php the_sub_field('short_physical_adress');?>
                    </div>
            <?php } ?>
        <?php } ?>

        <?php if (have_rows('work_time', 'option')) {
            while (have_rows('work_time', 'option')) {
                the_row(); ?>
                    <div class="contact_item work_time">
                        <i class="bi bi-clock"></i> <?php the_sub_field('work_time_item');?>
                    </div>
            <?php } ?>
        <?php } ?>
        </div>
        <!-- END Contacts Info Area -->

</div>
<!-- END Top Header Area -->

<!-- Start main Header -->
<header class="header_area full-width" role="banner">
    <!--Header-Upper-->

    <div class="site-header">
        <div class="site-branding align-items-center d-flex">

            <div class="navbar-brandlogo_area no_mobile">
                <?php the_custom_logo();?>
            </div>

            <!-- Main Menu -->
            <nav class="site-navigation">
                <div class="no_mobile" role="navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'menu-1' ) ); ?>
                </div>
            </nav>
            <!-- Main Menu End-->

            <!-- Mobile Menu -->
            <div class="navbar navbar-light bg-light <?php print $navbar_style;?> is_onmobile">
                <span class="navbar-brandlogo_area">
                    <span class="header-logo-darkmode">
                        <?php the_custom_logo();?>
                    </span>
                </span>

                <button class="navbar-toggler is_onmobile" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <!-- Mobole Menu End-->

            <div class="serice_menu no_mobile ">
                <span class="d-flex">
                    <?php dynamic_sidebar( 'header_top' ); ?>
                </span>
            </div>
        </div>
    </div>

    <div class="collapse mob_menu" id="navbarToggleExternalContent">
        <div role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'menu-1' ) ); ?>
        </div>
        <div class="serice_menu">
            <?php dynamic_sidebar( 'header_top' ); ?>
        </div>
    </div>
    <!--End Header Upper-->
</header>
