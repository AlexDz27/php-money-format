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

$arr = [
  'some' => 123,
  'some2' => 0
];

// echo readableSum($arr['some2']) ?? 'default';
echo $arr['some2'] ?: 'default';