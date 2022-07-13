<?php

ob_start();

require __DIR__ . "/vendor/autoload.php";
use CoffeeCode\Router\Router;

$route = new Router('https://www.localhost/acme-tarde', ":");
//$route = new Router('localhost/acme', ":"); // Route para localhost


/**
 * WEB Routes
 */

$route->namespace("Source\App");
$route->get("/","Web:home");
$route->get("/sobre","Web:about");

/**
 * APP Routes
 */

$route->group("/app");
$route->get("/","App:home");
$route->get("/lista","App:list");
$route->get("/pdf","App:createPDF");
//$route->group(null);

/*
 * Erros Routes
 */

$route->group("error")->namespace("Source\App");
$route->get("/{errcode}", "Web:error");

$route->dispatch();

/*
 * Error Redirect
 */

if ($route->error()) {
    $route->redirect("/error/{$route->error()}");
}

ob_end_flush();