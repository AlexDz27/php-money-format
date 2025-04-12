<?php

// TODO: а что дробные???????
// TODO: попросить у чата ещё EC + чтоб он мне тест кейсы написал
// TODO: EC когда оч большое число, больше квадрлн
// TODO: bool для тысяч -> по идее можно просто readableSum($num * 1000), но в таком случае надо будет возвращать 0), т.е. 321 -> 0 рублей; Хотя мб даже обойдёмся тупым копи-пастом+патчем ф-ции специально для тысяч
// TODO: wasNegative вставлять
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
  // TODO: с дробными разобраться заранее

  for ($i = 3; $i <= count($NUM_OF_DIGITS_PER_TITLE) * 3; $i += 3) {
    $numOfDigits = $i;
    $title = $NUM_OF_DIGITS_PER_TITLE[$i];

    $numOfDigitsVal = 10 ** $numOfDigits; // 1_000, 1_000_000, 1_000_000_000, ...
    if ($number >= $numOfDigitsVal) {
      $numberFractionedMain = intdiv($number, $numOfDigitsVal);

      $wasMain2 = false;
      $numberFractionedMain2 = null;
      $numberFractionedMain2Str = "";
      if ($numberFractionedMain >= $numOfDigitsVal) { // блять, а тут типа рекурсия походу..  TODO: EC when zeros to check >*=*
        $wasMain2 = true;
        $numberFractionedMain2 = intdiv($numberFractionedMain, $numOfDigitsVal);
        $nextTitle = $NUM_OF_DIGITS_PER_TITLE[$i + 3];  // EC: very big; reaching end; reaching end + 1
        $numberFractionedMain2Str = "$numberFractionedMain2 $nextTitle";
        $numberFractionedMain = $numberFractionedMain % $numOfDigitsVal;
      }

      $numberFractionedRemainder = $number % $numOfDigitsVal;
      
      $outputString = "$numberFractionedMain2Str $numberFractionedMain $title $numberFractionedRemainder $outputString";

      if ($wasMain2) break;
    } else {
      break;
    }
  }

  return $outputString;
}

$sum0 = null;

// echo readableSum(null) . PHP_EOL;
// echo readableSum(123) . PHP_EOL; // TODO: mb with current arch it IS an EC
// echo readableSum(1_000) . PHP_EOL; // TODO: check (LOOKS LIKE EC)
// echo readableSum(1_213) . PHP_EOL;
// echo readableSum(99_999) . PHP_EOL;

// echo readableSum(1_213_213) . PHP_EOL;
// echo readableSum(12_213_213) . PHP_EOL;
// echo readableSum(123_213_213) . PHP_EOL;

// TODO: here
// echo readableSum(1_123_213_213) . PHP_EOL;
// echo readableSum(12_123_213_213) . PHP_EOL;

// echo readableSum(10_213) . PHP_EOL;
// echo readableSum(100_213) . PHP_EOL;
// echo readableSum(1_000_213) . PHP_EOL;


echo readableSum(937 * 1000) . PHP_EOL;
