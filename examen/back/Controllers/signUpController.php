<?php

include_once "../Models/signUpModel.php";
include_once "../Models/loginModel.php";
include_once "../Controllers/loginController.php";

$return = array();
$result = false;
$error = "";

if (isset($_GET["mail"]) && isset($_GET["password"])) {
    $signupModel = new signupModel();
    if ($signupModel->checkUserExists($_GET["mail"])) {
        $error = "Usuario existente";
    } else {
        try {
            $password = crypt($_GET["password"], bin2hex(random_bytes(10)));
        } catch (Exception $e) {
            $password = crypt($_GET["password"], "salt");
        }
        if ($signupModel->saveUser($_GET["mail"], $password)) {
            $result = true;
        } else {
            $error = "Error";
        }
    }
} else {
    $error = "Error";
}

$return["result"] = $result;
$return["error"] = $error;

echo json_encode($return);



