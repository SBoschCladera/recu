<?php

include_once "user.php";
include_once "language.php";
include_once "../DB/dbo.php";
include_once "category.php";

class film
{

public int $film_id;
public string $title;
public string $description;
public int $release_year;
public language $language;
public int $length;
public string $rating;
public user $user;
public datetime $last_update;
public category $category;
public array $actors;

    /**
     * @param int $film_id
     * @param string $title
     * @param string $description
     * @param int $release_year
     * @param language $language
     * @param int $length
     * @param string $rating
     * @param user $user
     * @param datetime $last_update
     * @param category $category
     * @param array $actors
     */
    public function __construct(int $film_id, string $title, string $description, int $release_year, language $language, int $length, string $rating, user $user, datetime $last_update, category $category, array $actors)
    {
        $this->film_id = $film_id;
        $this->title = $title;
        $this->description = $description;
        $this->release_year = $release_year;
        $this->language = $language;
        $this->length = $length;
        $this->rating = $rating;
        $this->user = $user;
        $this->last_update = $last_update;
        $this->category = $category;
        $this->actors = $actors;
    }

    /**
     * @return int
     */
    public function getFilmId(): int
    {
        return $this->film_id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getReleaseYear(): int
    {
        return $this->release_year;
    }

    /**
     * @return language
     */
    public function getLanguage(): language
    {
        return $this->language;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @return string
     */
    public function getRating(): string
    {
        return $this->rating;
    }

    /**
     * @return user
     */
    public function getUser(): user
    {
        return $this->user;
    }

    /**
     * @return datetime
     */
    public function getLastUpdate(): datetime
    {
        return $this->last_update;
    }

    /**
     * @return category
     */
    public function getCategory(): category
    {
        return $this->category;
    }

    /**
     * @return array
     */
    public function getActors(): array
    {
        return $this->actors;
    }


}