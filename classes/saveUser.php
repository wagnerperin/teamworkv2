<?php  

    require_once("models/User.php");
    require_once("DAO/UserDAO.php");
    require_once(__DIR__ . "/../templates/notifications/Notification.php");
    
    try{
        $result = UserDAO::getInstance()->save(new User($_POST['name'], $_POST['email'], $_POST['cpf'], $_POST['password'], 0));
    
        if($result){
            $notification = new Notification("success", true, "Usuário criado com sucesso");
            session_start();
            $_SESSION['notification'] = $notification;
            header("Location: ../index.php");
        } 
    }catch(Exception $err){
        $notification = new Notification("danger", true, $err->getMessage());
        session_start();
        $_SESSION['notification'] = $notification;
        header("Location: ../registration.php");
    }
    
?>