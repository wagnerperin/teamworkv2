<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  require_once("templates/functions.php");
  require_once("templates/menu/Menu.php");
  require_once("inc/verifyNotifications.php");
  require_once("templates/course_detail/courseDetail.php");

  $menu = Menu::getInstance()->generate();
  
  $template = getTemplate("default.html");

  $courseDetail = CourseDetail::getInstance()->generate($_GET['courseId']);

  $template = parseTemplate($template, [
    'content' => $courseDetail,
    'menu' => $menu,
    'notification' => $notification
  ]);

  echo $template;

?>