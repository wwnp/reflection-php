<?php

use Controllers\Home;
use Controllers\Shop;
use Models\Article;
use Utils\Session;

include_once('init.php');

$model = new Article();
$session = new Session();

$controller = new Shop($model, $session);
$controller->run();
