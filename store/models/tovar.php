<?php

/**
 * Created by PhpStorm.
 * User: rus
 * Date: 13.07.16
 * Time: 19:44
 */
class tovar
{
    protected static $instances = 0;

    private $cost;
    private $name;
    private $quantity;
    private $image;
    private $description;

    public $locale;

    /**
     * @return mixed
     */
    public function __construct($name, $description, $cost = 0)
    {
        $this->name = $name;
        $this->cost = $cost;
        $this->description = $description;

        self::$instances ++;

    }

    /**
     * @return int
     */
    public static function getInstances()
    {
        return self::$instances;
    }

    public function __clone()
    {
        // TODO: Implement __clone() method.
            $this->description = $this->description . ' - склонирован';

        self::$instances ++;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getCost()
    {
        return $this->cost . ($this->locale ? 'uah' : '$');
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $cost
     */
    public function setCost($cost)
    {
        if ($cost < 0)
            throw Exception('Значение не может быть меньше нуля!');

        $this->cost = $cost;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        if ($quantity < 0)
            throw Exception('Значение не может быть меньше нуля!');

        $this->quantity = $quantity;
    }

    /**
     *
     */
    public function PrintTovar()
    {
        echo $this->name . ', цена = ' . ($this->cost ? : '' ) . $this->quantity . '. ' .$this->description . ' image =' . $this->image . PHP_EOL;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


}