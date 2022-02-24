<?php

if (isset($_POST["mail"]) && isset($_POST["password"])) {
    $file = file_get_contents("http://localhost/recu/examen/back/Controllers/loginController.php?mail=".$_POST["mail"]."&password=".$_POST["password"]);
    $object_user = json_decode($file);


    if($object_user->id > 0){
        //var_dump($obj_user);

        session_start();
        $_SESSION["userId"] = $object_user->id;
        $_SESSION["userMail"] = $object_user->mail;
        $_SESSION["userPlainPassword"] = $_POST["password"];
        header("Location: filmsController.php");
    } else {
        die("Login Incorrecto");
    }
} else {
    include_once "../views/loginView.phtml";
}


