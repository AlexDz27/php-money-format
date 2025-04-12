<?php

function readableSum($number, $cur = 'рублей', $fracCur = 'копеек') {
  $NUM_OF_DIGITS_PER_TITLE = [
    0 => '',
    3 => 'тыс.',
    6 => 'млн',
    9 => 'млрд',
    12 => 'трлн',
    15 => 'квадрлн'
  ];

  $placeValuePerTitle = [
    0 => null,
    3 => null,
    6 => null,
    9 => null,
    12 => null,
    15 => null
  ];
  for ($i = 0; $i < count($NUM_OF_DIGITS_PER_TITLE) * 3; $i += 3) {
    $placeValuePerTitle[$i] = intdiv($number, 10 ** $i);
  }
  for ($i = 15; $i >= 0; $i -= 3) {
    if ($placeValuePerTitle[$i] >= 1_000) {
      $placeValuePerTitle[$i] = $placeValuePerTitle[$i] % 1000;
    }
  }

  var_dump($placeValuePerTitle);
}


$num0 = 475;
$num1 = 213_678;
$num2 = 1_213_678;
$num3 = 199_213_678;
$num4 = 10_199_213_678;
$num5 = 101_199_213_678;
$num6 = 9_101_199_213_678;

echo readableSum($num0) . PHP_EOL;
echo readableSum($num1) . PHP_EOL;
echo readableSum($num2) . PHP_EOL;
echo readableSum($num3) . PHP_EOL;
echo readableSum($num4) . PHP_EOL;
echo readableSum($num5) . PHP_EOL;
echo readableSum($num6) . PHP_EOL;



// var_dump(intdiv(1_213_678, 1_000_000_000));
// var_dump(intdiv(12, 1_));

// var_dump(intdiv(1_213_678, 1_000_000)); // TODO: handle уборку разряда
// var_dump(intdiv(213_678, 1_000));
// var_dump(intdiv(213_678, 1_000_000));
die();