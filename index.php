<?php
    require_once("templates/functions.php");
    require_once("templates/menu/Menu.php");
    require_once("templates/notifications/Notification.php");

    $menu = Menu::getInstance()->generate();

    session_start();
    if(isset($_SESSION['notification'])){
        $notification = Notification::getInstance()->generate($_SESSION['notification']);
        unset($_SESSION['notification']);
    }else{
        $notification = Notification::getInstance()->generate();
    }
    session_destroy();
    
    
    $template = getTemplate("default.html");

    $template = parseTemplate($template, [
        'menu' => $menu,
        'notification' => $notification
    ]);


    echo $template;
?>