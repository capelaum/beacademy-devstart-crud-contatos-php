<?php

function payBill(float $invoice, float $money)
{
  echo "Pagando conta de R$ {$invoice} com R$ {$money}" . PHP_EOL;
}

payBill(33.3, 40);

function sum(float $n1, float $n2)
{
  echo $n1 + $n2 . PHP_EOL;
}

sum(2, 4);

function welcome($name)
{
  echo "Welcome {$name}" . PHP_EOL;
}

welcome("Luis");
