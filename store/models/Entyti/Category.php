<?php

class Category
{
    private $id;
    private $name;
    private $parent_id;
    static $countId = 0;

    public function __construct($name, $parent_id = 0)
    {
        $this->name = $name;
        $this->parent_id = $parent_id;
        $this->setId();
    }
    public function GetName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * @param mixed $parent_id
     */
    public function setParentId($parent_id)
    {
        $this->parent_id = $parent_id;

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId()
    {

        $this->id = ++self::$countId ;
    }
}