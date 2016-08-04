<?php

/**
 * Created by PhpStorm.
 * User: rus
 * Date: 04.08.16
 * Time: 20:41
 */
class tovar
{
    private $id;
    private $name;
    private $price;
    private $parent_id;

    public function __construct($name, $price, $parent_id)
    {
        if ($parent_id <= Category::$countId) {
            $this->parent_id = $parent_id;
            $this->price = $price;
            $this->name = $name;
         } else {
             throw new Exception('Not correct parent_id');
        }

    }

}