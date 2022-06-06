<?php

$url = $_SERVER['REQUEST_URI'];

$pathArray = explode("/", $url);
$route = explode('?', end($pathArray))[0];

array_pop($pathArray);
$baseUrl = implode("/", $pathArray);

include 'views/head.php';
include 'views/menu.php';
include 'actions.php';

match ($route) {
  "" => home(),
  "login" => login(),
  "cadastro" => register(),
  "lista" => listing($baseUrl),
  "relatorios" => reports(),
  "delete" => deleteContact(),
  "edit" => editContact(),
  default => error404(),
};

include 'views/footer.php';
