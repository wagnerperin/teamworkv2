<?php
    session_start();
    //redirect
    if(!$_SESSION['logedIn']){
        
        header('Location: ../Login.php');
    } 
?>