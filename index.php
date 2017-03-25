<?php
    $menu = 'none';
    $link = '/?1';
    if ($_SERVER['QUERY_STRING'] == 1){
            $menu = 'block';
            $link = '/?2';
        }
    if ($_SERVER['QUERY_STRING'] == 2){
            $menu = 'none';
            $link = '/?1';
        }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Prosjekt</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link rel="stylesheet" type="text/css" href="CSS/header.css">
    <style>
        #dropdowncontent{
            display:<?php echo $menu ?>;
            position: absolute;
            left: 0;
            top: 100px;
            width: 1000px;
            height: 300px;
            background-color: #87CEFA;
            margin-right: auto; 
            margin-left: auto;
            z-index: 1;
            animation-name: menuanim;
            animation-duration: 2s;
        }
        @-webkit-keyframes menuanim {
            from {width:1000px; height:0;}
            to {width:1000px; height:300px;}
        }
    </style>
</head>
<body>
    
    <div id="wrap">

        <div id="header">

            <div id="dropdown">
                
                <a href="<?php echo $link ?>"><img src="img/navicon.png" id="icon"></a>
                
                 <div id="dropdowncontent">
                    
                     <table>
                            
                          <tr>
                            <th>Mat</th>
                            <th>Aktiviteter</th>
                            <th>Kart</th>
                            <th>Forslagside</th>
                          </tr>
                          <tr>
                            <td><a href="https:/google.com">Fisk</a></td>
                            <td><a href="">Fisking</a></td>
                            <td><a href="">Fiskesteder</a></td>
                            <td><a href="">Beste fiskesteder</a></td>
                          </tr>
                          <tr>
                            <td><a href="">Hamburger</a></td>
                            <td><a href="">Vet ikke</a></td>
                            <td><a href="">SIden til kartet</a></td>
                            <td><a href="">foslag</a></td>
                          </tr>

                    </table>
                    
                </div>

            </div>
            
            <h1>Oversikt</h1>
            
        </div>
        
        <div id="line">
        </div>

        <div id="content">

            <img src="img/placeholder/food-005.jpg" class="post-img" alt="Hamburger" />
            
            <h2>Hva skjer på Westerdals</h2>
            
            <div id="contentline">
            </div>
            
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>

        </div>
        
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

    </div>  
    
</body>
</html>
