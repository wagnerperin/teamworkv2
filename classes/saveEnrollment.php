<?php  
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require_once("../classes/models/Enrollment.php");
    require_once("../classes/DAO/EnrollmentDAO.php");

    EnrollmentDAO::getInstance()->save(new Enrollment($_SESSION['userId'], $_GET['courseId']));

    header("Location: ../index.php"); 
?>