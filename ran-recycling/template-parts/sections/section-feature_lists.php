<?php
/**
 * The template for displaying footer.
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

?>

<!-- Feature Lists Area Start -->
<section class="feature_lists_section">
    <div class="container">
        <div class="row">

            <?php if( have_rows('feature_items') ): ?>
                <?php while( have_rows('feature_items') ) : the_row(); ?>

                    <div class="col-sm-6 col-md-4 col-xl-4 mx-auto feature_lists_item">
                        <?php $contenttype = get_sub_field('img_id');?>
                        <?php if ($contenttype == 'img'):?>
                            <div class="feature_icon">
                                <img src="<?php the_sub_field('icon');?>">
                            </div>
                        <?php elseif ($contenttype == 'id'):?>
                            <div class="feature_index">
                                <span><?php the_sub_field('index');?></span>
                            </div>
                        <?php endif;?>

                        <h3><?php the_sub_field('title');?></h3>
                        <div class="content"><?php the_sub_field('content');?></div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>

            <?php if (get_sub_field('enable_cta_button')):?>
                <a class="cta_btn" target="_blank" <?php if (get_sub_field('button_id')):?>id="<?php the_sub_field('button_id'); ?>"<?php endif;?> href="<?php the_sub_field('button_link'); ?>">
                    <?php the_sub_field('button_text'); ?>
                </a>
            <?php endif;?>
        </div>
    </div>
</section>
<!-- Feature Lists Area End -->