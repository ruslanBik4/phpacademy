<?php
 include_once '../models/autoload.php';

 $controller = new DefaultController( $_SERVER['REQUEST_URI'] );
 
 echo $controller->RenderView();