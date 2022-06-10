<?php

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require_once("templates/functions.php");
    require_once("templates/menu/Menu.php");
    require_once("templates/Courses/Course.php");

    $menu = Menu::getInstance()->generate();
    $course = Course::getInstance()->showCourses();
    
    $template = getTemplate("default.html");

    $template = parseTemplate($template, ['menu' => $menu]);
    $template = parseTemplate($template, ['showCourse' => $course]);

    echo $template;
?>