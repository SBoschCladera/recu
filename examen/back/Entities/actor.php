<?php

class actor
{

    public int $actor_id;
    public string $first_name;
    public string $last_name;
    public datetime $last_update;

    /**
     * @param int $actor_id
     * @param string $first_name
     * @param string $last_name
     * @param datetime $last_update
     */
    public function __construct(int $actor_id, string $first_name, string $last_name, datetime $last_update)
    {
        $this->actor_id = $actor_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->last_update = $last_update;
    }

    /**
     * @return int
     */
    public function getActorId(): int
    {
        return $this->actor_id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @return datetime
     */
    public function getLastUpdate(): datetime
    {
        return $this->last_update;
    }



}