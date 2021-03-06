<?php

// Koble til databasen
require __DIR__ . '/setup.php';

$maxPerPage = 5;

$aktiviteterId = 4;
$treningssenterId = 5;

// Hent pris sortering fra url
if(isset($_GET['price'])){
    $price = $_GET['price'];
}

// Hent kategori id fra url
if (isset($_GET['category'])) {
    $categoryId = $_GET['category'];
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
else $page = 1;


$articles = new Article();
if (isset($price) && $price > 0 && $price <=4) {
    $articles = $articles->where('price', $price);
}
else {
    $articles = $articles->orderBy('price', 'asc');
}

if (isset($categoryId) && ($categoryId == $aktiviteterId || $categoryId == $treningssenterId)) {
    $articles = $articles->where('category_id', $categoryId);
}
else {
    if (isset($price) && $price > 0 && $price <=4) {
        $articles = $articles->where('category_id', $aktiviteterId)->orWhere('category_id', $treningssenterId)->where('price', $price);
    }
    else {
        $articles = $articles->where('category_id', $aktiviteterId)->orWhere('category_id', $treningssenterId);
    }
}

$maxPages = (count($articles->get()) % $maxPerPage == 0 ? (count($articles->get()) / $maxPerPage) : ((count($articles->get()) > $maxPerPage) ? (floor(count($articles->get()) / $maxPerPage)) + 1 : 1 ) );

// Get elements for your page, don't overextend, don't go to empty page
if(count($articles->get()) > $maxPerPage * ($page-1)) $articles = $articles->skip($maxPerPage * ($page-1))->take($maxPerPage)->get();
else if(count($articles->get()) % $maxPerPage != 0) $articles = $articles->skip(floor(count($articles->get()) / $maxPerPage) * $maxPerPage)->take($maxPerPage)->get();
else if(floor(count($articles->get()) / $maxPerPage) == 0) $articles = $articles->take($maxPerPage)->get();
else $articles = $articles->skip((floor(count($articles) / $maxPerPage) - 1) * $maxPerPage)->take($maxPerPage)->get();


// Hent alle kategorier
$categories = Category::where('id', $aktiviteterId)->orWhere('id', $treningssenterId)->get();

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Aktiviteter</title>

    <?php require_once 'header.php'; ?>
     
    <div class="w3-row">
        <div class="w3-content g6-padding">
            
            <div class="g6-center"><h1 class="g6-color-blue">Aktiviteter</h1>
                <p class="ingress">Her kan du sjekke ut anbefalte aktiviteter</p>
            </div>
            
            <div class="w3-bar">
            
                <form action="./aktiviteter.php">
                    <select class="w3-right w3-margin-right" name="category" onchange="this.form.submit()">

                        <option value="0">Alle kategorier</option>
                        <?php foreach($categories as $category) { ?>
                            <option value="<?= $category->id ?>" <?= (isset($categoryId) && $categoryId == $category->id) ? 'selected' : '' ?>><?= $category->category_name ?></option>
                        <?php } ?>
                        
                    </select>
                        
                    <select class="w3-right w3-margin-right" name="price" onchange="this.form.submit()">
                        
                        <option value="0">Alle priser</option>
                        <option value="4" <?= (isset($price) && $price == 4) ? 'selected' : '' ?>>Gratis</option>
                        <?php for($i=1; $i <= 3; $i++) { ?>
                            <option value="<?= $i ?>" <?= (isset($price) && $price == $i) ? 'selected' : '' ?>>Pris: <?php for($n=0; $n < $i; $n++) { ?>$<?php } ?></option>
                        <?php } ?>

                    </select>

                </form>
                
            </div>

            <!-- INNHOLD LAGES HER! -->  
            <?= (count($articles) < 1) ? '<h1>Ingen artikler til dette søket!</h1>' : '' ?>
            <?php foreach($articles as $article) { ?>
            
                <div class="w3-border-bottom w3-margin-top g6-margin" style="display:inline-block; width:100%;">

                    <div class="w3-left w3-twothird" style="height:100%;"> 

                        <img class="w3-padding" src="<?= $article->image_url ?>" alt="bilde" style="width:100%;">
                        
                        <h3 class="w3-margin-left"><?= $article->title ?></h3>
                        <p class="w3-margin-left"><?= $article->description ?></p>
                        
                        <br>
                        <span class="w3-margin-left">Pris: <?php if($article->price > 0 && $article->price < 4) { for($i=0; $i < $article->price; $i++) { ?><i class="fa fa-dollar"></i><?php }} else echo 'Gratis' ?></span>
                        
                        <br><br>
                          
                    </div>
                   
                    <div class="w3-left w3-third" style="height:100%">

                        <div class="w3-full w3-center w3-padding">
                            
                            <img src="1491419678_map-icon.png" alt="kart" style="width:100%;">

                            <div class="twitterFeed w3-twothree w3-card-2 g6-center g6-content-padding w3-margin-top w3-margin-bottom" style="100%">
                                <a class="twitter-timeline" data-height="300" data-width="100%" href="https://twitter.com/<?= $article->twitter_username ?>">Tweets fra Westerdals ACT</a> 
                                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
                            </div>

                        </div> 

                    </div>

                </div>
            
            <?php } ?>
            
            <!-- Pagination -->
            <div class="w3-bar g6-center g6-margin">
                <?php $c = (isset($categoryId)) ? 'category=' . $categoryId . '&' : ''; $s = (isset($price)) ? 'price=' . $price . '&' : '' ?>
                <a href="?<?= $c ?><?= $s ?>page=<?= ($page > 1 ? ($page - 1) : 1) ?>" class="w3-button">«</a>
                <?php for($i=0; $i < $maxPages; $i++) { ?>
                    <a href="?<?= $c ?><?= $s ?>page=<?php $p = ($page <= 3 || $page > 3 && $maxPages <=5) ? $i+1 : (($page + 2 <= $maxPages) ? $page - 2 : ($maxPages - 4 + $i) ); echo $p ?>" class="w3-button<?= ($p == $page) ? ' w3-green' : (($page > $maxPages && $p == $maxPages) ? ' w3-green' : '')?>"><?= $p ?></a>
                <?php } ?>
                <a href="?<?= $c ?><?= $s ?>page=<?= ($page < $maxPages ? ($page + 1) : ($maxPages > 0 ? $maxPages : 1) ) ?>" class="w3-button">»</a>
            </div>
            
        </div>
    </div>
     
<?php require_once 'footer.php'; ?>