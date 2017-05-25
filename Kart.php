<?php

require __DIR__ . '/setup.php';

$locations = Location::all();

?>
<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/kart.css">
	<title>Kart</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <?php require "header.php"; ?>

    <div class="w3-row">
        <div class="w3-content g6-padding">
            <div class="g6-center"><h1 class="g6-color-blue">Kart</h1>
                <p class="ingress">Her får du en kartoversikt over anbefalte steder</p>
            </div>

            <div class="w3-quarter g6-bg">
                <div class="sok-kategorier">
                    <div class="w3-col">
                        <p class="label-check">Vis kategori</p>
                        <div class="checkboxes">
                            <label class="w3-row"><input type="checkbox" class="g6-check" name="store" onchange="checkboxToggle(this)">Matbutikker</label>
                            <label class="w3-row"><input type="checkbox" class="g6-check" name="restaurant" onchange="checkboxToggle(this)">Restauranter</label>
                            <label class="w3-row"><input type="checkbox" class="g6-check" name="activity" onchange="checkboxToggle(this)">Aktiviteter</label>
                            <label class="w3-row"><input type="checkbox" class="g6-check" name="training" onchange="checkboxToggle(this)">Treningssenter</label>
                            <label class="w3-row"><input type="checkbox" class="g6-check" name="school" onchange="checkboxToggle(this)" checked>Skoler</label>
                        </div>
                    </div>
                    <button class="g6-search-kart g6-light-green" onclick="recenterMap()">Sentrer kart</button>
                </div>
            </div>
            
            
            <div class="w3-threequarter">
                <div id="googleMap"></div>
            </div>
            
            <script type="text/javascript">
                var Size = function(width, height) { return new google.maps.Size(width, height) };
                
                const iconBasePath = "http://maps.google.com/mapfiles/kml/";
                var markers = [];
                var infoWindows = [];
                var icons;
                var map;
                var mapProp;
                
                function initVars() {
                    icons = {
                        store: {url: iconBasePath + "pal4/icon5.png", scaledSize: Size(25, 25)},
                        restaurant: {url: iconBasePath + "pal2/icon32.png", scaledSize: Size(25, 25)},
                        activity: {url: iconBasePath + "pal2/icon19.png", scaledSize: Size(25, 25)},
                        training: {url: iconBasePath + "pal2/icon49.png", scaledSize: Size(25, 25)},
                        school: {url: iconBasePath + "pal2/icon2.png", scaledSize: Size(25, 25)},
                        school1: {url: iconBasePath + "pal3/icon48.png", scaledSize: Size(25, 25)},
                        school2: {url: "https://cdn4.iconfinder.com/data/icons/building-1/512/build2-512.png", scaledSize: Size(25, 25)}
                    };
                    
                    <?php foreach($locations as $location) { ?>
                        <?php if($location->category_id >= 2 && $location->category_id <= 6) { ?>
                            marker = new google.maps.Marker({
                                position: new google.maps.LatLng(<?= $location->lat ?>, <?= $location->lon ?>),
                                icon: icons.<?php 
                                    switch($location->category_id) {
                                        case 2:
                                            echo 'store';
                                            break;
                                        case 3:
                                            echo 'restaurant';
                                            break;
                                        case 4:
                                            echo 'activity';
                                            break;
                                        case 5:
                                            echo 'training';
                                            break;
                                        case 6:
                                            echo 'school2';
                                            break;
                                    }?>,
                                map: map});
                    
                            <?php $article = Article::where('location_id', $location->id)->first(); if(count($article) > 0 && $article != null) { ?>
                                infoWindow<?= $location->id ?> = new google.maps.InfoWindow({content: "<a href=\"./<?= $location->category_id == 2 ? 'mat.php?category=2' : ($location->category_id == 3 ? 'mat.php?category=3' : ($location->category_id == 4 ? 'aktiviteter.php?category=4' : 'aktiviteter.php?category=5' )) ?>\" style=\"color:blue\"><?= $article->title ?></a>"});
                                marker.addListener('click', function() { 
                                    closeAllInfoWindows();
                                    infoWindow<?= $location->id ?>.open(map, this);
                                });
                                infoWindows.push(infoWindow<?= $location->id ?>);
                            <?php } ?>
                            markers.push(marker);
                        <?php } ?>
                    <?php } ?>
                }
                
                function initMap() {
                    initVars();
                    
                    mapProp = {
                        center: new google.maps.LatLng(59.920119, 10.755048),
                        zoom: 15,
                        styles: [
                        {
                            featureType: "all",
                            elementType: "labels",
                            stylers: [{ visibility: "off" }]
                        }]
                    };
                    map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
                    
                    updateMarkers(icons.school2, map);
                }
                
                function updateMarkers(icon, value) {
                    
                    markers.forEach(function(marker) {
                        if(marker.icon.url == icon.url) marker.setMap(value);
                    });
                    
                }
                
                function closeAllInfoWindows() {
                    infoWindows.forEach(function(infoWindow) {
                        infoWindow.close();
                    });
                }
                
                function recenterMap() {
                    map.setCenter(mapProp.center);
                    map.setZoom(mapProp.zoom);
                }
                
                function checkboxToggle(element) {
                    if(element.checked) {
                        switch(element.name) {
                            case "store":
                                updateMarkers(icons.store, map);
                                break;
                            case "restaurant":
                                updateMarkers(icons.restaurant, map);
                                break;
                            case "activity":
                                updateMarkers(icons.activity, map);
                                break;
                            case "training":
                                updateMarkers(icons.training, map);
                                break;
                            case "school":
                                updateMarkers(icons.school2, map);
                                break;
                        }
                    }
                    else if(!element.checked) {
                        switch(element.name) {
                            case "store":
                                updateMarkers(icons.store, null);
                                break;
                            case "restaurant":
                                updateMarkers(icons.restaurant, null);
                                break;
                            case "activity":
                                updateMarkers(icons.activity, null);
                                break;
                            case "training":
                                updateMarkers(icons.training, null);
                                break;
                            case "school":
                                updateMarkers(icons.school2, null);
                                break;
                        }
                    }
                }
            </script>

            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABU9OGK_b-B0QpXLeYWa8oaWseYaBBgUg&callback=initMap"></script>

        </div>
    </div>
    
<?php require "footer.php" ?>