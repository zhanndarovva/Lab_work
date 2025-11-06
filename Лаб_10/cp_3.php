<?php
function average($arr) {
    if (count($arr) === 0) return 0;
    return array_sum($arr) / count($arr);
}

// Тест:
$numbers = [2, 4, 6, 8];
echo "Среднее значение массива [2,4,6,8]: " . average($numbers) . "<br>";
?>
