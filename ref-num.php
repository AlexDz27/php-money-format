<?php

function readableSum(int|float|null $number, string $cur = 'рублей', string $fracCur = 'копеек'): string {
  if ($number === null) return 0 . " $cur";

  $wasNegative = false;
  if ($number < 0) {
    $wasNegative = true;
    $number = abs($number);
  }

  // Разрядность (place of number of digits): в данном случае берём 1*000* (тысячу), т.е. 3 цифры. Константа
  $NUM_OF_DIGITS_PER_TITLE = [
    3 => 'тыс.',
    6 => 'млн',
    9 => 'млрд',
    12 => 'трлн',
    15 => 'квадрлн'
  ];

  $outputString = "$cur";
  $readableSumFraction = function() use ($number, &$outputString) {
    if ($number < 1_000) {
      $outputString = "$number $outputString";
    } else if ($number > 1_000) {
      $quotient = intdiv($number, 1_000);
      $remainder = $number % 1_000;

      $outputString = "$quotient тыс. $remainder $outputString";
    }
  };

  $readableSumFraction();

  return $outputString;
}

// echo readableSum(213) . PHP_EOL;
// echo readableSum(1) . PHP_EOL;
// echo readableSum(0) . PHP_EOL;
echo readableSum(1_001) . PHP_EOL;
// echo readableSum(1_000) . PHP_EOL;

// echo readableSum(1_231) . PHP_EOL;

// var_dump(intdiv(2_999, 1_000));
// var_dump(intdiv(233_999, 1_000));
// var_dump(intdiv(3_233_999, 1_000));
// var_dump(233_999 % 1_000);
// die();
