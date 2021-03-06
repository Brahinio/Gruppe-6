<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <title>WeSup</title>

    <?php require_once 'header.php'; ?>
    
    <div class="w3-row g6-no-header-space">

        <section class="image-slider w3-row w3-content w3-padding">
            <div class="w3-display-container">
                <div class="w3-display-container mySlides">
                    <img src="Stedsbilder/slider_1_1.jpg">
                    <a href="./mat.php" alt="Schouskjelleren Mikrobryggeri">
                        <div class="slider-text w3-large w3-container w3-padding-16 w3-black">
                           <h3>Schouskjelleren Mikrobryggeri</h3>
                        </div>
                    </a>
                </div>

                <div class="w3-display-container mySlides">
                    <img src="Stedsbilder/slider_2_1.jpg">
                    <a href="./mat.php" alt="Blå">
                        <div class="slider-text w3-large w3-container w3-padding-16 w3-black">
                            <h3>Blå: events lysten?</h3>
                        </div>
                    </a>
                </div>

                <div class="w3-display-container mySlides">
                    <img src="Stedsbilder/slider_3_1.jpg">
                    <a href="./mat.php" alt="Vulkan">
                        <div class="slider-text w3-large w3-container w3-padding-16 w3-black">
                            <h3>Ved Vulkan: rett over vegen</h3>
                        </div>
                    </a>
                </div>

                <button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
                <button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>
            </div>

            <script>
                var slideIndex = 1;
                showDivs(slideIndex);

                function plusDivs(n) {
                  showDivs(slideIndex += n);
                }

                function showDivs(n) {
                  var i;
                  var x = document.getElementsByClassName("mySlides");
                  if (n > x.length) {slideIndex = 1}    
                  if (n < 1) {slideIndex = x.length}
                  for (i = 0; i < x.length; i++) {
                     x[i].style.display = "none";  
                  }
                  x[slideIndex-1].style.display = "block";  
                }

                var myIndex = 0;
                carousel();

                function carousel() {
                    var i;
                    var x = document.getElementsByClassName("mySlides");
                    for (i = 0; i < x.length; i++) {
                       x[i].style.display = "none";  
                    }
                    myIndex++;
                    if (myIndex > x.length) {myIndex = 1}    
                    x[myIndex-1].style.display = "block";  
                    setTimeout(carousel, 3000); // Change image every 3 seconds
                }

                function plusDivs(n) {
                  showDivs(slideIndex += n);
                }
            </script>
            
            <!-- OLD SLIDER
            <div class="home-mast">
                <div class="home-mast__container">
                    <div>
                        <div class="absolute-bg" style="background-image: url('https://source.unsplash.com/3IEZsaXmzzs/1500x1200');"></div>
                    </div>
                    <div class="">
                        <div class="absolute-bg" style="background-image: url('https://source.unsplash.com/OcWwYCVIOOU/1500x1200');"></div>
                    </div>
                    <div class="">
                        <div class="absolute-bg" style="background-image: url('https://source.unsplash.com/z55CR_d0ayg/1500x1200');"></div>
                    </div>
                    <div class="">
                        <div class="absolute-bg" style="background-image: url('https://source.unsplash.com/Oj82K0a0XOE/1500x1200');"></div>
                    </div>
                </div>
            </div>
            -->
        </section>
        
        <section class="contentBlockIndex w3-content g6-margin g6-padding">
            
            <section class="intro-info g6-center w3-row">
                <div class="g6-border-bottom g6-padding">
                    <h2>Hva skjer, Westerdals?</h2>
                </div>

                <div class="g6-margin">
                    <h4>En hyggelig middag, treningssenter, eller et sted hvor du og dine venner kan ta en øl.
                    Her får du vite mer om hva som finnes rundt din campus!</h4>
                    <div class="button"></div>
                </div>
            </section>

            <section class="infoboxes w3-row g6-center g6-margin g6-border-bottom">
                <div class="w3-third g6-margin g6-content-padding">
                    <a href="./mat.php"><h4 class="w3-card-2">Mat</h4></a>
                    <p>De beste spisestedene- rangert etter din lommebok. Hvorfor ikke invitere en medstudent på en kopp kaffe?</p>
                    
                </div>
                <div class="w3-third g6-margin g6-content-padding">
                    <a href="./aktiviteter.php"><h4 class="w3-card-2">Aktiviteter</h4></a>
                    <p>Hva skal man finne på? Volleyball i parken, minigolf eller et slag sjakk. Ta et lite avbrekk og gjør studietiden minnerik!</p>
                </div>
                <div class="w3-third g6-margin g6-content-padding">
                    <a href="./Kart.php"><h4 class="w3-card-2">Kart</h4></a>
                    <p>Kartoversikt over alle steder- slik at du enkelt kan finne fram til de feteste tilbudene uten å gå deg fullstendig vill.</p>
                </div>
            </section>

            <section class="feeds w3-row g6-margin-top">
                <div class="w3-row g6-margin">
                    <div class="w3-half g6-content-padding extra-right-space">
                        <h3 class="w3-threequarter">Det er mye interessant rundt campus- men det finnes
                            like mye fett på campus! Sjekk ut disse:</h3>
                        <ul class="campus-lenker w3-col">
                            <li><a href="https://www.facebook.com/SkjenkestuaStudentbar/?fref=ts" alt="Skjenkestua" target="_blank">Skjenkestua Studentbar</a></li>
                            <li><a href="https://www.facebook.com/westerdalsmakerspace/?fref=ts" alt="Makerspace" target="_blank">Westerdals Makerspace</a></li>
                            <li><a href="https://www.facebook.com/bibliowesterdalsosloact/?fref=ts" alt="Biblioteket" target="_blank">Biblioteket (låne retrokonsoller, anyone?)</a></li>
                            <li><a href="https://www.westerdals.no/artikkel/greenscreenrom/" alt="VR og green room" target="_blank">VR og green room på Brenneriveien</a></li>
                            <li><a href="https://www.facebook.com/westerdalsrevyen/?fref=ts" alt="Revyen" target="_blank">Westerdalsrevyen</a></li>
                            <li><a href="https://www.facebook.com/groups/nith.ksb/?ref=br_rs" alt="kjop, salg, bytte" target="_blank">Kjøp, salg, bytte (Westerdals)</a></li>
                            <li><a href="https://www.facebook.com/groups/327516017350960/" alt="fotball" target="_blank">Westerdals Fotball</a></li>
                            <li><a href="https://www.westerdals.no/foreninger/" alt="Foreninger" target="_blank">Eller kanskje du vil starte egen forening?</a></li>
                        </ul>
                    </div>
                    <div class="twitterFeed w3-half w3-card-2 g6-center g6-content-padding">
                        <a class="twitter-timeline" data-height="400" data-width="400" href="https://twitter.com/westerdalsact">Tweets fra Westerdals ACT</a> 
                        <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                </div>
                <div class="w3-row g6-border-top">
                    <h3 class="g6-center g6-padding-both">#westerdals</h3>
                    <script src="//assets.juicer.io/embed.js" type="text/javascript"></script>
                    <link href="//assets.juicer.io/embed.css" media="all" rel="stylesheet" type="text/css" />
                    <ul class="juicer-feed" data-feed-id="westerdals"></ul>
                </div>
            </section>
            
        </section>
        
    </div>
    
<?php require_once 'footer.php'; ?>