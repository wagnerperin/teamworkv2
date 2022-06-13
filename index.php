<?php

    ini_set('display_errors', 0);
    error_reporting(E_ERROR);

    require_once("templates/functions.php");
    require_once("templates/menu/Menu.php");
    require_once("templates/show_courses/ShowCourses.php");
    require_once("inc/verifyNotifications.php");

    $menu = Menu::getInstance()->generate();
    
    $template = getTemplate("default.html");

    if($_SESSION['logedIn'] != true) {

        $template = parseTemplate($template, [
            'content' => ShowCourses::getInstance()->generate(),
            'menu' => $menu,
            'logging' => getTemplate("notLogged.html", "templates/Logged/"),
            'notification' => $notification
        ]);
    
        echo $template;

    }else {

        $template = parseTemplate($template, [
            'content' => ShowCourses::getInstance()->generate(),
            'menu' => $menu,
            'logging' => getTemplate("Logged.html", "templates/Logged/"),
            'user' => getTemplate("NameUser.php", "templates/Login/"),
            'notification' => $notification
        ]);

        echo $template;  
    }
    
?>