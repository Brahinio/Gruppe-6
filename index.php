<?php
    require 'URL.php'
?>
<!DOCTYPE html>
<html>
<head>
	<title>Prosjekt</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link rel="stylesheet" type="text/css" href="CSS/header.css">
    <style>
        
        <?php
            require 'dropdowncss.php';
        ?>
        
    </style>
</head>
<body>
    
    <div id="wrap">

      <?php 
        require 'header.php'
        ?>
        
        <div id="line">
        </div>

        <div id="content">

            <img src="img/placeholder/food-005.jpg" class="post-img" alt="Hamburger" />
            
            <h2>Hva skjer på Westerdals</h2>
            
            <div id="contentline">
            </div>
            
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>

        </div>
        
        <?php
            require 'twitter.php';
        ?>

    </div>  
    
</body>
</html>
