<?php

//// TABLE SQL ////////////
/*

MySQL

CREATE TABLE IF NOT EXISTS `crud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) DEFAULT NULL,
  `story` text CHARACTER SET utf8,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1 ;


POSTGRE

CREATE TABLE crud (
   id SERIAL,
   year NULL,
   story text,
   created datetime default NULL
 );

*/
//////////////////////////////

defined('SOME_PATH') or die('Unauthorized access');

include(PATH_CONTENT.DS.'controller'.DS.'crudlist.php');
$controller = new CrudController();
$controller->execute();
