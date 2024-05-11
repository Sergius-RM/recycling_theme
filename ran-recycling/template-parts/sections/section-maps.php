<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$map_type = get_sub_field('map_type');

?>

<!-- Maps Section Start -->
<section class="maps_section">

    <div class="container-fluid">
        <?php if ($map_type == 'code'):?>

            <?php the_sub_field('map_code'); ?>

        <?php elseif ($map_type == 'api'):?>

            <script src="https://maps.googleapis.com/maps/api/js?key=<?php the_sub_field('google_maps_api');?>"></script>

            <script>
            window.initialize = function(){

            var myLatlng = new google.maps.LatLng(65.7796236, 24.5519743);
                <?php if( have_rows('map_coordinates') ): ?>
                    <?php $id = 1;?>
                    <?php while( have_rows('map_coordinates') ) : the_row(); ?>
                    <?php $latlng = get_sub_field('latlng');?>
                    var pos<?php echo $id;?> = new google.maps.LatLng(<?php echo $latlng;?>);
                        <?php $id++;?>
                    <?php endwhile; ?>
                <?php endif; ?>

            var mapOptions = {
                zoom: 12,
                center: myLatlng
            }
            var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

            var image =  '/wp-content/themes/ran-recycling/assets/images/icons/pin2.png';

            <?php if( have_rows('map_coordinates') ): ?>
                <?php $posid = 1;?>
                <?php while( have_rows('map_coordinates') ) : the_row(); ?>
                <?php $name = get_sub_field('name');?>

                    var marker = new google.maps.Marker({
                        position: pos<?php echo $posid;?>,
                        map: map,
                        title: '<?php echo $name;?>',
                        icon: image
                    });

                    <?php $posid++;?>
                <?php endwhile; ?>
            <?php endif; ?>

            }
            google.maps.event.addDomListener(window, 'load', initialize);
            </script>

            <div class="map" id="map-canvas"></div>

        <?php endif;?>
    </div>

</section>
<!-- Maps Section END -->