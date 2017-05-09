<?php

require(__DIR__ . '/setup.php');

if(isset($_POST['vote_id'])){
    $vote_id = $_POST['vote_id'];
    $suggestion = Suggestion::find($vote_id);
    if(count($suggestion) == 1){
        $suggestion->num_of_votes = $suggestion->num_of_votes + 1;
        $suggestion->save();
    }
    else {
        header('HTTP/1.1 500 Internal Server Error');
        die();
    }
}
else {
    header('HTTP/1.1 500 Internal Server Error');
    die();
}

die();