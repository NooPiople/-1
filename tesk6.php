<?php
function calculateY($x) {
    if ($x <= 1) {

        $term1 = pow(7, $x);
        $term2 = pow(abs($x - 3), 7);
        $argument = abs($term1 - $term2);
        

        if ($argument <= 0) {
            return "Не определено (логарифм от неположительного числа)";
        }
        return log($argument, 7);
    } 
    elseif ($x < 3) {

        $numerator = pow($x, 8);
        $denominator = 1 + pow($x, 2);
        
        if ($denominator == 0 || $numerator/$denominator <= 0) {
            return "Не определено (логарифм от неположительного числа)";
        }
        return log($numerator / $denominator);
    } 
    else {

        $argument = $x / (1 + pow($x, 2));
        
        if (abs($argument) > 1) {
            return "Не определено (арксинус от значения вне [-1, 1])";
        }
        return asin($argument);
    }
}

// Пример использования
$testValues = [-2, 0, 1, 2, 2.5, 3, 4, 10];

foreach ($testValues as $x) {
    $result = calculateY($x);
    echo "y($x) = " . (is_numeric($result) ? round($result, 4) : $result) . "\n";
}
?>