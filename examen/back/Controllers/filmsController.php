<?php
include_once "../Models/filmsModels.php";
include_once "../Models/loginModel.php";

$user = new user(0, "-", "-");
if (isset($_GET["mail"]) && isset($_GET["password"])) {
    $loginModel = new loginModel();
    $user = $loginModel->getUser($_GET["mail"], $_GET["password"]);
}

$model = new filmsModels();
$availableFilms = $model->getFilms();
if ($user->getId() > 0) {
    if (isset($_GET["action"]) && isset($_GET["filmId"])) {
        if ($_GET["action"] == "rent") {
            $model->rentFilm($_GET["filmId"], $user->getId());
        }
    }
    $userFilms = $model->getUserFilms($user->getId());

    $return = array("availableFilms" => $availableFilms);

    echo json_encode($return);
}

