<?php

// JUST Controller, model, view, template example of how to do extension

// possible actions: empty, showpost, showget, showserver
// empty show menu, other show the superglobal values.

require THISCONTENTPATH . DS. "controller" . DS. "default.php";
require THISCONTENTPATH . DS. "model" . DS. "menu.php";
require THISCONTENTPATH . DS. "model" . DS. "superglobals.php";
require THISCONTENTPATH . DS. "view" . DS. "menu.php";
require THISCONTENTPATH . DS. "view" . DS. "superglobal.php";

$action = isset($_GET['action']) ? $_GET['action'] : 'menu';

$controller = new ExampleController();
$controller->$action();

