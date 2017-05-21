<?php require_once 'header.php'; ?>

<?php

// Koble til databasen
require __DIR__ . '/setup.php';

$maxPerPage = 10;

$suggestions = new Suggestion();

// Hent kategori id fra url
if (isset($_GET['category'])) {
    $categoryId = $_GET['category'];
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
else $page = 1;

if(isset($_GET['search'])) {
    $search = $_GET['search'];
    $suggestions = $suggestions->where('title', 'LIKE', '%'.$search.'%')->orWhere('description', 'LIKE', '%'.$search.'%');
}
else {
    if (isset($categoryId) && $categoryId != 0) {
        $suggestions = $suggestions->where('category_id', $categoryId);
    }
}

$maxPages = (count($suggestions->get()) % $maxPerPage == 0 ? (count($suggestions->get()) / $maxPerPage) : ((count($suggestions->get()) > $maxPerPage) ? (floor(count($suggestions->get()) / $maxPerPage)) + 1 : 1 ) );

if (isset($_GET['sort']) && $_GET['sort'] == 0) {
    $suggestions = $suggestions->orderBy('date_added', 'desc');
}
else {
    $suggestions = $suggestions->orderBy('num_of_votes', 'desc');
}
// Get elements for your page, don't overextend, don't go to empty page
if(count($suggestions->get()) > $maxPerPage * ($page-1)) $suggestions = $suggestions->skip($maxPerPage * ($page-1))->take($maxPerPage)->get();
else if(count($suggestions->get()) % $maxPerPage != 0) $suggestions = $suggestions->skip(floor(count($suggestions->get()) / $maxPerPage) * $maxPerPage)->take($maxPerPage)->get();
else if(floor(count($suggestions->get()) / $maxPerPage) == 0) $suggestions = $suggestions->take($maxPerPage)->get();
else $suggestions = $suggestions->skip((floor(count($suggestions) / $maxPerPage) - 1) * $maxPerPage)->take($maxPerPage)->get();

// Hent alle kategorier
$categories = Category::all();

?>

<head>
    <link rel="stylesheet" type="text/css" href="css/forslag.css">
    <title>Forslag</title>
</head>

<body>
    
    <div class="w3-row">
        <div class="w3-content g6-padding">
            
            <div class="g6-center"><h1 class="g6-color-blue">Forslag</h1>
                <p class="ingress">Her kan du sende inn forslag og stemme fram dine anbefalinger</p>
            </div>
            
            <div class="w3-threequarter">
                <div id="containerSuggestions">
                    <section id="search">
                        
                        <input id="search-input" placeholder="Søk..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Søk...'" autocomplete="off" spellcheck="false" autocorrect="off" tabindex="1">
                        <a id="search-go" type="submit" class="fa fa-search" aria-hidden="true"><span class="sr-only"></span></a>
                        <a id="search-clear" type="submit" class="fa fa-times-circle" aria-hidden="true"><span class="sr-only"></span></a>

                        <!-- Empty search field on clicking red cross and maintain focus -->
                        <script>
                            var search = document.getElementById('search-input');
                            var buttonGo = document.getElementById('search-go');
                            var buttonClear = document.getElementById('search-clear');
                        
                            buttonGo.onclick = function() {
                                window.location.href = "?search=" + search.value;
                            }
                            
                            buttonClear.onclick = function() {
                                search.value = '';
                                search.focus();
                            }
                            
                            /* search on button up enter */
                            search.addEventListener("keyup", function(event) {
                                event.preventDefault();
                                if (event.keyCode == 13) {
                                    document.getElementById("search-go").click();
                                }
                            });
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
                                    checkCSS.style.margin = '0px 0px 220px 0px';

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
                                    checkCSS.style.margin = '0px 0px 0px 0px';

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
                                        setCookie(("suggestion-" + id), '1', '30');
                                        
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
                                        var votingCount = document.getElementById("voteCount-" + id);
                                        // voting.firstChild.data = 'Stemt!';
                                        // voting.style.visibility = 'hidden';
                                        voting.style.display = 'none';
                                        voted.style.visibility = 'visible';
                                        voted.className += " voting-margin";
                                        votingCount.firstChild.data = parseInt(votingCount.firstChild.data) + 1;
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

                            <button id="send" class="g6-light-green" type="submit">Send</button>
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
                        <?php if(isset($search)) { ?>
                            <input value="<?= $search ?>" name="search" type="hidden"/>
                        <?php } ?>
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
                        <div class="votes">
                            <div class="g6-center">
                                <div class="votesCount"><h4 id="voteCount-<?= $suggestion->id ?>"><?= $suggestion->num_of_votes ?></h4></div>
                                <div class="stemmer"><p>stemmer</p></div>
                                <button id="vote-<?= $suggestion->id ?>" class="vote" onclick="submitVote('<?= $suggestion->id ?>')" name="stem" type="submit" style="<?= (isset($_COOKIE['suggestion-' . $suggestion->id]) ? 'visibility: hidden;' : 'visibility: visible;') ?>">Stem</button>
                                <div id="voted-<?= $suggestion->id ?>" class="voted" style="<?= (isset($_COOKIE['suggestion-' . $suggestion->id]) ? 'visibility: visible;' : 'visibility: hidden;') ?>">Stemt!</div>
                            </div>
                        </div>
                        <div class="text g6-threequarter">
                            <h3><?= $suggestion->title ?></h3>
                            <p><?= $suggestion->description ?></p>
                            <div class="additionalData">
                                <p><span>Lagt til:</span> <?= $suggestion->date_added->diffForHumans() ?> <span class="addSpace">Kategori:</span> <?= $suggestion->category->category_name ?></p>
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
                    <?php $c = (isset($categoryId)) ? 'category=' . $categoryId . '&' : ''; $a = (isset($_GET['sort'])) ? 'sort=' . $_GET['sort'] . '&' : ''; $s = (isset($search)) ? 'search=' . $search . '&' : '' ?>
                    <a href="?<?= $c ?><?= $a ?><?= $s ?>page=<?= ($page > 1 ? ($page - 1) : 1) ?>" class="w3-button">«</a>
                    <?php for($i=0; $i < $maxPages; $i++) { ?>
                        <a href="?<?= $c ?><?= $a ?><?= $s ?>page=<?php $p = ($page <= 3 || $page > 3 && $maxPages <=5) ? $i+1 : (($page + 2 <= $maxPages) ? $page - 2 : ($maxPages - 4 + $i) ); echo $p ?>" class="w3-button<?= ($p == $page) ? ' w3-green' : (($page > $maxPages && $p == $maxPages) ? ' w3-green' : '')?>"><?= $p ?></a>
                    <?php } ?>
                    <a href="?<?= $c ?><?= $a ?><?= $s ?>page=<?= ($page < $maxPages ? ($page + 1) : ($maxPages > 0 ? $maxPages : 1) ) ?>" class="w3-button">»</a>
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
    
<?php require_once 'footer.php'; ?>