<?php

                require('mytwit.inc.php');
            $tFeed = new MyTwit;
            $tFeed->TwitterUser = 'westerdalsact';
            $tFeed->TWITTER_CONSUMER_KEY = 'zcHsKMPkiSfVXz8v5971QSU5k';
            $tFeed->TWITTER_CONSUMER_SECRET = 'Yb2KfbdbYgUNJV8VbosqeJ80FcWRAg7MWX5UyYmbe4HiHHJiD9';
            $tFeed->TWITTER_OAUTH_ACCESS_TOKEN = '845158785249243136-hqrq8kPpybsc1nKS4rrfYEBTpabqtzc';
            $tFeed->TWITTER_OAUTH_ACCESS_TOKEN_SECRET = '0KcJWqsJIJSKzqQgzkPsennkuizs64CXtlwCkYU5nGysK';
            // $tFeed->PostLimit = 5;
            // $tFeed->ExcludeReplies = true;
            $tFeed->UpdateCache();

            echo '<div id="MyTwit">';
            if ($tFeed->ErrorMessage) {
                echo '<div class="MyTwitError">
                    <h3>Error processing twitter feed</h3>
                    <p>'.$tFeed->ErrorMessage.'</p>
                </div>';
            } else {
                echo '<div class="MyTwitUser">
                    <a href="https://twitter.com/'.$tFeed->TwitterUser.'" rel="nofollow">
                        <img src="'.$tFeed->UserInfo['user_profile_image_url_https'].'" alt="'.$tFeed->TwitterUser.'" />
                    </a>
                    <p id="usertext">
                        <a href="https://twitter.com/'.$tFeed->TwitterUser.'" class="UserName" rel="nofollow">'.$tFeed->TwitterUser.'</a>
                        <span class="UserDescription">'.$tFeed->UserInfo['user_description'].'</span>
                    </p>
                    <p class="UserStats">'.
                        $tFeed->UserInfo['user_followers_count'].' followers | '.$tFeed->UserInfo['user_statuses_count'].' tweets
                    </p>
                </div>
                <ol class="MyTweets">';
                foreach ($tFeed->Tweets as $tweet) {
                    echo '<li class="feeds"> <img src="img/bird.png" class = "birdimg">'.
                        $tweet['MyText'].' <span class="TweetWho">by
                        <a href="https://twitter.com/'.$tFeed->TwitterUser.'/status/'.$tweet['id_str'].'" rel="nofollow">'.$tFeed->TwitterUser.'</a>
                        '.$tweet['MyTimeAgo'].' via '.$tweet['source'].'</span>
                    </li>';
                }
                echo '</ol>';
            }
            echo '</div>';

?>
