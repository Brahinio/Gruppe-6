<?php

require __DIR__ . '/setup.php';

if(isset($_POST['title']) && isset($_POST['category']))
{
    $suggestion = new Suggestion;
    $suggestion->title = $_POST['title'];
    if(isset($_POST['description'])) $suggestion->description = $_POST['description'];
    $suggestion->category_id = $_POST['category'];
    $suggestion->save();
    
    header("Location: http://localhost:80/Gruppe-6/php_example/forslag.php?category=" . $_POST['category'] . "&sort=0");
    //header("Location: http://tek.westerdals.no/~telmat15/Gruppe-6/forslag.php?category=" . $_POST['category'] . "&sort=0");
}
else {
    header("Location: http://tek.westerdals.no/~telmat15/Gruppe-6/forslag.php");
}
die();