<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/kart.css">
	<title>Kart</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
    
    <?php require "header.php"; ?>
    
<body>
    <div class="w3-row">
        <div class="w3-content">
            <div class="g6-center"><h1>Kart</h1></div>

            <div class="w3-quarter w3-padding g6-bg g6-margin-top">
                <form>
                    <textarea class="select-kategorier w3-input w3-padding-small" placeholder="Sted"></textarea>
                    <div class="checkboxes w3-left">
                        <input class="g6-check" type="checkbox"><br>
                        <input class="g6-check" type="checkbox"><br>
                        <input class="g6-check" type="checkbox"><br>
                        <input class="g6-check" type="checkbox"><br>
                        <input class="g6-check" type="checkbox">
                    </div>
                    <div class="label-kategorier">
                        <p>Matbutikker</p>
                        <p>Restauranter</p>
                        <p>Aktiviteter</p>
                        <p>Treningssenter</p>
                        <p>Skoler</p>
                    </div>
                    <button class="g6-search-kart w3-btn w3-light-green w3-ripple">Søk</button>
                </form>
            </div>
            
            <div class="w3-threequarter g6-bg g6-margin-top">
                <div id="googleMap" class="w3-margin" style=""></div>
            </div>
            
            <script>
                function myMap() {
                    var mapProp = {
                        center:new google.maps.LatLng(59.911491, 10.757933),
                        zoom:15,
                    };
                    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
                }
            </script>

            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABU9OGK_b-B0QpXLeYWa8oaWseYaBBgUg&callback=myMap"></script>

        </div>
    </div>
    
    <?php require "footer.php" ?>
    
</body>
</html>