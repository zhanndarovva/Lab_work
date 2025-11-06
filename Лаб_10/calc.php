<?php
function add($a, $b) { return $a + $b; }
function sub($a, $b) { return $a - $b; }
function mul($a, $b) { return $a * $b; }
function div($a, $b) {
    if ($b == 0) return "Ошибка: деление на ноль!";
    return $a / $b;
}

$a = 10;
$b = 5;

echo "Сложение: " . add($a, $b) . "<br>";
echo "Вычитание: " . sub($a, $b) . "<br>";
echo "Умножение: " . mul($a, $b) . "<br>";
echo "Деление: " . div($a, $b) . "<br>";
?>

