<?php

/**
 * Created by PhpStorm.
 * User: rus
 * Date: 20.07.16
 * Time: 20:31
 */
class pdoConnect
{
    static private $connection = null;

   public $nameUser;
    private $prepareSQL;

    static public  function Init($name, $password, $databaseName) {

        if (self::$connection === null) {

            self::$connection = new pdoConnect($name, $password, $databaseName);
        }

        return self::$connection;


    }

    public function doPDOCommand($command) {
        $command();
    }
    public function doQuery($sql) {
        echo "pdo_query ($sql)";
    }
    static public function PrintObject() {

        return self::$connection;
    }

    private function __construct($name, $password, $databaseName) {

        echo 'Make object!';
        $this->nameUser = $name;
    }

    private function __clone() {
        echo 'Clone object!';

    }

    private function __wakeup() {
        echo 'Wake object!';

    }
}