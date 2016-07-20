<?php
/**
 * Created by PhpStorm.
 * User: rus
 * Date: 20.07.16
 * Time: 20:38
 */

 include_once 'pdoConnect.php';

class Test extends pdoConnect
{
    static public  function Init($name, $password, $databaseName)
    {

        parent::Init();
    }
}

function Test()
{
    echo 'test';
}
 $temp = pdoConnect::Init( 'andrej', '12345', 'testDN');




$temp1  = pdoConnect::Init( 'ruslan', '12345', 'testDN');


if ($temp == $temp1)
    echo 'Равны';


$temp->nameUser = 'Oleg';

var_dump($temp, $temp->nameUser);

var_dump($temp1);


$temp->doQuery('select * from category');

$temp->doPDOCommand('Test');


 $clone = Test::Init();