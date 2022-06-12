<?php  

    require_once("models/User.php");
    require_once("DAO/UserDAO.php");
    
    UserDAO::getInstance()->save(new User($_POST['name'], $_POST['email'], $_POST['cpf'], $_POST['password'], 0));
    

    header("Location: ../index.php");
?>