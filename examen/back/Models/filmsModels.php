<?php

include_once "../Entities/film.php";
include_once "../Entities/user.php";
include_once "../DB/dbo.php";
include_once "../Models/loginModel.php";
include_once "../Models/signUpModel.php";


class filmsModels
{
protected dbo $dbo;

    public function __construct()
    {
        $this->dbo = new dbo();
    }


    public function getLanguage($languageId) : language
    {
        $sql = "SELECT * from language where  language_id = " . $languageId;
        $this->dbo->default();
        $query = $this->dbo->query($sql);
        $this->dbo->close();
        $result = $query->fetch_assoc();
        var_dump($result);
        return new language($result["language_id"], $result["name"], $result["last_update"]);
    }


    public function getCategory($categoryId) : category
    {
        $sql = "SELECT * from category where  category_id = " . $categoryId;
        $this->dbo->default();
        $query = $this->dbo->query($sql);
        $this->dbo->close();
        $result = $query->fetch_assoc();
        return new category($result["category_id"], $result["name"], $result["last_update"]);

    }

    public function getActorsByFilm($filmid) : array
    {
        $sql = "select * from actor a join film_actor fa on a.actor_id = fa.actor_id where fa.film_id = " . $filmid;
        $this->dbo->default();
        $query = $this->dbo->query($sql);
        $this->dbo->close();
        $actors = array();
        while($result = $query->fetch_assoc()){
            $actors = new actor($result['actor_id'], $result['first_name'], $result['last_name'], $result["last_update"]);
        }
        return $actors;
    }

    public function getFilms(): array
    {
        $sql = "SELECT * FROM film LIMIT 50";
        $this->dbo->default();
        $query = $this->dbo->query($sql);
        $this->dbo->close();
        $films = array();
        while ($result = $query->fetch_assoc()) {
            $actors = $this->getActorsByFilm($result["film_id"]);
            $category = $this->getCategory($result["category_id"]);
            $language = $this->getLanguage($result["language_id"]);
            $user = $this->getUser($result["user_id"]);

            $films[] = new film($result["film_id"], $result["title"], $result["description"], $result["release_year"], $language, $result["length"], $result["rating"], $result["last_update"], $actors, $category, (array)$user);
        }
        return $films;
    }

    public function getUser($userId): user
    {
        if (is_null($userId)) {
            return new user(0, "-", "-");
        }
        $sql = "SELECT * FROM user WHERE user_id = " . $userId;
        $this->dbo->default();
        $query = $this->dbo->query($sql);
        $this->dbo->close();

        $result = $query->fetch_assoc();
        return new user($result["user_id"], $result["mail"], $result["password"]);
    }


    public function rentFilm($filmId, $userId)
    {
        $sql = "UPDATE film SET user_id = " . $userId . " WHERE user_id IS NULL AND film_id = " . $filmId;
        $this->dbo->default();
        $this->dbo->query($sql);
        if ($this->dbo->affected_rows > 0) {
            $this->dbo->close();
            return true;
        }
        $this->dbo->close();
        return false;
    }


    }

