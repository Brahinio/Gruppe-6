<?php
    $menu = 'none';
    $link = '?link=1';

    if (isset($_GET['link'])){

        $linkcheck=$_GET['link'];
        if ($linkcheck == '1'){
            $link = '?link=2';
            $menu = 'block';
        }
        if ($linkcheck == '2'){
            $link = '?link=1';
            $menu = 'none';
        }

    }
?>