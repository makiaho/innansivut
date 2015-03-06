<?php
    defined('SOME_PATH') or die('Unauthorized access');
    $configuration = array (
  'common' => 
  array (
    'livesite' => '',
    'language' => 'fi_FI',
    'secret' => 'safsf543fyg43hydrth',
    'template' => 'default',
  ),
  'session' => 
  array (
    'lifetime' => '45',
    'session_handler' => 'file',
    'session_table' => 'somesession',
  ),
  'database' => 
  array (
      'isused' => '1',
    'databasedriver' => 'pdomysql',
    'databasehost' => '127.0.0.1',
    'database' => '',
    'dbuser' => '',
    'dbpass' => '',
  ),
  'debug' => 
  array (
    'debug' => '0',
    'debugfile' => 'debug.log',
  ),
);
