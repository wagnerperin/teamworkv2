<?php
    require_once("../../classes/models/User.php");
    require_once("../../classes/DAO/UserDAO.php");

    $user = UserDAO::getInstance()->findByMail($_POST['email']);

    if(password_verify($_POST['password'], $user->password)){

        session_start();

        $_SESSION['logedIn'] = true;
        $_SESSION['userId'] = $user->userId;
        $_SESSION["email"] = $user->email;
        $_SESSION["userType"] = $user->userType;
        $_SESSION["name"] = $user->name;
        
        header('Location: ../../index.php');
    }else header('Location: ../../Login.php');
    
    
?>