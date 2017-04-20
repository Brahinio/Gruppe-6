<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Webprosjekt" content="">
    <meta name="Gruppe 6" content="">
    
    <link rel="stylesheet" type="text/css" href="css/main.css">
    
    <script src="https://use.fontawesome.com/217512596e.js"></script>
    
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto+Condensed">

</head>
<html>
    <div id="containerHeader">
        <div id="containerHeaderContent">
            <h3>OVERSKRIFT</h3>
            
            <script>
                function showHideMenu() {
                    var dropDown = document.querySelector(".hamburger");
                            
                    if(dropDown.classList.contains("is-active")) {
                        dropDown.classList.remove("is-active");

                    } else {
                        dropDown.classList.add("is-active");
                    }
                 }
            </script>
            
            <button class="hamburger hamburger-anim" type="button" onclick="showHideMenu()">
                <h3>MENY</h3>
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
</html>