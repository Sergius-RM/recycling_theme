<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$text = get_the_excerpt();
$words = 20;
$excerpt_lenght = 20;
$more = '…';
$excerpt = wp_trim_words( $text, $words, $more );
?>
<?php $lang = $_SERVER['REQUEST_URI'];  $rest = substr($lang, 0, 4);?>
<?php if ($rest == '/en/'):?>
    <?php $learn_more = 'Read more'; ?>
<?php elseif ($rest == '/sv/'):?>
    <?php $learn_more = 'Läs mer'; ?>
<?php else:?>
    <?php $learn_more = 'Lue lisää'; ?>
<?php endif; ?>

<!-- Blog Grid Area Start -->
<section class="pages_grid">
    <div class="container">

        <div class="section-title text-center">
            <?php if( get_sub_field('h2_header') ): ?>
                <h2><?php echo get_sub_field('h2_header'); ?></h2>
            <?php endif; ?>
        </div>
        <div class="row">

            <?php if( get_sub_field('content') ): ?>
                <div class="blogrid-content text-center">
                    <?php echo get_sub_field('content'); ?>
                </div>
            <?php endif; ?>

<?php if( have_rows('custom_pages') ): ?>
    <?php while( have_rows('custom_pages') ) : the_row(); ?>
            <div class="col-12 col-sm-6 col-xl-4 post_item equal-height">
                <div class="articles-item">
                    <div class="image">
                        <a href="<?php the_sub_field('link');?>">
                            <img src="<?php the_sub_field('image');?>" alt="<?php the_title(); ?>">
                        </a>
                    </div>

                    <div class="articles-content">

                        <h3>
                            <a href="<?php the_sub_field('link');?>">
                                <?php the_sub_field('title');?>
                            </a>
                        </h3>

                        <p><?php the_sub_field('content');?></p>

                        <a href="<?php the_sub_field('link');?>" class="learn-more"><?php echo $learn_more; ?> <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
    <?php endwhile; ?>
<?php endif; ?>

        </div>
    </div>
</div>
</section>
<!-- Blog Grid Area END  -->
