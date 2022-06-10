<?php
    require_once("templates/functions.php");
    require_once("templates/submenu/SubMenu.php");
    
    $subMenu = SubMenu::getInstance()->generate(3);
    
    $template = getTemplate("default.html");

    $template = parseTemplate($template, ['subMenu' => $subMenu]);


    echo $template;
?>