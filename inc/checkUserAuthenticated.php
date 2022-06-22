<?php
    session_start();
    //redirect
    if(!$_SESSION['logedIn']){
        
        if(isset($_GET['courseId'])) {
            $_SESSION['redirectToCourse'] = $_GET['courseId'];
        }
        
        header('Location: Login.php');
    } 
?>