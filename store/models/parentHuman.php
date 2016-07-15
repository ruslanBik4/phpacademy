<?php

/**
 * Created by PhpStorm.
 * User: rus
 * Date: 15.07.16
 * Time: 19:35
 */
class parentHuman extends human
{
    public $childrens = [];

    public function  __construct(human $thusHuman, childrenHuman $children)
    {
        parent::__construct($thusHuman->name, $thusHuman->dateBorn, $thusHuman->sex);

        $this->childrens[] = $children;
    }

    public function bornChildren(childrenHuman $children)
    {
        $this->childrens[] = $children;

        return $this;

    }
    public function printCountChildren()
    {
        return count($this->childrens);
    }

    public function printChildrens()
    {
        $text = '';
        foreach ($this->childrens as $child)
        {
            $text .= ($child->sex == 'male' ? 'son ' : 'daugther ') .  $child->name . ' born in ' . $child->dateBorn .PHP_EOL;
        }
        return $text;
    }
}