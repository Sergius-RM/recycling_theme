<?php

error_reporting(E_ALL ^ E_WARNING);

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$pricing_type = get_sub_field('pricing_type');

$api_key = get_field('api_google_sheets', 'option');
$sheet_id = get_field('google_sheets_id', 'option');

?>

<!-- Pricing Section Start -->
<section class="pricing_section">
    <div class="container">

    <?php if ($pricing_type == 'sheets_api'):?>

        <?php

        $sheetTab = get_sub_field('sheet_tab');
        $range = get_sub_field('sheet_range');

        if (!empty($sheetTab)) {
            $range = $sheetTab .'!'. $range;
        } else {
            $range = $range;
        }

        if ($sheet_id && $api_key && $range) {
            require_once 'wp-content/themes/ran-recycling/vendor/autoload.php';

            // Код запроса к Google Sheets API и получение данных
            $client = new Google\Client();
            $client->setApplicationName('Google Sheets API PHP');
            $client->setScopes([Google_Service_Sheets::SPREADSHEETS_READONLY]);
            $client->setAuthConfig( get_template_directory() . '/credentials.json');
            $client->setScopes([Google_Service_Sheets::SPREADSHEETS_READONLY]);
            $service = new Google_Service_Sheets($client);
            $spreadsheetId = $sheet_id;

            $response = $service->spreadsheets_values->get($spreadsheetId, $range);
            $values = $response->getValues();

            if (!empty($values)) { ?>
                <div class="row mx-auto pricing_list pricing_google_sheets">
                <?php foreach ($values as $row) { ?>

                    <?php
                        $cell_a = isset($row[0]) ? $row[0] : '';
                        $cell_b = isset($row[1]) ? $row[1] : '';
                        $cell_c = isset($row[2]) ? $row[2] : '';
                    ?>

                    <div class="col-sm-6 col-md-4 col-lg-4 mx-auto pricing_loop equal-height">
                        <div class="pricing_item">
                            <div class="price_top d-flex">
                                <div class="price">
                                    <h3><?php echo esc_html($cell_a); ?></h3>
                                    <div class="price_currency"><?php echo esc_html($cell_b); ?> €/1000kg</div>
                                </div>
                                <?php if (!empty($cell_c)):?>
                                    <div class="price_arrow">
                                        <div class="spoiler_link">↓</div>
                                    </div>
                                <?php endif;?>
                            </div>
                            <div class="price_content ">
                                <?php echo esc_html($cell_c); ?>
                            </div>
                        </div>
                    </div>

                <?php } ?>
                </div>
            <?php } else {
                echo 'Data not found.';
            }
        } else {
            echo 'Set up Google Sheets ID, API Key and Sheet Range in ACF.';
        }
        ?>

    <?php elseif ($pricing_type == 'manual_input'):?>

        <?php if( have_rows('pricing_loop') ): ?>
            <div class="row mx-auto pricing_list">
            <?php while( have_rows('pricing_loop') ) : the_row(); ?>
                <div class="col-sm-6 col-md-4 col-lg-4 mx-auto pricing_loop">
                    <div class="pricing_item">
                        <div class="price_top d-flex">
                            <div class="price">
                                <h3><?php the_sub_field('name'); ?></h3>
                                <?php the_sub_field('currency'); ?>
                            </div>
                            <div class="price_arrow">
                                <div class="spoiler_link">↓</div>
                            </div>
                        </div>
                        <div class="price_content ">
                            <?php the_sub_field('content'); ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            </div>
        <?php endif; ?>

    <?php endif;?>

    </div>

</section>
<!-- Pricing Statements Section End -->