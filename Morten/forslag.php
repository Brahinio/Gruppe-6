<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="stylesheet" type="text/css" href="css/main.css">
    
    <!-- Fonts -->
    <script src="https://use.fontawesome.com/217512596e.js"></script>
    
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto+Condensed">

    <title><?php echo "Forslag"; ?></title>

</head>
<body>
    
    <?php 
        require_once 'header.php';
    ?>

    <div id="container">
        
        <h1 id="undertitle"><?php echo "Forslag"; ?></h1>
        
        <div id="containerTopLeft">
        
            <section id="search">
                <label for="search-input"><i class="fa fa-search" aria-hidden="true"></i><span class="sr-only"></span></label>
                
                <input id="search-input" placeholder="Søk..." onfocus="this.placeholder = ''" 
                       onblur="this.placeholder = 'Søk...'" autocomplete="off" spellcheck="false" autocorrect="off" tabindex="1">
                
                <a id="search-clear" href="/clear.php" class="fa fa-times-circle" aria-hidden="true"><span class="sr-only"></span></a>
                
                <div section="addSuggestionContainer">
                    
<!--
                    <script>
                        function showHide() {
                            if(document.getElementById('addSuggestion').hidden == false) {
                                document.getElementById('addSuggestion').hidden = true;
                            
                            } else {
                                document.getElementById('addSuggestion').hidden = false;
                            }
                        }
                    </script>

                    <script>
                        function showHide(id) {
                            var checkCSS = document.getElementById(id);
                            var displaySetting = checkCSS.style.display;
                            
                            if(displaySetting == 'block') {
                                checkCSS.style.display = 'none';
                            
                            } else {
                                checkCSS.style.display = 'block';
                            }
                        }
                    </script>

                    <script>
                        function showHide(idToHide) {
                            var dropDown = document.querySelector(idToHide);
                            
                            if(dropDown.classList.contains("hide")) {
                                dropDown.classList.remove("hide");

                            } else {
                                dropDown.classList.add("hide");
                            }
                        }
                    </script>
-->                    
                    
                    <script>
                        function showHide(idToHide) {
                            var checkCSS = document.getElementById(idToHide);
                            
                            if(checkCSS.style.visibility == 'hidden' || checkCSS.style.visibility == '') {
                                checkCSS.style.visibility = 'visible';
                                checkCSS.style.opacity = '1';
                                checkCSS.style.padding = '0px 0px 220px 0px';
                                
                                // Replace icon
                                var els = [].slice.apply(document.getElementsByClassName("fa fa-plus"));
                                for(var i = 0; i < els.length; i++) {
                                    els[i].className = els[i].className.replace(/ *\bfa fa-plus\b/g, "fa fa-minus");
                                }
                                
                            } else {
                                checkCSS.style.visibility = 'hidden';
                                checkCSS.style.opacity = '0';
                                checkCSS.style.padding = '0px 0px 0px 0px';
                                
                                // Replace icon
                                var els = [].slice.apply(document.getElementsByClassName("fa fa-minus"));
                                for(var i = 0; i < els.length; i++) {
                                    els[i].className = els[i].className.replace(/ *\bfa fa-minus\b/g, "fa fa-plus");
                                }
                            }
                        }
                    </script>
                    
                    <button id="addSuggestionButton" type="submit" onclick="showHide('addSuggestion')"><i class="fa fa-plus" aria-hidden="true"></i>Legg til forslag</button>
                    
                </div>
            </section>

            <section id="addSuggestion">
                <form action="/addSuggestion.php" method="post" id="addSuggestionForm">
                    
                    <input type="text" name="tittel" placeholder="Tittel" onfocus="this.placeholder = ''" 
                           onblur="this.placeholder = 'Tittel'" autocomplete="off" spellcheck="false" autocorrect="off">
                    
                    <input type="text" name="description" placeholder="Beskrivelse..." onfocus="this.placeholder = ''" 
                           onblur="this.placeholder = 'Beskrivelse...'" autocomplete="off" spellcheck="false" autocorrect="off">
                    
                    <!-- TEXTAREA BØR ERSTATTE TEXT-BESKRIVELSE!
                         Steng også av mulighet for resize og tøm innhold ved focus.
                    <textarea rows="5" cols="29" name="description" form="addSuggestionForm">Beskrivelse...</textarea>
                    -->

                    <select name="categories" id="categories" required form="addSuggestionForm">
                        <option value="test1">Kategori</option>
                        <option value="test2">Test2</option>
                        <option value="test3">Test3</option>
                        <option value="test4">Test4</option>
                    </select>

                    <button id="send" type="submit">Send</button>
                </form>
            </section>

            <section id="sortBy">
                <form action="/sortBy.php">
                    <button type="submit">Nyeste</button>
                    <button type="submit">Topprangert</button>
                </form>
                
                <div id="sortView">
                    <i class="fa fa-list-ul" aria-hidden="true"></i>
                    <i class="fa fa-th-large" aria-hidden="true"></i>
                </div>
            </section>
            
        </div>
        
        <div id="containerTopRight">
            <div id="selectCategories">
                <h3>Kategorier</h3>
                
                <ul>
                    <li>Test</li>
                    <li>Test2</li>
                    <li>Test3</li>
                    <li>Test4</li>
                </ul>
            </div>
        </div>
        
        <div id="containerBottom">
            <div class="elementBlock">
                <div class="votes"></div>
                <div class="text">
                    <h3>Information Technology - Semiconductor Equipment</h3>
                    <p>Lorem ipsum dolor sit amet, duo ea mutat honestatis, at munere evertitur cum, duo eu vivendum euripidis. Nominati iracundia ea ius, unum audiam eos eu. Laudem iisque ancillae vim te. Vis idque vidisse democritum et, in vel harum alienum dissentiet. In eirmod feugiat recteque eum. Viderer invidunt ad vel, eius corrumpit signiferumque sit te.</p>
                </div>
            </div>
            <div class="elementBlock">
                <div class="votes"></div>
                <div class="text">
                    <h3>Consumer Discretionary</h3>
                    <p>MINDRE TEKST- MER BILDER? VIS ARTIKLER I BLOKKER (slik vist i forelesning / westerdals.no)? HEADER BØR OPPFØRE SEG SOM westerdals sin? Bedre med kategorier i drop-down? Vis idque vidisse democritum et, in vel harum alienum dissentiet. In eirmod feugiat recteque eum. Viderer invidunt ad vel, eius corrumpit signiferumque sit te.</p>
                </div>
            </div>
            <div class="elementBlock">
                <div class="votes"></div>
                <div class="text">
                    <h3>Data Processing and Outsourced Services</h3>
                    <p>Lorem ipsum dolor sit amet, duo ea mutat honestatis, at munere evertitur cum, duo eu vivendum euripidis. Nominati iracundia ea ius, unum audiam eos eu. Laudem iisque ancillae vim te. Vis idque vidisse democritum et, in vel harum alienum dissentiet. In eirmod feugiat recteque eum. Viderer invidunt ad vel, eius corrumpit signiferumque sit te.</p>
                </div>
            </div>
        </div>
    </div>
    
    <?php 
        require_once 'footer.php';
    ?>

</body>
</html>