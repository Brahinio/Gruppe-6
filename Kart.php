<!DOCTYPE html>
<html>
<head>
	<title>Kart</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <style>
        textarea {
            width: 90%;
        }
        input[type=checkbox] {
            margin-top: -6px;
            margin-left: 8%;
        }
        label {
            margin-left: -10%;
        }
        #googleMap {
            padding-top: 75%;
        }
    </style>
    
</head>
<body>
    
    <?php require "header.php" ?>

        <div class="w3-content w3-center">
            <h1>Kart</h1>

            <div class="w3-quarter w3-padding g6-bg">
                <form>
                    <p><textarea class="w3-input w3-padding-small w3-center" placeholder="Sted"></textarea></p>
                    <p>
                        <input id="checkbox1" class="w3-check w3-left" type="checkbox">
                        <label for="checkbox1">Matbutikker</label>
                    </p>
                    <p>
                        <input class="w3-check w3-left" type="checkbox">
                        <label>Restauranter</label>
                    </p>
                    <p>
                        <input class="w3-check w3-left" type="checkbox">
                        <label>Aktiviteter</label>
                    </p>
                    <p>
                        <input class="w3-check w3-left" type="checkbox">
                        <label>Treningssenter</label>
                    </p>
                    <p>
                        <input class="w3-check w3-left" type="checkbox">
                        <label>Skoler</label>
                    </p>
                    <p>
                        <button class="w3-btn w3-light-green w3-ripple">Søk</button>
                    </p>
                </form>
            </div>
            
            <div class="w3-threequarter g6-bg">
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
    
    <?php require "footer.php" ?>
    
</body>
</html>