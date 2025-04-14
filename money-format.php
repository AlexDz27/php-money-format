<?php

// TODO: :string stuff
function readableSum($number, $cur = 'рублей', $fracCur = 'копеек') {
  if ($number == 0) return "0 $cur"; // checking with == for 0 and null
  $wasNegative = false;
  if ($number < 0) {
    $wasNegative = true;
    $number = abs($number);
  }

  $outputStr = "";

  $decimal = $number - intval($number);
  $decimalStr = null;
  if ($decimal != 0) {
    $decimalStr = explode('.', (string) $number)[1];
    if (strlen($decimalStr) === 1) $decimalStr = "$decimalStr" . "0"; // force leading zero in nums like 10000.50
    $number = $number - $decimal;
    if ($number == 0) { // Case: 0.01; using == here to be able to compare with float zero
      $outputStr = "0 ";
    }
  }

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
  for ($i = 15; $i >= 0; $i -= 3) {
    if ($placeValuePerTitle[$i] === 0) continue;
    $outputStr = $outputStr . "$placeValuePerTitle[$i] $NUM_OF_DIGITS_PER_TITLE[$i] ";
  }

  if ($wasNegative) {
    $outputStr = '−' . $outputStr . $cur;
  } else {
    $outputStr .= $cur;
  }
  if ($decimal != 0) {
    // Sometimes we can get 0.25 or 0.05, which is fine for both "копейки" and "тиыны". To prettify 0.05, use ltrim() 
    // to prettify: 5 тыс. 166 рублей 01 копеек -> 5 тыс. 166 рублей 1 копеек
    // But sometimes the fractional part could be something like 0.699, which is not a valid sum. If we do get that, just print it as is to persist the structure of data.
    if (strlen($decimalStr) <= 2) {
      $decimalStr = ltrim($decimalStr, "0");
    }

    $outputStr .= " $decimalStr $fracCur";
  }

  return $outputStr;
}


$num0 = 475;
$num1 = 213_678;
$num2 = 1_213_678;
$num3 = 199_213_678;
$num4 = 10_199_213_678;
$num5 = 101_199_213_678;
$num6 = 9_101_199_213_678;

$num7 = 100;
$num8 = 101;
$num9 = 99;

$num10 = 0;
$num11 = 1000;
$num12 = 1001;

$num13 = -1001;
$num14 = -1_000_000;
$num15 = -1_000_013;
$num16 = -111_090_013;

$num17 = 7.00;
$num18 = 7.0;
$num19 = 6.05;
$num20 = 7.25;
$num21 = 166;
$num22 = 1_005_166.13;
$num23 = 1_005_166.14;
$num24 = 1_005_166.25;
$num25 = 1_005_166.26;
$num26 = 1_005_166.27;
$num27 = -1_005_166.27;
$num28 = -1_005_166.13;
$num29 = -1_005_166.13345;
$num30 = -1_005_166.01;
$num31 = -1_005_166.515;
$num32 = -1_005_166.048;

$num33 = 937;
$num34 = 0;
$num35 = 412;

$num36 = 123_000;
$num36 = 123_001;

// Chatgpt values 1
$num37 = 0;
$num38 = 0.01; 
$num39 = 1;
$num40 = 12.05;
$num41 = 101.1;
$num42 = 1000;
$num43 = 1001.13;
$num44 = 123456.78;
$num45 = 1000000.99;
$num46 = 999999999.99;
$num47 = -1234.56;
$num48 = 12.999;

// Chatgpt values 2
$num49 = 0.00;
$num50 = 0.1; 
$num51 = 0.10;
$num52 = 0.99;
$num53 = 1.00;
$num54 = 1.01;
$num55 = 1.99;
$num56 = 2.005;
$num57 = 5.555;
$num58 = 10;
$num59 = 11.11;
$num60 = 99.99;
$num61 = 100;
$num62 = 123.45;
$num63 = 999.99;
$num64 = 1000.00;
$num65 = 1001.01;
$num66 = 10000.50;
$num67 = 12345.67;
$num68 = 99999.99;
$num69 = 100000.01;
$num70 = 123456.78;
$num71 = 1000000;
$num72 = 1000001.99;
$num73 = 1234567.89;
$num74 = 9999999.99;
$num75 = 10000000.00;
$num76 = 123456789.01;
$num77 = 999999999.99;
$num78 = -0.01;
$num79 = -1000.13;
$num80 = -999999.99;

// echo readableSum($num0) . '<br>';
// echo readableSum($num1) . '<br>';
// echo readableSum($num2) . '<br>';
// echo readableSum($num3) . '<br>';
// echo readableSum($num4) . '<br>';
// echo readableSum($num5) . '<br>';
// echo readableSum($num6) . '<br>';

// echo readableSum($num7) . '<br>';
// echo readableSum($num8) . '<br>';
// echo readableSum($num9) . '<br>';

// echo readableSum($num10) . '<br>';
// echo readableSum($num11) . '<br>';
// echo readableSum($num12) . '<br>';

// echo readableSum($num13) . '<br>';
// echo readableSum($num14) . '<br>';
// echo readableSum($num15) . '<br>';
// echo readableSum($num16) . '<br>';

// echo readableSum($num17) . '<br>';
// echo readableSum($num18) . '<br>';
// echo readableSum($num19) . '<br>';
// echo readableSum($num20) . '<br>';
// echo readableSum($num21) . '<br>';
// echo readableSum($num22) . '<br>';
// echo readableSum($num23) . '<br>';
// echo readableSum($num24) . '<br>';
// echo readableSum($num25) . '<br>';
// echo readableSum($num26) . '<br>';
// echo readableSum($num27) . '<br>';
// echo readableSum($num28) . '<br>';
// echo readableSum($num29) . '<br>';
// echo readableSum($num30) . '<br>';
// echo readableSum($num31) . '<br>';
// echo readableSum($num32) . '<br>';

echo readableSum($num33 * 1000) . '<br>';
echo readableSum($num34 * 1000) . '<br>';
echo readableSum($num35 * 1000) . '<br>';

echo readableSum($num36) . '<br>';

// chatgpt cases 1
// echo readableSum($num37) . '<br>';
// echo readableSum($num38) . '<br>';
// echo readableSum($num39) . '<br>';
// echo readableSum($num40) . '<br>';
// echo readableSum($num41) . '<br>';
// echo readableSum($num42) . '<br>';
// echo readableSum($num43) . '<br>';
// echo readableSum($num44) . '<br>';
// echo readableSum($num45) . '<br>';
// echo readableSum($num46) . '<br>';
// echo readableSum($num47) . '<br>';
// echo readableSum($num48) . '<br>';

// chatgpt cases 2
// echo readableSum($num49) . '<br>';
// echo readableSum($num50) . '<br>';
// echo readableSum($num51) . '<br>';
// echo readableSum($num52) . '<br>';
// echo readableSum($num53) . '<br>';
// echo readableSum($num54) . '<br>';
// echo readableSum($num55) . '<br>';
// echo readableSum($num56) . '<br>';
// echo readableSum($num57) . '<br>';
// echo readableSum($num58) . '<br>';
// echo readableSum($num59) . '<br>';
// echo readableSum($num60) . '<br>';
// echo readableSum($num61) . '<br>';
// echo readableSum($num62) . '<br>';
// echo readableSum($num63) . '<br>';
// echo readableSum($num64) . '<br>';
// echo readableSum($num65) . '<br>';
// echo readableSum($num66) . '<br>';
// echo readableSum($num67) . '<br>';
// echo readableSum($num68) . '<br>';
// echo readableSum($num69) . '<br>';
// echo readableSum($num70) . '<br>';
// echo readableSum($num71) . '<br>';
// echo readableSum($num72) . '<br>';
// echo readableSum($num73) . '<br>';
// echo readableSum($num74) . '<br>';
// echo readableSum($num75) . '<br>';
// echo readableSum($num76) . '<br>';
// echo readableSum($num77) . '<br>';
// echo readableSum($num78) . '<br>';
// echo readableSum($num79) . '<br>';
// echo readableSum($num80) . '<br>';
