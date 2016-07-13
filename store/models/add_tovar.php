<?php
/**
 * Created by PhpStorm.
 * User: rus
 * Date: 13.07.16
 * Time: 20:13
 */

require_once 'ITtovar.php';

 $newTovar = new ITtovar('эл.кошелек', 'кожаный (на самом деле- нет)', 420);

 $newTovar->Sell(10);

 $tovarClon = clone $newTovar;

//$tovarClon->setDescription('эко-кожа');

$newTovar->setCost(300);

$newTovar->Sell(100);

$tovarClon->Sell(30);

$newTovar->PrintTovar();

$tovarClon->PrintTovar();


echo "<br>" . PHP_EOL . $newTovar->getSellCopies(). ' ' . $newTovar::getCountSelling();
echo  PHP_EOL . $tovarClon->getSellCopies() . ' ' . $tovarClon::getCountSelling();
echo PHP_EOL . ITtovar::getCountSelling();
