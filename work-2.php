<?php

// checking zeros at the end

function readableSum($number) {
  $wasInitiallyNegative = false;
  if ($number < 0) {
    $wasInitiallyNegative = true;
    $number = abs($number);
  }

  if ($number < 1_000) {
    return ($wasInitiallyNegative ? '−' : '') . $number . ' рублей';
  }

  if ($number < 1_000_000) {
    $thousands = intdiv($number, 1_000);
    $remainder = $number % 1_000;

    return ($wasInitiallyNegative ? '−' : '') . $thousands . ' тыс. ' . ($remainder ? $remainder . ' рублей' : 'рублей');
  }

  if ($number < 1_000_000_000) {
    $millions = intdiv($number, 1_000_000);
    $thousands = intdiv(($number % 1_000_000), 1_000);
    $remainder = $number % 1_000;

    return ($wasInitiallyNegative ? '−' : '') . $millions . ' млн ' . $thousands . ' тыс. ' . ($remainder ? $remainder . ' рублей' : 'рублей');
  }

  if ($number < 1_000_000_000_000) {
    $billions = intdiv($number, 1_000_000_000);
    $millions = intdiv(($number % 1_000_000_000), 1_000_000);
    $thousands = intdiv(($number % 1_000_000), 1_000);
    $remainder = $number % 1_000;

    return ($wasInitiallyNegative ? '−' : '') . $billions . ' млрд ' . $millions . ' млн ' . $thousands . ' тыс. ' . ($remainder ? $remainder . ' рублей' : 'рублей');
  }

  if ($number < 1_000_000_000_000_000) {
    return ($wasInitiallyNegative ? '−' : '') . $number;
  }
}

$sum0 = 1_005_934;
$sum1 = 12_944_000;
$sum2 = 12_944_012;
$sum3 = 12_944_112;

$sum4 = -12_944_112;

$sum5 = 12_945_012;

echo '0: ' . readableSum($sum0) . PHP_EOL;
echo '1: ' . readableSum($sum1) . PHP_EOL;
echo '2: ' . readableSum($sum2) . PHP_EOL;
echo '3: ' . readableSum($sum3) . PHP_EOL;

echo '4: ' . readableSum($sum4) . PHP_EOL;

echo '5: ' . readableSum($sum5) . PHP_EOL;