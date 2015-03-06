<?php
/**********
MYSQL

CREATE TABLE `quotes` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`thequote` TEXT NOT NULL ,
`bywhom` TEXT NOT NULL ,
`whenyear` TEXT NOT NULL
) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_swedish_ci;


POSTGRE

CREATE TABLE quotes (
    id SERIAL,
    thequote text,
    bywhom text,
    whenyear text
);

***********************************************/
defined('SOME_PATH') or die('Unauthorized access');

include(PATH_CONTENT . DS . 'classes' . DS . 'quote.php');
include(PATH_CONTENT . DS . 'classes' . DS . 'quotes.php');

/*
 * Lets create permission rules
 */

$SomeRbac = SomeRbac::getInstance();

$SomeRbac->addActions('manager',array('quotes.edit'));
$SomeRbac->addActions('admin',array('quotes.edit','quotes.delete','quotes.list'));


$SomeRbac->addActions('guest',array('quotes.list'));
$SomeRbac->addActions('registered',array('quotes.list'));
$SomeRbac->addActions('admin',array('quotes.list'));
$SomeRbac->addActions('manager',array('quotes.list'));



$app = SomeFactory::getApplication();
$app->setTemplate('quotes');

include(PATH_CONTENT.DS.'controller.php');
$controller = new SomeControllerQuote();
$controller->execute();