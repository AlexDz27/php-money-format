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

  $placeValuePerTitle = [
    'тыс.' => null,
    'млн' => null,
    'млрд' => null,
    'трлн' => null,
    'квадрлн' => null
  ];
  if ($number < 1_000) {
    $outputStringPart = "$number";
  } else {
    for ($i = 3; $i <= count($NUM_OF_DIGITS_PER_TITLE) * 3; $i += 3) {
      $numOfDigits = $i;
      $title = $NUM_OF_DIGITS_PER_TITLE[$i];

      $numOfDigitsVal = 10 ** $numOfDigits;
      $placeValuePerTitle['тыс.'] = intdiv($number, 10 ** $numOfDigits);
      if ($placeValuePerTitle['тыс.'] >= 10 ** $numOfDigits) {
        // foreach ($placeValuePerTitle as $key => $value) {

        // }
      } else {
        break;
      }
    }
  }

  return "$outputStringPart $outputString";
}

// echo readableSum(213) . PHP_EOL;
// echo readableSum(1) . PHP_EOL;
// echo readableSum(0) . PHP_EOL;
echo readableSum(1_001) . PHP_EOL;
// echo readableSum(1_000) . PHP_EOL; // TODO: CHECK NOW HERE

// echo readableSum(1_231) . PHP_EOL;

// var_dump(intdiv(2_999, 1_000));
// var_dump(intdiv(233_999, 1_000));
// var_dump(intdiv(3_233_999, 1_000));
// var_dump(233_999 % 1_000);
// die();
