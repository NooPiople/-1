<?php
function calculateShaftDepth($totalTime) {
    $g = 9.81;     // ускорение свободного падения (м/с²)
    $v_sound = 343; // скорость звука (м/с)
    
    // Коэффициенты квадратного уравнения: a*t1² + b*t1 + c = 0
    $a = $g / 2;
    $b = $v_sound;
    $c = -$v_sound * $totalTime;
    
    $discriminant = pow($b, 2) - 4 * $a * $c;
    
    $t1 = (-$b + sqrt($discriminant)) / (2 * $a);
    
    $h = ($g * pow($t1, 2)) / 2;
    return $h;
}

echo "Введите общее время между бросанием камня и звуком удара (секунды): ";
$input = trim(fgets(STDIN));

if (!is_numeric($input) || $input <= 0) {
    echo "Ошибка: введите положительное числовое значение.\n";
} else {
    $depth = calculateShaftDepth((float)$input);
    echo "Глубина шахты: " . number_format($depth, 2) . " метров\n";
}
?>