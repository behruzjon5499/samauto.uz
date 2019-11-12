<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 24.08.2018
 * Time: 16:12
 */

$lang = Yii::$app->session->get('lang');
if($lang=='') $lang = 'ru';
$name = 'name_' . $lang;
$text = 'text_' . $lang;
$address = 'address_' . $lang;

$manager_doljnost_1 = 'manager_doljnost_1_' . $lang;
$manager_doljnost_2 = 'manager_doljnost_2_' . $lang;
$manager_doljnost_3 = 'manager_doljnost_3_' . $lang;

$manager_firstname_1 = 'manager_firstname_1_' . $lang;
$manager_firstname_2 = 'manager_firstname_2_' . $lang;
$manager_firstname_3 = 'manager_firstname_3_' . $lang;

$manager_lastname_1 = 'manager_lastname_1_' . $lang;
$manager_lastname_2 = 'manager_lastname_2_' . $lang;
$manager_lastname_3 = 'manager_lastname_3_' . $lang;

$descr = 'descr_'.$lang;

?>



<?php if($companies) { /*?>

    <div><div class="adress-name"><?=$company->region->name ?></div></div>

<?php*/

    $map = 0;
    foreach ($companies as $company) {
        $map++;
        ?>

        <div class="flex_row_beet">
            <div class="info-adress">
                <div class="logo-row">
                    <div class="img"><img src="/uploads/companies/<?=$company->id ?>/<?=$company->image ?>"></div>
                    <div class="logo-info-div">
                        <div class="mark-name"><?=$company->$name ?></div>
                        <div class="mark-info"><?=$company->$text ?>
                        </div>
                    </div>
                </div>
                <div class="info-companiy-row">
                    <div><?=$company->$manager_firstname_1 . ' ' . $company->$manager_lastname_1 .'<br>'. $company->$manager_doljnost_1 . ':<br>' .  $company->manager_phone_1 ?></div>
                    <div><?=$company->$manager_firstname_2 . ' ' . $company->$manager_lastname_2 .'<br>'. $company->$manager_doljnost_2 . ':<br>' .  $company->manager_phone_2 ?></div>
                    <div><?=$company->$manager_firstname_3 . ' ' . $company->$manager_lastname_3 .'<br>'. $company->$manager_doljnost_3 . ':<br>' .  $company->manager_phone_3 ?></div>
                </div>
                <div><p class="adress-title"><?=LangHelper::t("ОФИС ДИЛЕРА", "DILER OFISI", "DEALER'S OFFICE"); ?></p></div>
                <div class="info-companiy-row">
                    <div class="flex_col__cen text_center">
                        <div class="icon"><img src="/images/checkout/img2.png" alt=""></div>
                        <div><?=$company->$address ?>
                        </div>
                    </div>
                    <div class="flex_col__cen">
                        <div class="icon"><img src="/images/checkout/img3.png" alt=""></div>
                        <div><?=$company->phone ?></div>
                    </div>
                    <div class="flex_col__cen">
                        <div class="icon"><img src="/images/checkout/img4.png" alt=""></div>
                        <div><?=$company->email ?></div>
                    </div>
                </div>
            </div>
            <div class="miniMap">
                <div id="map<?=$map ?>"></div>
            </div>
        </div>
    <?php }
} ?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDL-pHnwb1JGvfG_7wCKcOa2aDOyexT8Ws&callback=initMap" async="" defer=""></script>

<?php

$m = 0;
$_companies = '';

if($companies) {
    foreach ($companies as $company) {
        $m++;

        $_companies .= "
        var location{$m} = new google.maps.LatLng({$company->lat},{$company->lon});
        var option{$m} = option;
        option{$m}.center = location{$m};
        
        var map{$m} = new google.maps.Map(document.getElementById(\"map{$m}\"), option{$m});
        
        var myMarker{$m} = new google.maps.Marker(
        {
            position: location{$m},
            map: map{$m},
        });";

    }
}

?>

<script>
    function initMap() {

        // console.log('init gmap');

        //var location1 = new google.maps.LatLng(41.2912094, 69.3213418);
        //var location2 = new google.maps.LatLng(41.2912094, 68.3213418);

        var option = {
            center: location1,
            zoom: 5,
            styles: [
                {
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#f5f5f5"
                        }
                    ]
                },
                {
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#616161"
                        }
                    ]
                },
                {
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "color": "#f5f5f5"
                        }
                    ]
                },
                {
                    "featureType": "administrative.country",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#4d023a"
                        },
                        {
                            "weight": 1
                        }
                    ]
                },
                {
                    "featureType": "administrative.land_parcel",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#000000"
                        }
                    ]
                },
                {
                    "featureType": "administrative.land_parcel",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#000000"
                        }
                    ]
                },
                {
                    "featureType": "administrative.province",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "weight": 2
                        }
                    ]
                },
                {
                    "featureType": "landscape.natural",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#eaeaea"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#eeeeee"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#757575"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#e5e5e5"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#fbb400"
                        },
                        {
                            "weight": 3.5
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#757575"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#fbb400"
                        },
                        {
                            "weight": 0.5
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#616161"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#9e9e9e"
                        }
                    ]
                },
                {
                    "featureType": "transit.line",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#e5e5e5"
                        }
                    ]
                },
                {
                    "featureType": "transit.station",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#eeeeee"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#c9c9c9"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#9e9e9e"
                        }
                    ]
                }
            ]
        };

        <?=$_companies ?>

    }

</script>
