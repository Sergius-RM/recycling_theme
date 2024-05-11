<?php
/**
 * The template for displaying footer.
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


?>

<!-- Argument Lists Area Start -->
<section class="argument_lists_section">
    <div class="container">
        <div class="row mx-auto">

            <?php if (get_sub_field( 'service_title')): ?>
                <h2><?php the_sub_field('service_title');?></h2>
            <?php endif;?>

            <?php if( have_rows('argument_list_loop') ): ?>
                <?php while( have_rows('argument_list_loop') ) : the_row(); ?>

                    <div class="col-6 col-sm-4 col-md-3 col-xl-3 mb-2 argument_lists_item">
                        <div class="argument_wrap">
                            <div class="argument_icon">
                                <img class="argument_icon" src="<?php the_sub_field('icon');?>">
                                <div class="overlay"></div>
                            </div>
                            <h3><?php the_sub_field('title');?></h3>
                            <div class="argument_content"><?php the_sub_field('content');?></div>
                            <?php if (get_sub_field('enable_cta_button')):?>
                                <a class="cta_btn" <?php if (get_sub_field('link_id')):?>id="<?php the_sub_field('link_id'); ?>"<?php endif;?> href="<?php the_sub_field('link_url');?>"><?php the_sub_field('link_name');?></a>
                            <?php endif;?>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Argument Lists Area End -->