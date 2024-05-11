<?php
/**
 * The template for displaying footer.
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$copyright_data = get_field('copyright_data', 'option');

?>

<!-- Footer Area Start -->
<footer id="site-footer" class="site-footer" role="contentinfo">
    <div class="container-fluid">
        <div class="row">

            <!-- Branding Area Start -->
            <div class="col-12 col-xs-6 col-sm-12 col-md-3 col-xl-3 site-branding">
                <a href="/" class="footer-logo">
                    <?php
                    $header_logo = get_theme_mod('header_logo');
                    $img = wp_get_attachment_image_src($header_logo, 'full');
                    if ($img) :
                        ?>
                        <img src="<?php echo $img[0]; ?>" alt="">
                    <?php endif; ?>
                </a>

            <!-- Contacts Info Area Start -->
                <div class="footer_contacts">

                    <?php if (have_rows('topbaremails', 'option')) { ?>
                        <?php while (have_rows('topbaremails', 'option')) {
                            the_row(); ?>
                                <a href="mailto:<?php the_sub_field('top_bar_email_link');?>" target="_blank">
                                    <i class="bi bi-envelope-fill"></i> <?php the_sub_field('top_bar_email');?></a>
                        <?php } ?>
                    <?php } ?>

                    <?php if (have_rows('topbarphones', 'option')) { ?>
                        <?php while (have_rows('topbarphones', 'option')) {
                            the_row(); ?>
                                <a href="tel:<?php the_sub_field('top_bar_phone_link');?>" target="_blank">
                                    <i class="bi bi-telephone-fill"></i><?php the_sub_field('top_bar_phone');?></a>
                        <?php } ?>
                    <?php } ?>

                    <?php if (have_rows('physical_adress', 'option')) {
                        while (have_rows('physical_adress', 'option')) {
                            the_row(); ?>
                                <div class="physical_adress"><i class="bi bi-geo-alt"></i> <?php the_sub_field('short_physical_adress');?></div>
                        <?php } ?>
                    <?php } ?>

                    <?php if (have_rows('work_time', 'option')) {
                        while (have_rows('work_time', 'option')) {
                            the_row(); ?>
                                <div class="work_time"><i class="bi bi-clock"></i> <?php the_sub_field('work_time_item');?></div>
                        <?php } ?>
                    <?php } ?>
                </div>
            <!-- END Contacts Info Area -->

            </div>
            <!-- END Branding Area -->

            <!-- Footer Nav Area Start -->
            <div class="col-12 col-xs-6 col-sm-4 col-md-2 col-xl-2 footer_nav" role="navigation">
                <?php dynamic_sidebar( 'footer_1' ); ?>
            </div>
            <div class="col-12 col-xs-6 col-sm-4 col-md-2 col-xl-2 footer_nav" role="navigation">
                <?php dynamic_sidebar( 'footer_2' ); ?>
            </div>
            <div class="col-12 col-xs-6 col-sm-4 col-md-2 col-xl-2 footer_nav" role="navigation">
                <?php dynamic_sidebar( 'footer_3' ); ?>
            </div>
            <!-- Footer Nav Area -->

            <!-- Ordering Area Start -->
            <div class="col-12 col-xs-6 col-sm-12 col-md-3 col-xl-3 footer_ordering">
                <?php if( have_rows('orderind_link', 'option') ): ?>
                    <?php while( have_rows('orderind_link', 'option') ) : the_row(); ?>
                        <h4>
                            <?php the_sub_field('title'); ?>
                        </h4>
                        <a target="_blank" class="orderind_link" id="<?php the_sub_field('link_id'); ?>" href="<?php the_sub_field('url'); ?>">
                            <?php the_sub_field('link_text'); ?> <i class="bi bi-arrow-right"></i>
                        </a>

                        <?php if (get_sub_field( 'enable_phone')): ?>
                            <a href="tel:<?php the_sub_field('orderind_phone_link');?>" target="_blank">
                                <i class="bi bi-telephone-fill"></i><?php the_sub_field('orderind_phone');?>
                            </a>
                        <?php endif;?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <!-- END Ordering Area -->

        </div>
    </div>

</footer>
 <!-- Footer Area End -->

<!-- START Copyright Area -->
<div class="container-fluid footer_copyright">
    <div class="row align-items-center">
        <div class="col-12 col-sm-6 col-xl-6 footer_copyright_menu">
            <?php dynamic_sidebar( 'footer_bottom' ); ?>
        </div>
        <div class="col-12 col-sm-6 col-xl-6 copyright_data">
            <?php echo $copyright_data;?>
        </div>
    </div>
</div>
<!-- END Copyright Area -->