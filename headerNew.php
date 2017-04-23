<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Webprosjekt" content="">
    <meta name="Gruppe 6" content="">
    
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="css/w3.css">
    
    <link rel="icon" type="image/png" href="img/favicon.png">
    
    <script src="scripts/fontAwesome.js"></script>
    
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto+Condensed">
</head>

<html>
    <div class="w3-container g6-bg g6-top">
        <div class="w3-threequarter">
            <h3 id="logo">OVERSKRIFT - gjør header fixed og reduser størrelse ved scroll</h3>
        </div>

        <div class="w3-quarter">
            <script>
                // Menu onclick
                function showHideMenu() {
                    var dropDown = document.querySelector(".hamburger");

                    if(dropDown.classList.contains("is-active")) {
                        dropDown.classList.remove("is-active");

                    } else {
                        dropDown.classList.add("is-active");
                    }
                    
                    // Drop down
                    var x = document.getElementById("menuMain");
                    
                    if (x.className.indexOf("w3-show") == -1) 
                        x.className += " w3-show";
                    else 
                        x.className = x.className.replace(" w3-show", "");
                 }
            </script>
            
            <div class="w3-dropdown-click">
                <button onclick="showHideMenu()" class="w3-button hamburger hamburger-anim">
                    <h3 id="menuLabel">MENY</h3>
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
                <div id="menuMain" class="g6-menu w3-dropdown-content w3-bar-block w3-border">
                    <a href="#" class="w3-bar-item w3-button">Link 1</a>
                    <a href="#" class="w3-bar-item w3-button">Link 2</a>
                    <a href="#" class="w3-bar-item w3-button">Link 3</a>
                </div>
            </div>
        </div>
    </div>
</html>