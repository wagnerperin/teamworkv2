<?php
    session_start();
    //redirect
    if(!$_SESSION['logedIn']){
        
        $_SESSION['redirectToCourse'] = $_GET['courseId'];
        header('Location: ../Login.php');
    } 
?>