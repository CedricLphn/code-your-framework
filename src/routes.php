<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$hello = new Route("/");
$bye = new Route("bye");

$routes = new RouteCollection();

$routes->add('hello', $hello);
$routes->add("bye", $bye);

?>