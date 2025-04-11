<?php

function readableSum(int|float|null $number, string $cur = 'рублей'): string {
  if ($number === null) return 0 . " $cur";

  $wasNegative = false;
  if ($number < 0) {
    $wasNegative = true;
    $number = abs($number);
  }

  // Разрядность (place of number of digits): в данном случае берём 1*000* (тысячу), т.е. 3 цифры. Константа
  $NUM_OF_DIGITS = 3; // (
  $NUM_OF_DIGITS_PER_PLACE = [
    3 => 'тыс.',
    6 => 'млн',
    9 => 'млрд',
    12 => 'трлн',
    15 => 'квадрлн'
  ];
}

$sum0 = null;

echo readableSum(null) . PHP_EOL;
