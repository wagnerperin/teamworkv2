<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  require_once("templates/functions.php");
  require_once("templates/menu/Menu.php");
  require_once("inc/verifyNotifications.php");

  $menu = Menu::getInstance()->generate();
  
  $template = getTemplate("default.html");

  $template = parseTemplate($template, [
    'menu' => $menu,
    'content' => getTemplate("login.html", "templates/Login/"),
    'logging' => getTemplate("notLogged.html", "templates/Logged/"),
    'notification' => $notification
  ]);

  echo $template;

?>