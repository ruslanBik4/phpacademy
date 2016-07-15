<?php

/**
 * Created by PhpStorm.
 * User: rus
 * Date: 15.07.16
 * Time: 19:13
 */
class human
{
    private static $arrSex = ['m' => 'male', 'f' => 'female'];
    static $FORMAT_DATE = '/\d{1,4}-\d{1,2}-\d{1,2}/';
    protected $name;
    protected $dateBorn;
    // m/f
    protected $sex;


    /**
     * human constructor.
     * @param string $name
     * @param string $dateBorn
     * @param  in_array() $sex
     */
    public function __construct($name, $dateBorn, $sex)
    {
       if (!$name)
           throw new Exception('Name must have not null string!');

       if ( !in_array($sex, self::$arrSex) )
           throw new Exception('Value SEX not valid!');

       if ( !self::CheckDatBorn($dateBorn) )
           throw new Exception('Data born is not valid');


        $this->name = $name;
        $this->dateBorn = $dateBorn;
        $this->sex = $sex;
    }

    public function PrintName()
    {
        return $this->name;
    }

    private static function CheckDatBorn($dateBorn)
    {
//        if ( preg_match(self::$FORMAT_DATE, $dateBorn))
//            return false;

        if ($dateBorn > date('Y-m-d'))
            return false;

        return True;
    }
}