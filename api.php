<?php

require "./routes/routes.php";

$request = $_SERVER;

$router = new Router($request);

$router->getRoter();
