<?php

    date_default_timezone_set('Europe/Oslo');

    ini_set('display_errors', 1);
    require_once('TweetPHP.php');

    $TweetPHP = new TweetPHP(array(
      'consumer_key'              => 'zcHsKMPkiSfVXz8v5971QSU5k',
      'consumer_secret'           => 'Yb2KfbdbYgUNJV8VbosqeJ80FcWRAg7MWX5UyYmbe4HiHHJiD9',
      'access_token'              => '845158785249243136-hqrq8kPpybsc1nKS4rrfYEBTpabqtzc',
      'access_token_secret'       => '0KcJWqsJIJSKzqQgzkPsennkuizs64CXtlwCkYU5nGysK',
      'twitter_screen_name'       => 'westerdals'
    ));

    echo $TweetPHP->get_tweet_list();
?>
