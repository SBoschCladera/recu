
<?php
if (isset($_POST["mail"]) && isset($_POST["password"]) && isset($_POST["password2"])) {
    if ($_POST["password"] == $_POST["password2"]) {
        $file = file_get_contents("http://localhost/recu/examen/back/Controllers/signUpController.php?mail=" . $_POST["mail"] . "&password=" . $_POST["password"]);
        //var_dump($file);
        $signup = json_decode($file);
        if ($signup->result) {
            header("Location: loginController.php");
        } else {
            die($signup->error);
        }
    }
} else {
    include_once "../views/signUpView.phtml";
}
