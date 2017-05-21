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

                <div class="w3-row">
                    <div class="w3-full">
                        <p class="g6-text-left g6-blued-out-text">kontakt oss:</p>

                        <p class="g6-text-left"><a href="./kontakt.php" alt="kontakt"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i>&nbsp; kontakt@gruppe-6.no</a></p>
                        <p class="g6-text-left"><a href="./kontakt.php" alt="kontakt"><i class="fa fa-phone fa-fw" aria-hidden="true"></i>&nbsp; 66 66 66 66</a></p>
                    </div>
                </div>
                    
                <div class="copyright">
                    <p><a href="./kontakt.php" alt="kontakt"><span class="w3-left g6-greyed-out-text">GRUPPE-6 © 2017</span></a></p>
                    <p><span class="w3-right g6-greyed-out-text">Org. Nr.: 666 666 666</span></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>