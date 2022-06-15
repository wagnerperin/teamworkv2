<?php
    require_once("templates/notifications/Notification.php");
    session_start();
    if(isset($_SESSION['notification'])){
        $notification = Notification::getInstance()->generate($_SESSION['notification']);
        unset($_SESSION['notification']);
    }else{
        $notification = Notification::getInstance()->generate();
    }
?>