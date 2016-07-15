<?php

/**
 * Created by PhpStorm.
 * User: rus
 * Date: 15.07.16
 * Time: 19:40
 */
class childrenHuman extends human
{
    public $mather;
    public $father;


    public function __construct($name, $dateBorn, $sex, Human $mather, Human $father)
    {
        if ($mather->sex != 'female' || $father->sex != 'male')
            throw new Exception('Not valid born!');

        parent::__construct($name, $dateBorn, $sex);

        $this->father = $father instanceof parentHuman ? $father->bornChildren($this) :  new parentHuman($father, $this);


        $this->mather = $mather instanceof parentHuman ? $mather->bornChildren($this) :  new parentHuman($mather, $this);
    }

    public function PrintFamyly()
    {

      return $this->name . ' son from mather = ' . $this->mather->PrintName() . ', father =' . $this->father->PrintName()
          . ($this->father->printCountChildren() > 1 ? $this->father->printChildrens() : '');
    }

}