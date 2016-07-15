<?php

/**
 * Created by PhpStorm.
 * User: rus
 * Date: 15.07.16
 * Time: 19:24
 */
class customer extends human
{
    protected $dateReg;
    private $hystory = '';

    public $nickname;


    /**
     * customer constructor.
     * @param string $name
     * @param string $dateBorn
     * @param in_array $sex
     * @param null $nickname
     */
    public function __construct($name, $dateBorn, $sex, $nickname = null)
    {
        parent::__construct($name, $dateBorn, $sex);

        $this->nickname = $nickname ? : $name;
        $this->dateReg  = date();
    }

    public function addBuy(array $cart)
    {
        $this->hystory .= explode(';', $cart);
    }

    public function getStatus()
    {
       switch ( count(implode(';', $this->hystory)) ) {
           case 0:
               return 'Novice';
           case 100:
           case 1000:
               return 'regular';
           default:
               return 'veteran';

       }
    }

}