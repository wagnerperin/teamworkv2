<?php  
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require_once("../classes/models/Enrollment.php");
    require_once("../classes/DAO/EnrollmentDAO.php");
    require_once("../templates/notifications/Notification.php");

    require_once("checkUserAuthenticated.php"); //verifica se o usuário esta logado, senão, redireciona para login.

    EnrollmentDAO::getInstance()->save(new Enrollment($_SESSION['userId'], $_GET['courseId']));
    
    $notification = new Notification("success", true, "Matricula realizada com sucesso!");
    $_SESSION['notification'] = $notification;

    header("Location: ../index.php"); 
?>