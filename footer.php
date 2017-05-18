<html>
    
    <!-- Cookies -->
    <?php if(!isset($_COOKIE['cAccepted'])) { ?>
        <div class="w3-row">
            <div class="g6-cookies g6-padding">
                <div class="w3-content w3-display-container g6-center">
                    <span onclick="this.parentElement.style.display='none'; setCookie('cAccepted', '1', '365');" class="w3-button w3-display-topright"><i class="fa fa-remove"></i></span>
                    <h3>Denne nettsiden bruker cookies</h3>
                    <p><a href="/cookies.php">Les mer om våre informasjonskapsler (cookies)</a></p>
                </div>
            </div>
        </div>
    <?php } ?>
    
    <!-- Footer -->
    <div class="w3-row">
        <div class="w3-container g6-bg g6-footer g6-margin-top">
            <div class="g6-footer-content w3-content g6-center">
                <h3 class="logo g6-color-blue"><a href="./" alt="forside">WeSup</a></h3>
                <h3>Send inn dine beste <a href="./forslag.php" alt="forslag">forslag</a> <i class="fa fa-heart w3-text-red" aria-hidden="true"></i> og del dine kuleste opplevelser med #westerdals 
                    <i class="fa fa-hand-o-left w3-text-green" aria-hidden="true"></i></h3>
                
                <div class="copyright w3-left"><a href="./kontakt.php" alt="kontakt"><p>GRUPPE-6 © 2017</p></a></div>
            </div>
        </div>
    </div>
</html>