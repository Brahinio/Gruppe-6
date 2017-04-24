<!DOCTYPE html>
<html>
<head>
        <title><?php echo "Forslag"; ?></title>
</head>
<body>
    
    <?php 
        require_once 'headerNew.php';
    ?>
    
    <div class="w3-row">
        <div class="w3-content">
            <div class="w3-container w3-half">

                <div id="containerSuggestions">
                    <section id="search">
                        <label for="search-input"><i class="fa fa-search" aria-hidden="true"></i><span class="sr-only"></span></label>

                        <input id="search-input" placeholder="Søk..." onfocus="this.placeholder = ''" 
                               onblur="this.placeholder = 'Søk...'" autocomplete="off" spellcheck="false" autocorrect="off" tabindex="1">

                        <a id="search-clear" type="submit" class="fa fa-times-circle" aria-hidden="true"><span class="sr-only"></span></a>

                        <!-- Empty search field on clicking red cross and maintain focus -->
                        <script>
                            var text = document.getElementById('search-input');
                            var button = document.getElementById('search-clear');
                            button.onclick = function() {
                                text.value = '';
                                text.focus();
                            }
                        </script>

        <!-- Finding the best solution to hide content (kept for testing and assurement)

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

                        <!-- Jump down fields for adding suggestions -->
                        <script>
                            function showHide(idToHide, iconOne, iconTwo) {
                                var checkCSS = document.getElementById(idToHide);
                                // var plusMinus = document.getElementById(iconOne);
                                // var plusMinusTwo = document.getElementById(iconTwo);

                                if (checkCSS.style.visibility == 'hidden' || checkCSS.style.visibility == '') {
                                    checkCSS.style.visibility = 'visible';
                                    checkCSS.style.opacity = '1';
                                    checkCSS.style.padding = '0px 0px 220px 0px';

                                    // plusMinus.style.transform = 'rotate(90deg)';
                                    // plusMinus.style.background = '#e85c5c';

                                    // plusMinusTwo.style.background = '#e85c5c';

                                    // Replace icon
                                    var els = [].slice.apply(document.getElementsByClassName("fa fa-plus"));
                                    for (var i = 0; i < els.length; i++) {
                                        els[i].className = els[i].className.replace(/ *\bfa fa-plus\b/g, "fa fa-minus");
                                    }

                                } else {
                                    checkCSS.style.visibility = 'hidden';
                                    checkCSS.style.opacity = '0';
                                    checkCSS.style.padding = '0px 0px 0px 0px';

                                    // plusMinus.style.transform = 'rotate(0deg)';
                                    // plusMinus.style.background = '#228B22';

                                    // plusMinusTwo.style.background = '#228B22';

                                    // Replace icon
                                    var els = [].slice.apply(document.getElementsByClassName("fa fa-minus"));
                                    for (var i = 0; i < els.length; i++) {
                                        els[i].className = els[i].className.replace(/ *\bfa fa-minus\b/g, "fa fa-plus");
                                    }
                                }
                            }
                        </script>

                        <!-- PLUS-MINUS button
                        <div id="icon">
                          <div id="one"></div>
                          <div id="two"></div>
                        </div> -->

                        <!--
                        <button id="addSuggestionButton" type="submit" onclick="showHide('addSuggestion', 'two', 'one')">Legg til forslag</button> 
                        -->

                        <button id="addSuggestionButton" type="submit" onclick="showHide('addSuggestion', 'two', 'one')"><i class="fa fa-plus" aria-hidden="true"></i>legg til forslag</button>

                    </section>

                    <section id="addSuggestion">
                        <form action="/addSuggestion.php" method="post" id="addSuggestionForm">

                            <input type="text" name="tittel" placeholder="Tittel" onfocus="this.placeholder = ''" 
                                   onblur="this.placeholder = 'Tittel'" autocomplete="off" spellcheck="false" autocorrect="off">

                            <textarea placeholder="Beskrivelse" onfocus="this.placeholder = ''" 
                                   onblur="this.placeholder = 'Beskrivelse'" rows="3" name="description" form="addSuggestionForm"></textarea>


                            <select name="categories" id="categories" required form="addSuggestionForm">
                                <option value="test1">Kategori</option>
                                <option value="test2">Test2</option>
                                <option value="test3">Test3</option>
                                <option value="test4">Test4</option>
                            </select>

                            <button id="send" type="submit">Send</button>
                        </form>
                    </section>

                </div>
            </div>

            <div class="w3-container w3-half">
                <section id="selectCategories">
                    <h3>Kategorier</h3>

                    <ul>
                        <li>Test</li>
                        <li>Test2</li>
                        <li>Test3</li>
                        <li>Test4</li>
                    </ul>
                </section>
            </div>

            <div class="w3-container">
                <section id="sortBy">
                    <p id="sortByLabel">sorter etter</p>
                    <form action="/sortBy.php">
                        <button id="nyeste" type="submit">Nyeste</button>
                        <button id="topprangert" type="submit">Topprangert</button>
                    </form>

                    <!--
                    <div id="sortView">
                        <i class="fa fa-list-ul" aria-hidden="true"></i>
                        <i class="fa fa-th-large" aria-hidden="true"></i>
                    </div>
                    -->
                </section>

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
                <div class="elementBlock">
                    <div class="votes"></div>
                    <div class="text">
                        <h3>Data Processing and Outsourced Services</h3>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
                <div class="elementBlock">
                    <div class="votes"></div>
                    <div class="text">
                        <h3>Data Processing and Outsourced Services</h3>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php 
        require_once 'footer.php';
    ?>

</body>
</html>