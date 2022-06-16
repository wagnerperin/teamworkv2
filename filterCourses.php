<?php

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require_once("templates/functions.php");
    require_once("classes/DAO/CoursesDAO.php");
    require_once("templates/menu/Menu.php");
    require_once("templates/show_courses/ShowCourses.php");
    require_once("inc/verifyNotifications.php");

    $courseName = $_GET['courseName'] ?? "";

    $menu = Menu::getInstance()->generate();
    
    $template = getTemplate("default.html");

    $template = parseTemplate($template, [
        'content' => ShowCourses::getInstance()->findCoursesWithFilters($courseName, 8),
        'menu' => $menu,
        'notification' => $notification
    ]);

    echo $template;
?>