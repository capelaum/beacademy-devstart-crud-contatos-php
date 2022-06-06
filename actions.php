<?php

include "crud.php";

function home()
{
  include  "views/home.php";
}

function login()
{
  include  "views/login.php";
}

function register()
{
  if (!empty($_POST)) {
    createContact();
  }

  include  "views/register.php";
}

function listing(string $baseUrl)
{
  $contacts = getContacts('data/contacts.csv');

  include  "views/list.php";
}

function error404()
{
  include "views/404.php";
}
