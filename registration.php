<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  require_once("templates/functions.php");
  require_once("templates/menu/Menu.php");
  require_once("templates/registration/Registration.php");

  $menu = Menu::getInstance()->generate();

  $records = Registration::getInstance()->registration();
  
  $template = getTemplate("default.html");

  $template = parseTemplate($template, ['menu' => $menu]);
  
  $template = parseTemplate($template, ['content' => $records]);

  echo $template;

?>