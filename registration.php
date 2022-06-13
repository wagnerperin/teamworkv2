<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

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
    'content' => getTemplate("registration.html", "templates/registration/"),
    'notification' => $notification
  ]);

  echo $template;

?>