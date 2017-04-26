<!DOCTYPE html>
<html>
<head>

        <title><?php echo "Forside"; ?></title>
</head>
<body>
    
    <?php 
        require_once 'headerNew.php';
    ?>
    
    <div class="w3-row g6-no-header-space">

        <section class="image-slider w3-row g6-shadow-2 g6-margin">
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
        </section>
        
        <section class="contentBlockIndex w3-content g6-margin g6-padding">
            
            <section class="intro-info g6-center w3-row">
                <div class="g6-border-bottom g6-padding">
                    <h2>Hva skjer rundt Westerdals?</h2>
                </div>

                <div class="g6-margin">
                    <h4>En hyggelig middag, treningssenter, eller et sted hvor du og dine venner kan ta en øl.
                    Her får du vite mer om hva som finnes rundt din campus!</h4>
                    <div class="button"></div>
                </div>
            </section>

            <section class="infoboxes w3-row g6-center g6-margin g6-border-bottom">
                <div class="w3-third g6-margin g6-content-padding">
                    <h4 class="w3-card-4">ikon/knapp</h4>
                    <p>Lorem ipsum dolor sit amet, duo ea mutat honestatis. Lorem ipsum dolor sit amet, duo ea mutat honestatis, at munere evertitur cum, duo eu vivendum euripidis.</p>
                </div>
                <div class="w3-third g6-margin g6-content-padding">
                    <h4 class="w3-card-4">ikon/knapp</h4>
                    <p>Lorem ipsum dolor sit amet, duo ea mutat honestatis. Lorem ipsum dolor sit amet, duo ea mutat honestatis, at munere evertitur cum, duo eu vivendum euripidis.</p>
                </div>
                <div class="w3-third g6-margin g6-content-padding">
                    <h4 class="w3-card-4">ikon/knapp</h4>
                    <p>Lorem ipsum dolor sit amet, duo ea mutat honestatis. Lorem ipsum dolor sit amet, duo ea mutat honestatis, at munere evertitur cum, duo eu vivendum euripidis.</p>
                </div>
            </section>

            <section class="feeds w3-row g6-margin-top">
                <div class="w3-row g6-margin">
                    <div class="w3-half g6-content-padding">
                        <p>Hent ut bilder med gitt hash tags (så studenter kan legge opp bilder fra det de gjør?)?
                        <br>- kategorier burde ikke påvirkes av drop-down
                        <br>- legg på farger- gjør header penere!
                        <br>- slideren egner seg dårlig til touch</p>
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
    
    <?php 
        require_once 'footer.php';
    ?>

</body>
</html>