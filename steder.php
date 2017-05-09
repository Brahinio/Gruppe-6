<?php

// Koble til databasen
require __DIR__ . '/setup.php';

$maxPerPage = 10;

$matbutikkerId = 2;
$restauranterId = 3;

// Hent kategori id fra url
if (isset($_GET['category'])) {
    $categoryId = $_GET['category'];
}

if (isset($categoryId) && ($categoryId == $matbutikkerId || $categoryId == $restauranterId)) {
    $chosenCategory = Category::find($categoryId);
    
    $articles = Article::where('category_id', $categoryId)->get()->take($maxPerPage);
}
else {
    $articles = Article::where('category_id', $matbutikkerId)->orWhere('category_id', $restauranterId)->get()->take($maxPerPage);
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Navn</title>
</head>
    
<?php 
    require_once 'header.php';
?>
    
<body>
     
    <div class="w3-row">
        <div class="w3-content">
            
            <div class="w3-bar">
            
                <form action="./steder.php">
                    <select class="w3-right" name="category" onchange="this.form.submit()">

                        <option value="0">Alle</option>
                        <?php foreach($categories as $category) { ?>
                            <option value="<?= $category->id ?>" <?= (isset($categoryId) && $categoryId == $category->id) ? 'selected' : '' ?>><?= $category->category_name ?></option>
                        <?php } ?>
                        
                     </select>
                        
                     <select class="w3-right w3-margin-right" name="category" onchange="this.form.submit()">
                        
                        <option value="0">Pris</option>
                        <?php foreach($categories as $category) { ?>
                            <option value="<?= $category->id ?>" <?= (isset($categoryId) && $categoryId == $category->id) ? 'selected' : '' ?>><?= $category->category_name ?></option>
                        <?php } ?>

                    </select>

                </form>
                
            </div>

            <!-- INNHOLD LAGES HER! -->  
            <?php foreach($articles as $article) { ?>
            
                <div class="w3-border-bottom w3-margin-top" style="display:inline-block; width:100%;">

                    <div class="w3-left w3-twothird" style="height:100%;"> 

                        <img class="w3-border" src="<?= $article->image_url ?>" alt="bilde" style="width:65%;"> 
                        
                        <h3><?= $article->title ?></h3>
                        <p><?= $article->description ?></p>
                        
                        Pris: <i class="fa fa-dollar"></i>
                              <i class="fa fa-dollar"></i>
                        
                        <br><br>
                          
                    </div>
                   
                    <div class="w3-left w3-third" style="height:100%">

                       <div class="w3-full w3-center">
                           

                           <img  src="1491419678_map-icon.png" alt="kart" class="w3-border" style="width:100%;">
                           
                             <div class="twitterFeed w3-twothree w3-card-2 g6-center g6-content-padding w3-margin-top w3-margin-bottom">
                                <a class="twitter-timeline" data-height="100%" data-width="100%" href="https://twitter.com/westerdalsact">Tweets fra Westerdals ACT</a> 
                                <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script> 
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

