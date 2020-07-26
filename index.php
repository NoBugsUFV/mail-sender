<?php
    $url = (isset($_GET['url'])) ? $_GET['url'] : 'home';
    $url = array_filter(explode('/', $url));
    $file = $url[0] . '.php';
    if(is_file($file)){
        include 'pages/' . $file;
    }else{
        include "pages/404.php";
    }

    //Começando url amigável
?>