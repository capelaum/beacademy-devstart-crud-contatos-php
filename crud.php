<?php

function getContacts(string $path): array
{
  $contacts = file($path);

  $contacts = array_map(function ($contact) {
    $contact = explode(";", $contact);

    return [
      'name' => $contact[0],
      'email' => $contact[1],
      'phone' => $contact[2]
    ];
  }, $contacts);

  return $contacts;
}

function createContact()
{
  if (
    trim($_POST['name']) === '' ||
    trim($_POST['email']) === '' ||
    trim($_POST['phone']) === ''
  ) {
    $type = 'warning';
    $message = 'Por favor, preencha todos os campos corretamente';
    include 'views/message.php';
    return;
  }

  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  $file = fopen('data/contacts.csv', 'a+');
  fwrite($file, "{$name};{$email};{$phone}\n");
  fclose($file);

  $type = 'success';
  $message = 'Pronto, Cadastro realizado';
  include 'views/message.php';
}

function deleteContact()
{
  $id = $_GET['id'];

  $contacts = getContacts('data/contacts.csv');

  unset($contacts[$id]);

  unlink('data/contacts.csv');

  $file = fopen('data/contacts.csv', 'a+');

  foreach ($contacts as $contact) {
    fwrite($file, implode(";", $contact));
  }

  fclose($file);

  $type = 'success';
  $message = "Pronto, contato {$id} excluiddo com sucesso";
  include 'views/message.php';
}

function editContact()
{
  $id = $_GET['id'];

  $contacts = getContacts('data/contacts.csv');

  if (!empty($_POST)) {
    $contacts[$id]['name'] = $_POST['name'];
    $contacts[$id]['email'] = $_POST['email'];
    $contacts[$id]['phone'] = $_POST['phone'];

    unlink('data/contacts.csv');

    $file = fopen('data/contacts.csv', 'a+');

    foreach ($contacts as $key => $contact) {
      $append = $key === (int) $id ? "\n" : "";
      $formatedContact =  implode(";", $contact) . $append;

      fwrite($file, $formatedContact);
    }

    fclose($file);

    $type = 'success';
    $message = "Pronto, contato {$id} editado com sucesso";
    include 'views/message.php';
  }

  $contact = $contacts[$id];

  include  'views/edit.php';
}
