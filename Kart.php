<?php
    require 'URL.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Prosjekt</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link rel="stylesheet" type="text/css" href="CSS/header.css">
    <style>
        #dropdowncontent{
            display:<?php echo $menu ?>;
            position: absolute;
            left: 0;
            top: 100px;
            width: 1000px;
            height: 300px;
            background-color: #87CEFA;
            margin-right: auto; 
            margin-left: auto;
            z-index: 1;
            animation-name: menuanim;
            animation-duration: 2s;
        }
        @-webkit-keyframes menuanim {
            from {width:1000px; height:0;}
            to {width:1000px; height:300px;}
        }
    </style>
</head>
<body>
    
    <div id="wrap">

        <div id="header">

            <div id="dropdown">
                
                <a href="<?php echo $link ?>"><img src="img/navicon.png" id="icon"></a>
                
                 <div id="dropdowncontent">
                    
                     <table>
                            
                          <tr>
                            <th>Mat</th>
                            <th>Aktiviteter</th>
                            <th>Kart</th>
                            <th>Forslagside</th>
                          </tr>
                          <tr>
                            <td><a href="https:/google.com">Fisk</a></td>
                            <td><a href="">Fisking</a></td>
                            <td><a href="">Fiskesteder</a></td>
                            <td><a href="">Beste fiskesteder</a></td>
                          </tr>
                          <tr>
                            <td><a href="">Hamburger</a></td>
                            <td><a href="">Vet ikke</a></td>
                            <td><a href="">SIden til kartet</a></td>
                            <td><a href="">foslag</a></td>
                          </tr>

                    </table>
                    
                </div>

            </div>
            
            <a href="/"><h1>Oversikt</h1></a>
            
        </div>
        
        <div id="line">
        </div>

        <div id="content">

            <h1>Kart</h1>
            

        </div>
        
        
        
    </div>
</body>
</html>