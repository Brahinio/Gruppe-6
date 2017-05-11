<?php

// Koble til databasen
require __DIR__ . '/setup.php';

$maxPerPage = 10;

$matbutikkerId = 2;
$restauranterId = 3;

// Hent pris sortering fra url
if(isset($_GET['price'])){
    $price = $_GET['price'];
}

// Hent kategori id fra url
if (isset($_GET['category'])) {
    $categoryId = $_GET['category'];
}

// Hvis både pris og kategori id er satt og har riktige verdier
if((isset($price) && $price > 0 && $price <=3) && (isset($categoryId) && ($categoryId == $matbutikkerId || $categoryId == $restauranterId))) {
    $articles = Article::where('price', $price)->where('category_id', $categoryId)->get()->take($maxPerPage);
}
// Hvis bare kategori id er satt og har riktig verdi
else if (isset($categoryId) && ($categoryId == $matbutikkerId || $categoryId == $restauranterId)) { 
    $articles = Article::where('category_id', $categoryId)->get()->sortBy('price')->take($maxPerPage);
}
// Hvis bare pris er satt og har riktig verdi
else if(isset($price) && $price > 0 && $price <= 3) {
    $articles = Article::where('price', $price)->where('category_id', $matbutikkerId)->orWhere('price', $price)->Where('category_id', $restauranterId)->get()->take($maxPerPage);
}
else {
    $articles = Article::where('category_id', $matbutikkerId)->orWhere('category_id', $restauranterId)->get()->sortBy('price')->take($maxPerPage);
}

// Hent alle kategorier
$categories = Category::where('id', $matbutikkerId)->orWhere('id', $restauranterId)->get()->take($maxPerPage);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Navn</title>
</head>
    
    <?php require_once 'header.php'; ?>
    
<body>
     
    <div class="w3-row">
        <div class="w3-content g6-padding">
            
            <div class="w3-bar">
            
                <form action="./steder.php">
                    <select class="w3-right w3-margin-right" name="category" onchange="this.form.submit()">

                        <option value="0">Alle</option>
                        <?php foreach($categories as $category) { ?>
                            <option value="<?= $category->id ?>" <?= (isset($categoryId) && $categoryId == $category->id) ? 'selected' : '' ?>><?= $category->category_name ?></option>
                        <?php } ?>
                        
                     </select>
                        
                     <select class="w3-right w3-margin-right" name="price" onchange="this.form.submit()">
                        
                        <option value="0">Alle priser</option>
                        <?php for($i=1; $i <= 3; $i++) { ?>
                            <option value="<?= $i ?>" <?= (isset($price) && $price == $i) ? 'selected' : '' ?>>Pris: <?php for($n=0; $n < $i; $n++) { ?>$<?php } ?></option>
                        <?php } ?>

                    </select>

                </form>
                
            </div>

            <!-- INNHOLD LAGES HER! -->  
            <?php foreach($articles as $article) { ?>
            
                <div class="w3-border-bottom w3-margin-top" style="display:inline-block; width:100%;">

                    <div class="w3-left w3-twothird" style="height:100%;"> 

                        <img class="w3-padding" src="<?= $article->image_url ?>" alt="bilde" style="width:100%;">
                        
                        <h3 class="w3-margin-left"><?= $article->title ?></h3>
                        <p class="w3-margin-left"><?= $article->description ?></p>
                        
                        <br>
                        <span class="w3-margin-left">Pris: <?php for($i=0; $i < $article->price; $i++) { ?><i class="fa fa-dollar"></i><?php } ?></span>
                        
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
            
        </div>
    </div>
     
    <?php 
        require_once 'footer.php';
    ?>

</body>
</html>

