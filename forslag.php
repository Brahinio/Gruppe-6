<?php

// Koble til databasen
require __DIR__ . '/setup.php';

$maxPerPage = 10;

// Hent kategori id fra url
if (isset($_GET['category'])) {
    $categoryId = $_GET['category'];
}

if (isset($categoryId) && $categoryId != 0) {
    $chosenCategory = Category::find($categoryId);
    
    if(isset($_GET['sort'])) {
        if($_GET['sort'] == 0) {
            $suggestions = Suggestion::where('category_id', $categoryId)->get()->sortByDesc('date_added')->take($maxPerPage);
        }
        else {
            $suggestions = Suggestion::where('category_id', $categoryId)->get()->sortByDesc('num_of_votes')->take($maxPerPage);
        }
    }
    else {
        $suggestions = Suggestion::where('category_id', $categoryId)->get()->sortByDesc('num_of_votes')->take($maxPerPage);
    }
}
else {
    if(isset($_GET['sort'])) {
        if($_GET['sort'] == 0) {
            $suggestions = Suggestion::all()->sortByDesc('date_added')->take($maxPerPage);
        }
        else {
            $suggestions = Suggestion::all()->sortByDesc('num_of_votes')->take($maxPerPage);
        }
    }
    else {
        $suggestions = Suggestion::all()->sortByDesc('num_of_votes')->take($maxPerPage);
    }
}

// Hent alle kategorier
$categories = Category::all();

?>

<head>
    <link rel="stylesheet" type="text/css" href="css/forslag.css">
    <title>Forslag</title>
</head>
<body>
    
    <?php 
        require_once 'header.php';
    ?>
    
    <div class="w3-row">
        <div class="w3-content g6-padding">
            
            <div class="w3-threequarter">
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
                            
                            function submitVote(id) {
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        setCookie('id', '1', '30');
                                        
                                        // kjør kode for å endre knappen
                                        /*
                                        var voting = document.getElementById("vote-" + id);
                                        var votingCount = document.getElementById("voteCount-" + id);
                                        if(voting.firstChild.data != "Stemt!") {
                                            voting.className += " voted";
                                            voting.firstChild.data = "Stemt!";
                                            votingCount.firstChild.data = parseInt(votingCount.firstChild.data) + 1;
                                        }
                                        */
                                        var voting = document.getElementById("vote-" + id);
                                        var voted = document.getElementById("voted-" + id);
                                        voting.style.visibility = 'hidden';
                                        voted.style.visibility = 'visible';
                                    }
                                };
                                xhttp.open("POST", "submitVote.php", true);
                                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                xhttp.send("vote_id=" + id);
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
                        <form action="./add_suggestion.php" method="post" id="addSuggestionForm">

                            <input type="text" name="title" placeholder="Tittel" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tittel'" autocomplete="off" spellcheck="false" autocorrect="off" required>

                            <textarea name="description" placeholder="Beskrivelse" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Beskrivelse'" rows="3" form="addSuggestionForm"></textarea>

                            <select name="category" id="categories" required form="addSuggestionForm">
                                <?php foreach($categories as $category) { ?>
                                    <option value="<?= $category->id ?>"><?= $category->category_name ?></option>
                                <?php } ?>
                            </select>

                            <button id="send" type="submit">Send</button>
                        </form>
                    </section>

                </div>
            </div>
            
            <div class="w3-quarter w3-hide-small g6-float-right">
                <section class="selectCategories g6-float-right">
                    <h3>Kategorier</h3>
                    <ul>
                        <li><a href="./forslag.php?category=0<?= (isset($_GET['sort']) ? '&sort=' . $_GET['sort'] : '') ?>">Alle</a></li>
                        <?php foreach($categories as $category) { ?>
                            <li><a href="./forslag.php?category=<?= $category->id . (isset($_GET['sort']) ? '&sort=' . $_GET['sort'] : '') ?>"><?= $category->category_name ?></a></li>
                        <?php } ?>
                    </ul>
                </section>
            </div>

            <!-- Start of general content -->
            <div class="w3-threequarter">

                <section class="sortBy">
                    <p id="sortByLabel">sorter etter</p>
                    <form action="./forslag.php">
                        <?php if(isset($_GET['category'])) { ?>
                            <input value="<?= $_GET['category'] ?>" name="category" type="hidden"/>
                        <?php } ?>
                        <button id="nyeste" name="sort" value="0" type="submit">Nyeste</button>
                        <button id="topprangert" name="sort" value="1" type="submit">Topprangert</button>
                    </form>

                    <!--
                    <div id="sortView">
                        <i class="fa fa-list-ul" aria-hidden="true"></i>
                        <i class="fa fa-th-large" aria-hidden="true"></i>
                    </div>
                    -->
                </section>

                <?php if(count($suggestions) > 0) { ?>
                    <?php foreach($suggestions as $suggestion) { ?>
                    <div class="contentBlockSugg w3-row g6-border-bottom">
                        <div class="votes w3-col">
                            <div class="g6-center">
                                <div class="votesCount"><h4 id="voteCount-<?= $suggestion->id ?>"><?= $suggestion->num_of_votes ?></h4></div>
                                <div class="stemmer"><p>stemmer</p></div>
                                <button id="vote-<?= $suggestion->id ?>" class="vote" onclick="submitVote('<?= $suggestion->id ?>')" name="stem" type="submit">Stem</button>
                                <div id="voted-<?= $suggestion->id ?>" class="voted">Stemt!</div>
                            </div>
                        </div>
                        <div class="text w3-rest">
                            <h3><?= $suggestion->title ?></h3>
                            <p><?= $suggestion->description ?></p>
                            <div class="additionalData">
                                <p><span>Lagt til:</span> 08/05/17 <span class="addSpace">Kategori:</span> Aktiviteter</p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="contentBlockSugg w3-row g6-border-bottom">
                        <div class="text w3-rest">
                            <h3>Ingen forslag i denne kategorien!</h3>
                        </div>
                    </div>
                <?php } ?>
                
                <!-- Pagination -->
                <div class="w3-bar g6-center g6-margin">
                    <a href="#" class="w3-button">«</a>
                    <a href="#" class="w3-button w3-green">1</a>
                    <a href="#" class="w3-button">2</a>
                    <a href="#" class="w3-button">3</a>
                    <a href="#" class="w3-button">4</a>
                    <a href="#" class="w3-button">»</a>
                </div>
                
                <!-- BEFORE PHP -->
                <!--
                <div class="contentBlockSugg w3-row g6-border-bottom">
                    <div class="votes w3-col w3-hide-small"></div>
                    <div class="text w3-rest">
                        <h3>Information Technology - Semiconductor Equipment</h3>
                        <p>Lorem ipsum dolor sit amet, duo ea mutat honestatis, at munere evertitur cum, duo eu vivendum euripidis. Nominati iracundia ea ius, unum audiam eos eu. Laudem iisque ancillae vim te. Vis idque vidisse democritum et, in vel harum alienum dissentiet. In eirmod feugiat recteque eum. Viderer invidunt ad vel, eius corrumpit signiferumque sit te.</p>
                    </div>
                </div>

                <div class="contentBlockSugg w3-row g6-border-bottom">
                    <div class="votes w3-col w3-hide-small"></div>
                    <div class="text w3-rest">
                        <h3>Consumer Discretionary</h3>
                        <p>Lorem ipsum dolor sit amet, duo ea mutat honestatis, at munere evertitur cum, duo eu vivendum euripidis. Nominati iracundia ea ius, unum audiam eos eu. Laudem iisque ancillae vim te. Vis idque vidisse democritum et, in vel harum alienum dissentiet.</p>
                    </div>
                </div>

                <div class="contentBlockSugg w3-row g6-border-bottom">
                    <div class="votes w3-col w3-hide-small"></div>
                    <div class="text w3-rest">
                        <h3>Data Processing and Outsourced Services</h3>
                        <p>Lorem ipsum dolor sit amet, duo ea mutat honestatis, at munere evertitur cum, duo eu vivendum euripidis. Nominati iracundia ea ius, unum audiam eos eu. Laudem iisque ancillae vim te. Vis idque vidisse democritum et, in vel harum alienum dissentiet. In eirmod feugiat recteque eum. Viderer invidunt ad vel, eius corrumpit signiferumque sit te.</p>
                    </div>
                </div>

                <div class="contentBlockSugg w3-row g6-border-bottom">
                    <div class="votes w3-col w3-hide-small"></div>
                    <div class="text w3-rest">
                        <h3>Data Processing and Outsourced Services</h3>
                        <p>Lorem ipsum dolor sit amet, duo ea mutat honestatis.</p>
                    </div>
                </div>

                <div class="contentBlockSugg w3-row g6-border-bottom">
                    <div class="votes w3-col w3-hide-small"></div>
                    <div class="text w3-rest">
                        <h3>Data Processing and Outsourced Services</h3>
                        <p>Lorem ipsum dolor sit amet, duo ea mutat honestatis. Lorem ipsum dolor sit amet, duo ea mutat honestatis, at munere evertitur cum, duo eu vivendum euripidis. Nominati iracundia ea ius, unum audiam eos eu. Laudem iisque ancillae vim te. Vis idque vidisse democritum et, in vel harum alienum dissentiet. In eirmod feugiat recteque eum. Viderer invidunt ad vel, eius corrumpit signiferumque sit te.
                        <br><br>
                        Lorem ipsum dolor sit amet, duo ea mutat honestatis, at munere evertitur cum, duo eu vivendum euripidis. Nominati iracundia ea ius, unum audiam eos eu. Laudem iisque ancillae vim te. Vis idque vidisse democritum et, in vel harum alienum dissentiet. In eirmod feugiat recteque eum. Viderer invidunt ad vel, eius corrumpit signiferumque sit te.</p>
                    </div>
                </div>
                -->
                
            </div>
            
        </div>
    </div>
    
    <?php 
        require_once 'footer.php';
    ?>

</body>