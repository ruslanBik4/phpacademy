<?php

/**
 * Created by PhpStorm.
 * User: rus
 * Date: 22.07.16
 * Time: 20:55
 */
class DefaultController
{

    private $request;

    public function __construct( $request )
    {
        $this->request = $request;
    }

    public function defaultAction() {

    }

    public function RenderView() {

        echo "Hello< World!";
    }
}