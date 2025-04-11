<?php

function readableSum($number) {
  if ($number < 1_000) {
    return $number . ' рублей';
  }

  if ($number < 1_000_000) {
    $thousands = intdiv($number, 1_000);
    $remainder = $number % 1_000;

    return $thousands . ' тыс. ' . $remainder . ' рублей';
  }

  if ($number < 1_000_000_000) {
    $millions = intdiv($number, 1_000_000);
    $thousands = intdiv(($number % 1_000_000), 1_000);
    $remainder = $number % 1_000;

    return $millions . ' млн ' . $thousands . ' тыс. ' . $remainder . ' рублей';
  }

  if ($number < 1_000_000_000_000) {
    $billions = intdiv($number, 1_000_000_000);
    $millions = intdiv(($number % 1_000_000_000), 1_000_000);
    $thousands = intdiv(($number % 1_000_000), 1_000);
    $remainder = $number % 1_000;

    return $billions . ' млрд ' . $millions . ' млн ' . $thousands . ' тыс. ' . $remainder . ' рублей';
  }

  if ($number < 1_000_000_000_000_000) {
    return $number;
  }
}

$sum0 = 234;
$sum1 = 1_234;
$sum2 = 5_934;
$sum3 = 15_934;
$sum4 = 155_934;
$sum5 = 1_005_934;
$sum6 = 1_155_934;
$sum7 = 7_155_934;
$sum8 = 88_935_934;
$sum9 = 988_935_934;
$sum10 = 1_988_935_934;
$sum11 = 16_988_935_934;
$sum12 = 160_988_935_934;
$sum13 = 169_988_935_934;
$sum14 = 999_988_935_934;
$sum15 = 1_999_988_935_934;
// $sum16 = 2_099_988_935_934;
// $sum17 = 3_001_988_935_934;
// $sum18 = 33_121_988_935_934;
// $sum19 = 999_999_988_935_934;

// echo intdiv($sum1, 1_000);
// echo $sum1 % 1_000;

echo '0: ' . readableSum($sum0) . PHP_EOL;
echo '1: ' . readableSum($sum1) . PHP_EOL;
echo '2: ' . readableSum($sum2) . PHP_EOL;
echo '3: ' . readableSum($sum3) . PHP_EOL;
echo '4: ' . readableSum($sum4) . PHP_EOL;
echo '5: ' . readableSum($sum5) . PHP_EOL;
echo '6: ' . readableSum($sum6) . PHP_EOL;
echo '7: ' . readableSum($sum7) . PHP_EOL;
echo '8: ' . readableSum($sum8) . PHP_EOL;
echo '9: ' . readableSum($sum9) . PHP_EOL;
echo '10: ' . readableSum($sum10) . PHP_EOL;
echo '11: ' . readableSum($sum11) . PHP_EOL;
echo '12: ' . readableSum($sum12) . PHP_EOL;
echo '13: ' . readableSum($sum13) . PHP_EOL;
echo '14: ' . readableSum($sum14) . PHP_EOL;
echo '15: ' . readableSum($sum15) . PHP_EOL;
// echo '16: ' . readableSum($sum16) . PHP_EOL;
// echo '17: ' . readableSum($sum17) . PHP_EOL;
// echo '18: ' . readableSum($sum18) . PHP_EOL;
// echo '19: ' . readableSum($sum19) . PHP_EOL;