<?php

// th

function readableSumThousands($number) {
  $wasInitiallyNegative = false;
  if ($number < 0) {
    $wasInitiallyNegative = true;
    $number = abs($number);
  }

  if ($number < 1_000) {
    return ($wasInitiallyNegative ? '−' : '') . $number . ' тыс. рублей';
  }

  if ($number < 1_000_000) {
    $millions = intdiv($number, 1_000);
    $remainder = $number % 1_000;

    return ($wasInitiallyNegative ? '−' : '') . $millions . ' млн ' . ($remainder ? $remainder . ' тыс. рублей' : 'тыс. рублей');
  }

  if ($number < 1_000_000_000) {
    $billions = intdiv($number, 1_000_000);
    $millions = intdiv(($number % 1_000_000), 1_000);
    $remainder = $number % 1_000;

    return ($wasInitiallyNegative ? '−' : '') . $billions . ' млрд ' . $millions . ' млн ' . ($remainder ? $remainder . ' тыс. рублей' : 'тыс. рублей');
  }

  if ($number < 1_000_000_000_000) {
    $trillions = intdiv($number, 1_000_000_000);
    $billions = intdiv(($number % 1_000_000_000), 1_000_000);
    $millions = intdiv(($number % 1_000_000), 1_000);
    $remainder = $number % 1_000;

    return ($wasInitiallyNegative ? '−' : '') . $trillions . ' трлн ' . $billions . ' млрд ' . $millions . ' млн ' . ($remainder ? $remainder . ' тыс. рублей' : 'тыс. рублей');
  }

  if ($number < 1_000_000_000_000_000) {
    return ($wasInitiallyNegative ? '−' : '') . $number;
  }
}

$summ2 = 0;
$summ1 = 2;
$sum0 = 12;
$sum1 = 934;
$sum2 = 944;
$sum3 = 12_944;
$sum4 = 512_944;
$sum5 = 1_512_944;
$sum6 = 12_512_944;
$sum7 = 999_512_944;

// $balance = 7_436_550_217;
// $basicTools = 6_311_875_709;
// $profit = 1_963_646_793;
$balance = 1_765_262;
$basicTools = 1_115_071;
$profit = 650;

// echo 'm2: ' . readableSumThousands($summ2) . PHP_EOL;
// echo 'm1: ' . readableSumThousands($summ1) . PHP_EOL;
// echo '0: ' . readableSumThousands($sum0) . PHP_EOL;
// echo '1: ' . readableSumThousands($sum1) . PHP_EOL;
// echo '2: ' . readableSumThousands($sum2) . PHP_EOL;
// echo '3: ' . readableSumThousands($sum3) . PHP_EOL;
// echo '4: ' . readableSumThousands($sum4) . PHP_EOL;
// echo '5: ' . readableSumThousands($sum5) . PHP_EOL;
// echo '6: ' . readableSumThousands($sum6) . PHP_EOL;
// echo '7: ' . readableSumThousands($sum7) . PHP_EOL;

echo 'b: ' . readableSumThousands($balance) . PHP_EOL;
echo 'bT: ' . readableSumThousands($basicTools) . PHP_EOL;
echo 'p: ' . readableSumThousands($profit) . PHP_EOL;