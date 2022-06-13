<?php
    require_once("templates/functions.php");
    require_once("templates/menu/Menu.php");
    require_once("inc/verifyNotifications.php");

    $menu = Menu::getInstance()->generate();
    
    
    $template = getTemplate("default.html");

    $template = parseTemplate($template, [
        'menu' => $menu,
        'notification' => $notification
    ]);


    echo $template;
?>