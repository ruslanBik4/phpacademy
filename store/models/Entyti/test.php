<?php
/**
 * Created by PhpStorm.
 * User: rus
 * Date: 04.08.16
 * Time: 19:46
 */
 include_once 'category.php';
 include_once 'tovar.php';

try {
    $object = new Category('First');

    echo $object->getId() . ' ' . $object->GetName() . '<br>';

    $object1 = new Category('Second', 1);

    echo $object1->getId() . ' ' . $object1->GetName();
    echo Category::$countId;

    $tovar = new Tovar('product', 1234, 5);

} catch (Exception $error) {
    echo $error->getMessage() . ' in line ' . $error->getLine() . ' in file ' . $error->getFile();
}