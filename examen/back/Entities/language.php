<?php

class language
{

   public int $language_id;
   public string $name;
   public datetime $last_update;

    /**
     * @param int $language_id
     * @param string $name
     * @param datetime $last_update
     */
    public function __construct(int $language_id, string $name, datetime $last_update)
    {
        $this->language_id = $language_id;
        $this->name = $name;
        $this->last_update = $last_update;
    }

    /**
     * @return int
     */
    public function getLanguageId(): int
    {
        return $this->language_id;
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