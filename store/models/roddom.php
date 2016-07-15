<?php
/**
 * Created by PhpStorm.
 * User: rus
 * Date: 15.07.16
 * Time: 19:50
 */

function __autoload($class) {
    if(file_exists($class . '.php'))
        include $class . '.php';
}

try
{

 $Manya = new human('Маня', '2000-01-12', 'female');


} catch (Exception $e) {
    echo $e->getMessage();
}

try {

$Ivan  = new human('Айвенго', '1998-12-12', 'male');

} catch (Exception $e) {
    echo $e->getMessage();
}

if (isset($Manya, $Ivan)) {
    $denis = new childrenHuman('Денис', '2016-03-08', 'male', $Manya, $Ivan);
    echo $denis->PrintFamyly();

    $ManyaParent = $denis->mather;
    $IvanFather  = $denis->father;

    echo PHP_EOL . $ManyaParent->printCountChildren();

    $masha = new childrenHuman('Маша', '2016-01-07', 'female', $ManyaParent, $IvanFather);

    echo PHP_EOL . $ManyaParent->printCountChildren();



    echo 'Manya chidren is :' . $ManyaParent->printChildrens();

    echo 'Ivan' .$IvanFather->printChildrens();

    echo $denis->PrintFamyly();

}




