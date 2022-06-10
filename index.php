<?php
    require_once("templates/functions.php");
    require_once("templates/menu/Menu.php");

    $menu = Menu::getInstance()->generate();
    
    
    $template = getTemplate("default.html");

    $template = parseTemplate($template, ['menu' => $menu]);


    echo $template;
?>