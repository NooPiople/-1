<?php
function calculateY($x) {
       if ($x < 0 || $x > 5) {
        return "x вне области определения";
    }

    $frac = pow($x, 3) / (pow($x, 3) + 1);
    if ($frac < -1 || $frac > 1) {
        return "arccos не определен для такого аргумента";
    }
    $term1 = pow(acos($frac), 3);

    $sqrt_abs_x = sqrt(abs($x));
    $part1 = $sqrt_abs_x + 1;


    if ($x <= 0) {
        return "логарифм не определен для x ≤ 0";
    }

    $lg_x = log10($x); // lg(x) - это логарифм по основанию 10
    $pow1 = pow(5, $lg_x);
    $pow2 = pow(abs($x), sin($x));
    $log_arg = $pow1 + $pow2;

    if ($log_arg <= 0) {
        return "логарифм не определен для аргумента ≤ 0";
    }
    $log5 = log($log_arg, 5);
    $part2 = pow($log5, 2);

    $root_arg = $part1 + $part2;
    $term2 = pow($root_arg, 1/7);

    return $term1 + $term2;
}

// Тестирование функции
$testValues = [0.1, 1, 2, 3, 4, 5, -1, 6];

foreach ($testValues as $x) {
    $result = calculateY($x);
    echo "y($x) = " . (is_numeric($result) ? round($result, 6) : $result) . "\n";
}
?>