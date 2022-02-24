<?php

class category
{

    public int $category_id;
    public string $name;
    public datetime $last_update;

    /**
     * @param int $category_id
     * @param string $name
     * @param datetime $last_update
     */
    public function __construct(int $category_id, string $name, datetime $last_update)
    {
        $this->category_id = $category_id;
        $this->name = $name;
        $this->last_update = $last_update;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return datetime
     */
    public function getLastUpdate(): datetime
    {
        return $this->last_update;
    }


}