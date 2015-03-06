<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// xss csrfclient or csrfserver and sql-injection



$type = SomeRequest::getString('attack', 'none');

$controller = "SomeController" . ucfirst($type);

$file = PATH_CONTENT . DS . "controller/$type.php";
$class = "SomeController" . ucfirst($type);
require $file;
$instance = new $class;
$instance->execute();




