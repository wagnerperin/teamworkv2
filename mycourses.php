<?php
    ini_set('display_errors', 0);
    error_reporting(E_ALL);

    require_once("templates/functions.php");
    require_once("templates/menu/Menu.php");
    require_once("templates/show_courses/ShowCourses.php");
    require_once("inc/verifyNotifications.php");
    require_once("inc/checkUserAuthenticated.php");

    $menu = Menu::getInstance()->generate();
    
    $template = getTemplate("default.html");

    $template = parseTemplate($template, [
        'content' => ShowCourses::getInstance()->userCourses($_SESSION['userId']),
        'menu' => $menu,
        'notification' => $notification
    ]);

    echo $template;
?>